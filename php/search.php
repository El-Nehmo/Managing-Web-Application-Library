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
}
?>