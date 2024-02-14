CREATE DATABASE IF NOT EXISTS midatabase;

USE midatabase;

CREATE TABLE empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    puesto VARCHAR(255) NOT NULL,
    cv_path VARCHAR(255) NOT NULL
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE USER 'diego'@'%' IDENTIFIED BY 'diego';
GRANT ALL PRIVILEGES ON midatabase.* TO 'diego'@'%';
FLUSH PRIVILEGES;

INSERT INTO usuarios (username, password) VALUES ('diego', 'admin123');
INSERT INTO usuarios (username, password) VALUES ('marck', 'admin2');
