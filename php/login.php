<?php
require_once 'db_connection.php';
session_start();

$error_message = '';

//Gestion du formulaire de connexion 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if(empty($email) || empty($password)){
        $error_message = 'Veuillez remplir tous les champs.';
    }
    else{
        $sql = "SELECT * FROM Member WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['user_password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nom'] = $user['nom'];
        
            header('Location: dashboard.php');
            exit();
        }
        else{
            $error_message = 'Email ou mot de passe incorrect.';
        }
    }
}
?>

