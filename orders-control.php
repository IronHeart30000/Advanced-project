<?php
// Start the session
session_start();
if(!isset($_SESSION["login"])){
    $_SESSION["login"] = false;
    $_SESSION["name"] = "";
    $_SESSION["email"] = "";
    header('Location: http://localhost');
} 

if( $_SESSION["login"] == false) {
    header('Location: http://localhost');
}


$address =  $_POST['address'];
$phone =  $_POST['phone'];
$payment_online =  $_POST['payment_online'];
$payment_cash =  $_POST['payment_cash'];
$cart =  $_POST['cart'];

$payment = "online";
if($payment_cash == "true")
    $payment = "cash";


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

$email = $_SESSION["email"];

$sql = "INSERT INTO  orders (address,email,phone,paymentMethod) VALUES ('$address', '$email' , '$phone','$payment')";
$conn->query($sql);

$last_id = mysqli_insert_id($conn);

$arr = json_decode($cart, true);

for($i=0 ; $i<count($arr) ; $i++) {

    $product_id = $arr[$i]['id'];
    $product_name = $arr[$i]['title'];
    $product_price = $arr[$i]['price'];
    $product_quantity = $arr[$i]['quantity'];
    
    $sql = "INSERT INTO  orderdetails (email,orderID,productID,productName,price,quantity) VALUES ('$email', '$last_id' , '$product_id','$product_name','$product_price','$product_quantity')";
    $conn->query($sql);

}

$conn->close();

?>
