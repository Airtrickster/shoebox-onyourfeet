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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css">
    <title>On your feet | About</title>
</head>
<body id="about">

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

    <section class="about">
            <div class="about-img">
                <img src="./images/img1.png" alt="quote">

                <div class="about-text">
                    <h1>About</h1>

                    <p>Shoe shop website is a perfect place for customers to buy shoes online. We have a wide selection of shoes to choose from, and our prices are always competitive.</p>

                    <p>At Shoe Shop website, customer satisfaction is our number one priority. We take great care to ensure that the shoes that we sell are of the highest quality and workmanship. We are conveniently located in the TIP Cubao Aurora, Quezon City, and we have a large showroom where customers can browse through our extensive selection of shoes. We carry both designer shoes and cheap shoes, so there is sure to be something for everyone!</p>

                    <p>Our friendly and experienced staff will be more than happy to help you find the perfect pair of shoes for any occasion. We know that every customer is different and has their own unique tastes, and we always strive to accommodate our customers' needs and preferences. We also offer gift-wrapping services at no additional charge to make shopping for the perfect gift easy and enjoyable for everyone!</p>

                    <p>If you are interested in learning more about the products that we offer or have any questions about our store, please feel free to contact us today. We will be more than happy to assist you in any way that we can. We look forward to serving you!</p>
                </div>
            </div>
    </section>

    <section class="mission">
        <div class="about-mission">
             <h1 class="mission-text">Our Mission</h1>
             <p class="mission-text box-wrap">To provide customers with the best possible selection and experience when shopping for shoes.</p>
        </div>
    </section>
    
    <section class="members">
        <div class="vertical">
            <div class="card">
                <img src="./images/calAbout.jpg" alt="Calvin">
                <h3>Calvin James S. Mendoza</h3>
                 <div>
                    <ul>
                        <li>Chief Executive Officer (CEO)</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <img src="./images/jurAbout.jpg" alt="Juri">
                <h3>Juri Salvador S. Turiano</h3>
                 <div>
                    <ul>
                        <li>Chief Financial Officer (CFO)</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <img src="./images/jamAbout.png" alt="James">
                <h3>James Angelo C. Hernando</h3>
                <div>
                    <ul>
                        <li>Chief Information Officer (CIO)</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <img src="./images/zacAbout.jpg" alt="Zach">
                <h3>Zachary Ian A. Alonzo</h3>
                 <div>
                    <ul>
                        <li>Chief Marketing Officer (CMO)</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <img src="./images/wesAbout.png" alt="Wesley">
                <h3>Wesley</h3>
                 <div>
                    <ul>
                        <li>Chief Operations Officer (COO)</li>
                    </ul>
                </div>
            </div>
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

    <script defer src="js/script.js"></script>

</body>
</html>