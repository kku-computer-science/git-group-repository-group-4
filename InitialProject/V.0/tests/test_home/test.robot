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
       
        

@{EXPECTED_WORDS_USER_ZH}
...    信息技术
...    计算机科学与信息技术
...    副教授
...    教授
...    2526 理学士（数学） - 孔敬大学
...    2528 教育硕士（应用统计学） - 国家发展管理学院
...    2544 技术科学博士（计算机科学） - 泰国亚洲理工学院



*** Test Cases ***

Test Open Home Page and Check Banner
    [Documentation]    ทดสอบการเปิดหน้า "Home" และตรวจสอบแบนเนอร์เมื่อเปลี่ยนภาษาเป็นจีน
    Open Browser    ${SERVER}    ${BROWSER}    executable_path=${CHROME_DRIVER_PATH}
    Sleep    3s  # ให้เวลาสำหรับการโหลดหน้าเว็บ
    Click Element    ${HOME_MENU}
    Sleep    2s
    Location Should Be    http://127.0.0.1:8000/
    Capture Page Screenshot    home_page.png
    
    # คลิกที่เมนูภาษาอังกฤษก่อน
    Click Element    //a[@id='navbarDropdownMenuLink']
    Sleep    2s  # ให้เวลาสำหรับแสดงตัวเลือก

    # ไปที่ URL ของภาษาจีน
    Go To    http://127.0.0.1:8000/lang/zh
    Sleep    5s  # รอให้การเปลี่ยนภาษาเสร็จสมบูรณ์

    # รอให้แบนเนอร์ภาษาจีนปรากฏขึ้น
    Wait Until Element Is Visible    //div[@class='carousel-inner']//div[@class='carousel-item']/img[1]    10s
    
    # ตรวจสอบแบนเนอร์ในภาษาจีน
    Should Contain    //div[@class='carousel-inner']//div[@class='carousel-item']/img[1]    src="http://127.0.0.1:8000/img/Banner1Zh.png"
    Should Contain    //div[@class='carousel-inner']//div[@class='carousel-item active']/img[1]    src="http://127.0.0.1:8000/img/Banner2Zh.png"
    
    Capture Page Screenshot    researcher_page_chinese.png


    Close Browser


เลื่อนหน้าจอลงไปยังส่วน Publications
    Execute Javascript    window.scrollTo(0, document.querySelector('.mixpaper').offsetTop)
    Wait Until Element Is Visible    //h3[contains(., 'Publications')]    10s
เปิด Accordion แรก
    Click Element    //button[@class='accordion-button']
    Wait Until Element Is Visible    //div[contains(@class, 'accordion-collapse') and contains(@class, 'show')]    10s

คลิกปุ่ม Reference
    Click Element    ${REFERENCE_BUTTON}
    Wait Until Element Is Visible    //div[@id='myModal']    10s

ตรวจสอบการแสดงผล Modal
    Element Should Be Visible    //div[@id='myModal']    # ตรวจสอบว่า modal ปรากฏ
    Log To Console    Modal is visible
    ${modal_content}    Get Text    //div[@id='myModal']//div[@id='name']
    Log To Console    Modal content: ${modal_content}
    Element Should Contain    //div[@id='myModal']//div[@id='name']    อ้างอิง    # ตรวจสอบคำว่า "อ้างอิง"
    Element Should Contain    //div[@id='myModal']//div[@id='name']    ${PAPER_TITLE}    # ตรวจสอบชื่อบทความ
    Capture Page Screenshot    reference_modal_thai_test.png
    
ปิดเบราว์เซอร์
    Close Browser

*** Test Cases ***

ทดสอบการเปลี่ยนจากไทยเป็นอังกฤษ
    [Tags]    Language
    เลือกภาษา    ${THAI}
    ตรวจสอบแบนเนอร์    img/Banner1.png
    เลือกภาษา    ${ENGLISH}
    ตรวจสอบแบนเนอร์    img/Banner1En.png


ทดสอบการเปลี่ยนจากไทยเป็นอังกฤษและจีน
    [Documentation]    ตรวจสอบการเปลี่ยนจากไทยเป็นอังกฤษและจีน
    [Tags]    Language
    เลือกภาษา    ${THAI}
    ตรวจสอบแบนเนอร์    img/Banner1.png
    เลือกภาษา    ${ENGLISH}
    ตรวจสอบแบนเนอร์    img/Banner1En.png
    เลือกภาษา    ${CHINESE}
    ตรวจสอบแบนเนอร์    img/Banner1Zh.png

ทดสอบการเปลี่ยนจากจีนเป็นไทย
    [Tags]    Language
    เลือกภาษา    ${ENGLISH}
    ตรวจสอบแบนเนอร์    img/Banner1En.png
    เลือกภาษา    ${CHINESE}
    ตรวจสอบแบนเนอร์    img/Banner1Zh.png
    เลือกภาษา    ${THAI}
    ตรวจสอบแบนเนอร์    img/Banner1.png
    
ทดสอบการแสดงผลภาษาไทย
    [Documentation]    ตรวจสอบว่าเลือกภาษาไทยแล้วแสดงแบนเนอร์และเนื้อหาถูกต้อง
    [Tags]    Language
    เลือกภาษา    ${ENGLISH}
    ตรวจสอบแบนเนอร์    img/Banner1En.png
    เลือกภาษา    ${THAI}
    ตรวจสอบแบนเนอร์    img/Banner1.png
    Capture Page Screenshot    thai_language_test.png

ทดสอบการแสดงผลภาษาอังกฤษ
    [Documentation]    ตรวจสอบว่าเลือกภาษาอังกฤษแล้วแสดงแบนเนอร์และเนื้อหาถูกต้อง
    [Tags]    Language
    เลือกภาษา    ${ENGLISH}
    ตรวจสอบแบนเนอร์    img/Banner1En.png
    Capture Page Screenshot    english_language_test.png

ทดสอบการแสดงผลภาษาจีน
    [Documentation]    ตรวจสอบว่าเลือกภาษาจีนแล้วแสดงแบนเนอร์และเนื้อหาถูกต้อง
    [Tags]    Language
    เลือกภาษา    ${CHINESE}
    ตรวจสอบแบนเนอร์    img/Banner1Zh.png
    Capture Page Screenshot    chinese_language_test.png


