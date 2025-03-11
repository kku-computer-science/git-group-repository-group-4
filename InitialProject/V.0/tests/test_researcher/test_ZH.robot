*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}    https://cscp3530040467.cpkkuhost.com/
${RESEARCHER_MENU}    //a[@class='nav-link' and contains(text(), 'Researchers')]
${RESEARCHER_PROFILE}    https://cscp3530040467.cpkkuhost.com/detail/eyJpdiI6IjErSENiSWZLL1hGbDEvZ1VncUlGVmc9PSIsInZhbHVlIjoieTdvZzhydWgrS1hRNzIrNTJFaDEyZz09IiwibWFjIjoiYTYwMTAyNWFmZjkyYzllOTE2NjkxNmMwMDBlNGQ1M2QxNDkwZTM4OGI2YTYzYzljZWYwNGQ2M2FmYzM1ZDEwMSIsInRhZyI6IiJ9

*** Test Cases ***

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
    # Assuming the transformed name for Yanika Kongsorot is Yanika Kongsorot
    Element Text Should Contain    //h2    名字
    Element Text Should Contain    //table//td[contains(text(),'论文名称')]/following-sibling::td[1]    An enhanced fuzzy-based clustering protocol with an improved shuffled frog leaping algorithm for WSNs
    Element Text Should Contain    //table//td[contains(text(),'期刊/出版物')]/following-sibling::td[1]    杂志
    Element Text Should Contain    //table//td[contains(text(),'年份')]/following-sibling::td[1]    2022
    Element Text Should Contain    //table//td[contains(text(),'作者')]/following-sibling::td[1]    Yanika Kongsorot
    Close Browser


