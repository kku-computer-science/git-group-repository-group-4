import time
import pytest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

@pytest.fixture
def driver():
    driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()))
    driver.maximize_window()
    yield driver
    driver.quit()

def test_admin_login(driver):
    # 1. เปิดหน้าเว็บไซต์หลัก
    driver.get("http://127.0.0.1:8000/")
    
    # 2. รอให้ปุ่ม LOGIN ปรากฏบนหน้าเว็บ
    login_button = WebDriverWait(driver, 10).until(
        EC.presence_of_element_located((By.XPATH, "//a[contains(text(),'Login')]"))
    )
    
    # 3. คลิกที่ปุ่ม LOGIN เพื่อนำทางไปหน้า /login
    login_button.click()
    
    # 4. รอให้หน้า /login โหลด
    WebDriverWait(driver, 10).until(
        EC.url_to_be("http://127.0.0.1:8000/login")
    )
    
    # 5. รอให้ช่องกรอก Username ปรากฏ
    username_input = WebDriverWait(driver, 10).until(
        EC.presence_of_element_located((By.ID, "username"))
    )
    
    # 6. คลิกที่ช่องกรอก Username เพื่อให้พร้อมกรอกข้อมูล
    username_input.click()

    # 7. ใส่ Username สำหรับ Admin
    username_input.send_keys("admin@gmail.com")

    # 8. คลิกที่ช่องกรอก Password เพื่อให้พร้อมกรอกข้อมูล
    password_input = driver.find_element(By.ID, "password")
    password_input.click()

    # 9. ใส่ Password สำหรับ Admin
    password_input.send_keys("12345678")

    # 10. คลิกปุ่มล็อคอิน (Submit)
    login_button = driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
    login_button.click()

    # 11. รอให้หน้า Dashboard โหลด
    WebDriverWait(driver, 10).until(
        EC.url_to_be("http://127.0.0.1:8000/dashboard")
    )

    # 12. ตรวจสอบว่าเราตอนนี้อยู่ที่หน้า Dashboard หรือไม่
    assert "Dashboard" in driver.page_source
    dashboard_heading = driver.find_element(By.XPATH, "//h1[contains(text(), 'Dashboard')]")
    assert dashboard_heading.is_displayed()
