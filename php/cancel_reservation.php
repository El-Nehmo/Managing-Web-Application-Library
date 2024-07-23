<?php 
session_start();
require_once 'db_connection.php';

// Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
if(!ISSET($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}
?>