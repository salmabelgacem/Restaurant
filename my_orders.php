<?php
session_start();

// Exemple : vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // redirection si pas connecté
    exit;
}

$user_id = $_SESSION['user_id']; // id de l'utilisateur connecté

// Connexion à la BDD (adapte avec tes infos)
$mysqli = new mysqli("localhost", "root", "", "ta_base");
if ($mysqli->connect_errno) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

// Requête pour récupérer les commandes de cet utilisateur
$sql = "SELECT order_id, order_date, product_name, quantity, price, status FROM orders WHERE user_id = ? ORDER BY order_date DESC";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Mes Commandes</title>
  <style>
    /* Copie ici le CSS de .orders-list que je t'ai donné avant */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
    }
    body {
      background: #f9f9f9;
      padding-top: 130px;
    }
    .orders-list {
      width: 90%;
      max-width: 1100px;
      margin: 0 auto 50px;
      background: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 12px rgba(0,0,0,0.25);
      font-family: 'sans-serif';
    }
    .orders-list h1 {
      font-size: 50px;
      text-align: center;
      color: #000;
      margin-bottom: 20px;
    }
    .orders-list h1 span {
      color: #fac031;
      font-family: mv boli, sans-serif;
      margin-left: 15px;
      position: relative;
    }
    .orders-list h1 span::after {
      content: '';
      width: 100%;
      height: 2px;
      background: #fac031;
      display: block;
      position: relative;
      bottom: 15px;
    }
    .orders-list table {
      width: 100%;
      border-collapse: collapse;
      font-size: 18px;
    }
    .orders-list table thead tr {
      background-color: #fac031;
      color: #fff;
    }
    .orders-list table th,
    .orders-list table td {
      padding: 12px 15px;
      border: 1px solid #ddd;
      text-align: center;
    }
    .orders-list table tbody tr:hover {
      background-color: #fef5d3;
    }
    .orders-list .btn {
      background: #fac031;
      color: #fff;
      padding: 7px 15px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: 600;
      transition: background 0.3s;
      display: inline-block;
    }
    .orders-list .btn:hover {
      background: #d4a80c;
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="orders-list">
  <h1>Mes <span>Commandes</span></h1>

  <?php if ($result->num_rows > 0): ?>
    <table>
      <thead>
        <tr>
          <th>Numéro</th>
          <th>Date</th>
          <th>Produit</th>
          <th>Quantité</th>
          <th>Prix</th>
          <th>Statut</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['order_id']) ?></td>
            <td><?= htmlspecialchars($row['order_date']) ?></td>
            <td><?= htmlspecialchars($row['product_name']) ?></td>
            <td><?= htmlspecialchars($row['quantity']) ?></td>
            <td><?= htmlspecialchars($row['price']) ?>€</td>
            <td><?= htmlspecialchars($row['status']) ?></td>
            <td><a href="order_details.php?id=<?= urlencode($row['order_id']) ?>" class="btn">Voir</a></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p style="text-align:center; font-size: 20px; color: #555;">Vous n'avez aucune commande pour le moment.</p>
  <?php endif; ?>

</div>

</body>
</html>

<?php
$stmt->close();
$mysqli->close();
?>
