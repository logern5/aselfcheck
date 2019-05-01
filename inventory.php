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
$stmt = "SELECT * FROM products WHERE id=?;";
$stmt->bind_param("i",$item);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array();
$num = $result->num_rows();
if($rows != 1){
    die("Rows != 1);
}
echo $row["price"];
echo "success";
$conn->close();
?>
