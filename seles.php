<?php
include("database.php");

// Fetch total available milk
$total_collected = $conn->query("SELECT SUM(milk_quantity) AS total FROM milk_collection")->fetch_assoc()["total"];
$total_sold = $conn->query("SELECT SUM(milk_sold) AS total FROM milk_sales")->fetch_assoc()["total"];
$remaining_milk = $total_collected - $total_sold;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST["customer_name"];
    $milk_sold = $_POST["milk_sold"];
    $date = date("Y-m-d");

    // Check if enough milk is in storage
    if ($milk_sold > $remaining_milk) {
        echo "<script>alert('The milk request is higher than the milk in storage!');</script>";
    } else {
        $sql = "INSERT INTO milk_sales (customer_name, milk_sold, sale_date) VALUES ('$customer_name', '$milk_sold', '$date')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Milk sale recorded successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Milk Sales</title>
    <style>
        form { width: 50%; margin: auto; padding: 20px; background: white; text-align: center; }
        input { padding: 10px; width: 80%; margin-bottom: 10px; }
        button { background: blue; color: white; padding: 10px 15px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <form method="post">
        <h2>Record Milk Sale</h2>
        <input type="text" name="customer_name" placeholder="Customer Name" required><br>
        <input type="number" name="milk_sold" placeholder="Milk Sold (Liters)" required><br>
        <button type="submit">Submit</button><br>
        <br><button><a href="inventory.php">View Inventory</a></button>
    </form>
</body>
</html>
