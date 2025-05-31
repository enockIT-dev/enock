<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $farmer_name = $_POST["farmer_name"];
    $milk_quantity = $_POST["milk_quantity"];
    $date = date("Y-m-d");

    $sql = "INSERT INTO milk_collection (farmer_name, milk_quantity, collection_date) VALUES ('$farmer_name', '$milk_quantity', '$date')";
    if ($conn->query($sql) === TRUE) {
        echo "Milk collection recorded successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
    <head> <title>Milk Collection</title>
    <style>
        form { width: 50%; margin: auto; padding: 20px; background: white; text-align: center; }
        input { padding: 10px; width: 80%; margin-bottom: 10px; }
        a{background-color: black;}
        button { background: green; color: white; padding: 10px 15px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <form method="post">
        <h2>Record Milk Collection</h2>
        <input type="text" name="farmer_name" placeholder="Farmer Name" required><br>
        <input type="number" name="milk_quantity" placeholder="Milk Quantity (Liters)" required><br>
        <button type="submit">Submit</button><br><br>
       <a href="inventory.php">View Inventory</a>
    </form>
</body>
</html>

</html>