<?php
session_start();
require_once 'db_connection.php';

//Redirection vers la page de connexion si l'utilisateur n'est pas connecté
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();

//Récupérer les infos de l'utilisateur
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM Member WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Bibliothèque</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Profil - Bibliothèque</h1>
    </header>
   <main>
        <h2>Information du profil</h2>
        <ul>
            <li>Nom: <?php echo htmlspecialchars($user['nom']);?></li>
            <li>Prénom: <?php echo htmlspecialchars($user['prenom']);?></li>
            <li>Adresse: <?php echo htmlspecialchars($user['adresse']);?></li>
            <li>Téléphone: <?php echo htmlspecialchars($user['telephone']);?></li>
            <li>Email: <? echo htmlspecialchars($user['email']);?></li>
        </ul>
   </main> 
 <?php include 'footer.php';?>  
</body>
</html>



