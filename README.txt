This website is for an example Covid-related organization. 
It is served on an Ubuntu VM on digitalocean. It doesn't have any
HTTPS certs, so you'll have to click "understand risks, continue to site." 
URL: http://143.198.113.9/

It's main functions is to collect donation money from its users. 
The database keeps track of registered users and their donation amounts.
When a user is logged in and they make a donation, the amount is recorded into the donations database, when donations are made without logging in, 
they are only displayed on the page.

There are several steps needed to setup this website. 

This site will use a LAMP stack: Linux, Apache, MySQL, and PHP
Linux server-side steps: 

1. Install mysql: sudo apt install mysql-server
    a. Setup the database: 

    sudo mysql -u root -p 
    CREATE DATABASE covid;
    CREATE USER 'covidconnect'@'localhost' IDENTIFIED BY 'covid';
    GRANT ALL PRIVILEGES ON covid.* TO 'covidconnect'@'localhost';
    FLUSH PRIVILEGES;

    b. Create users, and donations tables: 

    # users table
    USE covid;

    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL
    );

    # create donations table
    CREATE TABLE donations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        donation_amount DECIMAL(10, 2) NOT NULL
    );

# Install required ubuntu packages
2. Install PHP for MySQL: sudo apt install php-mysql
3. Install Apache:  sudo apt install apache2
4. Install PHP: sudo apt install php
5. Install PHP module for apache: sudo apt install libapache2-mod-php
6. Restart apache: sudo systemctl restart apache2


7. Clone the repo from GitHub: git clone https://github.com/nhallen272/IT461-Final.git

8. Move files to be served from the repo into /var/www/html: 
sudo cp ./html/* /var/www/html/
sudo cp -r ./img/ /var/www/html/
sudo cp -r ./js/ /var/www/html/