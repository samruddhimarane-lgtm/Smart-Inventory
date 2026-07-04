<!DOCTYPE html>
<html>
<head>
    <title>View Products</title>
    <style>
        body {
            text-align: center;
            background-color: #f2f2f2;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            width: 60%;
            background-color: #c3fad4ff;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #c3fad4ff;
        }
    </style>
</head>
<body>

<h2>Product Stock List</h2>

<?php
$conn = new mysqli("localhost", "root", "", "smart_inventory");

if ($conn->connect_error) {
    die("Connection failed");
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Quantity</th><th>Price</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['quantity']."</td>";
        echo "<td>".$row['price']."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No products found";
}

$conn->close();
?>

</body>
</html>