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
$conn->close();
echo $row["price"];
/* TODO:
CREATE TABLE products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
price INT(6) NOT NULL,
reg_date TIMESTAMP
)
*/
echo "success";
?>
