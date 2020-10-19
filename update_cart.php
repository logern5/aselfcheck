<?php
//Probably also useless, integrated into add_item
$item_id = 0;
$item_id = $_POST["id"];
($SESSION["items"])[] = intval($item_id);
?>
