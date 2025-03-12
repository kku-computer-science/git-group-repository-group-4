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
${RESEARCHER_PROFILE}        https:////127.0.0.1:8000/detail/eyJpdiI6IjErSENiSWZLL1hGbDEvZ1VncUlGVmc9PSIsInZhbHVlIjoieTdvZzhydWgrS1hRNzIrNTJFaDEyZz09IiwibWFjIjoiYTYwMTAyNWFmZjkyYzllOTE2NjkxNmMwMDBlNGQ1M2QxNDkwZTM4OGI2YTYzYzljZWYwNGQ2M2FmYzM1ZDEwMSIsInRhZyI6IiJ9
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
...    Education
...    Search
...    Sartra Wongthanavasu, Ph.D.
...    Computer Science and Infomation Technology
...    Infomation Technology
...    Associate Professor
...    Research Project
...    Research Group
...    Manage Publications
...    Logout


@{EXPECTED_WORDS_DASHBOARD_TH}
...    ศ.ดร. จักรชัย โสอินทร์
...    จักรชัย โสอินทร์ , ศ.ดร.
...    สวัสดี
...    แดชบอร์ด
...    โปรไฟล์
...    โปรไฟล์ผู้ใช้
...    ตัวเลือก
...    จัดการทุน
...    รองศาสตราจารย์
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
Test Open Researchers Page
    [Documentation]    ทดสอบการเปิดหน้า "Researchers"
    Open Browser    ${SERVER}    ${BROWSER}    executable_path=${CHROME_DRIVER_PATH}
    Sleep    3s  # ให้เวลาสำหรับการโหลดหน้าเว็บ
    Click Element    ${RESEARCHER_MENU}
    Sleep    2s
    Location Should Be    http://127.0.0.1:8000/researchers
    Capture Page Screenshot    researcher_page.png
    Close Browser

Test Open Research Project Page
    [Documentation]    ทดสอบการเปิดหน้า "Research Project"
    Open Browser    ${SERVER}    ${BROWSER}    executable_path=${CHROME_DRIVER_PATH}
    Sleep    3s  # ให้เวลาสำหรับการโหลดหน้าเว็บ
    Click Element    ${RESEARCHPROJECT_MENU}
    Sleep    2s
    Location Should Be    http://127.0.0.1:8000/researchproject
    Capture Page Screenshot    researchproject_page.png
    Close Browser

Test Open Research Group Page
    [Documentation]    ทดสอบการเปิดหน้า "Research Group"
    Open Browser    ${SERVER}    ${BROWSER}    executable_path=${CHROME_DRIVER_PATH}
    Sleep    3s  # ให้เวลาสำหรับการโหลดหน้าเว็บ
    Click Element    ${RESEARCHGROUP_MENU}
    Sleep    2s
    Location Should Be    http://127.0.0.1:8000/researchgroup
    Capture Page Screenshot    researchgroup_page.png
    Close Browser

Test Open Research Group Detail Page
    [Documentation]    ทดสอบการเปิดหน้า "Research Group Detail"
    Open Browser    ${SERVER}    ${BROWSER}    executable_path=${CHROME_DRIVER_PATH}
    Sleep    3s  # ให้เวลาสำหรับการโหลดหน้าเว็บ
    Go To    ${RESEARCHDETAILS_MENU}
    Sleep    2s
    Location Should Be    ${RESEARCHDETAILS_MENU}
    Capture Page Screenshot    researchgroupdetail_page.png
    Close Browser

Test Open Report Page
    [Documentation]    ทดสอบการเปิดหน้า "Report"
    Open Browser    ${SERVER}    ${BROWSER}    executable_path=${CHROME_DRIVER_PATH}
    Sleep    3s  # ให้เวลาสำหรับการโหลดหน้าเว็บ
    Click Element    ${REPORT_MENU}
    Sleep    2s
    Location Should Be    http://127.0.0.1:8000/reports
    Capture Page Screenshot    report_page.png
    Close Browser

Test Open Home Page
    [Documentation]    ทดสอบการเปิดหน้า "Home"
    Open Browser    ${SERVER}    ${BROWSER}    executable_path=${CHROME_DRIVER_PATH}
    Sleep    3s  # ให้เวลาสำหรับการโหลดหน้าเว็บ
    Click Element    ${HOME_MENU}
    Sleep    2s
    Location Should Be    http://127.0.0.1:8000/
    Capture Page Screenshot    home_page.png
    Close Browser
