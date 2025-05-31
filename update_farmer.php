<?php
include("database.php");

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: dashboard.php");
    exit;
}

$query = $conn->query("SELECT * FROM milk_collection WHERE id = $id");
$farmer = $query->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['farmer_name']);
    $quantity = (float)$_POST['milk_quantity'];
    $date = $conn->real_escape_string($_POST['collection_date']);

    $conn->query("UPDATE milk_collection SET farmer_name = '$name', milk_quantity = $quantity, collection_date = '$date' WHERE id = $id");
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Farmer</title>
</head>
<body>
    <h2>Update Farmer Record</h2>
    <form method="post">
        <label>Farmer Name:</label><br>
        <input type="text" name="farmer_name" value="<?= htmlspecialchars($farmer['farmer_name']); ?>" required><br><br>
        <label>Milk Quantity (Liters):</label><br>
        <input type="number" name="milk_quantity" step="0.01" value="<?= $farmer['milk_quantity']; ?>" required><br><br>
        <label>Collection Date:</label><br>
        <input type="date" name="collection_date" value="<?= $farmer['collection_date']; ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
