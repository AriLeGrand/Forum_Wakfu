<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer les données du formulaire
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];

    // Connexion à la base de données (remplacez ces valeurs par celles de votre configuration)
    $serveur = "localhost";
    $utilisateur_db = "root";
    $mot_de_passe_db = "root";
    $nom_db = "bdd_user";

    $connexion = new mysqli($serveur, $utilisateur_db, $mot_de_passe_db, $nom_db);

    // Vérifier la connexion à la base de données
    if ($connexion->connect_error) {
        die("La connexion à la base de données a échoué : " . $connexion->connect_error);
    }

    // Préparer la requête SQL pour récupérer l'utilisateur avec l'email donné
    $requete = $connexion->prepare("SELECT email_user, name_user, password_user FROM users WHERE email_user = ?");
    $requete->bind_param("s", $email);

    // Exécuter la requête
    $requete->execute();

    // Liens de résultat
    $resultat = $requete->get_result();

    if ($resultat->num_rows == 1) {
        $utilisateur = $resultat->fetch_assoc();
    
        // Vérifier le mot de passe (assurez-vous que le mot de passe est haché dans la base de données)
        if (password_verify($mot_de_passe, $utilisateur["password_user"])) {
            // Mot de passe correct, l'utilisateur est connecté avec succès
    
            // Commencer la session
            session_start();
    
            // Stocker des informations de l'utilisateur dans la session (vous pouvez ajouter d'autres informations si nécessaire)
            $_SESSION['email_utilisateur'] = $utilisateur['email_user'];
            $_SESSION['nom_utilisateur'] = $utilisateur['name_user'];
            // Rediriger vers la page d'accueil
            header("Location: ../index.php");
            exit();
        } else {
            // Mot de passe incorrect
            header("Location: connexion.php?erreur=1");
            exit();
        }
    } else {
        // L'utilisateur n'existe pas
        header("Location: connexion.php?erreur=2");
        exit();
    }
    
    // Fermer la connexion à la base de données
    $requete->close();
    $connexion->close();
}
?>
