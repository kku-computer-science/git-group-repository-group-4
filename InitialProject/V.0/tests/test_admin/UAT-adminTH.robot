*** Settings ***
Library           SeleniumLibrary
Library           String

*** Variables ***
${SERVER}                    http://127.0.0.1:8000
${USER_USERNAME}             admin@gmail.com
${USER_PASSWORD}             12345678
${LOGIN URL}                 ${SERVER}/login
${USER URL}                  ${SERVER}/dashboard
${CHROME_BROWSER_PATH}       C:/Program Files/Google/ChromeNew/chrome-win64/chrome.exe
${CHROME_DRIVER_PATH}        C:/driver/chromedriver-win64/chromedriver.exe
${VIEW_BUTTON_XPATH}         //a[contains(@class, 'btn-outline-primary')]/i[contains(@class, 'mdi-eye')]
${EDIT_BUTTON_XPATH}         //a[contains(@class, 'btn-outline-success') or @title='Edit']
${ADD_BUTTON_XPATH}          //a[contains(@class, 'btn-primary') and contains(@class, 'btn-menu') and .//i[contains(@class, 'mdi-plus')]]
${BROWSER}                   chrome

@{LANGUAGES}
...    en
...    th
...    zh

@{EXPECTED_WORDS_USER_EN}
...    Research Information Management System
...    Welcome to the Research Information Management System of the Computer Science Department
...    Hello
...    Dashboard
...    Profile
...    User Profile
...    Option
...    Manage Fund
...    Research Project
...    Research Group
...    Manage Publications
...    Logout

@{EXPECTED_WORDS_DASHBOARD_TH}
...    ระบบจัดการข้อมูลการวิจัย
...    ยินดีต้อนรับเข้าสู่ระบบจัดการข้อมูลวิจัยของสาขาวิชาวิทยาการคอมพิวเตอร์
...    สวัสดี
...    แดชบอร์ด
...    โปรไฟล์
...    โปรไฟล์ผู้ใช้
...    ตัวเลือก
...    จัดการทุน
...    โครงการวิจัย
...    กลุ่มวิจัย
...    จัดการผลงานวิจัย
...    ออกจากระบบ

@{EXPECTED_WORDS_USER_CN}
...    研究信息管理系统
...    欢迎来到计算机科学系的研究信息管理系统
...    你好
...    仪表板
...    个人资料
...    用户资料
...    选项
...    管理资金
...    研究项目
...    研究小组
...    管理出版物
...    退出系统


*** Test Cases ***

Test log in Page
    [Documentation]    Test admin login and navigate to each page after language change from English to Thai.

    # เปิดเบราว์เซอร์ที่หน้า Login
    Open Browser    ${LOGIN URL}    ${BROWSER}
    
    # คลิกที่เมนู Dropdown เพื่อเปลี่ยนภาษาเป็นไทย
    Wait Until Element Is Visible    id=navbarDropdownMenuLink    20s
    Click Element    id=navbarDropdownMenuLink
    
    # รอให้เมนู Dropdown แสดงผล
    Wait Until Element Is Visible    xpath=//div[contains(@class, "dropdown-menu show")]    20s
    
    # คลิกเปลี่ยนภาษาเป็นไทย
    Click Element    xpath=//a[contains(@href, "/lang/th")]
    Sleep    5s

    # ลอจอินหลังจากภาษาเปลี่ยนแล้ว
    Input Text    id=username    ${USER_USERNAME}
    Input Text    id=password    ${USER_PASSWORD}
    Click Button    xpath=//button[@type='submit']
    Sleep    2s
    Location Should Be    ${USER URL}

    # ตรวจสอบว่า "ยินดีต้อนรับเข้าสู่ระบบจัดการข้อมูลวิจัยของสาขาวิชาวิทยาการคอมพิวเตอร์" แสดงใน Dashboard
    Page Should Contain    ยินดีต้อนรับเข้าสู่ระบบจัดการข้อมูลวิจัยของสาขาวิชาวิทยาการคอมพิวเตอร์

    # ปิดเบราว์เซอร์
    Close Browser
