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
        <div class="fa-solid fa-star" id="fav-btn"></div>
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
        <div class="content">
            <h3> Shopping Cart </h3>
        </div>
    </div>

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
                    echo '<div class="cart-item">
                    <a href="remove_from_cart.php?item_id=' .  $productRow["item_id"] . '"><span class="fas fa-times"></span> </a>
                    <img src="images/products/'. $productRow["image"] . '" alt="">
                    <div class="content">
                    <h3>' . $productRow["name"] . '</h3>
                    <div class="price">Php ' . $productRow["price"] . '</div>
                    </div>
                    </div>';
                }
                if (mysqli_num_rows($productResults) == 0) {
                    echo '<div class="cart-item">
                    <div class="content">
                    <h3> Cart is empty </h3>
                    </div>
                    </div>';
                } else {
                    echo '<a href="checkout.php" class="btn">checkout now <br> Php ' . $sumCart["sum_cart"] . '</a>';
                }
                
            } else {
                echo '<div class="cart-item">
                <div class="content">
                <h3> Not logged in </h3>
                </div>
                </div>';

            }

        ?>
    </div>

    <div class="fav-items-container">
    <div class="fav-item">
        <div class="content">
            <h3> Favorites </h3>
        </div>
    </div>
        
        <?php
            if (isset($_SESSION["user_id"])) {
                $favListstmt = mysqli_prepare($link, "SELECT fav_id, products.product_id , name, image FROM favorites INNER JOIN products ON favorites.product_id = products.product_id WHERE user_id = ?;;");
                mysqli_stmt_bind_param($favListstmt, "i", $_SESSION["user_id"],);
                mysqli_stmt_execute($favListstmt);
                $favListResults = mysqli_stmt_get_result($favListstmt);
                while ($favListRow = mysqli_fetch_array($favListResults)) {     
                    echo '<div class="fav-item">
                    <a href="toggle_favs.php?product_id=' .  $favListRow["product_id"] . '"><span class="fas fa-times"></span> </a>
                    <a href="add_to_cart.php?product_id=' .  $favListRow["product_id"] . '"><span class="fas fa-shopping-cart"></span> </a>
                    <img src="images/products/'. $favListRow["image"] . '" alt="">
                    <div class="content">
                    <h3>' . $favListRow["name"] . '</h3>
                    </div>
                    </div>';
                }
                if (mysqli_num_rows($favListResults) == 0) {
                    echo '<div class="fav-item">
                    <div class="content">
                    <h3> Favorites is empty </h3>
                    </div>
                    </div>';
                } 
                
                
            } else {
                echo '<div class="fav-item">
                <div class="content">
                <h3> Not logged in </h3>
                </div>
                </div>';

            }

        ?>
    </div>

</header>