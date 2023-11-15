<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!--formulaire d'inscription-->
<h2>Formulaire d'inscription</h2>
<form action="inscription.php" method="post">
    <input type="text" name="nom" placeholder="nom"><br><br>
    <input type="email" name="email" placeholder="email"><br><br>
    <input type="password" name="mot_de_passe" placeholder="mot_de_passe"><br><br>
    <input type="submit" name="inscription" value="valider"><br><br>
</form>
<hr>
<!-- formulaire de connexion-->
<h2>Formulaire de connexion</h2>
<form action="connexion.php" method="post">
    <input type="email" name="email" placeholder="email"><br><br>
    <input type="password" name="mot_de_passe" placeholder="mot de passe"><br><br>
    <input type="submit" name="connexion" value="valider"><br><br>
</form>
<hr>
<!--formulaire de contact-->
<h2>Formulaire de contact</h2>
<form action="contact.php" method="post">
    <input type="text" name="nom" placeholder="nom"><br><br>
    <input type="email" name="email" placeholder="email"><br><br>
    <textarea name="message" id="message" cols="30" rows="10" placeholder="message"></textarea><br><br>
    <input type="submit" name="mailform" value="envoyer"><br><br>
</form>


</body>
</html>

