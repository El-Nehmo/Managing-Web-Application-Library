<?php

// AJOUT DU FICHIER DE CONNEXION À LA BDD 
require_once 'db_connection.php';

// Requête SQL pour récupérer les derniers livres ajoutés
$sql = "SELECT * FROM Book ORDER BY date_publication DESC LIMIT 5";
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
        <h1>Bienvenu sur votre bibliothèque en ligne</h1>
        <nav>
            <ul>
                <li><a href="search.php">Rechercher des livres</a></li>
                <li><a href="member.php">Gestion des membres</a></li>
                <li><a href="borrow_reserve.php">Emprunter / Réserver</a></li>
                <li><a href="history.php">Historique</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="latest_book">
            <h2>Derniers livres ajoutés</h2>
            <ul>
               <?php foreach($recent_books as $book): ?>
                <li>
                    <h3><?php echo htmlspecialchars($book['titre']); ?></h3>
                    <p>
                        Auteur : <?php echo htmlspecialchars($book['auteur']); ?>
                    </p>
                    <p>
                        Date de publication : <?php echo htmlspecialchars($book['date_publication']); ?>
                    </p>
                </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 - Bibliothèque - Tous droits réservés </p>	
    </footer>
</body>
</html>
