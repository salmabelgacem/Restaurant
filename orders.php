<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Commandes</title>
    <link rel="stylesheet" href="style.css"> <!-- Ton fichier CSS principal -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f7f7f7;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #fac031;
            margin-bottom: 30px;
        }

        .orders-table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .orders-table th,
        .orders-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .orders-table th {
            background-color: #fac031;
            color: white;
        }

        .orders-table tr:hover {
            background-color: #f1f1f1;
        }

        .action-links a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .action-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM orders");

echo "<h2>Order List</h2>";
echo "<div style='text-align: center; margin-bottom: 20px;'>
        <a href='resto.html' class='back-btn'>⬅ Back to Home</a>
      </div>";

echo "<table class='orders-table'>";
echo "<tr><th>ID</th><th>Nom</th><th>Email</th><th>Commande</th><th>Quantité</th><th>Adresse</th><th>Actions</th></tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['foodName']}</td>
            <td>{$row['orderCount']}</td>
            <td>{$row['address']}</td>
            <td class='action-links'>
                <a href='edit_order.php?id={$row['id']}'>Modifier</a>
                <a href='delete_order.php?id={$row['id']}' onclick='return confirm(\"Confirmer la suppression ?\");'>Supprimer</a>
            </td>
        </tr>";
}

echo "</table>";
$conn->close();
?>

</body>
</html>
