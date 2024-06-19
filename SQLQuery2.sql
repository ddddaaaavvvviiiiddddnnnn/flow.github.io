CREATE DATABASE Pembe;
USE DATABASE Pembe
CREATE TABLE suppliers (
    supplier_id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_name VARCHAR(255) NOT NULL,
    supplier_contact VARCHAR(255) NOT NULL,
    supplier_county VARCHAR(255) NOT NULL,
    supplier_gender VARCHAR(50) NOT NULL
);
