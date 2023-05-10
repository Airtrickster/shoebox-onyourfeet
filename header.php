<?php
    session_start();
    include "db_conn.php";

    if (isset($_SESSION["user_id"])) {
        $refreshDetailsstmt = mysqli_prepare($link, "SELECT * FROM accounts WHERE user_id = ?");
        mysqli_stmt_bind_param($refreshDetailsstmt, "i", $_SESSION["user_id"]);
        mysqli_execute($refreshDetailsstmt);
        $detailResults = mysqli_stmt_get_result($refreshDetailsstmt);
        $accountDetails = mysqli_fetch_array($detailResults);
      
        $_SESSION["username"] = $accountDetails["username"];
        $_SESSION["password"] = $accountDetails["password"];
        $_SESSION["first_name"] = $accountDetails["first_name"];
        $_SESSION["last_name"] = $accountDetails["last_name"];
        $_SESSION["full_name"] = $accountDetails["first_name"] . " " . $credentials["last_name"];
        $_SESSION["date_of_birth"] = $accountDetails["date_of_birth"];
        $_SESSION["phone_number"] = $accountDetails["phone_number"];
        $_SESSION["email"] = $accountDetails["email"];
    }
?>

<link rel="stylesheet" type="text/css" href="css/header.css">
<header class="header header-scrolled">

    <div class="wrappings start">
    <a href="index.php" class="logo">
        <img src="images/mini-logo.png" alt="Logo">
    </a>  
    </div>

    <div class="wrappings center">
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="product.php">Product</a>
            <a href="contact.php">Contact</a>
        </nav>
    </div>

    <div class="wrappings end">
        <div class="icons">
            <?php
                echo '<div class="fas fa-shopping-cart" id="cart-btn"></div>
                <div class="fa-solid fa-heart" id="fav-btn"></div>';
            ?>
            <div class="fa-solid fa-user" <?php if (isset($_SESSION["user_id"])) { echo "id=\"profile-btn\""; } else { echo "onclick='window.location.href=\"login-signup.php\"'"; } ?>><?php if (! isset($_SESSION["user_id"])) { echo "Login"; } ?> </div>
        </div>
    </div>

    <div class="profile-items-container">
    <div class="profile-item">
        <div class="profile-sidebar"> 
            
            <?php
            /*
                if (! isset($_SESSION["user_id"])) {
                    echo "<a href=\"login-signup.php\"> Click here to Log in </a>";
                } else {
                    echo '<h3>' . $_SESSION["username"] . '</h3>';
                    echo "<a href=\"logout.php\"> Log out </a>";
                }*/
            ?>

                <div class="name-sidebar">

                    <div class="img-profile">
                        <img src="images/blank-profile-picture.webp" alt="profile">
                    </div>

                    <div class="name-prof">
                        <h1><?php echo $_SESSION["full_name"]; ?></h1>
                        <h2><?php echo $_SESSION["username"]; ?></h2>
                    </div>

                </div>

                <div class="nav-btn-sidebar">
                    <a href="profile.php">Profile</a>
                    <a href="logout.php">Logout</a>
                </div>


        </div>
    </div>
    </div>

        <i class="fas fa-bars" id="menu-btn"></i>
    
    <div class="cart-items-container">
    <div class="cart-item">
        <div class="content">
            <h3> Shopping Cart </h3>
        </div>
    </div>

        <?php
            if (isset($_SESSION["user_id"])) {
                $productstmt = mysqli_prepare($link, "SELECT item_id, products.product_id AS \"products_product_id\" , name, price, quantity, price * quantity AS \"subtotal\", image FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE user_id = ?;");
                mysqli_stmt_bind_param($productstmt, "i", $_SESSION["user_id"],);
                mysqli_stmt_execute($productstmt);
                $productResults = mysqli_stmt_get_result($productstmt);

                $sumCartstmt = mysqli_prepare($link,"SELECT SUM(price * quantity) as \"sum_cart\" FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE user_id = ?;");
                mysqli_stmt_bind_param($sumCartstmt, "i", $_SESSION["user_id"],);
                mysqli_stmt_execute($sumCartstmt);
                $sumCartResult = mysqli_stmt_get_result($sumCartstmt);
                $sumCart = mysqli_fetch_array($sumCartResult);

                while ($productRow = mysqli_fetch_array($productResults)) {     
                    echo '<div class="cart-item">
                    <a href="remove_from_cart.php?item_id=' .  $productRow["item_id"] . '"><span class="fas fa-times"></span> </a>
                    <img src="images/products/'. $productRow["image"] . '" alt="">
                    <div class="content">
                    <h3 style="width: 85%;  "><a href="product_details.php?product_id=' . $productRow["products_product_id"] . '">' . $productRow["name"] . '</a></h3>
                    <div class="price">Php ' . $productRow["price"] . ' <br> x' . $productRow["quantity"] . ' = Php ' . $productRow["subtotal"] .' <br> <button style="font-size:18px; padding:5px; margin: 4px 10px 0px; background:#d3ad7f; border-radius:4%; color: white; cursor: pointer;" onclick="decrementNumber'. $productRow["item_id"] .'()">-</button> <p id="quantity-' . $productRow["item_id"] . '" style="display:inline"> ' . $productRow["quantity"] . ' </p> <button style="font-size:18px; padding:5px; margin-left:10px; background:#d3ad7f; border-radius:4%; color: white; cursor: pointer;"  onclick="incrementNumber' . $productRow["item_id"] . '()">+</button><button style="font-size:18px; padding:5px; margin-left:10px; background:#d3ad7f; border-radius:4%; color: white; cursor: pointer;" onclick="changeQuantity'. $productRow["item_id"] .'()">Apply</button></div>
                    </div>
                    </div>
                    <script>
                    var quantity' . $productRow["item_id"] . ' = ' . $productRow["quantity"] . ';
                    function incrementNumber'. $productRow["item_id"] .'() {
                        quantity' . $productRow["item_id"] . '++;
                        document.getElementById("quantity-' . $productRow["item_id"] . '").innerHTML = "" + quantity' . $productRow["item_id"] . ';
                    }

                    function decrementNumber'. $productRow["item_id"] .'() {
                        quantity' . $productRow["item_id"] . '--;
                        if (quantity' . $productRow["item_id"] . ' < 1) {
                            quantity' . $productRow["item_id"] . ' = 1;
                        }
                        document.getElementById("quantity-' . $productRow["item_id"] . '").innerHTML = "" + quantity' . $productRow["item_id"] . ';
                    }
                    function changeQuantity'. $productRow["item_id"] .'() {
                        window.location.href = "change_quantity.php?quantity=" + quantity' . $productRow["item_id"] . ' + "&item_id=' . $productRow["item_id"] . '";
                    }

                </script>';
                }
                if (mysqli_num_rows($productResults) == 0) {
                    echo '<div class="cart-item">
                    <div class="content">
                    <h3> is empty </h3>
                    </div>
                    </div>';
                } else {
                    echo '<a href="checkout_page.php" class="btn">checkout now <br> Php ' . $sumCart["sum_cart"] . '</a>';
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
                $favListstmt = mysqli_prepare($link, "SELECT fav_id, products.product_id , name, image FROM favorites INNER JOIN products ON favorites.product_id = products.product_id WHERE user_id = ?;");
                mysqli_stmt_bind_param($favListstmt, "i", $_SESSION["user_id"],);
                mysqli_stmt_execute($favListstmt);
                $favListResults = mysqli_stmt_get_result($favListstmt);
                while ($favListRow = mysqli_fetch_array($favListResults)) {     
                    echo '<div class="fav-item">
                    <a href="toggle_favs.php?product_id=' .  $favListRow["product_id"] . '"><span class="fas fa-times"></span> </a>
                    <img src="images/products/'. $favListRow["image"] . '" alt="">
                    <div class="content">
                    <h3><a href="product_details.php?product_id=' . $favListRow["product_id"] . '">' . $favListRow["name"] . '</a></h3>
                    </div>
                    </div>';
                }
                if (mysqli_num_rows($favListResults) == 0) {
                    echo '<div class="fav-item">
                    <div class="content">
                    <h3> is empty </h3>
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