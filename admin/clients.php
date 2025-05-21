<?php
include 'connexion.php';

// Requête pour récupérer les clients
$sql = "SELECT c.nom, c.email, c.telephone, COUNT(cmd.id) AS nb_commandes 
        FROM clients c 
        LEFT JOIN commandes cmd ON c.id = cmd.client_id 
        GROUP BY c.id";
$stmt = $pdo->query($sql);
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Liste des clients</h2>
<table border="1">
    <tr>
        <th>Nom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Nombre de commandes</th>
    </tr>
    <?php foreach($clients as $client): ?>
    <tr>
        <td><?= htmlspecialchars($client['nom']) ?></td>
        <td><?= htmlspecialchars($client['email']) ?></td>
        <td><?= htmlspecialchars($client['telephone']) ?></td>
        <td><?= $client['nb_commandes'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
