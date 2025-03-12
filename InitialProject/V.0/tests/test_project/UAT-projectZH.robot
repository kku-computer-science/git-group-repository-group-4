*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${SERVER}                    http://127.0.0.1:8000
${CHROME_BROWSER_PATH}       C:/Program Files/Google/ChromeNew/chrome-win64/chrome.exe
${CHROME_DRIVER_PATH}        C:/driver/chromedriver-win64/chromedriver.exe
${VIEW_BUTTON_XPATH}         //a[contains(@class, 'btn-outline-primary')]/i[contains(@class, 'mdi-eye')]
${EDIT_BUTTON_XPATH}         //a[contains(@class, 'btn-outline-success') or @title='Edit']
${ADD_BUTTON_XPATH}          //a[contains(@class, 'btn-primary') and contains(@class, 'btn-menu') and .//i[contains(@class, 'mdi-plus')]]
${BROWSER}                   chrome
${RESEARCHER_MENU}           //a[@class='nav-link' and contains(text(), 'Researchers')]
${RESEARCHER_PROFILE}        http://127.0.0.1:8000/detail/eyJpdiI6IlJ1YThYaVB6SkNSVnZqYnp4b0xmU1E9PSIsInZhbHVlIjoidHE4bjNOQk5WazBXSmRHdHpnYjIvdz09IiwibWFjIjoiNGNkNjM1OWMyYmFjNWMwMDdiMzNlZjMxNzhkNThhODhkNmMwNzNiMWZlNzA2MWYyNzllNTgyMjBjNDI0YjdlMyIsInRhZyI6IiJ9
${HOME_MENU}                 //a[@class='nav-link' and contains(text(), 'Home')]
${RESEARCHPROJECT_MENU}      //a[@class='nav-link' and contains(text(), 'Research Project')]
${RESEARCHGROUP_MENU}        //a[@class='nav-link' and contains(text(), 'Research Group')]
${RESEARCHDETAILS_MENU}      http://127.0.0.1:8000/researchgroupdetail/3
${REPORT_MENU}               //a[@class='nav-link' and contains(text(), 'Report')]



@{LANGUAGES}
...    en
...    th
...    zh

@{EXPECTED_WORDS_USER_EN}
...    Chakchai So-In, Ph.D.
...    Professor
...    Sartra Wongthanavasu, Ph.D.
...    Computer Science and Infomation Technology
...    Infomation Technology
...    Associate Professor
...    Journal



@{EXPECTED_WORDS_USER_TH}
...    ศ.ดร. จักรชัย โสอินทร์
...    จักรชัย โสอินทร์ , ศ.ดร.
...    สาขาวิชาวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ
...    สาขาวิชาเทคโนโลยีสารสนเทศ
...    2526 วท.บ. (คณิตศาสตร์) - มหาวิทยาลัยขอนแก่น
...    2528 พบ.ม. (สถิติประยุกต์) - สถาบันบัณฑิตพัฒนบริหารศาสตร์
...    รองศาสตราจารย์
...    2544 วท.ด. (วิทยาการคอมพิวเตอร์) - สถาบันเทคโนโลยีแห่งเอเชีย ประเทศไทย
...    ศาสตราจารย์
       
        

@{EXPECTED_WORDS_USER_CN}
...    信息技术
...    计算机科学与信息技术
...    副教授
...    教授
...    2526 理学士（数学） - 孔敬大学
...    2528 教育硕士（应用统计学） - 国家发展管理学院
...    2544 技术科学博士（计算机科学） - 泰国亚洲理工学院



*** Test Cases ***
Test Open Project Page
    [Documentation]    ทดสอบการเปิดหน้า "Project" และการเปลี่ยนภาษาเป็นจีน
    Open Browser    ${SERVER}    ${BROWSER}    executable_path=${CHROME_DRIVER_PATH}
    Sleep    3s  # ให้เวลาสำหรับการโหลดหน้าเว็บ
    Click Element    ${RESEARCHPROJECT_MENU}
    Sleep    2s
    Location Should Be    http://127.0.0.1:8000/researchproject
    Capture Page Screenshot    project_page.png
    
    # คลิกที่เมนูภาษาอังกฤษก่อน
    Click Element    //a[@id='navbarDropdownMenuLink']
    Sleep    2s  # ให้เวลาสำหรับแสดงตัวเลือก

    # ไปที่ URL ของภาษาไทย
    Go To    http://127.0.0.1:8000/lang/zh
    Sleep    5s  # รอให้การเปลี่ยนภาษาเสร็จสมบูรณ์
    
   # ตรวจสอบข้อความในหน้าเว็บที่แปลแล้ว
    Page Should Contain Element    xpath=//span[contains(normalize-space(.), '项目期限')]
    Page Should Contain Element    xpath=//span[contains(normalize-space(.), '2020年08月01日 至 2020年08月19日')]
    Page Should Contain Element    xpath=//span[contains(normalize-space(.), '研究资助类型')]
    Page Should Contain Element    xpath=//span[contains(normalize-space(.), '外部项目资助')]
    Page Should Contain Element    xpath=//span[contains(normalize-space(.), '资助机构')]
    Page Should Contain Element    xpath=//span[contains(normalize-space(.), '高等教育、科研和创新部')]
    Page Should Contain Element    xpath=//span[contains(normalize-space(.), '负责单位')]
    Page Should Contain Element    xpath=//span[contains(normalize-space(.), '计算机科学')]
    Page Should Contain Element    xpath=//span[contains(normalize-space(.), '分配预算')]
    Page Should Contain Element    xpath=//span[contains(normalize-space(.), '90,000 铢')]

    # ตรวจสอบชื่ออาจารย์ในหน้าเว็บ (ในกรณีที่ข้อความเป็นภาษาอังกฤษ)
    Page Should Contain Element    xpath=//span[contains(normalize-space(.), 'Lecturer Thanaphon Tangchoopong')]
    Page Should Contain Element    xpath=//span[contains(normalize-space(.), 'Lecturer Warunya Wunnasri')]
    Capture Page Screenshot    project_page_thai.png
    Close Browser

