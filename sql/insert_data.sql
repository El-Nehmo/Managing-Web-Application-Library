-- Insérer un nouveau membre dans la table "Member"
INSERT INTO Member (nom, prenom, adresse, telephone, email, date_inscription, amende)
VALUES ('John', 'Doe', '123 Rue Principale', '555-1234', 'john@example.com', '2023-05-10', 0.00);

-- Insérer un nouveau livre dans la table "Book"
INSERT INTO Book (titre, auteur, categorie_id, isbn, editeur, date_publication, disponibilite, emplacement)
VALUES ('Mon Livre', 'Jane Smith', 1, '1234567890', 'Éditions XYZ', '2022-01-01', 1, 'Étagère A');

-- Insérer une nouvelle réservation dans la table "Reservation"
INSERT INTO Reservation (membre_id, livre_id, date_reservation, statut)
VALUES (1, 2, '2023-05-10', 'En attente');
