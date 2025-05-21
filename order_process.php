<?php
// Paramètres de connexion MySQL
$servername = "localhost";
$username = "root"; // adapte si besoin
$password = "";     // adapte si besoin
$dbname = "restaurant";

// Connexion
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération et sécurisation des données
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$number = $conn->real_escape_string($_POST['number']);
$orderCount = intval($_POST['orderCount']);
$foodName = $conn->real_escape_string($_POST['foodName']);
$address = $conn->real_escape_string($_POST['address']);

// Préparation de la requête
$sql = "INSERT INTO orders (name, email, number, orderCount, foodName, address)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssiss", $name, $email, $number, $orderCount, $foodName, $address);

if ($stmt->execute()) {
    echo "<h2>Merci! Votre commande a bien été enregistrée.</h2>";
    echo '<a href="http://localhost/projet_html/resto.html">Retour à la page principale</a>';

} else {
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
