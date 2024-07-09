<?php
$host = "localhost";
$db_name = "LibraryManagement";
$username = "root";
$password = "";

try {
    // Correction de l'espace entre 'dbname' et '='
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // Configure PDO pour qu'il lance des exceptions en cas d'erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Ligne de débogage pour confirmer la connexion
    // echo "Connexion réussie !"; 
} catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
    die();
}
?>
