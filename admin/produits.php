<?php
include 'connexion.php';

// Ajouter un produit
if (isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $image = $_POST['image']; // Tu peux gérer l'upload plus tard

    $sql = "INSERT INTO produits (nom, prix, description, image) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prix, $description, $image]);
    header("Location: produits.php");
    exit;
}

// Supprimer un produit
if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];
    $sql = "DELETE FROM produits WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    header("Location: produits.php");
    exit;
}

// Modifier un produit (formulaire prérempli)
if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "UPDATE produits SET nom = ?, prix = ?, description = ?, image = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prix, $description, $image, $id]);
    header("Location: produits.php");
    exit;
}

// Récupérer produit pour modification
$produitEdit = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM produits WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $produitEdit = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Liste des produits
$sql = "SELECT * FROM produits";
$stmt = $pdo->query($sql);
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Gestion des produits</h2>

<!-- Formulaire ajout / modification -->
<form method="post" action="produits.php">
    <input type="hidden" name="id" value="<?= $produitEdit['id'] ?? '' ?>">
    <label>Nom:</label><br>
    <input type="text" name="nom" required value="<?= $produitEdit['nom'] ?? '' ?>"><br>

    <label>Prix:</label><br>
    <input type="number" step="0.01" name="prix" required value="<?= $produitEdit['prix'] ?? '' ?>"><br>

    <label>Description:</label><br>
    <textarea name="description" required><?= $produitEdit['description'] ?? '' ?></textarea><br>

    <label>Image (nom du fichier):</label><br>
    <input type="text" name="image" value="<?= $produitEdit['image'] ?? '' ?>"><br><br>

    <?php if ($produitEdit): ?>
        <button type="submit" name="modifier">Modifier le produit</button>
        <a href="produits.php">Annuler</a>
    <?php else: ?>
        <button type="submit" name="ajouter">Ajouter un produit</button>
    <?php endif; ?>
</form>

<hr>

<!-- Liste des produits -->
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Nom</th><th>Prix</th><th>Description</th><th>Image</th><th>Actions</th>
    </tr>
    <?php foreach ($produits as $produit): ?>
    <tr>
        <td><?= $produit['id'] ?></td>
        <td><?= htmlspecialchars($produit['nom']) ?></td>
        <td><?= $produit['prix'] ?> €</td>
        <td><?= htmlspecialchars($produit['description']) ?></td>
        <td><?= htmlspecialchars($produit['image']) ?></td>
        <td>
            <a href="produits.php?edit=<?= $produit['id'] ?>">Modifier</a> |
            <a href="produits.php?supprimer=<?= $produit['id'] ?>" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
