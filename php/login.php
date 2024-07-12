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

<?php
$title = 'Connexion - Bibliothèque';
include 'header.php';
?>
<!--Formulaie de connexion-->
<main>
    <h2>Connexion</h2>
    <?php
    if(!empty($error_message)){
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
    ?>
    <form method="post" action="#">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore inscrit ? <a href="register.php">C'est par ici</a></p>
</main>
<?php include 'footer.php'; ?>
