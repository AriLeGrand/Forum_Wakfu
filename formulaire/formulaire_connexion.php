<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://spng.pngfind.com/pngs/s/72-723346_wakfu-logo-wakfu-png-transparent-png.png">
    <title>Connexion</title>

    <style>
        body {
            font-family: "Bebas_Neue variant0", Tofu;
            background: url(430155.jpg) no-repeat center center fixed;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;    
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 600px;
            background-color: #cacfd2c2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container a{
            text-decoration: none;
            color: black;
        }

        .form-container {
            display: flex;
            justify-content: center;
        }

        .form-container form {
            width: 45%;
        }

        .form-container hr {
            margin: 20px 0;
        }

        .create-account-btn {
            text-align: center;
            margin-top: 20px;
        }

        .create-account-btn a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .create-account-btn a:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>
    <div class="container">
        <a href="../index.php">← retour</a>
        <div class="form-container">
            <!-- Formulaire de connexion -->
            <form action="connexion.php" method="post">
                <h2>Formulaire de connexion</h2>
                <input type="email" name="email" placeholder="Email"><br><br>
                <input type="password" name="mot_de_passe" placeholder="Mot de passe"><br><br>
                <input type="submit" name="connexion" value="Valider"><br><br>
            </form>
        </div>

        <hr>

        <!-- Option pour créer un compte -->
        <div class="create-account-btn">
            <p>Vous n'avez pas de compte ? <a href="formulaire_inscription.php">Créer un compte</a></p>
        </div>
    </div>
</body>
</html>


