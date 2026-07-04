<!DOCTYPE html>
<html>
<head>
    <title>Stock Logs</title>
    <style>
        body { text-align: center;
                background-color: #f2f2f2;
             }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 70%;
            background-color: #c3fad4ff;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>

<h2>Stock History</h2>

<?php
$conn = new mysqli("localhost", "root", "", "smart_inventory");

$result = $conn->query("SELECT * FROM stock_logs");

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Product ID</th><th>Action</th><th>Quantity</th><th>Date</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['product_id']."</td>";
        echo "<td>".$row['action']."</td>";
        echo "<td>".$row['quantity']."</td>";
        echo "<td>".$row['log_date']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No logs found";
}

$conn->close();
?>

</body>
</html>