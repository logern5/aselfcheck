<?php
$item_code = $_GET["id"];
$conn = new mysqli("127.0.0.1:3306", "root", "password", "aselfcheck");
if ($conn -> connect_errno){
	die("Could not connect to MySQL DB: " . $conn->connect_error);
}

$query = "SELECT product_price,product_name FROM products WHERE product_id = " . (string)((int)$item_code) . ";";
$result = $conn->query($query);
$assoc = $result->fetch_assoc();

echo json_encode($assoc);
?>
