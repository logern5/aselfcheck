<?php
$item = $_POST["item_code"];
$handle = fopen("creds.txt","r");
$user = fgets($handle);
$pass = fgets($handle);
fclose($handle);
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$conn->close();
?>
