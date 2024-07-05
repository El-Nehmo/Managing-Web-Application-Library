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

CREATE TABLE Book (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255),
    auteur VARCHAR(255),
    categorie_id INT,
    isbn VARCHAR(13),
    editeur VARCHAR(255),
    date_publication DATE,
    disponibilite BOOLEAN,
    emplacement VARCHAR(100),
    FOREIGN KEY (categorie_id) REFERENCES Catégorie(id)
);

CREATE TABLE Category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    description TEXT
);

CREATE TABLE Borrowing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    membre_id INT,
    livre_id INT,
    date_emprunt DATE,
    date_retour_prevue DATE,
    date_retour_effective DATE,
    FOREIGN KEY (membre_id) REFERENCES Membre(id),
    FOREIGN KEY (livre_id) REFERENCES Livre(id)
);