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

Test Navigate To User Profile
    [Documentation]    Test that clicking "โปรไฟล์ผู้ใช้" to the User Profile page without re-login.

    # คลิกเมนู "โปรไฟล์ผู้ใช้"
    Click Element    xpath=//span[contains(text(), 'โปรไฟล์ผู้ใช้')]

    # ตรวจสอบว่าเปลี่ยนไปที่หน้าโปรไฟล์ผู้ใช้
    Location Should Be    ${SERVER}/profile

    # ตรวจสอบว่า "บัญชี" แสดงในหน้าโปรไฟล์
    Page Should Contain    บัญชี

    # คลิกเมนู "โปรไฟล์ผู้ใช้"
    Click Element    xpath=//a[@id='account-tab' and contains(@class, 'nav-link') and contains(., 'บัญชี')]
    Sleep    3s


    Click Element    xpath=//a[@id='password-tab' and contains(@class, 'nav-link') and contains(., 'รหัสผ่าน')]
    Sleep    3s

Test Navigate To Funds Management
    [Documentation]    Test that clicking "จัดการกองทุน" navigates to the funds management page.

    # คลิกที่เมนู "จัดการกองทุน" ในเมนูด้านข้าง
    Click Element    xpath=//span[contains(text(), 'จัดการกองทุน')]

    # ตรวจสอบว่าเปลี่ยนไปที่หน้าการจัดการกองทุน
    Location Should Be    ${SERVER}/funds

    # ตรวจสอบว่า "กองทุน" แสดงในหน้า
    Page Should Contain    ทุนวิจัย 
    Page Should Contain    ทุนภายใน

Test Navigate To Research Projects
    [Documentation]    Test that clicking "โครงการวิจัย" navigates to the research projects page.

    # คลิกที่เมนู "โครงการวิจัย" ในเมนูด้านข้าง
    Click Element    xpath=//span[contains(text(), 'โครงการวิจัย')]

    # ตรวจสอบว่าเปลี่ยนไปที่หน้าโครงการวิจัย
    Location Should Be    ${SERVER}/researchProjects

    # ตรวจสอบชื่อหัวหน้ากลุ่มเป็น "Ngamnij" โดยระบุคอลัมน์ที่ 4
    Element Should Contain    xpath=//tr[@role='row']//td[4]    พุธษดี

Test Navigate To Research Groups
    [Documentation]    Test that clicking "กลุ่มวิจัย" navigates to the research groups page.

    # คลิกที่เมนู "กลุ่มวิจัย" ในเมนูด้านข้าง
    Click Element    xpath=//span[contains(text(), 'กลุ่มวิจัย')]

    # ตรวจสอบว่าเปลี่ยนไปที่หน้ากลุ่มวิจัย
    Location Should Be    ${SERVER}/researchGroups

   # ตรวจสอบชื่อหัวหน้ากลุ่มเป็น "วาสนา" โดยระบุคอลัมน์ที่ 3
    Element Should Contain    xpath=//tr[@role='row']//td[3]    วาสนา
