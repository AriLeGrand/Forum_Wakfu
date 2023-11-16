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


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bdd_user";

// Créez une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérez les messages depuis la base de données
$sql = "SELECT * FROM topic_msg2 ORDER BY timestamp DESC LIMIT 100";
// $sql = "SELECT * FROM topic_user ORDER BY timestamp DESC";
$result = $conn->query($sql);
$messages = [];
// var_dump($result->fetch_assoc());
if (count($result) > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}
// var_dump($messages);
// Fermez la connexion à la base de données
$conn->close();

// Si un message a été soumis, ajoutez-le à la base de données
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message_text = $_POST["message"];

    if (!empty($message_text)) {
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }

        $message_text = $conn->real_escape_string($message_text);
        $sql = "INSERT INTO topic_msg2 (user_name, msg) VALUES ('$nom_utilisateur', '$message_text')";
        // INSERT INTO `topic_msg2` (`id_u`, `msg`, `timestamp`) VALUES ('2', 'hjtfhj', CURRENT_TIMESTAMP);
        $conn->query($sql);

        $conn->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
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


    <header>
        <nav>
            <div id="flex-container" class="topnav">
                <div class="flex-items" id="div-navbar-img"><a href="../index.php" id="nav-img"><img src="https://upload.wikimedia.org/wikipedia/fr/1/1f/Wakfu_Logo.png" alt="Wakfu_Logo" height="100px" width="200px"></a></div>
                <div class="flex-items"><a href="../news/news.php">Actualités</a></div>
                <div class="flex-items"><a href="../contact/contact.php">Contact</a></div>
                <div class="flex-items"><a href="topics.php">Nos Guides</a></div>
                <div class="flex-items"><a href="../equipe/equipe.php">Qui sommes nous ?</a></div>
                <div class="flex-items" id="div-navbar-img"><a href="../formulaire/formulaire_connexion.php" id="nav-img"><img src="https://cdn.discordapp.com/attachments/1159173141554282647/1174418033364713482/image-removebg-preview.png?ex=65678506&is=65551006&hm=9440a8aac0c50c287d511b265ed4f87e38351f262d38af45d67eb3d10ba62c84&" height="60px" width="68px"><?php echo "$nom_utilisateur" ?></a></div>
            </div>
        </nav>
    </header>

    <section>
        <H1 id="title_topic">Quel est la meilleure zone pour débuter</H1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form_topics">
                    <legend><h2>Message</h2></legend>

        <textarea name="message" id="message" cols="120" rows="10" required></textarea> <br>
        <button type="submit">POST</button>
    </form>
    <div id="scroll">
        <div id="topics_msg">
            <?php foreach ($messages as $message): ?>
                <p><?php echo htmlspecialchars($message['user_name']); ?></p>
                <h4><?php echo htmlspecialchars($message['msg']); ?></h4>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>

    <footer> Copyright © </footer>
</body>
</html>