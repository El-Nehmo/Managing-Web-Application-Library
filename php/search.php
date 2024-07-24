<?php
session_start();
require_once 'db_connection.php';   

//Redirection de l'utilisateur vers la page de connexion si il n'est pas connecté
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}

//Tableu de recherche
$search_results = [];

//Vérifier si le forumlaire de recherche a été soumis
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Récupérer la recherche de l'utlilisateur àpd du formulaire 
    $search_query = htmlspecialchars($_POST['search_query']);

    //Reqête pour rechercher les livres dans la base de données
    $sql_search = "SELECT * FROM Book WHERE titre LIKE ? OR auteur LIKE ?";
    $stmt_search = $pdo->prepare($sql_search);
    $stmt_search->execute(["%$search_query%", "%$search_query%"]);
    $search_results = $stmt_search->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche - Bibliothèque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>Recherche - Bibliothèque</header>
    <main>
       <!--Formulaire de recherche--> 
        <form method="post" action="#">
            <label for="search_query">Recherche:</label>
            <input type="text" name="search_query" id="search_query" required>
            <button type="submit">Rechercher</button>
        </form>
    </main>
</body>