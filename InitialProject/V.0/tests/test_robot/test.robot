*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}        http://127.0.0.1:8000   # Replace with the website you want to test
${BROWSER}    chrome
${CHROME_PATH}    C:/Program Files/Google/ChromeNew/chrome-win64/chrome.exe
${CHROME_DRIVER_PATH}    C:/driver/chromedriver-win64/chromedriver.exe

*** Test Cases ***

Test Open Browser
    [Documentation]    Open the website and check the page title
    Open Browser    ${URL}    ${BROWSER}    executable_path=${CHROME_DRIVER_PATH}
    Maximize Browser Window
    Title Should Be    ระบบข้อมูลงานวิจัยวิทยาลัยการคอมพิวเตอร์  # Replace with your expected title
    [Teardown]    Close Browser