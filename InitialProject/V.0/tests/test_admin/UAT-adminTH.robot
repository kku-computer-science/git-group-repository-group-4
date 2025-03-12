* Settings *
Library           SeleniumLibrary
Library    String

* Variables *
${SERVER}                    http://127.0.0.1:8000
${USER_USERNAME}             admin@gmail.com
${USER_PASSWORD}             12345678
${LOGIN URL}                  ${SERVER}/login
${USER URL}                  ${SERVER}/dashboard
${CHROME_BROWSER_PATH}       C:/Program Files/Google/ChromeNew/chrome-win64/chrome.exe
${CHROME_DRIVER_PATH}    C:/driver/chromedriver-win64/chromedriver.exe
${VIEW_BUTTON_XPATH}    //a[contains(@class, 'btn-outline-primary')]/i[contains(@class, 'mdi-eye')]
${EDIT_BUTTON_XPATH}    //a[contains(@class, 'btn-outline-success') or @title='Edit']
${ADD_BUTTON_XPATH}     //a[contains(@class, 'btn-primary') and contains(@class, 'btn-menu') and .//i[contains(@class, 'mdi-plus')]]
${BROWSER}    chrome


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
Test Admin Login And Navigate
    [Documentation]    Test admin login and navigate to each page after language change from English to Thai.
    Open Browser To Login Page In English
    Change Language To Thai
    User Login As Admin
    Navigate To Dashboard And Verify Text
    Navigate To Profile And Verify Text
    Navigate To Manage Fund
    Navigate To Research Project
    Navigate To Research Group
    Navigate To Manage Publications
    Logout

Test Navigate To Dashboard
    [Documentation]    Navigate to Dashboard page and verify URL
    Navigate To Dashboard

Test Navigate To Profile
    [Documentation]    Navigate to Profile page and verify URL
    Navigate To Profile

Test Navigate To Manage Fund
    [Documentation]    Navigate to Manage Fund page and verify URL
    Navigate To Manage Fund

Test Navigate To Research Project
    [Documentation]    Navigate to Research Project page and verify URL
    Navigate To Research Project

Test Navigate To Research Group
    [Documentation]    Navigate to Research Group page and verify URL
    Navigate To Research Group

Test Navigate To Manage Publications
    [Documentation]    Navigate to Manage Publications page and verify URL
    Navigate To Manage Publications

*** Keywords ***
Open Browser To Login Page In English
    ${chrome_options}=    Evaluate    sys.modules['selenium.webdriver'].ChromeOptions()    sys
    
    # ปิด Headless Mode เพื่อให้ Chrome แสดง UI
    Call Method    ${chrome_options}    add_argument    --disable-gpu
    Call Method    ${chrome_options}    add_argument    --no-sandbox
    Call Method    ${chrome_options}    add_argument    --disable-dev-shm-usage

    # เปิด Chrome แบบเต็มจอ
    Call Method    ${chrome_options}    add_argument    --start-maximized

    # ปิด Extension, Popup และ Infobars เพื่อลดเวลาโหลด
    Call Method    ${chrome_options}    add_argument    --disable-extensions
    Call Method    ${chrome_options}    add_argument    --disable-popup-blocking
    Call Method    ${chrome_options}    add_argument    --disable-infobars

    # ตั้งค่าตำแหน่ง Chrome และ Chrome Driver
    ${chrome_options.binary_location}=    Set Variable    ${CHROME_BROWSER_PATH}
    ${service}=    Evaluate    sys.modules["selenium.webdriver.chrome.service"].Service(executable_path=r"${CHROME_DRIVER_PATH}")
    
    # เปิด Browser ด้วย Chrome แบบ UI Mode
    Create Webdriver    Chrome    options=${chrome_options}    service=${service}
    Go To    ${LOGIN URL}
    Maximize Browser Window

Change Language To Thai
    [Documentation]    Change language to Thai after opening the login page in English.
    Wait Until Element Is Visible    xpath=//a[contains(@class, 'dropdown-toggle') and contains(@href, '#')]    10s
    Click Element    xpath=//a[contains(@class, 'dropdown-toggle') and contains(@href, '#')]
    Wait Until Element Is Visible    xpath=//a[contains(@href, '/lang/th')]    10s
    Click Element    xpath=//a[contains(@href, '/lang/th')]
    Sleep    2s

