
This is a simple registration and login system using only username and password.

## Steps to Use
1. Import the `login_system` database structure into your MySQL server (use the SQL script below).

2. Start your local server (e.g., XAMPP or WAMP).

3. Place all these files in the root directory of your server (e.g., `htdocs` for XAMPP).

4. Open `http://localhost/register.html` to register a user.

5. Open `http://localhost/login.html` to test the login.

## Database SQL Script

CREATE DATABASE login_system;

USE login_system;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    mobile VARCHAR(15) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

