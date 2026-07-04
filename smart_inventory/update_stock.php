<!DOCTYPE html>
<html>
<head>
    <title>Update Stock</title>
    <style>
        body {
            text-align: center;
            margin-top: 80px;
            background-color: #f2f2f2;
        }
        form {
            display: inline-block;
            border: 1px solid black;
            padding: 60px;
            background-color: #40E0D0;
            font-size: 25px;
        }
        input[type="submit"]{
            font-size: 20px;
        }
    </style>
</head>
<body>

<h1>Update Stock</h1>

<form method="post">
    Product ID:<br>
    <input type="number" name="product_id" required><br><br>

    Quantity:<br>
    <input type="number" name="quantity" required><br><br>

    Action:<br>
    <select name="action" required>
        <option value="in">Stock In</option>
        <option value="out">Stock Out</option>
    </select><br><br>

    <input type="submit" value="Update Stock">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "smart_inventory");
    if ($conn->connect_error) {
        die("Connection failed");
    }

    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $action = $_POST['action'];

     if ($action == "in") {
     $sql = "UPDATE products SET quantity = quantity + $quantity WHERE id = $product_id";
     } else {
     $sql = "UPDATE products SET quantity = quantity - $quantity WHERE id = $product_id";
    }

if ($conn->query($sql)) {
    $log = "INSERT INTO stock_logs (product_id, action, quantity)
            VALUES ($product_id, '$action', $quantity)";
    $conn->query($log);
    echo "<br>Stock updated successfully";
} else {
    echo "<br>Error updating stock";
}


    $conn->close();
}
?>

</body>
</html>