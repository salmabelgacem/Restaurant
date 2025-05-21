<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
    header("Location: orders.php");
    exit;
}

$id = intval($_GET['id']);

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $foodName = $conn->real_escape_string($_POST['foodName']);
    $orderCount = intval($_POST['orderCount']);
    $address = $conn->real_escape_string($_POST['address']);

    $sql_update = "UPDATE orders SET 
                    name='$name', 
                    email='$email', 
                    foodName='$foodName', 
                    orderCount=$orderCount, 
                    address='$address' 
                   WHERE id=$id";

    if ($conn->query($sql_update) === TRUE) {
        header("Location: orders.php");
        exit;
    } else {
        $error = "Error updating record: " . $conn->error;
    }
}

// Récupérer les données existantes
$sql = "SELECT * FROM orders WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    header("Location: orders.php");
    exit;
}

$order = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Edit Order</title>
<style>
    /* Même style que orders.php */
    body {
        font-family: sans-serif;
        background: #fff;
        margin: 0;
        padding: 20px;
        color: #000;
    }
    h2 {
        font-size: 36px;
        color: #fac031;
        font-family: "mv boli", sans-serif;
        margin-bottom: 20px;
        width: fit-content;
    }
    form {
        max-width: 500px;
    }
    label {
        display: block;
        margin-top: 15px;
        font-weight: 600;
    }
    input[type="text"],
    input[type="email"],
    input[type="number"] {
        width: 100%;
        padding: 8px 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }
    textarea {
        width: 100%;
        height: 80px;
        margin-top: 5px;
        padding: 8px 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
        font-size: 16px;
    }
    .btn {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #000;
        color: #fac031;
        border: none;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn:hover {
        background-color: #fac031;
        color: #000;
    }
    .btn-back {
        background-color: #555;
        color: #fff;
        text-decoration: none;
        display: inline-block;
        padding: 8px 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .btn-back:hover {
        background-color: #333;
    }
    .error {
        margin-top: 15px;
        color: red;
    }
</style>
</head>
<body>

<h2>Edit Order #<?= htmlspecialchars($order['id']) ?></h2>

<a href="orders.php" class="btn-back">Back to Orders</a>

<?php if (!empty($error)) : ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form method="POST" action="">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required value="<?= htmlspecialchars($order['name']) ?>" />

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required value="<?= htmlspecialchars($order['email']) ?>" />

    <label for="foodName">Food</label>
    <input type="text" name="foodName" id="foodName" required value="<?= htmlspecialchars($order['foodName']) ?>" />

    <label for="orderCount">Quantity</label>
    <input type="number" name="orderCount" id="orderCount" min="1" required value="<?= htmlspecialchars($order['orderCount']) ?>" />

    <label for="address">Address</label>
    <textarea name="address" id="address" required><?= htmlspecialchars($order['address']) ?></textarea>

    <button type="submit" class="btn">Save Changes</button>
</form>

</body>
</html>

<?php $conn->close(); ?>

