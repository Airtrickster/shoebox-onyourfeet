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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>On your feet | Product</title>
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
            <div class="fa-solid fa-star"></div>
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

    <section class="sale">
        <div class="box-sale">
            <h1>25% off select styles</h1>
            <p>Sign in and use code <span>OYFT25</span> for 25% off. Not a member? Use code <span>FEET20</span> for an extra 20% off. Select styles. Exclusions apply.</p>
            <button onclick='window.location.href="#product"''>Shop</button>
        </div>
    </section>


    <section class="showcase-page">
        <div class="show">
            <p>feet in!</p>
            <img src="./images/basketball-shoes.png" alt="page">
            <p class="center-text">When it comes to basketball, having the best pair of basketball shoes is essential</p>
        </div>
    </section>

    <section class="product" id="product">

        <h1 class="heading"> our <span>product</span> </h1>
    
        <div class="content">
            <img src="images/product_ath.png">
            <h1>Athletic Shoes</h1>
            <div class="btn-prod">
            <button onclick='window.location.href="product_category.php?category=athletic&gender=men"' class="btn2 buttoncurved">Men</button>
            <button onclick='window.location.href="product_category.php?category=athletic&gender=women"' class="btn2 buttoncurved">Women</button>
            </div>
        </div>

          <div class="content">
            <img src="images/product_for.png" >
            <h1>Formal Shoes</h1>
            <div class="btn-prod">
            <button onclick='window.location.href="product_category.php?category=formal&gender=men"' class="btn2 buttoncurved">Shop Men's</button>
            <button onclick='window.location.href="product_category.php?category=formal&gender=women"' class="btn2 buttoncurved">Shop Women's</button>
            </div>
        </div>

          <div class="content">
            <img src="images/product_cas.png" >
            <h1>Casual Shoes</h1>
            <div class="btn-prod">
            <button onclick='window.location.href="product_category.php?category=casual&gender=men"' class="btn2 buttoncurved">Shop Men's</button>
            <button onclick='window.location.href="product_category.php?category=casual&gender=women"' class="btn2 buttoncurved">Shop Women's</button>
            </div>
        </div>

    </section>

    <section class="BestSeller" id="BestSeller">

        <h1 class="heading"> Best <span>Seller</span> </h1>
    
        <div class="box-container">
    
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="images/products/athletic_shoes/men/132caceb69553d285f143e5caceec85bf6.rsquare.w600.webp" alt="">
                </div>
                <div class="content">
                    <h3>Altra Outroad Trail Running Shoe</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">Php 7634.55 </div>
                </div>
            </div>
    
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="images/products/formal_shoes/men/7341857669298-2_082302a4-7c41-4c47-b02d-11c04a8e32b7_350x500.webp" alt="">
                </div>
                <div class="content">
                    <h3>East Rock Men's Hanston Loafers</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">Php 1,700.00 <span> 2,899.00</span></div>
                </div>
            </div>
    
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="images/products/casual_shoes/women/casual_shoe_20.png" alt="">
                </div>
                <div class="content">
                    <h3>Adidas Stan Smith Sneaker</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">Php 4,899.00 <span>5,000.00</span> </div>
                </div>
            </div>
    
        </div>
    
    </section>

    <section class="review" id="review">

        <h1 class="heading"> customer's <span>review</span> </h1>
    
        <div class="box-container">
    
            <div class="box">
                <img src="images/quote-img.png" alt="" class="quote">
                <p>Wow! I finally found the shoe that I was looking for and it fits with my size! This store is a lifesaver</p>
                <img src="images/hern.jpg" class="user" alt="">
                <h3>Person 1</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
    
            <div class="box">
                <img src="images/quote-img.png" alt="" class="quote">
                <p>"I ordered the Axel Arigato Clean 90, it is indeed cleaaannnn!! sheeshhh..., I'll order again"</p>
                <img src="images/eme.jpg" class="user" alt="">
                <h3>Person 2</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            
            <div class="box">
                <img src="images/quote-img.png" alt="" class="quote">
                <div>
                <p class="text-wrap">This website is amazing! The layout is very user-friendly, and the search engine optimization is top notch. I would definitely recommend this website to anyone looking for a great online shopping experience.  </p>
                <p id="hide" style="display:none;"> The website was very easy to use and I enjoyed browsing through the different styles of shoes and it was helpful to be able to see how the shoes would look before making a purchase.  I enjoy shopping online and using this website for purchasing online was a smooth and easy process. I will definitely shop on this website again.</p>
                <button id="show">show more</button>
                <button id="hider">hide</button>
            </div>
                <img src="images/cal.jpg" class="user" alt="">
                <h3>Person 3</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
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


    <script src="js/script.js"></script>

</body>
</html>