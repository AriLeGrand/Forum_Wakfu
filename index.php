<?php
session_start();
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
    <link rel="icon" href="logo.jpg">

</head>
<body>



    <!-- header -->
    <!-- Top navigation -->


    <header>
        <nav>
            <div id="flex-container" class="topnav">
                <div class="flex-items" id="div-navbar-img"><a href="index.php" id="nav-img"><img src="https://upload.wikimedia.org/wikipedia/fr/1/1f/Wakfu_Logo.png" alt="Wakfu_Logo" height="100px" width="200px"></a></div>
                <div class="flex-items"><a href="news/news.php">Actualités</a></div>
                <div class="flex-items"><a href="contact/contact.php">Contact</a></div>
                <div class="flex-items"><a href="topics/topics.php">Nos Guides</a></div>
                <div class="flex-items"><a href="equipe/equipe.ph">Qui sommes nous ?</a></div>
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
                <img src="https://cdn.discordapp.com/attachments/1159173141554282647/1174434686693556224/image.png?ex=65679489&is=65551f89&hm=50db00069022078c6d482577032f31eb3811947e4b7b5c71a31ca0b049ff976d&" alt="" width="100">
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
                <img src="https://cdn.discordapp.com/attachments/1159173141554282647/1174434837252284488/image.png?ex=656794ad&is=65551fad&hm=fa241b8601faf576042f1ecf7b2aa32e23fb470c4f2e2e77ee2dbf0202b1892f&" alt="" width="100">
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
    <footer> Copyright © </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatMessagesContainer = document.querySelector('.chat-messages');
            const chatInput = document.querySelector('.chat-input input');
            const chatSendButton = document.querySelector('.chat-input button');

            // Fonction pour afficher les messages du chat
            function afficherMessagesChat() {
                fetch('chat/get_messages.php')
                    .then(response => response.json())
                    .then(messages => {
                        chatMessagesContainer.innerHTML = '';
                        messages.forEach(msg => {
                            ajouterMessageChat(msg);
                        });
                        
                        // Défiler vers le bas après l'affichage des messages
                        chatMessagesContainer.scrollTop = chatMessagesContainer.scrollHeight;
                    });
            }

            // Fonction pour ajouter un message au chat
            function ajouterMessageChat(message) {
                const messageDiv = document.createElement('div');
                messageDiv.classList.add('message');
                messageDiv.innerHTML = `
                    <div class="user">${message.user}:</div>
                    <div class="text-user">${message.message}</div>
                `;
                chatMessagesContainer.appendChild(messageDiv);
            }

            // Fonction pour envoyer un message dans le chat
            function envoyerMessageChat() {
                const message = chatInput.value.trim();
                if (message !== '') {
                    fetch('chat/save_message.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `message=${encodeURIComponent(message)}`,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            // Actualiser la liste des messages après l'envoi
                            afficherMessagesChat();
                            chatInput.value = ''; // Effacer le champ de saisie
                        }
                    });
                }
            }

            // Afficher les messages du chat initiaux
            afficherMessagesChat();

            // Ajouter un écouteur d'événement pour le bouton d'envoi
            chatSendButton.addEventListener('click', envoyerMessageChat);
        });
    </script>
</body>
</html>