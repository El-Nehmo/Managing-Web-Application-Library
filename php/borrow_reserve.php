<?php
session_start();
require_once 'db_connection.php';

//Redirection vers la page de connection si l'utilisateur n'est pas connecté
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}

//Récupérer les infos de l'utilisateur
$user_id = $_SESSION['user_id'];

//Récupérer les livres disponibles
$sql_books = "SELECT * FROM Book WHERE disponibilite = 1";
$stmt_books = $pdo->prepare($sql_books);
$stmt_books->execute();
$availible_books = $stmt_books->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Emprunter/Réserver - Bibliothèque</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <h1>Emprunter/Réserver - Bibliothèque</h1>
        </header>
       <main>
           <h2>Livres disponibles</h2>
           <ul>
                <?php foreach($availible_books as $book): ?>
                <li>
                  <p>Titre: <?php echo htmlspecialchars($book['titre']); ?></p>
                  <p>Auteur: <?php echo htmlspecialchars($book['auteur']); ?></p>
                  <p><a href="borrow_book.php?book_id=<?php echo $book['id']; ?>">Emprunter</a></p>
                <p><a href="reserve_book.php?book_id=<?php echo $book['id']; ?>">Réserver</a></p>
                </li>
               <?php endforeach; ?> 
           </ul>
       </main> 
       <?php include 'footer.php';?>
    </body>
</html>