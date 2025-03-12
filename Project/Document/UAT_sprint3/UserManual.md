[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-22041afd0340ce965d47ae6ef1cefeee28c7c493a6346c4f15d667ab976d596c.svg)](https://classroom.github.com/a/Bwpk2ByU)
[![Open in Visual Studio Code](https://classroom.github.com/assets/open-in-vscode-2e0aaae1b6195c2367325f4f02e2d04e9abb55f0b24a779b69b11b9e10269abc.svg)](https://classroom.github.com/online_ide?assignment_repo_id=17394599&assignment_repo_type=AssignmentRepo)  
โครงการนี้ เป็นโครงการสำหรับ รายวิชา CP353004 Software Engineering กลุ่มที่ 4  
1.นางสาวกรกนก พฤทธิพันธุ์ 653380187-0  
2.นายกีรติพัทธ์ ไพศาลธนภัทร 653380320-4  
3.นางสาวอธิตยา บูชากุล 653380218-5  
4.นายแทนไทย อรหันตา 653380199-3  
5.นายนิธินันท์ อารยรุ่งโรจน์ 653380204-6  
# User Manual for Our Project!
### Last Updated: 13 March 2025

## General Overview
Welcome to the Project! This project allows users to easily switch between Thai and English languages at any time.

## Features
- **Language Selection**: Switch seamlessly between Thai and English for a fully localized experience.

## How to Use the features

### 1. Language Switching
You can switch between Thai and English at any time by clicking the **Language** or **ภาษา** button located at the top-right corner of the application. After switching, the entire content, including menus and information, will be updated to the selected language.

## Installation Instructions

### Requirements
- Windows 10,11 or macOS
- Internet connection
- PHP Version 8.2 or mores
- Apache (The Latest Version)
- XAMPP

### Step-by-Step Installation Guide
1. Go to the XAMPP Download Page: Open your web browser and visit the official XAMPP website at https://www.apachefriends.org/index.html to download the XAMPP installer.
2. Choose and download the XAMPP installer for Windows. Once the download is complete, proceed with the installation.
3. Once the XAMPP installation is complete, navigate to the directory C:\xampp\htdocs to install the system.
4. Go to GitHub to download the ZIP file from the following website:
https://github.com/kku-computer-science/git-group-repository-group-4
Click on "Code" and select "Download ZIP."
5. Then, take the ZIP file you downloaded and move it to C:\xampp\htdocs, and then extract the files there.
6. Next, open Visual Studio Code and open the "Code" folder in Project folder and that you extracted from the files.
7. Next, open the Terminal in Visual Studio Code and use the command composer install.
8. Next, create a .env file in the root folder and copy the content from the .env.example file into it.
9. Next, install the database by opening XAMPP and going to the MySQL Admin menu. Then, create a new database.
10. Next, create a new database and import the data from the Latest Database.sql file. In Visual Studio Code, scroll down to find the file in the project.
11. Copy the data from the database.sql file and paste it into phpMyAdmin to create the database.
12. Next, go back to the .env file and configure the database connection for the system by setting:
DB_DATABASE to the name of the database you created. DB_USERNAME to root. DB_PASSWORD to leave it empty.
13. Next, generate the application key by going to the Terminal in Visual Studio Code and running the command:php artisan key:generate
14. Next, check the changes in the .env file to verify that the APP_KEY has been updated with a new key, indicating that the process was successful.
15. Once all steps are successfully completed, run the application by using the command php artisan serve in the Terminal. Then, go to the link cscp3530040467.cpkkuhost.com to run the application.
16. Once installed, you can launch the application by clicking on the link that show in Terminal.

## Troubleshooting

### Problem: Unable to install Composer in Terminal
- **Solution**: Go to https://getcomposer.org/download/ and download Composer-Setup.exe. Run the installer to install the latest version of Composer when executed, and set up your PATH environment variable so you can simply call composer from any directory. Then try to install composer by command again.

## Version Updates


