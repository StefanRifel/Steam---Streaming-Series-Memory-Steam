DROP DATABASE steam;
DROP TABLE USERS;
DROP TABLE SERIES;

CREATE DATABASE IF NOT EXISTS steam;

CREATE TABLE IF NOT EXISTS USERS (
    ID int NOT NULL AUTO_INCREMENT,
    Name varchar(50) NOT NULL,
    Password varchar(255) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS SERIES (
    ID int NOT NULL AUTO_INCREMENT,
    Title varchar(255),
    Season int,
    Genre varchar(255),
    Plattform varchar(255),
    PRIMARY KEY (ID)
);

INSERT INTO SERIES (Title, Season, Genre, Plattform) VALUES ('Titanic', 2, 'Action', 'Netflix');
INSERT INTO SERIES (Title, Season, Genre, Plattform) VALUES ('Game of Thrones', 8, 'Fantasy', 'HBO');
INSERT INTO SERIES (Title, Season, Genre, Plattform) VALUES ('Breaking Bad', 5, 'Drama', 'Netflix');
INSERT INTO SERIES (Title, Season, Genre, Plattform) VALUES ('Stranger Things', 3, 'Science Fiction', 'Netflix');
INSERT INTO SERIES (Title, Season, Genre, Plattform) VALUES ('The Crown', 4, 'Historical Drama', 'Netflix');
INSERT INTO SERIES (Title, Season, Genre, Plattform) VALUES ('Friends', 10, 'Comedy', 'HBO Max');