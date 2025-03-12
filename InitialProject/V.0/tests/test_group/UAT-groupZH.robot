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
Test Open Group Page
    [Documentation]    ทดสอบการเปิดหน้า "Group" และการเปลี่ยนภาษาเป็นจีน
    Open Browser    ${SERVER}    ${BROWSER}    executable_path=${CHROME_DRIVER_PATH}
    Sleep    3s  # ให้เวลาสำหรับการโหลดหน้าเว็บ
    Click Element    ${RESEARCHGROUP_MENU}
    Sleep    2s
    Location Should Be    http://127.0.0.1:8000/researchgroup
    Capture Page Screenshot    group_page2.png
    
    # คลิกที่เมนูภาษาอังกฤษก่อน
    Click Element    //a[@id='navbarDropdownMenuLink']
    Sleep    2s  # ให้เวลาสำหรับแสดงตัวเลือก

    # ไปที่ URL ของภาษาจีน
    Go To    http://127.0.0.1:8000/lang/zh
    Sleep    5s  # รอให้การเปลี่ยนภาษาเสร็จสมบูรณ์
    

    # ตรวจสอบชื่อในหน้าเว็บ
    Page Should Contain Element    xpath=//h2[contains(normalize-space(.), 'Wasana Putklang')]
    Page Should Contain Element    xpath=//h2[contains(normalize-space(.), 'Chaiyapon Keeratikasikorn')]
    Page Should Contain Element    xpath=//h2[contains(normalize-space(.), 'Nagon Watanakij')]
    Page Should Contain Element    xpath=//h2[contains(normalize-space(.), 'Pipat Reungsang')]
    Page Should Contain Element    xpath=//h2[contains(normalize-space(.), 'Rasamee Suwanwerakamtorn')]
    Page Should Contain Element    xpath=//h2[contains(normalize-space(.), 'Urawan Chanket')]
    Page Should Contain Element    xpath=//h2[contains(normalize-space(.), 'Sarun Apichontrakul')]
    Page Should Contain Element    xpath=//h2[contains(normalize-space(.), 'Sakpod Tongleamnak')]
    Page Should Contain Element    xpath=//h2[contains(normalize-space(.), 'Chakchai So-In')]
    Page Should Contain Element    xpath=//h2[contains(normalize-space(.), 'Somjit Arch-int')]

    Capture Page Screenshot    group_page_zh.png

    Close Browser

Test Open Group details Page
    [Documentation]    ทดสอบการเปิดหน้า "Group" และการเปลี่ยนภาษาเป็นจีน
    Open Browser    ${SERVER}    ${BROWSER}    executable_path=${CHROME_DRIVER_PATH}
    Sleep    3s  # ให้เวลาสำหรับการโหลดหน้าเว็บ
    Click Element    ${RESEARCHGROUP_MENU}
    Sleep    2s
    Location Should Be    http://127.0.0.1:8000/researchgroup
    Capture Page Screenshot    group_page2.png
    Go To    ${RESEARCHDETAILS_MENU}
    Sleep    2s
    Location Should Be    http://127.0.0.1:8000/researchgroupdetail/3
    Capture Page Screenshot    detail_page2.png

    # คลิกที่เมนูภาษาอังกฤษก่อน
    Click Element    //a[@id='navbarDropdownMenuLink']
    Sleep    2s  # ให้เวลาสำหรับแสดงตัวเลือก

    # ไปที่ URL ของภาษาจีน
    Go To    http://127.0.0.1:8000/lang/zh
    Sleep    5s  # รอให้การเปลี่ยนภาษาเสร็จสมบูรณ์
    

   # ตรวจสอบชื่อในหน้าเว็บ
    Page Should Contain Element    xpath=//h2[contains(normalize-space(.), 'Pongsathorn Wongprawamas')]
    Page Should Contain Element    xpath=//h2[contains(normalize-space(.), 'Sewattisit Imnang')]
    Page Should Contain Element    xpath=//h2[contains(normalize-space(.), 'Teerathum Boonprapapun')]

    Capture Page Screenshot    detail_english2.png
    Close Browser

