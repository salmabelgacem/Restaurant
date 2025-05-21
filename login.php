<?php
session_start();

// Si déjà connecté, rediriger vers la page des commandes (ou autre)
if (isset($_SESSION['user_id'])) {
    header("Location: orders.php");
    exit;
}

// Connexion base
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, name FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $hashed_pass, $name);
        $stmt->fetch();

        if (password_verify($pass, $hashed_pass)) {
            // Mot de passe OK, création session
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            header("Location: orders.php");  // Rediriger vers page commandes ou autre
            exit;
        } else {
            $error = "Mot de passe incorrect.";
        }
    } else {
        $error = "Email non trouvé.";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Connexion</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f9f9f9;
            display: flex; justify-content: center; align-items: center; height: 100vh;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            width: 350px;
        }
        input {
            width: 100%; padding: 10px; margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background: #fac031;
            border: none;
            padding: 12px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }
        button:hover {
            background: #e5b22f;
        }
        .error { color: red; margin-bottom: 10px;}
        a {
            display: block; margin-top: 10px; text-align: center; color: #fac031; text-decoration: none;
        }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <form method="post" action="login.php">
        <h2>Connexion</h2>
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Mot de passe" required />
        <button type="submit">Se connecter</button>
        <a href="signup.php">Pas de compte ? Inscrivez-vous</a>
    </form>
</body>
</html>
