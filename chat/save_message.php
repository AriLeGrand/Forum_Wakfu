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

// Récupérer le message depuis la requête POST
$message = $_POST['message'];

// Vous devrez également récupérer le nom de l'utilisateur (peut-être depuis la session)
$user = "NomUtilisateur";

// Préparer et exécuter la requête SQL
$sql = "INSERT INTO messages (user, message) VALUES ('$user', '$message')";
if ($conn->query($sql) === TRUE) {
    $response = array("status" => "success", "message" => array("user" => $user, "message" => $message));
} else {
    $response = array("status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error);
}

// Fermer la connexion à la base de données
$conn->close();

// Renvoyer la réponse au format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
