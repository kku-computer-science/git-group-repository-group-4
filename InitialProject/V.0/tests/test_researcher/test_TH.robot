*** Settings ***
Library    SeleniumLibrary

*** Variables ***
* Variables *
${SERVER}                    http://127.0.0.1:8000
${CHROME_BROWSER_PATH}       C:/Program Files/Google/ChromeNew/chrome-win64/chrome.exe
${CHROME_DRIVER_PATH}    C:/driver/chromedriver-win64/chromedriver.exe
${VIEW_BUTTON_XPATH}    //a[contains(@class, 'btn-outline-primary')]/i[contains(@class, 'mdi-eye')]
${EDIT_BUTTON_XPATH}    //a[contains(@class, 'btn-outline-success') or @title='Edit']
${ADD_BUTTON_XPATH}     //a[contains(@class, 'btn-primary') and contains(@class, 'btn-menu') and .//i[contains(@class, 'mdi-plus')]]
${BROWSER}    chrome
${RESEARCHER_MENU}    //a[@class='nav-link' and contains(text(), 'Researchers')]
${RESEARCHER_PROFILE}    https:////127.0.0.1:8000/detail/eyJpdiI6IjErSENiSWZLL1hGbDEvZ1VncUlGVmc9PSIsInZhbHVlIjoieTdvZzhydWgrS1hRNzIrNTJFaDEyZz09IiwibWFjIjoiYTYwMTAyNWFmZjkyYzllOTE2NjkxNmMwMDBlNGQ1M2QxNDkwZTM4OGI2YTYzYzljZWYwNGQ2M2FmYzM1ZDEwMSIsInRhZyI6IiJ9
${HOME_MENU}    //a[@class='nav-link' and contains(text(), 'Home')]
${RESEARCHPROJECT_MENU}    //a[@class='nav-link' and contains(text(), 'Research Project')]
${RESEARCHGROUP_MENU}    //a[@class='nav-link' and contains(text(), 'Research Group')]
${RESEARCHDETAILS_MENU}    http://127.0.0.1:8000/researchgroupdetail/3
${REPORT_MENU}    //a[@class='nav-link' and contains(text(), 'Report')]





*** Test Cases ***

Test Researcher Information Change - Thai
    [Documentation]    ทดสอบข้อมูลนักวิจัยในภาษาไทย
    Open Browser    ${URL}    chrome
    Sleep    3s  # เพิ่มเวลาเพื่อให้เว็บโหลด
    Click Element    ${RESEARCHER_MENU}
    Sleep    2s
    Location Should Be    https://cscp3530040467.cpkkuhost.com/researchers
    Go To    ${RESEARCHER_PROFILE}
    Sleep    3s  # รอเวลาให้ข้อมูลโหลด

    # คลิกที่เมนูภาษาอังกฤษก่อน
    Click Element    //a[@id='navbarDropdownMenuLink']
    Sleep    2s  # ให้เวลาสำหรับแสดงตัวเลือก

    # ไปที่ URL ของภาษาไทย
    Go To    https://cscp3530040467.cpkkuhost.com/lang/th
    Sleep    5s  # รอให้การเปลี่ยนภาษาเสร็จสมบูรณ์

    # เลื่อนหน้าไปยังตำแหน่งที่ต้องการ
    Execute JavaScript    window.scrollTo(0, 500)

    # รอจนกว่า element จะมองเห็น
   # Wait Until Element Is Visible    //tbody//tr//td[contains(text(), 'ชื่อบทความ')]    timeout=15s
   # Wait Until Element Is Visible    //tbody//tr//td[contains(text(), 'ผู้เขียน')]/following-sibling::td[1]    timeout=15s

    # ตรวจสอบข้อมูลที่แสดงในภาษาไทย
    Element Should Contain    //tbody//tr//th[contains(text(), 'ชื่อบทความ')]    An enhanced fuzzy-based clustering protocol with an improved shuffled frog leaping algorithm for WSNs
    Element Should Contain    //tbody//tr//td[contains(text(), 'ผู้เขียน')]/following-sibling::td[1]    ญานิกา คงโสรส
    Element Should Contain    //tbody//tr//td[contains(text(), 'ปี (พ.ศ.)')]    2022
    Element Should Contain    //tbody//tr//td[contains(text(), 'ประเภทเอกสาร')]    วารสาร

    Capture Page Screenshot    researcher_thai.png
    Close Browser


