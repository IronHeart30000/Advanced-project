<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$return_arr = array();

$sql = "SELECT  id,title,price,quantity FROM products ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    $row_array['id'] = $row['id'];
    $row_array['title'] = $row['title'];
    $row_array['image'] = $row['title'].".png";
    $row_array['price'] = $row['price'];
    $row_array['quantity'] = $row['quantity'];

    array_push($return_arr,$row_array);
    }

    echo json_encode($return_arr);

}


$conn->close();

?>
