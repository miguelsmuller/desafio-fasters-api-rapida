GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' identified by 'admin' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' identified by 'admin' WITH GRANT OPTION;

CREATE DATABASE IF NOT EXISTS fasters (

CREATE TABLE IF NOT EXISTS fasters.cities (
    id INT NOT NULL AUTO_INCREMENT, 
    name VARCHAR(50) NOT NULL,
    date DATETIME NOT NULL,
    measurement DECIMAL(4,2) NOT NULL, 
    PRIMARY KEY (id)
);

FLUSH PRIVILEGES;