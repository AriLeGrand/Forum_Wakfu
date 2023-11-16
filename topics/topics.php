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


    <link rel="stylesheet" href="topics.css">
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
                    <div class="flex-items"><a href="../news.php">Actualités</a></div>
                    <div class="flex-items"><a href="../contact/contact.php">Contact</a></div>
                    <div class="flex-items"><a href="topics.php">Nos Guides</a></div>
                    <div class="flex-items"><a href="../equipe/equipe.php">Qui sommes nous ?</a></div>
                    <div class="flex-items" id="div-navbar-img"><a href="../formulaire/formulaire_connexion.php" id="nav-img"><img src="https://cdn.discordapp.com/attachments/1159173141554282647/1174418033364713482/image-removebg-preview.png?ex=65678506&is=65551006&hm=9440a8aac0c50c287d511b265ed4f87e38351f262d38af45d67eb3d10ba62c84&" height="60px" width="68px"><?php echo "$nom_utilisateur" ?></a></div>
            </div>
        </nav>
    </header>
    
    <main id="BlockPrincipal">
        <section id="block1">
            <article class="topics">
                <img src="https://cdn.discordapp.com/attachments/1159173141554282647/1174434686693556224/image.png?ex=65679489&is=65551f89&hm=50db00069022078c6d482577032f31eb3811947e4b7b5c71a31ca0b049ff976d&" alt="" width="100">
                <p><span class="Question">Quel est la meilleure classe pour débuter ?</span><br>
                    <span id="Utilisateur">az7</span></p><br>
                <a href="topics1.php"><button id="join-button" name="join-button">Rejoindre</button></a>
            </article>
            <article class="topics">
                <img src="https://avatar.ankama.com/users/44927746.png" alt="" width="100">
                <p><span class="Question">Quel est la meilleure zone pour débuter ?</span><br>
                <span id="Utilisateur">Leo ABON</span></p>
                <a href="topics2.php"><button id="join-button" name="join-button">Rejoindre</button></a>
            </article>
            <article class="topics">
                <img src="https://cdn.discordapp.com/attachments/1159173141554282647/1174434837252284488/image.png?ex=656794ad&is=65551fad&hm=fa241b8601faf576042f1ecf7b2aa32e23fb470c4f2e2e77ee2dbf0202b1892f&" alt="" width="100">
                <p><span class="Question">Quel sont les meilleures stratégie ?</span>
                    <br>
                <span id="Utilisateur">azerty</span></p><br>
                <a href="topics3.php"><button id="join-button" name="join-button">Rejoindre</button></a>
            </article>
        </section>
    </main>

    <footer> Copyright © </footer>
</body>
</html>