<?php
include("database.php");

$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

$total_collected = $conn->query("SELECT SUM(milk_quantity) AS total FROM milk_collection")->fetch_assoc()["total"];
$total_sold = $conn->query("SELECT SUM(milk_sold) AS total FROM milk_sales")->fetch_assoc()["total"];
$remaining = $total_collected - $total_sold;

$farmers_sql = "SELECT id, farmer_name, milk_quantity, collection_date FROM milk_collection";
if (!empty($search)) {
    $farmers_sql .= " WHERE farmer_name LIKE '%$search%'";
}
$farmers_sql .= " ORDER BY collection_date ASC";
$farmers_result = $conn->query($farmers_sql);

$customers_sql = "SELECT id, customer_name, milk_sold, sale_date FROM milk_sales";
if (!empty($search)) {
    $customers_sql .= " WHERE customer_name LIKE '%$search%'";
}
$customers_sql .= " ORDER BY sale_date ASC";
$customers_result = $conn->query($customers_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk Inventory Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 50px auto;
            max-width: 900px;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .card {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            font-size: 20px;
        }
        .card-alt {
            background-color: #FF9800;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #2196F3;
            color: white;
        }
        .search-bar {
            margin: 20px 0;
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .search-bar input {
            padding: 10px;
            width: 60%;
            max-width: 400px;
        }
        .search-bar button, .search-bar a {
            padding: 10px 20px;
            text-decoration: none;
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .search-bar a {
            display: inline-block;
        }
        .action-btn {
            margin: 0 5px;
            padding: 6px 12px;
            border: none;
            cursor: pointer;
            color: white;
            border-radius: 4px;
            text-decoration: none;
        }
        .update-btn {
            background-color: #4CAF50;
        }
        .delete-btn {
            background-color: #f44336;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Milk Inventory Dashboard</h2>

    <div class="search-bar">
        <form method="get" style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;">
            <input type="text" name="search" placeholder="Search farmers or customers..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
            <a href="dashboard.php">Clear</a>
        </form>
    </div>

    <div class="card">
        <p><strong>Total Milk Collected:</strong> <?= $total_collected ?> Liters</p>
    </div>

    <div class="card card-alt">
        <p><strong>Total Milk Sold:</strong> <?= $total_sold ?> Liters</p>
    </div>

    <div class="card" style="background-color: #2196F3;">
        <p><strong>Remaining Milk:</strong> <?= $remaining ?> Liters</p>
    </div>

    <h3>Milk Collection - Farmers</h3>
    <table>
        <tr>
            <th>Farmer Name</th>
            <th>Milk Collected (Liters)</th>
            <th>Collection Date</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $farmers_result->fetch_assoc()) { ?>
            <tr>
                <td><?= htmlspecialchars($row['farmer_name']); ?></td>
                <td><?= $row['milk_quantity']; ?> Liters</td>
                <td><?= $row['collection_date']; ?></td>
                <td>
                    <a href="update_farmer.php?id=<?= $row['id']; ?>" class="action-btn update-btn">Update</a>
                    <a href="delete_farmer.php?id=<?= $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this farmer?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <h3>Milk Sales - Customers</h3>
    <table>
        <tr>
            <th>Customer Name</th>
            <th>Milk Sold (Liters)</th>
            <th>Sale Date</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $customers_result->fetch_assoc()) { ?>
            <tr>
                <td><?= htmlspecialchars($row['customer_name']); ?></td>
                <td><?= $row['milk_sold']; ?> Liters</td>
                <td><?= $row['sale_date']; ?></td>
                <td>
                    <a href="update_customer.php?id=<?= $row['id']; ?>" class="action-btn update-btn">Update</a>
                    <a href="delete_customer.php?id=<?= $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this customer?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>