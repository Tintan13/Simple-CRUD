<?php
include 'dbconn.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Product ID is required.";
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM product WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$product = $stmt->fetch();

if (!$product) {
    echo "Product not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <h1>Product Details</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <td><?= htmlspecialchars($product['id']) ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?= htmlspecialchars($product['name']) ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?= htmlspecialchars($product['description']) ?></td>
        </tr>
        <tr>
            <th>Price</th>
            <td><?= htmlspecialchars($product['price']) ?></td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td><?= htmlspecialchars($product['quantity']) ?></td>
        </tr>
        <tr>
            <th>Barcode</th>
            <td><?= htmlspecialchars($product['barcode']) ?></td>
        </tr>
        <tr>
            <th>Created At</th>
            <td><?= htmlspecialchars($product['created_at']) ?></td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td><?= htmlspecialchars($product['updated_at']) ?></td>
        </tr>
    </table>
</body>
</html>
