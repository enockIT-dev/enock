<?php
include("database.php");

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: dashboard.php");
    exit;
}

$query = $conn->query("SELECT * FROM milk_sales WHERE id = $id");
$customer = $query->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['customer_name']);
    $quantity = (float)$_POST['milk_sold'];
    $date = $conn->real_escape_string($_POST['sale_date']);

    $conn->query("UPDATE milk_sales SET customer_name = '$name', milk_sold = $quantity, sale_date = '$date' WHERE id = $id");
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Customer</title>
</head>
<body>
    <h2>Update Customer Record</h2>
    <form method="post">
        <label>Customer Name:</label><br>
        <input type="text" name="customer_name" value="<?= htmlspecialchars($customer['customer_name']); ?>" required><br><br>
        <label>Milk Sold (Liters):</label><br>
        <input type="number" name="milk_sold" step="0.01" value="<?= $customer['milk_sold']; ?>" required><br><br>
        <label>Sale Date:</label><br>
        <input type="date" name="sale_date" value="<?= $customer['sale_date']; ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
