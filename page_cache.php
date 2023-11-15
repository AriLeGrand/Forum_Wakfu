<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$database = "bdd_user";

$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Traitement de la suppression
if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "DELETE FROM user WHERE id_u = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Utilisateur supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'utilisateur : " . $conn->error;
    }
}

// Traitement de la modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $conn->real_escape_string($_POST["id"]);
    $nom = $conn->real_escape_string($_POST["nom"]);
    $email = $conn->real_escape_string($_POST["email"]);

    $sql = "UPDATE user SET name_user='$nom', email_user='$email' WHERE id_u=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Utilisateur modifié avec succès.";
    } else {
        echo "Erreur lors de la modification de l'utilisateur : " . $conn->error;
    }
}

// Récupérer les utilisateurs depuis la base de données
$sql = "SELECT * FROM user"; // Modifié pour correspondre au nom de la table correct
$result = $conn->query($sql);

// Afficher les utilisateurs
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID : " . $row["id_u"] . " - Nom : " . $row["name_user"] . " - Email : " . $row["email_user"];
        echo " <a href='?action=modifier&id=" . $row["id_u"] . "'>Modifier</a>";
        echo " <a href='?action=supprimer&id=" . $row["id_u"] . "'>Supprimer</a>";
        echo "<br>";
    }
} else {
    echo "Aucun utilisateur trouvé.";
}

// Formulaire de modification
if (isset($_GET['action']) && $_GET['action'] == 'modifier' && isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM user WHERE id_u = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Afficher le formulaire de modification pré-rempli avec les informations de l'utilisateur
        echo "<form action='' method='post'>";
        echo "Nom: <input type='text' name='nom' value='" . $row["name_user"] . "'><br>";
        echo "Email: <input type='text' name='email' value='" . $row["email_user"] . "'><br>";
        echo "<input type='hidden' name='id' value='" . $row["id_u"] . "'>";
        echo "<input type='submit' value='Modifier'>";
        echo "</form>";
    } else {
        echo "Utilisateur non trouvé.";
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>