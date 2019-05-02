<?php
$item = $_POST["item_code"];
$item = (int) 1; /*TODO: remove*/
$handle = fopen("creds.txt","r");
$user = rtrim(fgets($handle));
$pass = rtrim(fgets($handle));
fclose($handle);
$conn = new mysqli("localhost", $user, $pass, "scheck");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
if($stmt == false){
    die("$stmt == false");
}
$stmt->bind_param("i",$item);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array();
$num = $result->num_rows;
if($num != 1){
    die("Rows != 1");
}
echo $row["price"];
$conn->close();
?>
