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
$reservation_id = $_GET['reservation_id'];

//Mise à jour du statut de  la réservation
$sql_insert_reservation  = "INSERT INTO Reservation SET statut = 'Annulée' WEHER id = ?";
$stmt_insert_reservation = $pdo->prepare($sql_insert_reservation);
$stmt_insert_reservation->execute([$reservation_id]);

//Mise à jour de l'historique de l'utilisateur
$sql_insert_history = "INSERT INTO History (membre_id, date_action, type_action)VALUES (?, NOW(), 'Annulation de réservation')";
$stmt_insert_history = $pdo->prepare($sql_insert_history);
$stmt_insert_history->execute([$user_id]);

header('Location: dashboard.php');
exit();
?>