User Login As Admin
    Input Text      id=username    ${USER_USERNAME}
    Input Text      id=password    ${USER_PASSWORD}
    Click Button    xpath=//button[@type='submit']
    Sleep    2s 
    Location Should Be    ${USER_URL}

Navigate To Dashboard And Verify Text
    Navigate To Dashboard
    Verify Text On Dashboard In Thai

Navigate To Profile And Verify Text
    Navigate To Profile
    Click Element    xpath=//a[@class='nav-link active' and @id='account-tab' and @data-toggle='pill' and @href='#account' and @role='tab' and @aria-controls='account' and @aria-selected='true']
    Verify Text On Profile In Thai   

Navigate To Dashboard
    Click Element    xpath=//a[contains(@class, 'nav-link') and contains(@href, '/dashboard')]
    Location Should Be    ${USER_URL}

Navigate To Profile
    Click Element    xpath=//a[contains(@class, 'nav-link') and contains(@href, '/profile')]
    Location Should Be    ${SERVER}/profile

Navigate To Manage Fund
    Click Element    xpath=//a[contains(@class, 'nav-link') and contains(@href, '/manage-fund')]
    Location Should Be    ${SERVER}/manage-fund

Navigate To Research Project
    Click Element    xpath=//a[contains(@class, 'nav-link') and contains(@href, '/research-project')]
    Location Should Be    ${SERVER}/research-project

Navigate To Research Group
    Click Element    xpath=//a[contains(@class, 'nav-link') and contains(@href, '/research-group')]
    Location Should Be    ${SERVER}/research-group

Navigate To Manage Publications
    Click Element    xpath=//a[contains(@class, 'nav-link') and contains(@href, '/manage-publications')]
    Location Should Be    ${USER_URL}/manage-publications

Logout
    Click Element    xpath=//a[contains(@class, 'nav-link') and contains(@href, '/logout')]
    Location Should Be    ${LOGIN_URL}

Verify Text On Dashboard In Thai
    Wait Until Element Contains    xpath=//h3    ยินดีต้อนรับเข้าสู่ระบบจัดการข้อมูลวิจัยของสาขาวิชาวิทยาการคอมพิวเตอร์
    Wait Until Element Contains    xpath=//h4    สวัสดี ผู้ดูแลระบบ

Verify Text On Profile In Thai
    [Documentation]    Verify that the 'บัญชี' tab on the Profile page is clickable and displayed correctly.
    Click Element    xpath=//a[@class='nav-link active' and @id='account-tab' and @data-toggle='pill' and @href='#account' and @role='tab' and @aria-controls='account' and @aria-selected='true']
    Wait Until Element Is Visible    xpath=//div[@class='tab-pane active' and @id='account' and @role='tabpanel' and @aria-labelledby='account-tab']    5s
    Element Should Be Visible    xpath=//h3[@class='mb-4']/span[@class='menu-title' and contains(text(), 'ตั้งค่าประวัติส่วนตัว')]
    Element Should Be Visible    xpath=//label[contains(text(), 'คำนำหน้า')]
    Element Should Be Visible    xpath=//label[contains(text(), 'ชื่อ (ภาษาอังกฤษ)')]
    Element Should Be Visible    xpath=//label[contains(text(), 'นามสกุล (ภาษาอังกฤษ)')]
    Element Should Be Visible    xpath=//label[contains(text(), 'ชื่อ (ภาษาไทย)')]
    Element Should Be Visible    xpath=//label[contains(text(), 'นามสกุล (ภาษาไทย)')]
    Element Should Be Visible    xpath=//label[contains(text(), 'อีเมล')]
    Element Text Should Be    xpath=//input[@id='inputfNameTH']    ผู้ดูแลระบบ
    Element Text Should Be    xpath=//input[@id='inputlNameTH']    -
    Element Text Should Be    xpath=//input[@id='inputEmail']    admin@gmail.com

