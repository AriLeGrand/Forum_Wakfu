<?php
// Connexion à la base de données (à adapter selon vos paramètres)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bdd_user";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Préparer et exécuter la requête SQL
$sql = "SELECT * FROM messages ORDER BY timestamp DESC LIMIT 20"; // Limitez le nombre de messages récupérés pour éviter une charge excessive
$result = $conn->query($sql);

// Récupérer les résultats de la requête
$messages = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $messages[] = array("user" => $row["user"], "message" => $row["message"]);
    }
}

// Fermer la connexion à la base de données
$conn->close();

// Renvoyer les messages au format JSON
header('Content-Type: application/json');
echo json_encode($messages);
?>
