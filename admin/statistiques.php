<?php
include 'connexion.php';

// Date du jour
$date_jour = date('Y-m-d');

// Total des ventes aujourd'hui
$sql = "SELECT SUM(p.prix * cmd.quantite) AS total_ventes 
        FROM commandes cmd
        JOIN produits p ON cmd.produit_id = p.id
        WHERE DATE(cmd.date) = ? AND cmd.statut = 'livrée'";
$stmt = $pdo->prepare($sql);
$stmt->execute([$date_jour]);
$total_ventes = $stmt->fetchColumn();

// Nombre de commandes aujourd'hui
$sql = "SELECT COUNT(*) FROM commandes WHERE DATE(date) = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$date_jour]);
$nb_commandes = $stmt->fetchColumn();

// Produit le plus vendu aujourd'hui (optionnel)
$sql = "SELECT p.nom, SUM(cmd.quantite) AS total_qte
        FROM commandes cmd
        JOIN produits p ON cmd.produit_id = p.id
        WHERE DATE(cmd.date) = ? AND cmd.statut = 'livrée'
        GROUP BY p.id
        ORDER BY total_qte DESC
        LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([$date_jour]);
$produit_plus_vendu = $stmt->fetch(PDO::FETCH_ASSOC);

// Dernières commandes (5)
$sql = "SELECT cmd.id, cmd.date, cmd.statut, c.nom AS client_nom, p.nom AS produit_nom, cmd.quantite
        FROM commandes cmd
        JOIN clients c ON cmd.client_id = c.id
        JOIN produits p ON cmd.produit_id = p.id
        ORDER BY cmd.date DESC
        LIMIT 5";
$stmt = $pdo->query($sql);
$dernieres_commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Tableau de bord</h2>

<p><strong>Total des ventes aujourd'hui :</strong> <?= $total_ventes ? number_format($total_ventes, 2) . " €" : "0 €" ?></p>
<p><strong>Nombre de commandes aujourd'hui :</
