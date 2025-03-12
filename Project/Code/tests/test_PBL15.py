import pytest
import time
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.select import Select
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager


class TestResearcherPage:
    @pytest.fixture
    def setup(self):
        service = Service(ChromeDriverManager().install())
        driver = webdriver.Chrome(service=service)
        driver.implicitly_wait(10)
        yield driver
        driver.quit()

    def test_PB151_display_all_researchers(self, setup):
        driver = setup
        driver.get("http://127.0.0.1:8000/researchers")  # <-- เพิ่ม get() เพื่อให้แน่ใจว่าอยู่บนหน้าที่ถูกต้อง
        title = driver.find_element(By.CLASS_NAME, "title").text
        assert 'RESEARCHERS'.lower() in title.lower()

    def test_PB154_researcher_search(self, setup):
        driver = setup
        driver.get("http://127.0.0.1:8000/researchers")

        search_input = driver.find_element(By.NAME, "textsearch")
        search_input.send_keys("Research")
        search_button = driver.find_element(By.CLASS_NAME, "btn-outline-primary")
        search_button.click()

        time.sleep(2)  # <-- เพิ่ม sleep ถ้าข้อมูลโหลดผ่าน AJAX

        results = driver.find_elements(By.CLASS_NAME, "researcher-card")
        assert len(results) > 0

    def test_PB155_filter_by_program(self, setup):
        driver = setup
        driver.get("http://127.0.0.1:8000/researchers")

        WebDriverWait(driver, 10).until(
            EC.visibility_of_element_located((By.ID, "programFilter"))
        )

        program_select = Select(driver.find_element(By.ID, "programFilter"))
        program_select.select_by_index(1)

        time.sleep(2)  # <-- รอให้ filter มีผล

        visible_cards = driver.find_elements(By.CLASS_NAME, "researcher-card")
        assert len(visible_cards) > 0

    def test_PB156_researcher_detail(self, setup):
        driver = setup
        driver.get("http://127.0.0.1:8000/researchers")

        researcher_link = WebDriverWait(driver, 10).until(
            EC.visibility_of_element_located((By.CLASS_NAME, "researcher-link"))
        )
        researcher_link.click()

        detail_page = WebDriverWait(driver, 10).until(
            EC.visibility_of_element_located((By.CLASS_NAME, "card-body"))
        )

        assert detail_page is not None

    def test_PB152_research_group_display(self, setup):
        driver = setup
        driver.get("http://127.0.0.1:8000/researchgroup")

        groups = driver.find_elements(By.CLASS_NAME, "card")
        assert len(groups) > 0

        for group in groups:
            group_name = group.find_element(By.CLASS_NAME, "card-title").text
            assert group_name != ""

            supervisors = group.find_elements(By.CSS_SELECTOR, "h2.card-text-2")
            assert len(supervisors) > 0

            group_image = group.find_element(By.TAG_NAME, "img")
            assert group_image.is_displayed()

    def test_PB153_research_group_details(self, setup):
        driver = setup
        driver.get("http://127.0.0.1:8000/researchgroup")
        time.sleep(2)  # รอให้ข้อมูลโหลดเบื้องต้น

        try:
            first_group = WebDriverWait(driver, 20).until(
                EC.element_to_be_clickable((By.CLASS_NAME, "card"))
            )
            first_group.click()

            # ตรวจสอบว่ามีการเปลี่ยนหน้า
            time.sleep(3)
            print("Current URL:", driver.current_url)

            detail_page = WebDriverWait(driver, 30).until(
                EC.presence_of_element_located((By.XPATH, "//div[contains(@class, 'card-4')]"))
            )

            assert detail_page.find_element(By.CLASS_NAME, "card-title").text != ""

            supervisor_section = detail_page.find_element(By.XPATH, "//h1[contains(text(), 'Laboratory Supervisor')]")
            assert supervisor_section.is_displayed()

            research_areas = detail_page.find_element(By.XPATH, "//h5[contains(text(), 'Main Research Areas')]")
            assert research_areas.is_displayed()

            focus_items = detail_page.find_elements(By.CSS_SELECTOR, "ul.card-text-2 li")
            assert len(focus_items) > 0

            contact_section = detail_page.find_element(By.XPATH, "//h5[contains(text(), 'Contact Person')]")
            assert contact_section.is_displayed()

            back_button = detail_page.find_element(By.CLASS_NAME, "btn-outline-secondary")
            assert back_button.is_displayed()

            print("✅ Test Passed: Research group details loaded successfully.")

        except Exception as e:
            print(f"❌ Test Failed: {str(e)}")
            pytest.fail(f"Test Failed: {str(e)}")

    def test_PB157_display_researcher_details_with_no_data(self, setup):
        driver = setup
        driver.get("http://127.0.0.1:8000/researchers")
        
        # ป้อนคำค้นหานักวิจัยที่ไม่พบข้อมูล
        search_input = driver.find_element(By.NAME, "textsearch")
        search_input.send_keys("xyz1234")  # ใช้คำค้นหาที่ไม่พบในระบบ
        search_button = driver.find_element(By.CLASS_NAME, "btn-outline-primary")
        search_button.click()
        
        # รอให้ผลลัพธ์แสดง
        time.sleep(2)
        
        # ตรวจสอบข้อความที่แสดงเมื่อไม่พบข้อมูล
        no_data_message = driver.find_element(By.CLASS_NAME, "no-data-message")  # ค่าที่ใช้ค้นหาข้อความในกรณีที่ไม่พบข้อมูล
        assert no_data_message.is_displayed()
        assert "ไม่พบข้อมูล" in no_data_message.text

    def test_PB158_display_error_when_invalid_form_data(self, setup):
        driver = setup
        driver.get("http://127.0.0.1:8000/researchers")
        
        # กรอกข้อมูลที่ไม่ถูกต้องในฟอร์ม
        search_input = driver.find_element(By.NAME, "textsearch")
        search_input.send_keys("!@#$%^&*()")  # ใช้ตัวอักษรพิเศษหรือข้อมูลที่ไม่เหมาะสม
        
        search_button = driver.find_element(By.CLASS_NAME, "btn-outline-primary")
        search_button.click()

        # รอให้ระบบแสดงข้อผิดพลาด
        time.sleep(2)

        # ตรวจสอบข้อความแสดงข้อผิดพลาด
        error_message = driver.find_element(By.CLASS_NAME, "error-message")  # ค่าที่ใช้ค้นหาข้อความแสดงข้อผิดพลาด
        assert error_message.is_displayed()
        assert "กรุณากรอกข้อมูลที่ถูกต้อง" in error_message.text  # ตรวจสอบข้อความข้อผิดพลาดที่แสดง

    def test_PB159_display_researcher_with_incomplete_data(self, setup):
        driver = setup
        driver.get("http://127.0.0.1:8000/researchers")
        
        # ตรวจสอบนักวิจัยที่มีข้อมูลบางส่วนขาดหายไป
        researcher_link = WebDriverWait(driver, 10).until(
            EC.visibility_of_element_located((By.CLASS_NAME, "researcher-link"))
        )
        researcher_link.click()

        # ตรวจสอบว่าข้อมูลนักวิจัยบางส่วนอาจหายไป (เช่น ไม่มีรูปภาพ)
        time.sleep(2)

        profile_picture = driver.find_elements(By.TAG_NAME, "img")  # ค้นหารูปภาพ
        if len(profile_picture) == 0:
            print("⚠️ นักวิจัยนี้ไม่มีรูปภาพ")

        # ตรวจสอบว่าข้อมูลยังคงแสดงได้แม้ข้อมูลบางส่วนหายไป
        profile_section = driver.find_element(By.CLASS_NAME, "profile-section")
        assert profile_section is not None

        # ตรวจสอบการแสดงผลในกรณีข้อมูลไม่สมบูรณ์
        missing_info_message = driver.find_elements(By.CLASS_NAME, "missing-info-message")
        if len(missing_info_message) > 0:
            print("⚠️ มีข้อมูลบางส่วนที่ขาดหายไป")
        else:
            print("✅ ข้อมูลนักวิจัยแสดงผลได้ครบถ้วน")