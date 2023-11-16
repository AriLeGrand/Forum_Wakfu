<?php
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
$sql = "SELECT * FROM topics_user ORDER BY timestamp DESC";
$result = $conn->query($sql);
$messages = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

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
        $sql = "INSERT INTO topics_user (text) VALUES ('$message_text')";
        $conn->query($sql);

        $conn->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter-like Feed</title>
</head>
<body>
    <h1>Twitter-like Feed</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="message">Tweet:</label>
        <input type="text" name="message" id="message" required>
        <button type="submit">Post</button>
    </form>
    <div>
        <?php foreach ($messages as $message): ?>
            <p><?php echo htmlspecialchars($message['text']); ?> - <?php echo $message['timestamp']; ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>