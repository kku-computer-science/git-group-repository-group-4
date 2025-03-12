*** Settings ***
Library    SeleniumLibrary
Library    OperatingSystem
Suite Setup    Open Browser To Home Page
Suite Teardown    Close Browser

*** Variables ***
${URL}        http://127.0.0.1:8000
${BROWSER}    chrome
${CHROME_PATH}    C:/Program Files/Google/ChromeNew/chrome-win64/chrome.exe
${CHROME_DRIVER_PATH}    C:/driver/chromedriver-win64/chromedriver.exe
${LANGUAGE_DROPDOWN}    css=a#navbarDropdownMenuLink
${TH_BANNER_SRC}    Banner1.png
${ZH_BANNER_SRC}    Banner1Zh.png
${EN_BANNER_SRC}    Banner1En.png
${TH_MENU_TEXT}    นักวิจัย
${ZH_MENU_TEXT}    研究人员
${EN_MENU_TEXT}    Researchers
*** Keywords ***

Open Browser To Home Page
    Open Browser    ${URL}  ${BROWSER}    
    Maximize Browser Window

Banner Source Should Be
    [Arguments]    ${expected_banner_src}
    ${banner_src}=    Get Element Attribute    xpath=//div[@class="carousel-inner"]/div[1]/img    src
    Should Contain    ${banner_src}    ${expected_banner_src}

Change Language
    [Arguments]    ${lang_code}
    Click Element    ${LANGUAGE_DROPDOWN}   # เปิด dropdown
    Click Element    xpath=//a[@data-lang='${lang_code}']   # คลิกเลือกภาษาที่ต้องการ
    Sleep    1s    # เผื่อภาษาโหลดช้า


Menu Should Contain
    [Arguments]    ${expected_text}
    Page Should Contain    ${expected_text}

*** Test Cases ***

Test Banner And Menu In Thai Language
    [Tags]    language    th
    Change Language    th
    Banner Source Should Be    ${TH_BANNER_SRC}
    Menu Should Contain    ${TH_MENU_TEXT}

Test Banner And Menu In Chinese Language
    [Tags]    language    zh
    Change Language    zh
    Banner Source Should Be    ${ZH_BANNER_SRC}
    Menu Should Contain    ${ZH_MENU_TEXT}

Test Banner And Menu In English Language
    [Tags]    language    en
    Change Language    en
    Banner Source Should Be    ${EN_BANNER_SRC}
    Menu Should Contain    Researchers