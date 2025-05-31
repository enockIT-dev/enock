<?php
include("database.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM milk_sales WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php?message=Customer deleted successfully");
        exit();
    } else {
        echo "Error deleting customer: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "Invalid request.";
}
?>