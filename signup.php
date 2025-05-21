<?php
session_start();

// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les données du formulaire en POST
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];

// Vérifier que tous les champs sont remplis
if (empty($name) || empty($email) || empty($password)) {
    die("Veuillez remplir tous les champs.");
}

// Vérifier que l'email est valide
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Adresse email invalide.");
}

// Vérifier si l'email existe déjà
$sql_check = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->close();
    die("Cet email est déjà utilisé. Veuillez en choisir un autre ou vous connecter.");
}
$stmt->close();

// Hasher le mot de passe
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insérer le nouvel utilisateur
$sql_insert = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bind_param("sss", $name, $email, $hashed_password);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    // Rediriger vers la page de connexion après inscription
    header("Location: login.html");
    exit();
} else {
    die("Erreur lors de l'inscription : " . $conn->error);
}
?>

