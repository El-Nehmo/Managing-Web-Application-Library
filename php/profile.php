<?php
session_start();
require_once 'db_connection.php';

//Redirection vers la page de connexion si l'utilisateur n'est pas connecté
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();

//Récupérer les infos de l'utilisateur
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM Member WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>