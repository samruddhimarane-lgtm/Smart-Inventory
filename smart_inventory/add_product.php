<?php
$conn=new mysqli("localhost","root","","smart_inventory");
if($conn->connect_error)
{
    die("Connection failed");
}
$name=$_POST['name'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$sql="INSERT INTO products (name,quantity,price) VALUES ('$name',$quantity,$price)";
if($conn->query($sql)){
    echo "Product added successfully.";
}else{
    echo"error";
}
$conn->close();
?>