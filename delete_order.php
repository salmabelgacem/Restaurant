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

$sql = "DELETE FROM orders WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: orders.php");
    exit;
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
