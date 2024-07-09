<?php

//AJOUT DU FICHIER DE CONNECTION A LA BDD 
require_once 'db_connection.php';

$sql = "SELECT * FROM BOOK ORDER BY DATE date_publication DESC LIMIT 5";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$recent_books = $stmt->fetchAll(PDO::FETCH_ASSOC);

