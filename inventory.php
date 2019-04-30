<?php
$item = $_POST["item_code"];
$handle = fopen("creds.txt","r");
$user = fgets($handle);
$pass = fgets($handle);
fclose($handle);
$conn = new mysqli($servername, $username, $password);
?>
