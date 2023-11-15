<?php
session_start();

// Vérifiez si l'utilisateur est connecté et est un admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    // Si non connecté ou non admin, redirigez vers la page de connexion
    header("Location: login.php");
    exit();
}

require 'db_connection.php';

// Récupérer les utilisateurs depuis la base de données
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Page Admin</title>
        <!-- Styles et autres balises head ici -->
    </head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        thead {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        th, td {
            padding: 12px 15px;
        }

        tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        a ,button a{
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover ,button a:hover{
            color: #fff;
        }

        button {
            background-color: #009879;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            margin: 10px 0;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #006f56;
        }
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>


<body>
    <h1>Bienvenue sur la Page Administrateur</h1>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_u"] . "</td>";
                        echo "<td>" . $row["name_user"] . "</td>";
                        echo "<td>" . $row["email_user"] . "</td>";
                        echo "<td>";
                        echo "<button onclick='openModifyModal(" . json_encode($row) . ")'>Modifier</button> | ";
                        echo "<button><a href='userDelete.php?id=" . $row["id_u"] . "' onclick='return confirmDelete()'>Supprimer</a></button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucun utilisateur trouvé.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <!-- Popup de Modification -->
    <div id="modifyModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="modifyForm" action="userModify.php" method="post">
                <h2>Modifier l'utilisateur</h2>
                <input type="hidden" id="userId" name="userId">
                Nom: <input type="text" id="userName" name="userName"><br>
                Email: <input type="text" id="userEmail" name="userEmail"><br>
                <button type="submit">Modifier</button>
            </form>
        </div>
    </div>

    <!-- Popup d'Ajout d'Utilisateur -->
    <div id="addUserModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="addUserForm" action="userAdd.php" method="post">
                <h2>Ajouter un utilisateur</h2>
                Nom: <input type="text" name="newUserName"><br>
                Email: <input type="text" name="newUserEmail"><br>
                Mot de passe: <input type="password" name="newUserPassword"><br>
                Admin: <input type="checkbox" name="newUserAdmin"><br>
                <button type="submit">Ajouter</button>
            </form>
        </div>
    </div>

    <button id="addUserButton">Ajouter un utilisateur</button>

    <script>
        // Script pour ouvrir et fermer les pop-up
        var modifyModal = document.getElementById("modifyModal");
        var addUserModal = document.getElementById("addUserModal");

        // Lorsque l'utilisateur clique sur (x), fermer la pop-up
        var span = document.getElementsByClassName("close");
        for (var i = 0; i < span.length; i++) {
            span[i].onclick = function() {
                modifyModal.style.display = "none";
                addUserModal.style.display = "none";
            }
        }
        // ========================================================
        // Lorsque l'utilisateur clique en dehors de la popup, fermer la pop-up
        // window.onclick = function(event) {
        //     if (event.target == modifyModal) {
        //         modifyModal.style.display = "none";
        //     } else if (event.target == addUserModal) {
        //         addUserModal.style.display = "none";
        //     }
        // }
        // ========================================================
        // Bouton pour ouvrir la pop-up d'ajout d'utilisateur
        var addUserButton = document.getElementById("addUserButton");
        addUserButton.onclick = function() {
            addUserModal.style.display = "block";
        };
        function openModifyModal(userData) {
            document.getElementById("userId").value = userData.id_u;
            document.getElementById("userName").value = userData.name_user;
            document.getElementById("userEmail").value = userData.email_user;
            modifyModal.style.display = "block";
        }

        function confirmDelete(userId) {
            return confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
        }
    </script>



</body>
</html>


<?php
    $conn->close();
?>