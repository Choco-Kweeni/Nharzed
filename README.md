//i download ang ang file

//Pagdownload og XAMPP v3.3.0

//file directory: C:\xampp\htdocs\Nharzed(diri i sulod ang file)

//Pag Himo og database, igo ra ni nimo i paste

CREATE DATABASE user_db;

USE user_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

-i run dayun sa google chrome or bisag unsa
http://localhost/Nharzed/index.php
