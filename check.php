<?php
session_start();
header("Location: thankyou.html");
//Process the final transaction
$card = $_POST["card"];
$total = $_SESSION["total"];
$items = $_SESSION["items"];
var_dump($items);
echo("Total" . $total);

//Initialize mysql connection
$conn = new mysqli("127.0.0.1:3306", "root", "password", "aselfcheck");
if ($conn -> connect_errno){
        die("Could not connect to MySQL DB: " . $conn->connect_error);
}

//Insert credit card info and get the auto incremented ID
$query = "INSERT INTO cards_info (card_number) VALUES (" . $conn->real_escape_string($card) .  ");";
$result = $conn->query($query);
if($result !== TRUE){
	die("MySQL Error: " . $conn->error);
}
$card_id = $conn->insert_id;

//Insert transaction info
$query = "INSERT INTO transactions (transaction_price, transaction_date, cards_info_card_id) VALUES ";
$query .= "(" . $total . ",CURRENT_DATE()," . $card_id . ");";
$result = $conn->query($query);
if($result !== TRUE){
   die("MySQL Error: " . $conn->error);
}

//Insert into transaction-product joining table
foreach($items as $item_id){
	if($item_id == 0){
		continue;
	}
	echo("Item_id: " . $item_id);
	$query = "INSERT INTO transactions_products (products_product_id, cards_info_card_id) VALUES (" . $item_id . "," . $card_id . ");";
	$result = $conn->query($query);
	if($result !== TRUE){
		die("MySQL Error: " . $conn->error);
	}
}

echo("Finished\n");
?>
