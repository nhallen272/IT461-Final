There are several steps needed to setup this website. 

This site will use a LAMP stack: Linux, Apache, MySQL, and PHP
Linux server-side steps: 

1. Install mysql: sudo apt install mysql-server
    a. - setup the database with: 
    CREATE DATABASE covid;
    CREATE USER 'your_user'@'localhost' IDENTIFIED BY 'your_password';
    GRANT ALL PRIVILEGES ON covid.* TO 'your_user'@'localhost';
    FLUSH PRIVILEGES;

    b. Create a users table:
    USE your_database_name;

    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL
    );

2. Install PHP for MySQL: sudo apt install php-mysql
3. Install Apache:  sudo apt install apache2