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
    <link rel="icon" href="logo.jpg">

</head>
<body>



    <!-- header -->
    <!-- Top navigation -->


    <header>
        <nav>
            <div id="flex-container" class="topnav">
                <div class="flex-items" id="div-navbar-img"><a href="index.html" id="nav-img"><img src="https://upload.wikimedia.org/wikipedia/fr/1/1f/Wakfu_Logo.png" alt="Wakfu_Logo" height="100px" width="200px"></a></div>
                <div class="flex-items"><a href="news.php">Actualités</a></div>
                <div class="flex-items"><a href="contact.php">Contact</a></div>                <div class="flex-items"><a href="topics.html">Nos Guides</a></div>
                <div class="flex-items"><a href="equipe.php">Qui sommes nous ?</a></div>
                <div class="flex-items" id="div-navbar-img"><a href="formulaire/formulaire_connexion.php" id="nav-img"><img src="https://cdn.discordapp.com/attachments/1159173141554282647/1174418033364713482/image-removebg-preview.png?ex=65678506&is=65551006&hm=9440a8aac0c50c287d511b265ed4f87e38351f262d38af45d67eb3d10ba62c84&" height="60px" width="68px"></a></div>
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
                <img src="https://avatar.ankama.com/users/44927746.png" alt="" width="100">
                <p><span class="Question">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae maxime, non ipsum placeat veniam soluta!</span><br>
                    <span id="Utilisateur">Utilisateur1</span></p><br>
                <a href="#topic1"><button id="join-button" name="join-button">Rejoindre</button></a>
            </article>
            <article class="topics">
                <img src="https://avatar.ankama.com/users/44927746.png" alt="" width="100">
                <p><span class="Question">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos adipisci cupiditate, amet, velit maxime consectetur ad corporis tempore molestiae facilis explicabo eius solut</span><br>
                <span id="Utilisateur">Utilisateur2</span></p>
                <a href="#topic2"><button id="join-button" name="join-button">Rejoindre</button></a>
            </article>
            <article class="topics">
                <img src="https://avatar.ankama.com/users/44927746.png" alt="" width="100">
                <p><span class="Question">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae maxime, non ipsum placeat veniam soluta!</span>
                    <br>
                <span id="Utilisateur">Utilisateur3</span></p><br>
                <a href="#topic3"><button id="join-button" name="join-button">Rejoindre</button></a>
            </article>
        </section>


        <section id="block2">
            <div class="chat-container">
                <hr>
                <h2 id="chatgénéral">Chat Général</h2>
                <hr>
                <div class="chat-messages">
                    <div class="message">
                        <div class="user">Utilisateur 1:</div>
                        <div class="text-user">Salut, comment ça va ?</div>
                    </div>
                    <div class="message">
                        <div class="user">Utilisateur 2:</div>
                        <div class="text-user">Tout va bien, merci ! Et toi ?</div>
                    </div>
                    <div class="message">
                        <div class="user">Utilisateur 1:</div>
                        <div class="text-user">Salut, comment ça va ?</div>
                    </div>
                    <div class="message">
                        <div class="user">Utilisateur 2:</div>
                        <div class="text-user">Tout va bien, merci ! Et toi ?</div>
                    </div>
                    <div class="message">
                        <div class="user">Utilisateur 1:</div>
                        <div class="text-user">Salut, comment ça va ?</div>
                    </div>
                    <div class="message">
                        <div class="user">Utilisateur 2:</div>
                        <div class="text-user">Tout va bien, merci ! Et toi ?</div>
                    </div>


                    <!-- Ajoutez d'autres messages ici -->


                </div>
            </div>

                <!-- Chat input -->

            <div class="bottom-content"> 
                <div class="chat-input">
                    <input type="text" placeholder="Saisissez votre message">
                    <button>Envoyer</button>
                </div>
            </div>    
        </section>




        
    </main>
    <footer> Contact </footer>
</body>
</html>