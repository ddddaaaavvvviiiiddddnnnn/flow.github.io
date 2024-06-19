CREATE DATABASE Pembe
USE Pembe
CREATE TABLE suppliers (
    supplier_id INT PRIMARY KEY,
    supplier_name VARCHAR (50),
    supplier_contact VARCHAR (10),
    supplier_county VARCHAR (50),
    supplier_gender VARCHAR (50),
);
INSERT INTO suppliers (supplier_id, supplier_name, supplier_contact, supplier_county, supplier_gender) VALUES
('5', 'Samwest', '0789074844', 'Nairobi', 'Male'),
('2', 'Natalia', '0722000987', 'Kajiado', 'Female'),
('3', 'Kennedy', '0745675678', 'Kiambu', 'Male'),
('4', 'Kate', '0790809497', 'Kisumu', 'Female'),
('7', 'Edwin', '0746789098', 'Machakos', 'Male'),
('9', 'Terry', '0712345678', 'Muranga', 'Female'),
('10', 'Simon', '0798654321', 'Turukana', 'Male'),
('8', 'Jade', '0798765432', 'Nyeri', 'Female'),
('11', 'Wafula', '0746537890', 'Kakamega', 'Male'),
('6', 'Ema', '0789000065', 'Nairobi', 'Female'),
('1', 'David', '0748935338', 'Kajiado', 'Male'),
('12', 'Susan', '0734560987', 'kitui', 'Female'),
('13', 'Rammah', '0790546781', 'Marsabit', 'Male'),
('14', 'Aminah', '0722356709', 'Kilifi', 'Female'),
('15', 'Hussein', '0765342331', 'Malindi', 'Male');
