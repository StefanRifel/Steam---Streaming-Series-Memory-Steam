CREATE DATABASE steam; 

CREATE TABLE USERS (
    ID int NOT NULL,
    Name varchar(255) NOT NULL,
    Password varchar(255) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE SERIES (
    ID int NOT NULL,
    Title varchar(255),
    Season int,
    Genre varchar(255),
    Plattform varchar(255),
    PRIMARY KEY (ID)
);
