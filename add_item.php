<?php
session_start();
$item_code = $_POST["id"];

/* Connect to DB and get price of item */
$conn = new mysqli("127.0.0.1:3306", "root", "password", "aselfcheck");
if ($conn -> connect_errno){
	die("Could not connect to MySQL DB: " . $conn->connect_error);
}

$query = "SELECT product_price,product_name FROM products WHERE product_id = " . (string)((int)$item_code) . ";";
$result = $conn->query($query);
$assoc = $result->fetch_assoc();

/* If item exists, add to internal list of purchased items */
if(!empty($assoc)){
	($_SESSION["items"])[] = intval($item_code);
	$_SESSION["total"] += $assoc["product_price"];
}

echo json_encode($assoc);
?>
