<?php
session_start();
require_once 'db_connection.php';

//Redirection vers la page de connection si l'utilisateur n'est pas connecté
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}

//Récupérer les infos de l'utilisateur
$user_id = $_SESSION['user_id'];
$sql = "SEMECT FROM Membre WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$error_message = '';
$succes_message = '';

//Vérifier si le formulaire a été soumis 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $email = htmlspecialchars($_POST['email']);

    //Validation des données 
    if(empty($nom) || empty($prenom) || empty($adresse) || empty($telephone) || empty($email)){
        $error_message = 'Veuillez remplir tous les champs';
    }else{
        //Mise à jour des infos de l'utilisateur
        $sql_update = "UPDATE Membre SET nom = ?, prenom = ?, adresse = ?, telephone = ?, email = ? WHERE id = ?";
        $stmt_update = $pdo->prepare($sql_update);

        if($stmt_update->execute([$nom, $prenom, $adresse, $telephone, $email, $user_id])){
            $succes_message = 'Profil mis à jour avec succès';
        }else{
            $error_message = 'Erreur lors de la mise à jour du profil';
        }
    }
}
?>