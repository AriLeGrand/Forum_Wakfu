<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Définir les identifiants corrects
    $identifiant_attendu = "admin";
    $mot_de_passe_attendu = "admin123";

    // Récupérer les valeurs soumises par le formulaire
    $identifiant = $_POST["identifiant"];
    $mot_de_passe = $_POST["password"];

    // Vérifier si les identifiants sont corrects
    if ($identifiant === $identifiant_attendu && $mot_de_passe === $mot_de_passe_attendu) {
        echo "Connexion réussie !";
        header("Location: page_cache.php");
        exit();
        // Ajoutez ici le code pour rediriger l'utilisateur vers une page sécurisée, par exemple.
    } else {
        echo "Identifiant ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Admin</title>
</head>
<body>
    <h2>Formulaire de Connexion</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="identifiant">Identifiant :</label>
        <input type="text" name="identifiant" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>

        <button type="submit">Connexion</button>
    </form>
</body>
</html>