<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "root", "bdd_user");

    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Préparation de la requête pour éviter les injections SQL
    $stmt = $conn->prepare("SELECT id_u, is_admin FROM users WHERE email_user = ? AND password_user = ?");
    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id_u'];
        $_SESSION['is_admin'] = (bool) $row['is_admin'];

        if ($_SESSION['is_admin']) {
            header("Location: admin_page.php");
            exit();
        } else {
            header("Location: user_page.php");
            exit();
        }
    } else {
        echo "Identifiants incorrects.";
    }

    $stmt->close();
    $conn->close();
}
?>
<!-- Formulaire HTML pour la connexion -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .login-container {
            width: 300px;
            margin: 0 auto;
            margin-top: 100px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-submit">Connexion</button>
        </form>
    </div>
</body>
</html>