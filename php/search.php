<?php
session_start();
require_once 'db_connection.php';   

//Redirection de l'utilisateur vers la page de connexion si il n'est pas connecté
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}
?>