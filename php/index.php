<?php

// AJOUT DU FICHIER DE CONNEXION À LA BDD 
require_once 'db_connection.php';

// Requête SQL pour récupérer les derniers livres ajoutés
$sql = "SELECT * FROM Book ORDER BY date_publication DESC LIMIT 5";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$recent_books = $stmt->fetchAll(PDO::FETCH_ASSOC);

$title = 'Accueil - Bibliothèque';
include 'header.php';

?>

    <main>
        <section id="latest_book">
            <h2>Derniers livres ajoutés</h2>
            <ul>
               <?php foreach ($recent_books as $book): ?>
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
 <?php include 'footer.php'; ?>