<?php
// Start the session
session_start();
if(!isset($_SESSION["login"])){
    $_SESSION["login"] = false;
    $_SESSION["name"] = "";
    $_SESSION["email"] = "";
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:locale" content="en" />
    <meta property="og:title" content="Easy buy" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="/" />
    <meta property="og:description" content="shopping system website" />
    <meta property="og:image:alt" content="logo" />
    <meta property="og:image" content="./assets/logo.png" />
    <meta property="og:image:width" content="200" />
    <meta property="og:image:height" content="200" />
    <meta property="business:contact_data:website" content="/" />
    <title>Easy buy</title>
    <link rel="shortcut icon" href="https://cdn.salla.sa/BRWxB/YVMBy9lP0o9KDUO1a3EB1eroktFymu52AQYBC8ZD.jpg" type="image/x-icon">
    <link type="stylesheet" href="./style/navBar.css"/>
    <link rel="stylesheet" href="./style/navBar.css">
    <link rel="stylesheet" href="./style/hero_sec.css">
    <link rel="stylesheet" href="./style/category_sec.css">
    <link rel="stylesheet" href="./style/photoes.css">
    <link rel="stylesheet" href="./style\footer.css">
    <link rel="stylesheet" href="./style/Phone.css">
    <link rel="stylesheet" href="./style/cards.css">
    <link rel="stylesheet" href="./style/cart.css">
    <link rel="stylesheet" type="text/CSS" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdn.assets.salla.network/prod/stores/css/plugins.8c9ef65e8b8c436f170dd1743b9f4014.css">
    <link rel="stylesheet" href="https://cdn.assets.salla.network/prod/stores/themes/theme_4/assets/css/main.css?v=">

    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
            </script>
            <script type="text/javascript">
            (function(){
                emailjs.init("Rm_cqiPKc0lxHeX-b");
            })();
        </script>
</head>
<body>
    <header>
        <nav>
            <a class="logo">
                <img style="border-radius: 50%;" src="https://cdn.salla.sa/BRWxB/YVMBy9lP0o9KDUO1a3EB1eroktFymu52AQYBC8ZD.jpg" alt="logo">
            </a>
            <form action="" method="get">
                <div class="Search">
                    <button>
                        <svg width="34" height="34" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#000000" d="M16.33 5.05A10.95 10.95 0 1 1 5.39 16A11 11 0 0 1 16.33 5.05m0-2.05a13 13 0 1 0 13 13a13 13 0 0 0-13-13Z" class="clr-i-outline clr-i-outline-path-1"/>
                            <path fill="#000000" d="m35 33.29l-7.37-7.42l-1.42 1.41l7.37 7.42A1 1 0 1 0 35 33.29Z" class="clr-i-outline clr-i-outline-path-2"/>
                            <path fill="none" d="M0 0h36v36H0z"/>
                        </svg>
                    </button>

                    <input type="text" placeholder="Search Products here" id="inp">
                </div>
            </form>

            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#product_section">Products</a></li>
                <li><a href="#CreativeSection">Contact</a></li>
            </ul>


            <ul id="icons-auth">
                <li>
                <div id = "login-name">
                    <?php
                    
                    if( $_SESSION["login"] ) {
                        echo 'Welcome!  '. $_SESSION["name"];
                        echo '<button id= "logout-btn" onclick="logout()">Logout</button>';

                    }
                    else {
                      echo '
                      <a href="login.php">
                      <svg width="40" height="40" viewBox="0 0 496 512" xmlns="http://www.w3.org/2000/svg">
                          <path fill="#000000" d="M248 8C111 8 0 119 0 256s111 248 248 248s248-111 248-248S385 8 248 8m0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88s-88-39.4-88-88s39.4-88 88-88m0 344c-58.7 0-111.3-26.6-146.5-68.2c18.8-35.4 55.6-59.8 98.5-59.8c2.4 0 4.8.4 7.1 1.1c13 4.2 26.6 6.9 40.9 6.9c14.3 0 28-2.7 40.9-6.9c2.3-.7 4.7-1.1 7.1-1.1c42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448"/>
                      </svg>
                      </a>';
                    }
                    ?>
                   </div>
                </li>

                <li>
                    <div id="CartIcon" style="position: relative;">
                        <div id="counter" style="position: absolute; right: 0; font-size: 1.3rem; top: -10px;"></div>
                        <svg width="40" height="40" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" d="M12.28 6H1.72a1 1 0 0 0-1 1.2l1.1 5.5a1 1 0 0 0 1 .8h8.36a1 1 0 0 0 1-.8l1.1-5.5a1 1 0 0 0-1-1.2M9 2.5L11 6M3 6l2-3.5"/>
                        </svg>
                    </div>
                </li>
<!-- 
                <li>
                    <a href="#">
                        <svg width="40" height="40" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#000000" d="M73.09 23.21h1.2c6.9.31 12.8 4.74 17.2 9.89c5.4 6.35 9.41 14.82 11.71 24.59c2.4 9.77 2.7 19.13.8 27.22c-.5 2.17-1.2 4.35-2.1 6.42c5.2.24 10.3 2.59 14.6 5.6c6.7 4.87 12.7 12.07 17.4 20.97c4.7 8.9 7.3 17.9 7.6 26.2c.1 5.8-1 11.9-4.5 16.6c6.6-1.7 13.5.4 19.1 3.8c7.2 4.2 13.7 10.9 19.2 19.4c5.4 8.4 8.8 17.2 9.7 25.4c.3 3 .3 6.1-.2 9.1c5-.8 10.3.3 15 2.1c7.6 3.1 15.1 8.7 21.8 16.3c6.6 7.5 11.3 15.6 13.4 23.7c1.1 4 1.6 8.4.9 12.6c5.6-3.2 12.5-4.8 20.1-4.8c7.7 0 14.5 1.6 20.2 4.8c-.7-4.1-.3-8.5.8-12.6c2.2-8.1 6.8-16.2 13.5-23.8c6.6-7.6 14.1-13.1 21.9-16.3c4.6-1.9 9.9-2.9 14.9-2.1c-.5-3-.5-6.1-.2-9c.9-8.3 4.2-17 9.7-25.5c5.5-8.5 12-15.1 19.2-19.4c5.6-3.3 12.4-5.5 18.8-3.8c-3.3-4.7-4.4-10.8-4.3-16.6c.2-8.3 2.8-17.3 7.5-26.1c4.7-9 10.7-16.1 17.5-20.94c4.2-3.09 9.3-5.46 14.6-5.7c-.9-2.04-1.6-4.18-2.1-6.32c-1.8-8.07-1.6-17.43.8-27.2c2.3-9.76 6.3-18.22 11.7-24.57c5.3-6.36 13.2-11.59 22.2-9.42s13.6 10.39 15.4 18.48c1.9 8.09 1.6 17.46-.7 27.23c-2.4 9.77-6.4 18.24-11.7 24.56c-4.5 5.29-10.5 9.78-17.6 9.98c1.2 3.5 1.7 7.4 1.5 11.1c-.1 8.3-2.7 17.2-7.4 26.2c-4.7 8.8-10.7 16-17.4 20.8c-5.8 4.2-13 7-20.1 5.2c3.7 5.1 4.5 11.8 3.9 18.1c-1 8.3-4.3 17-9.8 25.5c-5.4 8.5-12 15.1-19.1 19.4c-5.2 3-11.4 5.1-17.3 4.1c.5 3.9 0 7.9-1 11.7c-2.2 8-6.8 16.1-13.5 23.7c-6.6 7.6-14.1 13.1-21.9 16.3c-5 2-10.8 3.1-16.2 1.9c1.1 2.1 2 4.3 2.7 6.5c.7 2.1 1.3 4.2 1.8 6.3c-6.4.7-12.2 2.1-17.5 4.2c-.4-1.7-.8-3.4-1.3-4.9c-1.7-4.8-3.8-8.1-6.5-10.2c-2.8-2.1-6.5-3.6-13-3.6s-10.2 1.5-13 3.6c-2.7 2.1-4.8 5.4-6.5 10.2c-.5 1.5-.9 3.2-1.3 4.9c-5.3-2.1-11.1-3.5-17.5-4.2c.5-2.1 1.1-4.2 1.8-6.3c.7-2.2 1.6-4.4 2.6-6.4c-5.3 1.1-11.1 0-16.1-2c-7.7-3.1-15.2-8.7-21.9-16.2c-6.6-7.6-11.3-15.7-13.4-23.7c-1-3.8-1.5-7.9-1-11.7c-6 1-12.2-1.1-17.3-4.2c-7.2-4.2-13.7-10.9-19.2-19.4c-5.4-8.4-8.8-17.2-9.7-25.4c-.7-6.3.1-13 3.8-18.2c-7.1 1.9-14.3-1-20.1-5c-6.8-4.9-12.71-12.1-17.51-21c-4.7-8.9-7.3-17.8-7.5-26.2c0-3.7.4-7.6 1.7-11.2c-7.1-.2-13.2-4.66-17.6-9.87c-5.3-6.36-9.3-14.83-11.7-24.6c-2.3-9.77-2.6-19.13-.8-27.22c2-8.11 6.5-16.32 15.5-18.49c1.3-.31 2.5-.47 3.8-.51m-1.8 23.09c-.9 4.5-1 11.54.8 18.95c1.8 7.4 5 13.65 8 17.21c2.4 2.85 3.9 3.31 4.1 3.25c.3-.1 1.4-1.17 2.3-4.79c.9-4.51 1-11.54-.8-18.95s-5-13.65-7.9-17.22c-2.5-2.84-4-3.31-4.3-3.25c-.2.1-1.3 1.17-2.2 4.8m363.01-1.55c-3 3.55-6.2 9.8-8 17.21c-1.8 7.41-1.8 14.44-.7 18.96c.8 3.54 1.9 4.68 2.2 4.75c.3.1 1.8-.45 4.1-3.23c3-3.54 6.2-9.8 8-17.2c1.8-7.41 1.8-14.44.7-18.96c-.8-3.55-1.9-4.69-2.2-4.76c-.3-.1-1.8.45-4.1 3.23m-28.4 66.75c-3.8 2.7-8.4 8-12 14.7c-3.5 6.7-5.3 13.5-5.4 18.2c-.1 3.6.7 5 1 5.1c.2.2 1.8 0 4.8-2.1c3.8-2.7 8.4-7.9 12-14.7c3.5-6.7 5.3-13.5 5.4-18.1c.1-3.5-.7-5-.9-5.2c-.3-.1-1.9 0-4.9 2.1m-305.7 3.1c.2 4.6 1.9 11.5 5.4 18.2c3.6 6.7 8.3 12 12 14.7c3 2.2 4.6 2.3 5 2.3c.1-.2.9-1.5.9-5.4c-.2-4.6-1.9-11.4-5.5-18.2c-3.5-6.7-8.2-11.9-12-14.7c-3.1-2.2-4.6-2.2-4.9-2.1c-.2.1-1 1.5-.9 5.2m265 65.2c-4.1 2.4-9.1 7.2-13.3 13.6c-4.1 6.4-6.4 13.1-6.9 17.7c-.4 3.6.3 5 .6 5.2c.2.2 1.8.2 4.9-1.7c4-2.3 9.1-7.2 13.2-13.6c4.1-6.4 6.4-13 6.9-17.7c.5-3.6-.2-5-.4-5.2c-.3-.2-1.9-.1-5 1.7M141.8 178c-.2.4-.8 1.8-.4 5.4c.6 4.6 2.8 11.3 7 17.7c4.1 6.4 9.2 11.2 13.1 13.6c3.4 2 5 1.8 5.2 1.7c.1-.1.8-1.6.4-5.2c-.6-4.6-2.8-11.3-7-17.7c-4.1-6.4-9.2-11.2-13.2-13.6c-3.4-2-4.9-1.8-5.1-1.9m177.3 59.1c-4.4 1.7-10.1 5.7-15.1 11.4c-5.1 5.7-8.3 11.9-9.6 16.4c-.9 3.6-.5 5.1-.2 5.3c.2.2 1.8.4 5.1-.9c4.4-1.8 10.1-5.8 15.1-11.5c5.1-5.7 8.3-11.9 9.6-16.4c.9-3.5.5-5.1.3-5.3c-.3-.2-1.9-.4-5.2 1m-131 4.4c1.2 4.4 4.5 10.6 9.5 16.4c5.1 5.7 10.8 9.7 15.1 11.5c3.5 1.4 5 1.1 5.2.9c.2-.2.7-1.6-.3-5.3c-1.2-4.5-4.5-10.7-9.5-16.4c-5-5.7-10.8-9.7-15.1-11.5c-3.5-1.4-5-1.1-5.2-.9c-.2.2-.6 1.8.3 5.3M304 318.3c13 0 31.8 5.9 38.5 16c6.7 10.1 10.5 24.5 10.5 39c0 20-24.2 42.6-43.7 63.9c-17.1 18.9-37.4 36.4-53.3 51.6c-15.9-15.2-36.2-32.7-53.3-51.6c-19.5-21.3-43.7-43.9-43.7-63.9c0-14.5 3.8-28.9 10.5-39c6.7-10.1 25.5-16 38.5-16c14.5 0 21.6 2.8 29.6 9.4c9.8 8 17.4 33.1 18.4 33.1s8.6-25.1 18.4-33.1c8-6.6 15.1-9.4 29.6-9.4"/>
                        </svg>
                    </a>
                </li> -->
            </ul>
        </nav>
    </header>

    <div id="cart-modal">
                        
        <div class="shop-head">
            <span id="close-btn" >X</span>
            <h2> Shopping cart </h2> 
            <hr>
        </div>
            
        <div id="cart-items">
            <!-- ----------------------------------------------------------------------- -->
            <!--                                  Items                                  -->
            <!-- ----------------------------------------------------------------------- -->
        </div>

        <footer class="buy">
            <a id="buy" href="./buy.php">
                <span>  Buy Now </span>
                <strong id="total">   </strong>
            </a>
        </footer>
</div>

    <!-- ----------------------------------------------------------------------- -->
    <!--                              hero_Section                               -->
    <!-- ----------------------------------------------------------------------- -->

    
    
    <div class="hero">
        <div class="hero-banner">
            <h1>continue exploring</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae
                explicabo debitis est autem dicta.
            </p>
                <a href="#product_section" class="btn hero-btn " style="font-size: 2rem; border-radius: 10px; transition: 0.5s ease-in-out;">
                    Shop now
                </a>
            </div>
        </div>

        <section role="navigation" id="navigation-menu">
            <ul >
                <li class="nav-item" > 
                <a class="nav-link text-dark-emphasis " href="#" title=" Home page ">
                    Home
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-dark-emphasis " href="#product_section" title=" All Products ">
                    All Products
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-dark-emphasis " href="#" title=" Jewlleries ">
                    Jewlleries
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-dark-emphasis " href="#" title=" electronics ">
                    electronics
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-dark-emphasis " href="#" title=" clothes ">
                    clothes
                </a>
                </li>
                </ul>
            </section>
        
        
        
    <!-- ----------------------------------------------------------------------- -->
    <!--                               categories                                -->
    <!-- ----------------------------------------------------------------------- -->

    <section class="section">
        <div class="container">
        <div class="section-header mb-4">
        <h2 class="Pro_header"><span style="color: #FAFAFA; font-size: 2rem;">categories</span></h2>
        </div>
        <div class="row">
        <div class="col-sm-4 col-md-4">
        <div class="category-featured ">
        <a href="#product_section">
        <h3> Jewlleries </h3> <img class="cat-featured-img" src="./assets/moza.jpg" alt=" Jewlleries " />
        </a>
        </div>
        </div>
        <div class="col-sm-4 col-md-4">
        <div class="category-featured ">
        <a href="#product_section">
        <h3> electronics </h3> <img class="cat-featured-img" src="https://images.pexels.com/photos/8346914/pexels-photo-8346914.jpeg" alt="electronics" />
        </a>
        </div>
        </div>
        <div class="col-sm-4 col-md-4">
        <div class="category-featured ">
        <a href="#product_section">
        <h3> clothes </h3> <img class="cat-featured-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeSQYV1rXmPsqMNIRTOF9HxF6Ldn0p9qTdvw&usqp=CAU" alt="clothes" />
        </a>
        </div>
        </div>
        </div>
        </div>
        </section>
    <!-- ----------------------------------------------------------------------- -->
    <!--                                Products                                 -->
    <!-- ----------------------------------------------------------------------- -->

    <div class="Pro_header" id="product_section"> 
    <h2> Our products </h2>
    </div> 
    <section class="Seller">

        <div class="box">
    
            <section class="cards">


            </section>
        </div>
    </section>

<!-- -------------------------------------------------------------------------------------------------- -->


    <!-- ------------------------------------------------------------------------- -->
    <!--                              Sales_Section                                 -->
    <!-- ------------------------------------------------------------------------- -->
    
    <div class="photoes">
        <div class= "photoes-container">
            <div class="photoes-content">
                <div class="photoes-content-item">
                    <img src="./assets/photo_1.jpg" alt="sale-photo">
                </div>
                <div class="photoes-content-item">
                    <img src="./assets/photo_2.jpg" alt="sale-photo">
                </div>
            </div>
        </div>
    </div> 
    <!-- ----------------------------------------------------------------------------- -->
    <div class="icons">
        <div class= "icons-container">
            <div class="icons-content">
                <div class="icons-content-item">
                    <svg width="140" height="64" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none">
                            <path fill="#000000" d="M2 7V6a1 1 0 0 0-1 1zm11 0h1a1 1 0 0 0-1-1zm0 2V8a1 1 0 0 0-1 1zM2 8h11V6H2zm10-1v12h2V7zM3 17V7H1v10zm10-7h5V8h-5zm8 3v4h2v-4zm-7 6V9h-2v10zm4.707.707a1 1 0 0 1-1.414 0l-1.414 1.414a3 3 0 0 0 4.242 0zm-1.414-1.414a1 1 0 0 1 1.414 0l1.414-1.414a3 3 0 0 0-4.242 0zM6.707 19.707a1 1 0 0 1-1.414 0l-1.414 1.414a3 3 0 0 0 4.242 0zm-1.414-1.414a1 1 0 0 1 1.414 0l1.414-1.414a3 3 0 0 0-4.242 0zm13.414 0c.196.195.293.45.293.707h2c0-.766-.293-1.536-.879-2.121zM19 19a.994.994 0 0 1-.293.707l1.414 1.414A2.994 2.994 0 0 0 21 19zm-3-1h-3v2h3zm1.293 1.707A.994.994 0 0 1 17 19h-2c0 .766.293 1.536.879 2.121zM17 19a.99.99 0 0 1 .293-.707l-1.414-1.414A2.994 2.994 0 0 0 15 19zm-11.707.707A.994.994 0 0 1 5 19H3c0 .766.293 1.536.879 2.121zM5 19a.99.99 0 0 1 .293-.707l-1.414-1.414A2.994 2.994 0 0 0 3 19zm8-1H8v2h5zm-6.293.293c.196.195.293.45.293.707h2c0-.766-.293-1.536-.879-2.121zM7 19a.994.994 0 0 1-.293.707l1.414 1.414A2.994 2.994 0 0 0 9 19zm14-2a1 1 0 0 1-1 1v2a3 3 0 0 0 3-3zm-3-7a3 3 0 0 1 3 3h2a5 5 0 0 0-5-5zM1 17a3 3 0 0 0 3 3v-2a1 1 0 0 1-1-1z"/>
                            <path fill="#000000" d="M13 7H2v10a2 2 0 0 0 2 2a2 2 0 1 1 4 0h5V9z" opacity=".16"/>
                            <path stroke="#000000" stroke-linejoin="round" stroke-width="2" d="M3.5 4a1 1 0 0 1 1-1a3 3 0 0 1 3 3v1h-1a3 3 0 0 1-3-3zm8 0a1 1 0 0 0-1-1a3 3 0 0 0-3 3v1h1a3 3 0 0 0 3-3z"/>
                        </g>
                    </svg>
                    
                    <h3>Free Delivery</h3>
                    <p>Get Free delivery on all orders</p>
                </div>
                <div class="icons-content-item">
                    <svg width="140" height="64" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#24AE5F" fill-rule="evenodd" d="M23.25 79L0 67V32.656L51.75 7L75 19v34.5z" clip-rule="evenodd"/>
                        <path fill="#1E9450" fill-rule="evenodd" d="M0 64.554v2.983l23.193 11.932l51.622-25.356V51.13L23.193 76.486zm0-5.22v2.983l23.193 11.932l51.622-25.355V45.91L23.193 71.266zm0-10.441v2.983l23.193 11.932l51.622-25.355V35.47L23.193 60.825zm0 5.22v2.983l23.193 11.932l51.622-25.356v-2.983L23.193 66.046zm0-10.44v2.983l23.193 11.932l51.622-25.356V30.25L23.193 55.605zm23.251 1.462L0 33.084v3.013l23.251 12.05L75.003 22.54v-3.013zM0 38.453v2.983l23.251 11.932l51.752-25.356v-2.983L23.251 50.385z" clip-rule="evenodd"/>
                        <path fill="#24AE5F" fill-rule="evenodd" d="M48.133 91.884L24.998 79.951V50.647l51.495-25.355L100 37.299v29z" clip-rule="evenodd"/>
                        <path fill="#1E9450" fill-rule="evenodd" d="M25 77.085v2.983L48.25 92L100 66.644v-2.983L48.25 89.017zm0-5.22v2.983L48.25 86.78L100 61.424v-2.983L48.25 83.796zm0-10.441v2.983l23.25 11.932L100 50.983V48L48.25 73.356zm0 5.22v2.983L48.25 81.56L100 56.204v-2.983L48.25 78.576zm0-10.44v2.983l23.25 11.932L100 45.763V42.78L48.25 68.136zm23.25 6.367L25 50.64v2.983l23.25 11.932L100 40.199v-2.983z" clip-rule="evenodd"/>
                        <path d="M23.193 45.165L0 33.25v34.344L23.25 79.5zm25 17.435L25 50.685v29.292l23.25 11.906z" opacity=".1"/>
                        <path fill="#1E9450" fill-rule="evenodd" d="m59.996 50.609l-11.363 5.459l-9.702-5.22l13.138-6.436s-.912-2.62-.354-3.019c-.01.047-19.386 9.692-19.386 9.692l16.583 8.291l17.048-8.523s-1.669.055-3.148-.006c-1.502-.06-2.816-.238-2.816-.238m13.446-3.496L93.5 37.5l-16.299-8.849l-17.032 8.515c2.582-.133 4.697.978 4.697.978l12.126-5.94l10.448 5.221l-13.99 6.72z" clip-rule="evenodd"/>
                        <path fill="#1E9450" d="M64.235 46.958a5.58 5.58 0 0 0 1.99-.302l-3.529-1.87l-.3.078l-.384.123c-.523.157-1.059.302-1.61.433c-.551.131-1.111.213-1.68.246s-1.137-.001-1.702-.101a5.753 5.753 0 0 1-1.693-.597c-.574-.304-.973-.63-1.196-.977c-.223-.348-.306-.694-.25-1.04c.056-.346.236-.686.538-1.019a5.136 5.136 0 0 1 1.151-.924l-1.3-.689l.981-.52l1.3.689a11.139 11.139 0 0 1 1.734-.57a9.4 9.4 0 0 1 1.831-.255a8.713 8.713 0 0 1 1.887.137a7.553 7.553 0 0 1 1.886.612l-2.361 1.251a3.822 3.822 0 0 0-1.564-.389c-.581-.026-1.06.061-1.437.261l2.989 1.584l.509-.162l.559-.171c1.045-.315 1.956-.502 2.731-.562c.775-.058 1.449-.048 2.02.031c.571.08 1.056.205 1.455.374c.399.171.74.331 1.021.48c.248.131.499.329.754.594c.255.265.405.576.449.934c.045.358-.059.753-.309 1.184c-.251.431-.764.882-1.538 1.353l1.435.761l-.981.52l-1.435-.761c-1.332.61-2.69.918-4.075.924c-1.385.007-2.797-.313-4.237-.959l2.344-1.242a4.315 4.315 0 0 0 2.017.541m3.45-1.229c.143-.153.233-.311.27-.474a.693.693 0 0 0-.074-.489c-.086-.163-.264-.316-.535-.459a2.616 2.616 0 0 0-1.395-.308c-.491.028-1.154.167-1.988.418l3.242 1.718a2.6 2.6 0 0 0 .48-.406M57.08 42.391a.76.76 0 0 0-.22.394a.545.545 0 0 0 .098.413c.091.137.255.268.492.393c.372.197.775.288 1.21.272c.435-.016.981-.133 1.637-.349l-2.753-1.458a1.841 1.841 0 0 0-.464.335"/>
                        <path fill="#1E9450" fill-rule="evenodd" d="M34.583 32.609L23.22 38.068l-9.702-5.22l13.138-6.436s-.913-2.62-.354-3.019c-.01.047-19.386 9.692-19.386 9.692l16.583 8.291l17.048-8.523s-1.669.055-3.148-.006c-1.502-.06-2.816-.238-2.816-.238m13.446-3.496L68.087 19.5l-16.299-8.849l-17.032 8.515c2.582-.133 4.697.978 4.697.978l12.126-5.94l10.448 5.221l-13.989 6.72z" clip-rule="evenodd"/>
                        <path fill="#1E9450" d="M38.822 28.958a5.558 5.558 0 0 0 1.99-.302l-3.53-1.87l-.3.078l-.384.123a28.85 28.85 0 0 1-1.61.433c-.551.131-1.111.213-1.68.246s-1.136-.001-1.702-.101a5.753 5.753 0 0 1-1.693-.597c-.574-.304-.973-.63-1.196-.977c-.223-.348-.306-.694-.25-1.04c.057-.346.236-.685.538-1.018a5.136 5.136 0 0 1 1.151-.924l-1.3-.689l.981-.52l1.3.689a11.139 11.139 0 0 1 1.734-.57a9.4 9.4 0 0 1 1.831-.255a8.713 8.713 0 0 1 1.887.137a7.553 7.553 0 0 1 1.886.612l-2.361 1.251a3.822 3.822 0 0 0-1.564-.389c-.581-.026-1.06.061-1.437.261l2.989 1.584l.509-.163l.559-.171c1.045-.315 1.956-.502 2.731-.562c.775-.059 1.449-.048 2.02.031c.571.08 1.056.205 1.455.375c.399.171.74.331 1.021.48c.248.131.499.329.754.594c.255.265.405.576.449.934c.045.358-.059.753-.309 1.184c-.251.431-.764.882-1.538 1.353l1.435.761l-.981.52l-1.435-.761c-1.332.61-2.69.918-4.075.924c-1.385.007-2.797-.313-4.237-.959l2.344-1.242c.63.345 1.303.525 2.018.54m3.45-1.229c.143-.153.233-.311.269-.474a.693.693 0 0 0-.074-.489c-.086-.163-.264-.316-.535-.46a2.616 2.616 0 0 0-1.395-.308l-1.988.419l3.242 1.718c.178-.117.338-.252.481-.406m-10.605-3.338a.76.76 0 0 0-.22.394a.545.545 0 0 0 .098.413c.092.137.255.268.492.393c.372.197.775.288 1.211.272c.435-.016.981-.133 1.637-.349l-2.753-1.458a1.83 1.83 0 0 0-.465.335"/>
                    </svg>                  
                    <h3>100% Money Back</h3>
                    <p>Good items</p>
                </div>
                <div class="icons-content-item">
                    <svg width="140" height="64" viewBox="0 0 117 104" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#26B99A" d="M50 4c27.614 0 50 22.386 50 50c0 27.613-22.386 50-50 50S0 81.613 0 54C0 26.386 22.386 4 50 4"/>
                        <path fill="#fff" d="M81.309 43.339L45.441 79.208a1.876 1.876 0 0 1-2.651 0L22.504 58.71c-.362-.366-.556-1.374-.556-1.859c0-.484.194-.947.556-1.315l5.404-4.871a1.835 1.835 0 0 1 1.338-.55a1.85 1.85 0 0 1 1.313.55L42.79 63.143c.728.743 1.92.743 2.651 0l27.918-27.835a1.86 1.86 0 0 1 2.647 0l5.302 5.354c.732.734.732 1.942.001 2.677"/>
                        <circle cx="84.625" cy="33" r="26" opacity=".15"/>
                        <path fill="#26B99A" d="M87.999 56.5C72.836 56.5 60.5 44.163 60.5 29S72.836 1.5 87.999 1.5C103.163 1.5 115.5 13.836 115.5 29c0 15.163-12.337 27.5-27.501 27.5"/>
                        <path fill="#ECF0F1" d="M87.999 3C102.336 3 114 14.663 114 29s-11.664 26-26.001 26C73.663 55 62 43.336 62 29S73.663 3 87.999 3m0-3C71.984 0 59 12.984 59 29c0 16.017 12.984 29 28.999 29C104.016 58 117 45.016 117 29S104.016 0 87.999 0"/>
                        <defs>
                            <path id="flatUiRetina0" d="M114 29c0 14.359-11.64 26-25.998 26C73.64 55 62 43.359 62 29S73.64 3 88.002 3C102.36 3 114 14.64 114 29"/>
                        </defs>
                        <clipPath id="flatUiRetina1">
                            <use href="#flatUiRetina0"/>
                        </clipPath>
                        <path fill="#fff" d="m107.314 30.594l-81.091 81.092c-1.653 1.654-4.349 1.654-5.994 0L8.242 99.589c-1.644-1.674-4.348-4.391-5.993-6.063l-27.885-29.303a4.454 4.454 0 0 1-1.257-3.082c0-1.094.439-2.141 1.257-2.974l12.218-11.01a4.151 4.151 0 0 1 3.025-1.246a4.18 4.18 0 0 1 2.969 1.246L20.229 75.37a4.19 4.19 0 0 0 5.994 0l63.121-62.932a4.207 4.207 0 0 1 5.984 0l11.986 12.102c1.655 1.661 1.655 4.393 0 6.054" clip-path="url(#flatUiRetina1)"/>
                    </svg>
                    <h3>24/7 Support</h3>
                    <p>Any time we will servie u</p>
                </div>
            </div>
        </div>
    </div> 
    <!-- ----------------------------------------------------------------------- -->
    <!--                              Phone section                              -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="container-fluid" id="CreativeSection">
        <div class="CreativeSectionEdge"></div>

        <div class="row justify-content-center align-content-center">
            <div class="col-md-10">

                <div class="CreativeSection">
                    <div class="CreativeFormProduction">
                        <div class="CreativeFormProductionInner">
                            <div class="CreativeFormProductionInnerContent">
                                                                
                                <h1 data-aos="fade-right" data-aos-duration="1500">
                                                                            Showcase Your <u> Ide<i class="fas fa-lightbulb" aria-hidden="true"></i>s</u>
                                                                    </h1>

                                                                    <p data-aos="fade-up" data-aos-duration="1500">
                                                                        Here at Easy Buy we offer a wide variety of products from day to day groceries to clothes and electronics suitable for all needs. 

                                        <br>
                                        <br>
                                        
                                    </p>
                                                            </div>
                        </div>
                    </div>


    <div class="CreativeFormGH">
        <div class="CreativeFormGHInner" data-aos="flip-right" data-aos-duration="1000">

            <form id="form">
                <input type="hidden">
                <div class="CreativeFormBanner">
                    <img src="https://gifdb.com/images/high/purple-smoke-background-s35bm2ip617fb06x.gif" alt="photo">


                </div>
                <div class="CreativeFormRow">
                    <label for="name"> Full Name </label>
                    
                    <div class="CreativeFormRowInputHolder">
                    <input name="name" type="text" placeholder="type your name here" required id="name">
                    </div>
                </div>
                <div class="CreativeFormRow">
                    <label for="email"> Email </label>
                    <div class="CreativeFormRowInputHolder">
                        <input name="email" type="email" placeholder="type your mail here" required id="email">
                        <g>
                            <i class="fas fa-envelope"></i>
                        </g>
                    </div>
                </div>
                
                <div class="CreativeFormRow">
                    <label for="mobileNumber"> Mobile Number </label>
                    <div class="CreativeFormRowInputHolder">
                        <input name="mobileNumber" type="number" placeholder="type your mobile number here" required id="mobile">
                        <g>
                            <i class="fas fa-mobile"></i>
                        </g>
                        <select name="country_key">
                            <option value="962"> +JOD</option>
                            <option value="966"> +KSA</option>
                            <option value="971"> +UAE</option>
                            <option value="974"> +QAT</option>
                        </select>
                    </div>
                </div>
                <div class="CreativeFormRow">
                    <label for="description"> Describe your Idea/Work </label>
                    <textarea name="description" placeholder="Describe your idea here ..."
                                required id="idea"></textarea>
                    

                </div>

                <button class="SendIdeaSubmit" type="submit" onclick="sendMail()">
                    <i class="fas fa-paper-plane"></i>
                    Send My Idea
                </button>
            </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>


    <script>
        function sendMail() {
            var params = {
                from_name: document.getElementById("name").value,
                email: document.getElementById("email").value,
                mobile: document.getElementById("mobile").value
            }

            const serviceID = "service_g04vyx7";
            const templateID = "template_ypntfkm";
            emailjs.send(serviceID, templateID, params)
                .then((res) => {
                document.getElementById("name").value="",
                document.getElementById("email").value="",
                document.getElementById("mobile").value="",
                console.log(res),
                alert('Email sent successfully')
            }).catch((err) => console.log(err));
        }
    </script>
    <!-- ----------------------------------------------------------------------- -->
    <!--                                 banner                                  -->
    <!-- ----------------------------------------------------------------------- -->

    <hr id="hr"/>
    
    <!-- ----------------------------------------------------------------------- -->
    <!--                                 Footer                                  -->
    <!-- ----------------------------------------------------------------------- -->
    <footer class="footer">
        <div class="cont">
            <div class="row">
                <div class="footer-col">
                    <h4>Policy INFO</h4>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Warranty Policy</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>About US</h4>
                    <ul>
                        <li><a href="#">About US</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Contact US </a></li>
                    </ul>
            </div>
            <div class="footer-col">
                    <h4>Get Help</h4>
                    <ul>
                        <li><a href="#">Help!</a></li>
                        <li><a href="#">Order Statues</a></li>
                        <li><a href="#">Payment Options</a></li>
                    </ul>
        </div>
            <div class="footer-col">
                    <h4>Follow US</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>	   
        </footer>

        <!-- ----------------------------------------------------------------------- -->
        <!--                                whatsapp                                 -->
        <!-- ----------------------------------------------------------------------- -->

        <div id="whatsapp" title="whatsapp"></div>

        
        <script defer src="./Frontend/JS/app.js"></script>
        <script defer src="./Frontend/JS/show.js"></script>
        <script src="Frontend/JS/jquery.min.js"></script>
       <script>
        function logout() {
          $.ajax({
             type: "POST",
             url: "logout-control.php",
             data: "", 
             success: function(res) {
                location.reload();

              //  $(location).prop('href', 'http://localhost/index.php')
              }
          });
        }
      </script>
    </body>
</html>