<?php
require_once "pdo.php";

if (isset($_POST["inscription"])) {
    // Vérification des champs
    if (empty($_POST["nom"]) || empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) || empty($_POST["mot_de_passe"])) {
        echo 'mauvais ';
    } else {
        // Préparation des données pour l'insertion
        $nom = htmlspecialchars($_POST["nom"]);
        $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
        $mdp = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);

        // Insertion dans la base de données
        $sql = "INSERT INTO users(name_user, email_user, password_user) VALUES (:nom, :email, :mot_de_passe)";
        $requete = $connexion->prepare($sql);
        $requete->bindValue(":nom", $nom);
        $requete->bindValue(":email", $email);
        $requete->bindValue(":mot_de_passe", $mdp);
        $resultat = $requete->execute();

        if ($resultat) {
            // Redirection vers index.php
            header("Location: formulaire_connexion.php");
            exit(); // Assurez-vous de terminer le script après la redirection
        } else {
            echo 'Erreur lors de l\'inscription';
        }
    }
}
?>
