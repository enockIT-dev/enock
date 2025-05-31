<?php
include("database.php");

$total_collected = $conn->query("SELECT SUM(milk_quantity) AS total FROM milk_collection")->fetch_assoc()["total"];
$total_sold = $conn->query("SELECT SUM(milk_sold) AS total FROM milk_sales")->fetch_assoc()["total"];
$remaining = $total_collected - $total_sold;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Milk Inventory</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        p {
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #2196F3;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Milk Inventory</h2>
    <p>Total Milk Collected: <?= $total_collected ?> Liters</p>
    <p>Total Milk Sold: <?= $total_sold ?> Liters</p>
    <p>Remaining Milk: <?= $remaining ?> Liters</p>
</body>
</html>