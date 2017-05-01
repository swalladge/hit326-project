CREATE TABLE user (
userID int IDENTITY(1,1) PRIMARY KEY,
FirstName varchar(255),
LastName varchar(255) NOT NULL,
Roll int,
Email varchar (255));
