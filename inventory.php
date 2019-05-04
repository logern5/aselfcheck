<?php
//echo var_dump($_POST);
$item = $_POST["item_code"];
//$item = (int) 1; /*TODO: remove*/
$handle = fopen("creds.txt","r");
$user = rtrim(fgets($handle));
$pass = rtrim(fgets($handle));
fclose($handle);
$conn = new mysqli("localhost", $user, $pass, "scheck");
if ($conn->connect_error) {
    die("Error Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
if($stmt == false){
    die("Error stmt == false");
}
$stmt->bind_param("i",$item);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array();
$num = $result->num_rows;
if($num != 1){
    die("Error Rows != 1");
}
echo $row["name"] . ";" . $row["price"];
$conn->close();
?>
