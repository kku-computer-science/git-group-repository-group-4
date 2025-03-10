*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}    https://cscp3530040467.cpkkuhost.com/
${RESEARCHER_MENU}    //a[@class='nav-link' and contains(text(), 'Researchers')]
${RESEARCHER_PROFILE}    https://cscp3530040467.cpkkuhost.com/detail/eyJpdiI6IjErSENiSWZLL1hGbDEvZ1VncUlGVmc9PSIsInZhbHVlIjoieTdvZzhydWgrS1hRNzIrNTJFaDEyZz09IiwibWFjIjoiYTYwMTAyNWFmZjkyYzllOTE2NjkxNmMwMDBlNGQ1M2QxNDkwZTM4OGI2YTYzYzljZWYwNGQ2M2FmYzM1ZDEwMSIsInRhZyI6IiJ9

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

    Capture Page Screenshot    researcher_thai.png

    # เลื่อนหน้าไปยังตำแหน่งที่ต้องการ
    Execute JavaScript    window.scrollTo(0, 300)

    # รอจนกว่า element จะมองเห็น
    Wait Until Element Is Visible    //table//td[contains(text(),'ผู้เขียน')]/following-sibling::td[1]    timeout=10s

    # ตรวจสอบข้อมูลที่แสดงในภาษาไทย
    Element Should Contain    //table//td[contains(text(),'ผู้เขียน')]/following-sibling::td[1]    ญานิกา คงโสรส
    Element Should Contain    //table//td    บทความ
    Element Should Contain    //table//td    ประเภทเอกสาร
    Element Should Contain    //table//td[contains(text(),'ปี')]/following-sibling::td[1]    2022
    Element Should Contain    //table//td[contains(text(),'ชื่อบทความ')]/following-sibling::td[1]    An enhanced fuzzy-based clustering protocol with an improved shuffled frog leaping algorithm for WSNs
    Element Should Contain    //table//td[contains(text(),'ประเภทเอกสาร')]/following-sibling::td[1]    วารสาร

    Close Browser

