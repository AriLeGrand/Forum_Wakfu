<?php
// Paramètres de connexion à la base de données
$servername = "localhost"; // L'adresse du serveur de base de données, généralement "localhost"
$username = "root";       // Nom d'utilisateur pour MySQL
$password = "root";       // Mot de passe pour MySQL
$database = "bdd_user";   // Nom de votre base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
?>