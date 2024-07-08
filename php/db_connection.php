<?php
$host = "localhost";
$db_name = "LibraryManagement";
$username = "root";
$password = "";

try{
    $pdo = new PDO("mysql:host=$host; dbname = $db_name", $username, $password);
}catch(PDOException $e){
    echo "Erreur de connection: ".$e->getMessage();
}
?>
