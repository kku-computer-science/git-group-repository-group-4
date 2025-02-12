import pytest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

@pytest.fixture
def driver():
    """สร้างและคืนค่า WebDriver instance"""
    driver = webdriver.Chrome()
    yield driver
    driver.quit()

def test_researchers_page_title(driver):
    """ทดสอบว่าหน้าแสดงรายชื่อนักวิจัยมี title ที่ถูกต้อง"""
    driver.get("http://127.0.0.1:8000/researchers")
    WebDriverWait(driver, 20).until(
        EC.title_contains("Researchers")  # ตรวจสอบ title ของหน้าเว็บ
    )
    assert "Researchers" in driver.title

def test_researcher_details(driver):
    """ทดสอบการแสดงรายละเอียดนักวิจัย"""
    researcher_name = "Khamron Sunat"
    driver.get(f"http://127.0.0.1:8000/detail/eyJpdiI6IjI2alQydE54aHVOZ2dRYnRuMkZCOWc9PSIsInZhbHVlIjoid3VSbExaZHFrZE1OUjdFbnQyakZmQT09IiwibWFjIjoiZDlmOGUwM2I2NGNkZmI0MDU5NzU3NDQ3ZjQyZmQxNzRmMjczYWNkNDAxYTEzNzViNTdmZTA4ZmFjNzI0MTUyNSIsInRhZyI6IiJ9")

    researcher_name_element = WebDriverWait(driver, 10).until(
        EC.presence_of_element_located((By.XPATH, "//h2[@class='researcher-name']"))
    )
    assert researcher_name == researcher_name_element.text

def test_research_groups_page_title(driver):
    """ทดสอบว่าหน้าแสดงกลุ่มวิจัยมี title ที่ถูกต้อง"""
    driver.get("http://127.0.0.1:8000/researchgroup")
    WebDriverWait(driver, 10).until(
        EC.title_contains("Research Groups")
    )
    assert "Research Groups" in driver.title

def test_research_group_details(driver):
    """ทดสอบการแสดงรายละเอียดกลุ่มวิจัย"""
    group_name = "Advanced GIS Technology (AGT)"
    driver.get(f"http://127.0.0.1:8000/researchgroupdetail/3")

    group_name_element = WebDriverWait(driver, 10).until(
        EC.presence_of_element_located((By.XPATH, "//h2[@class='group-name']"))
    )
    assert group_name == group_name_element.text

def test_search_researchers(driver):
    """ทดสอบการค้นหานักวิจัย"""
    driver.get("http://127.0.0.1:8000/researchers")
    search_term = "Khamron Sunat"

    search_box = driver.find_element(By.ID, "search_box")
    search_box.send_keys(search_term)
    search_box.submit()

    WebDriverWait(driver, 10).until(
        EC.presence_of_element_located((By.CSS_SELECTOR, ".search-result"))
    )

    results = driver.find_elements(By.CSS_SELECTOR, ".search-result")
    found = False
    for result in results:
        if search_term in result.text:
            found = True
            break
    assert found, f"Researcher '{search_term}' not found in search results"