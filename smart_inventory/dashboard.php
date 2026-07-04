<?php
$conn = new mysqli("localhost", "root", "", "smart_inventory");

$totalProducts = $conn->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'];
$totalStock = $conn->query("SELECT SUM(quantity) AS total FROM products")->fetch_assoc()['total'];
$lowStock = $conn->query("SELECT COUNT(*) AS low FROM products WHERE quantity < 5")->fetch_assoc()['low'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            text-align: center;
            margin-top: 50px;
            background-color: #f2f2f2;
            color: #333333;
        }
        .box {
            display: inline-block;
            border: 1px solid black;
            padding: 20px;
            margin: 10px;
            width: 200px;
            background-color: #d5dee0ff;
        }
        a {
            display: block;
            margin: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<h2>Smart Inventory Dashboard</h2>

<div class="box">
    <h3>Total Products</h3>
    <p><?php echo $totalProducts; ?></p>
</div>

<div class="box">
    <h3>Total Stock</h3>
    <p><?php echo $totalStock; ?></p>
</div>

<div class="box">
    <h3>Low Stock Items</h3>
    <p><?php echo $lowStock; ?></p>
</div>

<br><br>

<a href="add_product.html">Add Product</a>
<a href="view_product.php">View Products</a>
<a href="update_stock.php">Update Stock</a>
<a href="view_logs.php">Stock History</a>
<a href="login.html">Logout</a>

</body>
</html>