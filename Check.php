<?php
$card = $_POST["card"];
$total = $_COOKIE["total"];
// Add actual payment system here
header("Location: " . "/index.html");
die();
?>