<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Adresse e-mail où vous souhaitez recevoir les notifications
    $destinataire = "cosmosdrpepper@gmail.com";

    // Sujet du mail
    $sujet = "Nouveau message de $nom";

    // Corps du mail
    $corps_message = "Nom: $nom\n";
    $corps_message .= "Email: $email\n";
    $corps_message .= "Message:\n$message";

    // En-têtes du mail
    $headers = "De: $email";

    // Envoyer l'e-mail
    mail($destinataire, $sujet, $corps_message, $headers);

    // Redirection après l'envoi du formulaire
    header("Location: ../index.php");
    exit();
}
?> 