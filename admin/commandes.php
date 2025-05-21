<?php
include 'connexion.php';

// Changer statut
if (isset($_POST['changer_statut'])) {
    $id = $_POST['commande_id'];
    $nouveau_statut = $_POST['statut'];
    $sql = "UPDATE commandes SET statut = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nouveau_statut, $id]);
    header("Location: commandes.php");
    exit;
}

// Récupérer toutes les commandes avec infos client & produit
$sql = "SELECT cmd.id, cmd.quantite, cmd.date, cmd.statut,
               c.nom AS client_nom, c.email, c.telephone,
               p.nom AS produit_nom, p.prix
        FROM commandes cmd
        JOIN clients c ON cmd.client_id = c.id
        JOIN produits p ON cmd.produit_id = p.id
        ORDER BY cmd.date DESC";

$stmt = $pdo->query($sql);
$commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Liste des commandes</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Client</th><th>Produit</th><th>Quantité</th><th>Date</th><th>Statut</th><th>Actions</th>
    </tr>
    <?php foreach ($commandes as $cmd): ?>
    <tr>
        <td><?= $cmd['id'] ?></td>
        <td>
            <?= htmlspecialchars($cmd['client_nom']) ?><br>
            <?= htmlspecialchars($cmd['email']) ?><br>
            <?= htmlspecialchars($cmd['telephone']) ?>
        </td>
        <td><?= htmlspecialchars($cmd['produit_nom']) ?></td>
        <td><?= $cmd['quantite'] ?></td>
        <td><?= $cmd['date'] ?></td>
        <td><?= $cmd['statut'] ?></td>
        <td>
            <form method="post" action="commandes.php">
                <input type="hidden" name="commande_id" value="<?= $cmd['id'] ?>">
                <select name="statut">
                    <option value="en attente" <?= $cmd['statut'] === 'en attente' ? 'selected' : '' ?>>En attente</option>
                    <option value="validée" <?= $cmd['statut'] === 'validée' ? 'selected' : '' ?>>Validée</option>
                    <option value="livrée" <?= $cmd['statut'] === 'livrée' ? 'selected' : '' ?>>Livrée</option>
                </select>
                <button type="submit" name="changer_statut">Changer</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
