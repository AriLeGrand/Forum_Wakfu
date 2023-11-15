<?php

require_once "pdo.php";


//htmlentities transforme les > en symbole et donne aussi des caractères spéciaux
//strip_tags retire les balises html
//htmlspecialchars transforme le tout en texte

//filter_var va vérifier si l'email est valide. Néaanmoins il faut mettre l'algorithme dans un if pour que cela marche
 
//md5 est une ancienne methode de cryptage de mdp mais est maintenaant déconseillé
//le plus sûr est password_hash qui va changer le cryptage à chaque fois couplé à l'algo PASSWORD_DEFAULT

if (!isset($_POST["inscription"])){
    if (empty($_POST["nom"])){
        echo 'mauvais ';
    }elseif(empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        echo 'mauvais ';
    }elseif(empty($_POST["mot_de_passe"])){
        echo 'mauvais ';
    }
}else{
        $nom= htmlspecialchars($_POST["nom"]); 
        //echo $nom;
        $email= filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
        //echo $email;
        $mdp =password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
        //echo $mdp;
}

$sql= "INSERT INTO user(name_user, email_user, password_user) VALUES (:nom,:email,:mot_de_passe)";
$requete = $connexion->prepare($sql);
/*$nom = htmlspecialchars($_POST["nom"]);
$email= filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
$mdp =password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);*/
$requete->bindValue(":nom", $nom);
$requete->bindValue(":email", $email);
$requete->bindValue(":mot_de_passe", $mdp);
$resultat = $requete->execute(array(":nom"=> $nom, ":email"=>$email, ":mot_de_passe" => $mdp));
?>