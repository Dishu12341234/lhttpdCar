USE car;

CREATE TABLE LOGS
(
    CUID varchar(20),
    Alcohol boolean,
    Sleeping boolean,
    HoldingWheel boolean,
    Score int
);

CREATE TABLE UserInfo
(
    CUID varchar(20) PRIMARY KEY,
    AddharNumber varchar(12),
    NumberPlate varchar(10),
    AGE int,
    LISCENCE varchar(16),
    Name varchar(40)
);

CREATE TABLE Users
(
	Name varchar(40),
	PWD varchar(40),
	AGE int,
	PhoneNumber int,
	Status varchar(5),
	ADDHAR varchar(12) PRIMARY KEY

);


ALTER TABLE LOGS
ADD COLUMN TID INT AUTO_INCREMENT PRIMARY KEY;
