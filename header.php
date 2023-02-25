<?php
    session_start();
    include "db_conn.php";
?>
<link rel="stylesheet" href="css/header.css">
<header class="header header-scrolled">

    <a href="index.php" class="logo">
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