<?php
session_start();
require_once 'db_connection.php';

//Redirection vers la page de connexion si l'utilisateur n'est pas connecté
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

//Récupérer les informations de l'utilisateur
$user_id = $_SESSION['user_id'];

//Récupérer l'historique complet de l'utilasateur
$sql_history = "SELECT * FROM History WHERE membre_id = ? ORDER BY date_action DESC";
$stmt_history = $pdo->prepare($sql_history);
$stmt_history->execute([$user_id]);
$full_history = $stmt_history->fetchAll(PDO::FETCH_ASSOC);
?>