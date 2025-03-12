*** Settings ***
Library    SeleniumLibrary
Suite Setup    เปิดหน้าเว็บครั้งเดียว
Suite Teardown    ปิดเบราว์เซอร์

*** Variables ***
${URL}    http://127.0.0.1:8000/
${THAI}    ไทย
${ENGLISH}    English
${CHINESE}    中文
${BROWSER}    chrome
${REFERENCE_BUTTON}    //button[contains(@class, 'open_modal') and contains(., '[Reference]')]
${PAPER_TITLE}    An enhanced fuzzy-based clustering protocol with an improved shuffled frog leaping algorithm for WSNs

*** Keywords ***
เปิดหน้าเว็บครั้งเดียว
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window

เลือกภาษา
    [Arguments]    ${language}
    Click Element    //a[@id='navbarDropdownMenuLink']
    Click Element    //a[@class='dropdown-item' and contains(., '${language}')]
    Wait Until Page Contains Element    //img[contains(@src, 'Banner')]    10s

ตรวจสอบแบนเนอร์
    [Arguments]    ${expected_banner}
    ${src}    Get Element Attribute    //div[@id='header']//img    src
    Should Contain    ${src}    ${expected_banner}

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


