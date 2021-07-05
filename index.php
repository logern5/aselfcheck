<?php
session_start();
$_SESSION["items"] = [0];
$_SESSION["total"] = 0;
?>

<!DOCTYPE html>
<html class="w3-light-gray">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width" />
  <title>SelfCheck</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
  <link rel="stylesheet" href="main.css" />
</head>
<body>
  <h1>aselfcheck</h1>
  <div class="w3-container">
    <a class="w3-button w3-green w3-padding w3-display-middle cout" href="/scheck.html">Check Out</a>
  </div>
</body>
</html>
