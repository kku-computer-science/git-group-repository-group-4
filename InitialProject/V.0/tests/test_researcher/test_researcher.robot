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
    Sleep    5s  # เพิ่มเวลาเพื่อให้เว็บโหลด
    Click Element    ${RESEARCHER_MENU}
    Sleep    2s
    Location Should Be    https://cscp3530040467.cpkkuhost.com/researchers
    Go To    ${RESEARCHER_PROFILE}
    Sleep    5s  # เพิ่มเวลาเพื่อให้โหลดข้อมูล
    Click Element    //a[@id='navbarDropdownMenuLink']
    Click Element    //a[@class='dropdown-item' and contains(text(), 'ไทย')]
    Sleep    5s  # รอการเปลี่ยนภาษา
    Capture Page Screenshot    researcher_thai.png
    # Assuming the transformed name for Yanika Kongsorot is ญานิกา คงโสรส
    Element Text Should Contain    //table//td[contains(text(),'ผู้เขียน')]/following-sibling::td[1]    ญานิกา คงโสรส
    Element Text Should Contain    //table//td    บทความ
    Element Text Should Contain    //table//td    ประเภทเอกสาร
    Element Text Should Contain    //table//td[contains(text(),'ปี')]/following-sibling::td[1]    2022
    Element Text Should Contain    //table//td[contains(text(),'ชื่อบทความ')]/following-sibling::td[1]    An enhanced fuzzy-based clustering protocol with an improved shuffled frog leaping algorithm for WSNs
    Element Text Should Contain    //table//td[contains(text(),'ประเภทเอกสาร')]/following-sibling::td[1]    วารสาร
    Close Browser

Test Researcher Information Change - Chinese
    [Documentation]    ทดสอบข้อมูลนักวิจัยในภาษาจีน
    Open Browser    ${URL}    chrome
    Sleep    3s  # เพิ่มเวลาเพื่อให้เว็บโหลด
    Click Element    ${RESEARCHER_MENU}
    Sleep    2s
    Location Should Be    https://cscp3530040467.cpkkuhost.com/researchers
    Go To    ${RESEARCHER_PROFILE}
    Sleep    3s  # เพิ่มเวลาเพื่อให้โหลดข้อมูล
    Click Element    //a[@id='navbarDropdownMenuLink']
    Click Element    //a[@class='dropdown-item' and contains(text(), '中文')]
    Sleep    3s  # รอการเปลี่ยนภาษา
    Capture Page Screenshot    researcher_chinese.png
    Element Text Should Contain    //h2    名字
    Element Text Should Contain    //table//td[contains(text(),'Title')]/following-sibling::td[1]    An enhanced fuzzy-based clustering protocol with an improved shuffled frog leaping algorithm for WSNs
    Element Text Should Contain    //table//td[contains(text(),'Document Type')]/following-sibling::td[1]    Journal
    Element Text Should Contain    //table//td[contains(text(),'Year')]/following-sibling::td[1]    2022
    Element Text Should Contain    //table//td[contains(text(),'Article')]/following-sibling::td[1]    An enhanced fuzzy-based clustering protocol with an improved shuffled frog leaping algorithm for WSNs
    Close Browser

Test Researcher Information Change - English
    [Documentation]    ทดสอบข้อมูลนักวิจัยในภาษาอังกฤษ
    Open Browser    ${URL}    chrome
    Sleep    3s  # เพิ่มเวลาเพื่อให้เว็บโหลด
    Click Element    ${RESEARCHER_MENU}
    Sleep    2s
    Location Should Be    https://cscp3530040467.cpkkuhost.com/researchers
    Go To    ${RESEARCHER_PROFILE}
    Sleep    3s  # เพิ่มเวลาเพื่อให้โหลดข้อมูล
    Click Element    //a[@id='navbarDropdownMenuLink']
    Click Element    //a[@class='dropdown-item' and contains(text(), 'English')]
    Sleep    3s  # รอการเปลี่ยนภาษา
    Capture Page Screenshot    researcher_english.png
    Element Text Should Contain    //h2    Name
    Element Text Should Contain    //table//td    Article
    Element Text Should Contain    //table//td    Document Type
    Element Text Should Contain    //table//td[contains(text(),'Year')]/following-sibling::td[1]    2022
    Element Text Should Contain    //table//td[contains(text(),'Article')]/following-sibling::td[1]    An enhanced fuzzy-based clustering protocol with an improved shuffled frog leaping algorithm for WSNs
    Element Text Should Contain    //table//td[contains(text(),'Document Type')]/following-sibling::td[1]    Journal
    Close Browser
