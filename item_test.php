<?php
session_start();
echo "hello\n";
echo var_dump($_SESSION["items"]);
?>
