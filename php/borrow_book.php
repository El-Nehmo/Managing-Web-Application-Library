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

//Récupérer les infos du livre
$book_id = $GET['book_id'];

//Mise à jour de la disponiblité du livre 
$sql_update_book = "UPDATE Book SET disponiblite = 0 WHER id = ?";
$stmt_update_book = $pdo->prepare($sql_update_book);
$stmt_update_book->execute([$book_id]);

//Mise à jour de l'historique de l'utilisateur
$sql_insert_history = "INSERT INTO History (membre_id, type_action, date_action) VALUES (?, 'Emprunt', NOW()";
$stmt_insert_history = $pdo->prepare($sql_insert_history);
$stmt_insert_history->execute([$user_id]);

header('Location: dashboard.php');
exit();
?>