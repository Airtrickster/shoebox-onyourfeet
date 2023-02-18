<?php
    session_start();
    include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./lib/fontawesome-free-6.2.1-web/css/all.min.css">
    <title>On your feet | Contact</title>
</head>
<body>

    <header class="header">

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
        <?php
            if (isset($_SESSION["user_id"])) {
                $productstmt = mysqli_prepare($link, "SELECT item_id, products.product_id , name, price, image FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE user_id = ?;");
                mysqli_stmt_bind_param($productstmt, "i", $_SESSION["user_id"],);
                mysqli_stmt_execute($productstmt);
                $productResults = mysqli_stmt_get_result($productstmt);

                $sumCartstmt = mysqli_prepare($link,"SELECT SUM(price) as \"sum_cart\" FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE user_id = ?;");
                mysqli_stmt_bind_param($sumCartstmt, "i", $_SESSION["user_id"],);
                mysqli_stmt_execute($sumCartstmt);
                $sumCartResult = mysqli_stmt_get_result($sumCartstmt);
                $sumCart = mysqli_fetch_array($sumCartResult);

                while ($productRow = mysqli_fetch_array($productResults)) {     
                    echo "<div class=\"cart-item\">";
                    echo "<a href=\"remove_from_cart.php?item_id="; echo $productRow["item_id"]; echo "\"><span class=\"fas fa-times\"></span> </a>";
                    echo "<img src=\"images/products/"; echo $productRow["image"]; echo "\" alt=\"\">";
                    echo "<div class=\"content\">";
                    echo "<h3>"; echo $productRow["name"]; echo "</h3>";
                    echo "<div class=\"price\">Php "; echo $productRow["price"]; echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                if (mysqli_num_rows($productResults) == 0) {
                    echo "<div class=\"cart-item\">";
                    echo "<div class=\"content\">";
                    echo '<h3> Cart is empty </h3>';
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<a href=\"checkout.php\" class=\"btn\">checkout now <br> Php "; echo $sumCart["sum_cart"]; echo "</a>";
                }
                
            } else {
                echo "<div class=\"cart-item\">";
                echo "<div class=\"content\">";
                echo '<h3> Not logged in </h3>';
                echo "</div>";
                echo "</div>";
            }

        ?>
    </div>
    
    </header>
    
    <section class="contact" id="contact">

        <h1 class="heading cont"> <span>contact</span> us </h1>

        <div class="info">
            <div class="text">
                <h4><i class="fa-regular fa-lg fa-user i"></i> Calvin James S. Medoza - CEO</h4>
                <h4><i class="fa-regular fa-lg fa-hashtag i"></i> (+63) 9123456789</h4>
                <h4><i class="fa-regular fa-lg fa-envelope i"></i> clvinjmes.ceo@gmail.com</h4>
            </div>
        </div>
    
        <div class="row">
    
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1474.1792288057443!2d121.05975269517278!3d14.62555284401961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b796aecb8763%3A0xaa026ea7350f82e7!2sTechnological%20Institute%20of%20the%20Philippines%20-%20Quezon%20City!5e0!3m2!1sen!2sph!4v1676642618419!5m2!1sen!2sph" width="685" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    
            <form action="">
                <h3>get in touch</h3>
                <div class="inputBox">
                    <span class="fas fa-user"></span>
                    <input type="text" placeholder="Name">
                </div>
                <div class="inputBox">
                    <span class="fas fa-envelope"></span>
                    <input type="email" placeholder="Email">
                </div>
                <div class="inputBox">
                    <span class="fas fa-mobile"></span>
                    <input type="text" placeholder="Contact number">
                </div>
                <div class="inputBox">
                    <span class="fas"></span>
                    <input type="text" placeholder="Message">
                </div>
                <input type="submit" value="contact now" class="btn">
            </form>
    
        </div>
    
    </section>

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


    <script src="js/script.js"></script>

</body>
</html>