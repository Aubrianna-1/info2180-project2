--https://www.w3schools.com/sql/sql_foreignkey.asp
DROP DATABASE IF EXISTS dolphin_crm;

CREATE DATABASE dolphin_crm;
USE dolphin_crm;

CREATE TABLE Users(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT, --auto incrementing
    firstname varchar(255),
    lastname varchar(255),
    password varchar(255) NOT NULL,
    email varchar(255),
    role varchar(100), 
    created_at DATETIME,
);

CREATE TABLE Contacts(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT, --auto incrementing
    title varchar(150), 
    firstname varchar(150), 
    lastname varchar(150), 
    email varchar(150), 
    telephone varchar(15),
    company varchar(100), 
    type ENUM ('Sales Lead','Support'),
    assigned_to int, 
    created_by int, 
    created_at DATETIME, 
    updated_at DATETIME,

    FOREIGN KEY (assigned_to) REFERENCES Users(id),  --store the appropriate user id
    FOREIGN KEY (created_by) REFERENCES Users(id)  --store the appropriate user id
);

CREATE TABLE Notes(
    id int NOT NUll PRIMARY KEY AUTO_INCREMENT, --auto incrementing
    contact_id int, 
    comment text, 
    created_by int, 
    created_at DATETIME,

    FOREIGN KEY (contact_id) REFERENCES Contacts(id), --store the id from Contacts Table
    FOREIGN KEY (created_by) REFERENCES Users(id) --store the appropriate user id
);

INSERT INTO Users (firstname, lastname, password, email, role, created_at)VALUES ('Marissa', 'Rivers', 'password123', 'admin@project2.com', 'Admin', NOW() );