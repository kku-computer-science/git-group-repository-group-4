*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}    https://www.google.com
${BROWSER}    chrome

*** Test Cases ***
Open Chrome
    Open Browser    https://www.google.com    chrome    executable_path=C:/Program Files/Google/ChromeNew/chrome-win64/chrome.exe
    [Teardown]    Close Browser


