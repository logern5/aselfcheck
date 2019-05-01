<?php
$item = $_POST["item_code"];
$handle = fopen("creds.txt","r");
$user = rtrim(fgets($handle));
$pass = rtrim(fgets($handle));
fclose($handle);
$conn = new mysqli("localhost", $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->close();
echo "success";
?>
