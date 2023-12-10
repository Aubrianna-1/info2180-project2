DROP DATABASE IF EXISTS dolphin_crm;

CREATE DATABASE dolphin_crm;

USE dolphin_crm;

CREATE TABLE users(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    password varchar(60) NOT NULL,
    email varchar(60) NOT NULL,
    role varchar(60) NOT NULL,
    created_at DATETIME NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1;


CREATE TABLE contacts (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title varchar(150) NOT NULL,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    email varchar(60) NOT NULL,
    telephone varchar(15) NOT NULL,
    company varchar(50) NOT NULL,
    type ENUM ('Sales Lead','Support'),
    assigned_to int NOT NULL,
    created_by int NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1;


CREATE TABLE notes (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    contact_id int NOT NULL,
    comment text,
    created_by int NOT NULL,
    created_at datetime(6) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1;