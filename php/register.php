<?php
// Inclure le fichier de connexion à la base de données
require_once 'db_connection.php';

// Déclaration des variables pour stocker les messages d'erreur et de succès
$error_message = '';
$success_message = '';

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $email = htmlspecialchars($_POST['email']);
    $user_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Valider les données (vous pouvez ajouter plus de validations si nécessaire)
    if (empty($nom) || empty($prenom) || empty($adresse) || empty($telephone) || empty($email) || empty($_POST['password'])) {
        $error_message = 'Veuillez remplir tous les champs.';
    } else {
        // Préparer et exécuter la requête d'insertion
        $sql = "INSERT INTO Member (nom, prenom, adresse, telephone, email, user_password, date_inscription, amende) VALUES (?, ?, ?, ?, ?, ?, NOW(), 0)";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute([$nom, $prenom, $adresse, $telephone, $email, $user_password])) {
            $success_message = 'Inscription réussie. Vous pouvez maintenant vous connecter.';
        } else {
            $error_message = 'Erreur lors de l\'inscription. Veuillez réessayer.';
        }
    }
}
?>

<?php 
$title = 'Inscription - Bibliothèque';
include 'header.php';
 ?>
 
<main>
    <?php
    // Afficher les messages d'erreur et de succès
        if(!empty($error_message)) {
            echo '<p style="color: red;">' . $error_message . '</p>';
        }
        if(!empty($success_message)) {
            echo '<p style="color: green;">' . $success_message . '</p>';
        }
    ?>

   <!-- Formulaire d'inscription --> 
    <form method="post" action="#">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" required>
        <label for="telephone">Téléphone:</label>
        <input type="text" id="telephone" name="telephone" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">S'inscrire</button>
    </form>
</main>

<?php include 'footer.php'; ?>