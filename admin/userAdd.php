<?php
session_start();

// Vérification des privilèges administrateur
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: login.php");
    exit();
}

// Connexion à la base de données
require 'db_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['newUserName']);
    $email = $conn->real_escape_string($_POST['newUserEmail']);
    $password = $conn->real_escape_string($_POST['newUserPassword']);
    $isAdmin = isset($_POST['newUserAdmin']) ? 1 : 0;

    $sql = "INSERT INTO users (name_user, email_user, password_user, is_admin) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $password, $isAdmin);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: admin_page.php");
        exit();
        echo "Nouvel utilisateur ajoute avec succes.";
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur : " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>