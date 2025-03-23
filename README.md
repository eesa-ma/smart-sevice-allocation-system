# Smart Service Allocation System

## Overview
The **Smart Service Allocation System** is a web-based platform designed to streamline the process of assigning service requests to technicians based on location. Users can submit service requests, and the admin assigns technicians accordingly. Technicians manage their availability, ensuring efficient service allocation.

## Features
- **User Module**
  - Register and log in securely
  - Submit service requests with location details
  - Track request status (assigned or not assigned)
- **Admin Module**
  - Manage technicians (create accounts, update details)
  - Assign technicians to service requests based on location
  - Monitor assigned tasks and technician availability
- **Technician Module**
  - Mark availability as **Available** or **Unavailable**
  - Accept and complete assigned tasks
  
## Technologies Used
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL (using XAMPP)

## Installation & Setup
### Prerequisites
- XAMPP installed (for Apache and MySQL)
- PHP installed

### Steps
1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/smart-service-allocation.git
   cd smart-service-allocation
   ```
2. **Move the Project to XAMPP**
   - Copy the project folder to `htdocs` inside your XAMPP installation directory.

3. **Set Up the Database**
   - Open **phpMyAdmin** in your browser (`http://localhost/phpmyadmin`)
   - Create a new database (e.g., `service_allocation`)
   - Import the `sql/create-tables.sql` file to set up the database structure.

4. **Configure Database Connection**
   - Update `config/config.php` with your database credentials.

5. **Start XAMPP Services**
   - Run Apache and MySQL from the XAMPP Control Panel.

6. **Access the Application**
   - Open `http://localhost/smart-service-allocation` in your browser.

## Project Structure
```
/project-root
│
├── /public                  # Publicly accessible files
│   ├── /css                 # Stylesheets
│   ├── /js                  # JavaScript files
│   ├── /images              # Images and icons
│   ├── index.php            # Main landing page
│   
│
├── /admin                   # Admin module
├── /technician              # Technician module
├── /user                    # User module
├── /includes                # Common PHP files
├── /config                  # Configuration files
├── /sql                     # SQL scripts
├── /docs                    # Documentation
├── /uploads                 # File uploads
│
├── .gitignore               # Git ignore file
└── .env                     # Environment variables
```
