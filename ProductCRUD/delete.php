<?php
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id']) || empty($_POST['id'])) {
        echo "Product ID is required.";
        exit;
    }

    $id = $_POST['id'];

    $sql = "DELETE FROM product WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    header('Location: index.php');
    exit;
} else {
    echo "Invalid request method.";
    exit;
}
?>
