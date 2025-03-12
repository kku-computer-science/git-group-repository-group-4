*** Settings ***
Library    SeleniumLibrary


*** Variables ***
${URL}    https://cscp3530040467.cpkkuhost.com/
${THAI}    ภาษาไทย
${ENGLISH}    English
${CHINESE}    中文

*** Test Cases ***
ทดสอบการเปลี่ยนภาษาไทยเป็นอังกฤษ
    [Tags]    Language
    เลือกภาษา    ภาษาไทย
    ตรวจสอบแบนเนอร์    img/Banner1.png
    เลือกภาษา    English
    ตรวจสอบแบนเนอร์    img/Banner1En.png

ทดสอบการเปลี่ยนภาษาอังกฤษเป็นจีน
    [Tags]    Language
    เลือกภาษา    English
    ตรวจสอบแบนเนอร์    img/Banner1En.png
    เลือกภาษา    中文
    ตรวจสอบแบนเนอร์    img/Banner1Zh.png

ทดสอบการเปลี่ยนภาษาจีนเป็นไทย
    [Tags]    Language
    เลือกภาษา    中文
    ตรวจสอบแบนเนอร์    img/Banner1Zh.png
    เลือกภาษา    ภาษาไทย
    ตรวจสอบแบนเนอร์    img/Banner1.png

Test Thai Language Display
    [Documentation]    ทดสอบว่าหน้าเว็บภาษาไทย แสดงชื่อนักวิจัยเป็นภาษาไทยและบทความเป็นภาษาอังกฤษ
    Open Browser    ${URL}    chrome
    Click Element    //a[@id='navbarDropdownMenuLink']
    Click Element    //a[@class='dropdown-item' and contains(., '${THAI}')]
    Sleep    2s
    Capture Page Screenshot    thai_language.png
    Element Text Should Contain    //div[@id='paper2']//p    Arch-int
    Element Text Should Contain    //div[@id='paper2']//p    Ho
    Close Browser

Test English Language Display
    [Documentation]    ทดสอบว่าหน้าเว็บภาษาอังกฤษ แสดงชื่อนักวิจัยและบทความเป็นภาษาอังกฤษ
    Open Browser    ${URL}    chrome
    Click Element    //a[@id='navbarDropdownMenuLink']
    Click Element    //a[@class='dropdown-item' and contains(., '${ENGLISH}')]
    Sleep    2s
    Capture Page Screenshot    english_language.png
    Element Text Should Contain    //div[@id='paper2']//p    Arch-int
    Element Text Should Contain    //div[@id='paper2']//p    Ho
    Close Browser

Test Chinese Language Display
    [Documentation]    ทดสอบว่าหน้าเว็บภาษาจีน แสดงชื่อนักวิจัยเป็นภาษาอังกฤษและบทความเป็นภาษาอังกฤษ
    Open Browser    ${URL}    chrome
    Click Element    //a[@id='navbarDropdownMenuLink']
    Click Element    //a[@class='dropdown-item' and contains(., '${CHINESE}')]
    Sleep    2s
    Capture Page Screenshot    chinese_language.png
    Element Text Should Contain    //div[@id='paper2']//p    Arch-int
    Element Text Should Contain    //div[@id='paper2']//p    Ho
    Close Browser
