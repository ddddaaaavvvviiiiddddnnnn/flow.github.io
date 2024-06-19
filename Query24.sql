-- Part 1: Setting Up the Database

-- Create the Database
CREATE DATABASE LibraryDB;

-- Use the Database
USE LibraryDB;

-- Create Tables

-- Create Authors table
CREATE TABLE Authors (
    AuthorID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    BirthYear INT
);

-- Create Books table
CREATE TABLE Books (
    BookID INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(100) NOT NULL,
    AuthorID INT,
    Genre VARCHAR(50),
    FOREIGN KEY (AuthorID) REFERENCES Authors(AuthorID)
);

-- Create Members table
CREATE TABLE Members (
    MemberID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(100),
    PhoneNumber VARCHAR(20)
);

-- Create Loans table
CREATE TABLE Loans (
    LoanID INT AUTO_INCREMENT PRIMARY KEY,
    BookID INT,
    MemberID INT,
    LoanDate DATE,
    ReturnDate DATE,
    FOREIGN KEY (BookID) REFERENCES Books(BookID),
    FOREIGN KEY (MemberID) REFERENCES Members(MemberID)
);

-- Part 2: Inserting Data

-- Insert Data into Authors Table
INSERT INTO Authors (FirstName, LastName, BirthYear) VALUES
('Jane', 'Austen', 1775),
('Mark', 'Twain', 1835),
('Mark', 'John', 2005),
('Ben', 'Chilwell', 1990),
('George', 'Orwell', 1903);

-- Insert Data into Books Table
INSERT INTO Books (Title, AuthorID, Genre) VALUES
('Pride and Prejudice', 1, 'Romance'),
('Adventures of Huckleberry Finn', 2, 'Adventure'),
('1984', 3, 'Dystopian');

-- Insert Data into Members Table
INSERT INTO Members (FirstName, LastName, Email) VALUES
('John', 'Doe', 'john.doe@example.com'),
('Jane', 'Smith', 'jane.smith@example.com');

-- Insert Data into Loans Table
INSERT INTO Loans (BookID, MemberID, LoanDate, ReturnDate) VALUES
(1, 1, '2024-01-01', '2024-01-15'),
(2, 2, '2024-01-02', '2024-01-16');

-- Part 3: Altering the Tables

-- Add a Column to the Books Table
ALTER TABLE Books ADD COLUMN Genre VARCHAR(100);

-- Modify the Data Type of the Genre Column
ALTER TABLE Books MODIFY COLUMN Genre VARCHAR(100);

-- Add a New Column to the Members Table
ALTER TABLE Members ADD COLUMN PhoneNumber VARCHAR(20);

-- Part 4: Updating Records

-- Update the Genre for Each Book
UPDATE Books SET Genre = 'Classic Romance' WHERE BookID = 1;
UPDATE Books SET Genre = 'Classic Adventure' WHERE BookID = 2;
UPDATE Books SET Genre = 'Classic Dystopian' WHERE BookID = 3;

-- Update an Author's Birth Year
UPDATE Authors SET BirthYear = 1776 WHERE AuthorID = 1;

-- Update a Member's Email
UPDATE Members SET Email = 'john.updated@example.com' WHERE MemberID = 1;

-- Part 5: Deleting Records

-- Delete a Specific Loan Record
DELETE FROM Loans WHERE LoanID = 1;

-- Delete a Member Record
DELETE FROM Members WHERE MemberID = 2;

-- Part 6: Dropping Tables

-- Drop the Loans Table
DROP TABLE Loans;

-- Drop the Members Table
DROP TABLE Members;

-- Part 7: Querying the Database

-- Select All Books with Authors
SELECT Books.Title, Authors.FirstName, Authors.LastName, Books.Genre
FROM Books
JOIN Authors ON Books.AuthorID = Authors.AuthorID;

-- Select All Members
-- (Re-create the Members table to perform this query)
CREATE TABLE Members (
    MemberID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(100),
    PhoneNumber VARCHAR(20)
);

INSERT INTO Members (FirstName, LastName, Email, PhoneNumber) VALUES
('John', 'Doe', 'john.updated@example.com', '123-456-7890'),
('Jane', 'Smith', 'jane.smith@example.com', '098-765-4321');

SELECT * FROM Members;

-- Select All Loans with Member and Book Information
-- (Re-create the Loans table to perform this query)
CREATE TABLE Loans (
    LoanID INT AUTO_INCREMENT PRIMARY KEY,
    BookID INT,
    MemberID INT,
    LoanDate DATE,
    ReturnDate DATE,
    FOREIGN KEY (BookID) REFERENCES Books(BookID),
    FOREIGN KEY (MemberID) REFERENCES Members(MemberID)
);

INSERT INTO Loans (BookID, MemberID, LoanDate, ReturnDate) VALUES
(1, 1, '2024-01-01', '2024-01-15'),
(2, 1, '2024-01-02', '2024-01-16');

SELECT Loans.LoanID, Books.Title, Members.FirstName, Members.LastName, Loans.LoanDate, Loans.ReturnDate
FROM Loans
JOIN Books ON Loans.BookID = Books.BookID
JOIN Members ON Loans.MemberID = Members.MemberID;

-- End of Script
