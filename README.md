# Job-Portal (HireHunt)

A complete **PHP + MySQL** based Job Portal website with separate dashboards for Job Seekers and Employers.

![HireHunt Home Page](screenshots/home.png)  
*(Add your screenshots here later – folder bana ke upload kar dena)*

## Features

### Job Seeker (Candidate)
- Register / Login
- Browse & search jobs with filters (location, salary, job type, etc.)
- One-click Apply to jobs
- See applied jobs
- Basic profile update

### Employer
- Register / Login (role change via phpMyAdmin)
- Post new jobs
- View & manage own posted jobs
- See all applications received
- Delete jobs

### General
- Responsive design (Bootstrap 5)
- Real-time "Posted ago" time (Just now, 2 hours ago, etc.)
- Different card colors & styles for jobs
- Secure password hashing
- Simple dashboard for both roles

## Tech Stack

- PHP 8+
- MySQL / MariaDB
- Bootstrap 5 + Font Awesome
- HTML5, CSS3, JavaScript (basic)
- XAMPP / WAMP for local server

## Installation

1. **Clone / Download**
   ```bash
   git clone https://github.com/prathameshkute7/Job-Portal.git

Folder Structure
job/
├── css/              → style.css
├── images/           → logo.jpg etc.
├── includes/         → db.php, header.php, footer.php
├── add-jobs.php      → Dummy jobs insert
├── applications.php
├── apply.php
├── dashboard.php
├── delete-job.php
├── index.php         → Home / Jobs list
├── login.php
├── login-first.php   → Login redirect file
├── logout.php
├── my-jobs.php
├── post-job.php
├── profile.php
├── register.php
└── README.md

How to Use:  
Candidate: Register → Login → Browse jobs → Apply
Employer: Register → phpMyAdmin se role 'employer' → Login → Post jobs → See applications
Delete Job: My Jobs → Delete button

Screenshots
1. Home Page (Jobs list)
   <img width="1900" height="957" alt="image" src="https://github.com/user-attachments/assets/740f8023-21bd-42bd-8e01-ca4210ce8fda" />
2. Login Page
   <img width="1910" height="942" alt="image" src="https://github.com/user-attachments/assets/1764cf2a-b306-4429-ad98-b110070bcdf6" />
3. Employer Dashboard
   <img width="1900" height="886" alt="image" src="https://github.com/user-attachments/assets/df71826b-90ee-44bf-8966-a825cbd53d42" />
4. Post Job Form
   <img width="1902" height="952" alt="image" src="https://github.com/user-attachments/assets/e11cc77a-4556-4c8f-82c0-2c2d0e41efdc" />
5. Applications Page
   <img width="1913" height="948" alt="image" src="https://github.com/user-attachments/assets/bc591d8a-14ed-4869-8f37-0e03793fd3e8" />


Future Plans

Resume upload
Email alerts
Job search filters
Admin panel
Application status

Made with by Prathamesh Kute
Last updated: December 2025

