# Smart-Schedule-Automatic-Timetable-Management-System
A web-based automatic timetable management system built using PHP and MySQL that generates schedules, manages teacher absences, and dynamically updates timetables.

📌 Smart Schedule - Automatic Timetable Management System

Smart Schedule is a web-based application designed to automate the process of timetable generation and management for educational institutions. It reduces manual effort and handles real-time updates such as teacher absence and schedule adjustments.

🚀 Features
🔐 User Authentication (Login & Registration)
📅 Automatic Timetable Generation
👩‍🏫 Teacher-Subject Mapping
❌ Teacher Absence Management
🔄 Dynamic Timetable Update (Replaces lecture with Tutorial if teacher is absent)
📊 View Timetable by Day, Department, Year, and Section
🖥️ Clean and Responsive UI

🛠️ Technologies Used
Frontend: HTML, CSS, JavaScript
Backend: PHP
Database: MySQL
Server: XAMPP (Apache)

⚙️ How It Works
Admin/User logs into the system
Timetable is automatically generated using predefined rules
Teachers can be marked absent
If a teacher is absent:
System replaces the lecture with "Tutorial"
Prevents scheduling conflicts
Users can view updated timetable dynamically

📂 Project Structure
smart-schedule/
│── config.php
│── login.php
│── register.php
│── logout.php
│── index.php
│── create_admin.php
│── generate_timetable.php
│── manage_timetable.php
│── view_timetable.php
│── mark_absent.php
│── submit_absence.php
│── styles.css
│── script.js
│── logo2.png
🗄️ Database

Database Name: timetable_db
Main Tables:
users
teachers
timetable
teacher_subjects
absent_teachers

▶️ How to Run the Project
Install XAMPP
Start Apache and MySQL

Place project folder in:

htdocs/

Open phpMyAdmin and create database:

timetable_db
Import/create required tables

Run in browser:

http://localhost/smart-schedule/login.php
🔑 Default Admin Credentials

(After fixing your issue)

📌 Future Enhancements
AI-based timetable optimization
Email notifications for absence
Role-based access (Admin/Teacher)
Drag & Drop timetable editing

🎯 Purpose
This project was developed as a final-year academic project to demonstrate practical implementation of:
Database management
Backend development
Real-world problem solving
