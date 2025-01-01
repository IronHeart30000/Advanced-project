<?php 
session_start();
$_SESSION["login"] = false;
$_SESSION["name"] = "";
$_SESSION["email"] = "";


$name =  $_POST['username'];
$pass =  $_POST['password'];


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


$sql = "SELECT  name,email FROM users WHERE name='$name'  and password = '$pass' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();

  $_SESSION["login"] = true;
  $_SESSION["name"] =  $row["name"];
  $_SESSION["email"] =  $row["email"];

echo true;
} else {
  echo false;
}
$conn->close();

?>
