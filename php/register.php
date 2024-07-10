<?php
require_once 'db_connection.php';

$error_message = '';
$success_message = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'] PASSWORD_BCRYPT);
}