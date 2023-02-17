<?php
    session_start();
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On your feet | Home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="images/icon.png">

</head>
<body>

<!-- header section starts  -->

<header class="header header-scrolled">

    <a href="index.html" class="logo">
        <img src="images/mini-logo.png" alt="Logo">
    </a>

    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="about.php">about</a>
        <a href="product.php">product</a>
        <a href="contact.php">contact</a>
    </nav>

    <div class="icons">
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <div class="fa-solid fa-user" id="user-btn" onclick='<?php if (isset($_SESSION["user_id"])) { echo 'window.location.href="logout.php"'; } else { echo 'window.location.href="tos.html"'; } ?>'>
        <?php
            if (isset($_SESSION["user_id"])) {
                echo $_SESSION["username"];
            } else {
                echo "login";
            }
        ?>
    </div>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <div class="cart-items-container">
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-1.png" alt="">
            <div class="content">
                <h3>cart item 01</h3>
                <div class="price">Php 150/-</div>
            </div>
        </div>
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-2.png" alt="">
            <div class="content">
                <h3>cart item 02</h3>
                <div class="price">Php 150/-</div>
            </div>
        </div>
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-3.png" alt="">
            <div class="content">
                <h3>cart item 03</h3>
                <div class="price">Php 180/-</div>
            </div>
        </div>
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-4.png" alt="">
            <div class="content">
                <h3>cart item 04</h3>
                <div class="price">Php 180/-</div>
            </div>
        </div>
        <a href="#" class="btn">checkout now</a>
    </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <img src="images/mini-logo.png" alt="mini logo">
        <h3>On your feet</h3>
        <p><q>I still have my feet on the ground</q></p>
        <a class="btn" href="product.php">get yours now!</a>
    </div>

</section>

<!-- home section ends -->

<!-- footer section starts  -->

<footer class="footer">

    <div class="credit">
        <div class="wrap">
            <p>Be the first to know about our special offers, upcoming sales, special events, new arrivals, and more.</p>
        </div>

        <div class="help">
            <a href="FAQ.html">faq's</a>
            <a href="privacy_policy.html">privacy policy</a>
            <a href="shipping_policy.html">shipping policy</a>
            <a href="refund_policy.html">refund policy</a>
        </div>

        <div class="share">
            <a href="https://www.facebook.com/VandKApparel" class="fab fa-xl fa-square-facebook"></a>
            <a href="https://www.twitter.com/" class="fab fa-xl fa-square-twitter"></a>
            <a href="https://www.instagram.com/" class="fab fa-xl fa-square-instagram"></a>
        </div>
    </div>

</footer>

<footer class="sub-footer">
    <p> Copyright &copy; 2023. On your feet, inc. all rights reserved.</p>
</footer>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>