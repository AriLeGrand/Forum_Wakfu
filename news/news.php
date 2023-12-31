<?php
session_start();
// Vérifier si l'utilisateur est connecté en vérifiant la présence de la variable de session
if (isset($_SESSION['email_utilisateur'])) {
    $email_utilisateur = $_SESSION['email_utilisateur'];
    $nom_utilisateur = $_SESSION['nom_utilisateur'];
} else {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: formulaire/formulaire_connexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Wakfu non officiel</title>


    <!-- importation de style -->


    <link rel="stylesheet" href="new.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="icon" href="https://spng.pngfind.com/pngs/s/72-723346_wakfu-logo-wakfu-png-transparent-png.png">

</head>
<body>



    <!-- header -->
    <!-- Top navigation -->


    <header>
        <nav>
            <div id="flex-container" class="topnav">
                <div class="flex-items" id="div-navbar-img"><a href="../index.php" id="nav-img"><img src="https://upload.wikimedia.org/wikipedia/fr/1/1f/Wakfu_Logo.png" alt="Wakfu_Logo" height="100px" width="200px"></a></div>
                    <div class="flex-items"><a href="news.php">Actualités</a></div>
                    <div class="flex-items"><a href="../contact/contact.php">Contact</a></div>
                    <div class="flex-items"><a href="../topics/topics.php">Nos Guides</a></div>
                    <div class="flex-items"><a href="../equipe/equipe.php">Qui sommes nous ?</a></div>
                    <div class="flex-items" id="div-navbar-img"><a href="../formulaire/formulaire_connexion.php" id="nav-img"><img src="https://cdn.discordapp.com/attachments/1159173141554282647/1174418033364713482/image-removebg-preview.png?ex=65678506&is=65551006&hm=9440a8aac0c50c287d511b265ed4f87e38351f262d38af45d67eb3d10ba62c84&" height="60px" width="68px"><?php echo "$nom_utilisateur" ?></a></div>
            </div>
        </nav>
    </header>
    <div id="twitter">
        <a class="twitter-timeline" data-lang="fr" data-theme="dark" href="https://twitter.com/Wakfu_FR?ref_src=twsrc%5Etfw">Actualités Wakfu</a> 
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
    <footer> Copyright © </footer>
</body>
</html>