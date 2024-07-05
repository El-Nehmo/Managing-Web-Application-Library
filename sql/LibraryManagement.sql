CREATE DATABASE LibraryManagement;

CREATE TABLE Member (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    adresse VARCHAR(255),
    telephone VARCHAR(15),
    email VARCHAR(100),
    date_inscription DATE,
    amende DECIMAL(10, 2)
);