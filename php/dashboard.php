<?php
session_start();
require_once 'db_connection.php';

// Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Récupérer les informations de l'utilisateur
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM Member WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Récupérer l'historique récent de l'utilisateur
$sql_history = "SELECT * FROM History WHERE membre_id = ? ORDER BY date_action DESC LIMIT 5";
$stmt_history = $pdo->prepare($sql_history);
$stmt_history->execute([$user_id]);
$recent_history = $stmt_history->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Bibliothèque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Tableau de Bord - Bibliothèque</h1>
    </header>
    <main>
        <h2>Bienvenue, <?php echo htmlspecialchars($user['prenom']); ?>!</h2>
        <section>
            <h3>Résumé de l'activité récente</h3>
            <ul>
                <?php foreach ($recent_history as $history): ?>
                <li>
                    <p><?php echo htmlspecialchars($history['type_action']); ?> - <?php echo htmlspecialchars($history['date_action']); ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section>
            <h3>Actions rapides</h3>
            <ul>
                <li><a href="search.php">Rechercher des livres</a></li>
                <li><a href="borrow_reserve.php">Emprunter / Réserver</a></li>
                <li><a href="profile.php">Mettre à jour le profil</a></li>
                <li><a href="history.php">Voir l'historique complet</a></li>
                <li><a href="logout.php">Se déconnecter</a></li>
            </ul>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>



