import pytest
from selenium import webdriver

# ตัวแปรที่ใช้เพื่อเก็บ URL สำหรับภาษาอังกฤษและไทย
english_url = "http://127.0.0.1:8000/"
thai_url = "http://127.0.0.1:8000/"

# ตัวแปรที่ใช้สำหรับข้อความที่คาดว่าจะเจอ
english_texts = [
    "Home", "Researchers", "Research Project", "Research Group", 
    "Reports", "More details", "Research interests", "Publications (In the Last 5 Years)",
    "Education", "Publications", "Report the total number of articles ( 5 years : cumulative)", 
    "SUMMARY", "Before", "Reference", "All", "Research interests", "Search", 
    "Research Field :"
]

driver = webdriver.Chrome()

def test_language_display(url, expected_texts):
    driver.get(url)
    
    # รอให้โหลดหน้าเว็บ
    driver.implicitly_wait(10)

    page_source = driver.page_source
    
    # ตรวจสอบข้อความทั้งหมดใน expected_texts
    for expected_text in expected_texts:
        assert expected_text in page_source, f"'{expected_text}' not found in the page!"

def test_menu_home_english():
    test_language_display(english_url, [english_texts[0]])

def test_menu_researchers_english():
    test_language_display(english_url, [english_texts[1]])

def test_menu_research_proj_english():
    test_language_display(english_url, [english_texts[2]])

def test_menu_research_group_english():
    test_language_display(english_url, [english_texts[3]])

def test_details_english():
    test_language_display(english_url, [english_texts[4]])

def test_expertise_english():
    test_language_display(english_url, [english_texts[5]])

def test_publications_english():
    test_language_display(english_url, [english_texts[6]])

def test_education_english():
    test_language_display(english_url, [english_texts[7]])

def test_publications2_english():
    test_language_display(english_url, [english_texts[8]])

def test_total_articles_english():
    test_language_display(english_url, [english_texts[9]])

def test_summary_english():
    test_language_display(english_url, [english_texts[10]])

def test_before_english():
    test_language_display(english_url, [english_texts[11]])

def test_reference_english():
    test_language_display(english_url, [english_texts[12]])

def test_all_english():
    test_language_display(english_url, [english_texts[13]])

def test_search_english():
    test_language_display(english_url, [english_texts[14]])

def test_research_field_english():
    test_language_display(english_url, [english_texts[15]])

if __name__ == "__main__":
    pytest.main()
