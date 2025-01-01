<?php 
session_start();
$_SESSION["login"] = false;
$_SESSION["name"] = "";
$_SESSION["email"] = "";


$name =  $_POST['username'];
$pass =  $_POST['password'];
$email =  $_POST['email'];
$address =  $_POST['address'];
$phone =  $_POST['phone'];


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


// check if user found
$user_found = false;

$sql = "SELECT  name,email FROM users WHERE email='$email'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
    $user_found = true;


if(!$user_found){
    $sql = "INSERT INTO  users (name,password,email,address,phone) VALUES ('$name', '$pass' , '$email' , '$address' ,'$phone'  )";
    $conn->query($sql);
    
  $_SESSION["login"] = true;
  $_SESSION["name"] = $name;
  $_SESSION["email"] =  $email;

    echo true;
}
else {
    echo false;
}

$conn->close();

?>
