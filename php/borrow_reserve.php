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