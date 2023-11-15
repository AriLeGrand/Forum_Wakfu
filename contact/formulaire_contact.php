<?php
// pour l'envoie de mail
ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "587");
ini_set("sendmail_from", "cosmosdrpepper@gmail.com");
ini_set("sendmail_path", "\"C:\xampp\sendmail\sendmail.exe\" -t");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // les données
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // adresse mail de reçu
    $to = "cosmosdrpepper@gmail.com";

    // objet du mail
    $subject = "Nouveau message de $nom";

    // composition du mail qu'on reçoit
    $email_message = "Nom: $nom\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message";

    // header en plus
    $headers = "From: $email";

    // envoyer le message
    mail($to, $subject, $email_message, $headers);

    // Envoie de la réponse automatique à l'utilisateur
    $user_subject = "Merci de nous avoir contactés";
    $user_message = "Cher $nom,\n\nMerci pour votre message. Nous vous répondrons bientôt.";

    mail($email, $user_subject, $user_message, $headers);
    exit();
}
?>