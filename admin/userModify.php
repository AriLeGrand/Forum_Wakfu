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
    $userId = $conn->real_escape_string($_POST['userId']);
    $name = $conn->real_escape_string($_POST['userName']);
    $email = $conn->real_escape_string($_POST['userEmail']);

    $sql = "UPDATE users SET name_user = ?, email_user = ? WHERE id_u = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $email, $userId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: admin_page.php");
        exit();
        echo "Utilisateur modifie avec succes.";
    } else {
        echo "Erreur lors de la modification de l'utilisateur : " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>