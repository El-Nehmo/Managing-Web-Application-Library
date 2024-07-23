<?php 
session_start();
require_once 'db_connection.php';

// Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
if(!ISSET($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}

//Récupérer l'id de l'utilisateur
$user_id = $_SESSION['user_id'];

//Récupérer l'id de la réservation
$reservation_id = $_GET['id'];
?>