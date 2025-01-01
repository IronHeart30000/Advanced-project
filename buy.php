<?php
// Start the session
session_start();
if(!isset($_SESSION["login"])){
    $_SESSION["login"] = false;
    $_SESSION["name"] = "";
    $_SESSION["email"] = "";
    header('Location: '."index.php");
} 
else{
    if( $_SESSION["login"] == false ) 
        header('Location: '."index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment method</title>
    <link rel="stylesheet" href="./style/buy.css">
    <link rel="shortcut icon" href="https://cdn.salla.sa/BRWxB/YVMBy9lP0o9KDUO1a3EB1eroktFymu52AQYBC8ZD.jpg" type="image/x-icon">
</head>
<body>
    <header>
        <nav>
            <a class="logo" href="./index.html">
                <img style="border-radius: 50%;" src="https://cdn.salla.sa/BRWxB/YVMBy9lP0o9KDUO1a3EB1eroktFymu52AQYBC8ZD.jpg" alt="logo">
            </a>
        </nav>
    </header>

    <section class="sec">
        <h1 id="head">
            Your Cart
        </h1>
    </section>

    <section class="sec_2">

        <div class="product">
            <img src="./assets/Classic Watch.png" alt="product">
           
            <div class="title"></div>
            <div class="quantity">3</div>
            <div class="price">150$</div>
        </div>
    </section>

    <section class="sec_3">
        <div>
            <h3>order total</h3>
            <hr>
            <div class="cont">
                <i>total quantity</i>
                <span id="total-Quant">3</span>
            </div>
            <hr>
            <div class="cont">
                <i>total price</i>
                <span id="total_price">30$</span>
            </div>
        </div>
        <hr>

        <div class="cont-btn">
            <a href="./Form.php">
                <button id="btn-1">purchase</button>
            </a>
            <a href="./index.php">
                <button id="btn-2">Back to home page</button>
            </a>
        </div>
    </section>

    <script defer src="./Frontend/JS/buy.js"></script>
</body>
</html>