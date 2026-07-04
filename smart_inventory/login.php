<?php
$conn = new mysqli("localhost", "root", "", "smart_inventory");

if ($conn->connect_error) {
    die("Connection failed");
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users 
        WHERE username='$username' AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    header("Location: dashboard.php");
} else {
    echo "Invalid username or password";
}

$conn->close();
?>