from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

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
${PUBLICATIONS_SECTION}    xpath=//h3[contains(text(), 'Publications (In the Last 5 Years)')]
${ACCORDION_BUTTON}    xpath=//button[contains(@aria-controls, 'collapse')]
${REFERENCE_TEXT}    Reference
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

Scroll To Publications Section
    Scroll Element Into View    ${PUBLICATIONS_SECTION}

*** Keywords ***
Expand Accordion And Click Reference Button
    [Arguments]    ${accordion_index}
    
    # ขยาย Accordion
    Scroll Element Into View    xpath=(//button[contains(@aria-controls, 'collapse')])[${accordion_index}]
    Wait Until Element Is Visible    xpath=(//button[contains(@aria-controls, 'collapse')])[${accordion_index}]  timeout=10s
    Click Element    xpath=(//button[contains(@aria-controls, 'collapse')])[${accordion_index}]

    # เช็คว่า accordion ขยายแล้ว
    Run Keyword If    '${accordion_index}' == ''    Log    Error: Invalid accordion index
    Run Keyword If    '${accordion_index}' == '5'    Log    "Accordion 5 is expanding, checking the reference button."
    
    # คลิกปุ่ม open_modal
    Click Element    xpath=(//div[@id='collapse5']//button[contains(@class, 'open_modal')])[1]
    Wait Until Element Is Visible    xpath=(//div[@id='collapse${accordion_index}']//button[contains(@class, 'open_modal')])[1]  timeout=10s
    Click Element    xpath=(//div[@id='collapse${accordion_index}']//button[contains(@class, 'open_modal')])[1]

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

Test Publications Section
    Scroll To Publications Section
    Expand Accordion And Click Reference Button    5  # Adjust index if necessary