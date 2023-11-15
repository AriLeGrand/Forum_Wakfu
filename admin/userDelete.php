<?php
session_start();

// Vérification des privilèges administrateur
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: login.php");
    exit();
}

// Connexion à la base de données
require 'db_connection.php';

if (isset($_GET['id'])) {
    $userId = $conn->real_escape_string($_GET['id']);

    $sql = "DELETE FROM users WHERE id_u = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: admin_page.php"); // Rediriger vers la page d'administration
        exit();
        echo "Utilisateur supprime avec succes.";
    } else {
        echo "Erreur lors de la suppression de l'utilisateur : " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>