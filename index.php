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
$sql = "SELECT * FROM general_msg ORDER BY timestamp DESC LIMIT 100";
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
        $sql = "INSERT INTO general_msg (user_name, msg) VALUES ('$nom_utilisateur', '$message_text')";
        // INSERT INTO `general_msg` (`id_u`, `msg`, `timestamp`) VALUES ('2', 'hjtfhj', CURRENT_TIMESTAMP);
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


    <link rel="stylesheet" href="style.css">
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
                <div class="flex-items" id="div-navbar-img"><a href="index.php" id="nav-img"><img src="https://upload.wikimedia.org/wikipedia/fr/1/1f/Wakfu_Logo.png" alt="Wakfu_Logo" height="100px" width="200px" id="Wakfu_Logo"></a></div>
                <div class="flex-items"><a href="news/news.php">Actualités</a></div>
                <div class="flex-items"><a href="contact/contact.php">Contact</a></div>
                <div class="flex-items"><a href="topics/topics.php">Nos Guides</a></div>
                <div class="flex-items"><a href="equipe/equipe.php">Qui sommes nous ?</a></div>
                <div class="flex-items" id="div-navbar-img"><a href="formulaire/formulaire_connexion.php" id="nav-img"><img src="https://cdn.discordapp.com/attachments/1159173141554282647/1174418033364713482/image-removebg-preview.png?ex=65678506&is=65551006&hm=9440a8aac0c50c287d511b265ed4f87e38351f262d38af45d67eb3d10ba62c84&" height="60px" width="68px" id="wakfu"><?php echo "$nom_utilisateur" ?></a></div>
            </div>
        </nav>
    </header>



    <!-- intérieur de la page -->



    <div class="container">
        <input id="custom-search" type="text" name="search" placeholder="Search..">
    </div>

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


        <section id="block2">
            <div class="chat-container">
                <div class="chat-messages">
                    <?php for ($i = count($messages) - 1; $i >= 0; $i--): ?>
                        <p><?php echo htmlspecialchars($messages[$i]['user_name']); ?></p>
                        <h4><?php echo htmlspecialchars($messages[$i]['msg']); ?></h4>
                        <hr>
                    <?php endfor; ?>
                </div>

            </div>

                <!-- Chat input -->

            <div class="bottom-content"> 
                <div class="chat-input">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form_topics">
        
                    <legend><h2>Chat general</h2></legend>

                    <input name="message" id="message" required></input> <br>
                    <button type="submit">POST</button>
                </form>
                </div>
            </div>    
        </section> 
    </main>
    <footer> Copyright © </footer>

        <!-- JavaScript for auto-scrolling -->
    <script>
        // Function to scroll the chat container to the bottom
        function scrollToBottom() {
            var chatContainer = document.querySelector('.chat-container');
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        // Call scrollToBottom() when the page loads
        window.onload = scrollToBottom;

        // Call scrollToBottom() after posting a new message
        document.getElementById('form_topics').addEventListener('submit', function () {
            scrollToBottom();
        });
    </script>
</body>
</html>