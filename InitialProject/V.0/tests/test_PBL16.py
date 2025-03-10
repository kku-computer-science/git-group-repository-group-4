import pytest
from selenium import webdriver

# ตัวแปรที่ใช้เพื่อเก็บ URL สำหรับภาษาอังกฤษและไทย
english_url = "http://127.0.0.1:8000/"
thai_url = "http://127.0.0.1:8000/"

# ตัวแปรที่ใช้สำหรับข้อความที่คาดว่าจะเจอในภาษาอังกฤษ
english_texts = {
    "HOME": "Home",
    "RESEARCHERS": "Researchers",
    "RESEARCH PROJECT": "Research Project",
    "RESEARCH GROUP": "Research Group",
    "REPORTS": "Reports"
}

# ตัวแปรที่ใช้สำหรับข้อความที่คาดว่าจะเจอในภาษาไทย
thai_texts = {
    "HOME": "หน้าแรก",
    "RESEARCHERS": "นักวิจัย",
    "RESEARCH PROJECT": "โครงการวิจัย",
    "RESEARCH GROUP": "กลุ่มวิจัย",
    "REPORTS": "รายงาน"
}

# เปิดเว็บเบราว์เซอร์
driver = webdriver.Chrome()

def test_language_display(url, expected_texts):
    driver.get(url)
    
    # รอให้โหลดหน้าเว็บ
    driver.implicitly_wait(10)

    page_source = driver.page_source
    
    # ตรวจสอบข้อความทั้งหมดใน expected_texts
    for key, expected_text in expected_texts.items():
        assert expected_text in page_source, f"'{expected_text}' not found in the page!"

# กรณีทดสอบสำหรับเมนูภาษาอังกฤษ
def test_menu_home_english():
    test_language_display(english_url, {"HOME": "Home"})

def test_menu_researchers_english():
    test_language_display(english_url, {"RESEARCHERS": "Researchers"})

def test_menu_research_proj_english():
    test_language_display(english_url, {"RESEARCH PROJECT": "Research Project"})

def test_menu_research_group_english():
    test_language_display(english_url, {"RESEARCH GROUP": "Research Group"})

def test_menu_reports_english():
    test_language_display(english_url, {"REPORTS": "Reports"})

# กรณีทดสอบสำหรับเมนูภาษาไทย
def test_menu_home_thai():
    test_language_display(thai_url, {"HOME": "หน้าแรก"})

def test_menu_researchers_thai():
    test_language_display(thai_url, {"RESEARCHERS": "นักวิจัย"})

def test_menu_research_proj_thai():
    test_language_display(thai_url, {"RESEARCH PROJECT": "โครงการวิจัย"})

def test_menu_research_group_thai():
    test_language_display(thai_url, {"RESEARCH GROUP": "กลุ่มวิจัย"})

def test_menu_reports_thai():
    test_language_display(thai_url, {"REPORTS": "รายงาน"})

if __name__ == "__main__":
    pytest.main()
