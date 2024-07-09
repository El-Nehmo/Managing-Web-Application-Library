<?php

//AJOUT DU FICHIER DE CONNECTION A LA BDD 
require_once 'db_connection.php';

$sql = "SELECT * FROM BOOK ORDER BY DATE date_publication DESC LIMIT 5";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$recent_books = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Bibliothèque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Bienvenu sur votre bibliothèqe en ligne </h1>
        <nav>
            <ul>
                <li><a href="search.php">Rechercher des livres</a></li>
                <li><a href="member.php">Gestion des membres</a></li>
                <li><a href="borrow_reserve.php">Emprunter / Réserver</a></li>
                <li><a href="history.php">Historique</a></li>
            </ul>
        </nav>
    </header>
    
</body>
</html>