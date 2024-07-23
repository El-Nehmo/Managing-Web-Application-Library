<?php 
session_start();
require_once 'db_connection.php';

//Redirection vers la page de connexion si l'utilisateur n'est pas connecté 
if(!isset($_SESSION('iser_id'))){
    header('Location: login.php');
    exit();
}

//Récupérer l'id de l'utilisateur 
$user_id = $_SESSION['user_id'];

//Récupérer l'id du livre à retourner
$book_id = $_GET['id'];

//Mise à jour de la disponblité du livre 
$sql_update_book = "UPDATE Book SET disponiblite = 1 WHERE id = ?";
$stmt_update_book = $pdo->prepare($sql_update_book);
$stmt_update_book->execute([$book_id]);

//Mise à jour de l'historique de  l'utilisateur
$sql_insert_history = "INSERT INTO History (membre_id, livre_id, date_action, type_action) VALUES (?, ?, NOW(), 'Retour')";
$stmt_insert_history = $pdo->prepare($sql_insert_history);
$stmt_insert_history->execute([$user_id, $book_id]);

header('Location: dachboard.php');
exit();
?>