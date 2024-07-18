<?php
session_start();
require_once 'db_connection.php';

//Redirection vers la page de connexion si l'utilisateur n'est pas connecté
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

//Récupérer les informations de l'utilisateur
$user_id = $_SESSION['user_id'];

//Récupérer l'historique complet de l'utilasateur
$sql_history = "SELECT * FROM History WHERE membre_id = ? ORDER BY date_action DESC";
$stmt_history = $pdo->prepare($sql_history);
$stmt_history->execute([$user_id]);
$full_history = $stmt_history->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique - Bibliothèque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Historique - Bibliothèque</h1>
    </header>
    <main>
        <h2>Historique complet</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type d'action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($full_history as $history): ?>
                <tr>
                    <td><?php echo htmlspecialchars($history['date_action']); ?></td>
                    <td><?php echo htmlspecialchars($history['type_action']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>