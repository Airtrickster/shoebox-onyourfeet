<?php
    session_start();
    include "db_conn.php";

    $productDetailstmt = mysqli_prepare($link, "SELECT products.product_id AS \"products_product_id\", cart.quantity AS \"cart_quantity\", name, price, image, description, cart.product_id AS \"is_in_cart\", cart.item_id AS \"cart_item_id\", favorites.product_id AS \"is_in_favs\" FROM products LEFT JOIN cart ON products.product_id = cart.product_id AND cart.user_id = ? LEFT JOIN favorites ON products.product_id = favorites.product_id AND favorites.user_id = ? WHERE products.product_id = ?;");
    mysqli_stmt_bind_param($productDetailstmt, "iii", $_SESSION["user_id"], $_SESSION["user_id"], $_GET["product_id"]);
    mysqli_stmt_execute($productDetailstmt);
    $productDetailResults = mysqli_stmt_get_result($productDetailstmt);
    $productDetailArray = mysqli_fetch_array($productDetailResults);

    if (is_array($productDetailArray)) {
        $productId= $productDetailArray["products_product_id"];
        $productName = $productDetailArray["name"];
        $productPrice = $productDetailArray["price"];
        $productImage = $productDetailArray["image"];
        $productDescription = $productDetailArray["description"];
        $isInCart = false;
        if (! is_null($productDetailArray["is_in_cart"])) {
            $isInCart = true;
            $cartItemId = $productDetailArray["cart_item_id"];
            $cartQuantity = $productDetailArray["cart_quantity"];
        }
        $isInFavs = false;
        if (! is_null($productDetailArray["is_in_favs"])) { $isInFavs = true; }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/product_details.css">
    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="icon" href="images/icon.png">
    <title>On your feet | <?php echo $productName ?></title>

<style>
     .details-page-body {
        margin: 0;
        padding: 0;
    }
    
    .details-page-container {
        max-width: 1300px;
        margin: 0 auto;
        padding: 20px;

    }
    
    .details-page-product {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 20px;
        padding: 20px;
        background-color: rgba(245, 245, 245, 0.0);
    }
    
    .details-page-product img {
        max-height: 400px;
        max-width: 400px;
        margin-right: 20px;
    }
    
    .details-page-product-details {
        flex: 1;
    }
    

</style>


</head>

<!-- BODY START -->
<body id="product_details" class="pdetails">

    <?php include "header.php"; ?>
    <!-- HEADER -->


    
    <div class="details-page-container">
    <!-- 1 -->

		<div class="details-page-product">
        <!-- 2 -->

        <div class="col-lg-6 col-md-6 col-sm-12 imgbox">
                    <img src="images/products/<?php echo $productImage; ?>" class="img-fluid" alt="Product Image"> 
                </div>
			
            <div class="details-page-product-details">
            <!-- 3 -->

                        <h1 class="productName"><?php echo $productName; ?></h1> 
                        <h2 class="productName"><?php echo "Php ", $productPrice; ?></h2>
                   

                    <div class="rbox">
                            <h3 class="details-right">
                            <?php echo str_replace("\n", "<br>",  $productDescription); ?>
                            </h3>

                            <!-- SIZE -->
                            <div class="">
                                <label for="size">Size:</label>
                                <select name="size" id="size" class="details-page-product-size-select">
                                    <option value="small">Small</option>
                                    <option value="medium">Medium</option>
                                    <option value="large">Large</option>
                                </select>
                            </div>

                            <!-- COLOR -->
                            <div class="">
                                <label for="color">Color:</label>
                                <select name="color" id="color">
                                    <option value="red">Red</option>
                                    <option value="blue">Blue</option>
                                    <option value="green">Green</option>
                                </select>
                            </div>

                            <!-- QUANTITY -->
                            <div class="quantity-button">
                                <button class="subtract" onclick="subtractQuantity()">-</button>
                                <input type="number" min="1" max="100" step="1" value="<?php if (! $isInCart) { echo "1"; } else { echo $cartQuantity; } ?>" id="quantity">
                                <button class="add" onclick="addQuantity()">+</button>
                            </div>
                            <?php
                                if ($isInCart) {
                                    echo '<button class="apply" onclick="applyQuantity()">Apply</button>';
                                }
                            ?>
                            
                    </div>
                   

                        
                        <button onclick='<?php if (! isset($_SESSION["user_id"]) || ! $isInCart) { echo 'addToCart()'; } else { echo 'removeFromCart()'; } ?>' class="btn btn-primary btn-lg btn-block"><?php if (! $isInCart) { echo "Add To Cart"; } else { echo "Remove From Cart"; } ?></button>
                        <button class="<?php if (! isset($_SESSION["user_id"]) || ! $isInFavs) { echo "fa-regular"; } else { echo "fa-solid"; } ?> fa-heart" id="fav-btn" onclick="toggleFavs()">
                            
                        </button>
                                
                    
                        
                

            <!-- 3 -->
            </div>

        <!-- 2 -->
		</div>

    <!-- 1 -->
    </div>




    <?php include "footer.php"; ?>
    <!-- FOOTER -->
    <script>
        function subtractQuantity() {
            var quantityInput = document.getElementById("quantity");
            var quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
            }
        }

        function addQuantity() {
            var quantityInput = document.getElementById("quantity");
            var quantity = parseInt(quantityInput.value);
            if (quantity < 100) {
                quantityInput.value = quantity + 1;
            }
        }

        function applyQuantity() {
            if (isNaN(parseInt(document.getElementById("quantity").value)) || parseInt(document.getElementById("quantity").value) < 1) {
                alert("Please enter a valid quantity");
                return false;
            }

            window.location.href = "change_quantity.php?item_id=<?php echo $cartItemId; ?>&quantity=" + parseInt(document.getElementById("quantity").value);
        }

        function addToCart() {
            if (<?php if (! isset($_SESSION["user_id"])) { echo "true"; } else { echo "false"; } ?>) {
                alert("You must be logged in to use the shopping cart");
                window.location.href = "login-signup.php";
                return false;
            }

            if (isNaN(parseInt(document.getElementById("quantity").value)) || parseInt(document.getElementById("quantity").value) < 1) {
                alert("Please enter a valid quantity");
                return false;
            }

            window.location.href = "add_to_cart.php?product_id=<?php echo $_GET["product_id"] ?>&quantity=" + parseInt(document.getElementById("quantity").value);
        }

        function removeFromCart() {
            if (<?php if (! isset($_SESSION["user_id"])) { echo "true"; } else { echo "false"; } ?>) {
                alert("You must be logged in to use the shopping cart");
                window.location.href = "login-signup.php";
                return false;
            }

            window.location.href = "remove_from_cart.php?item_id=<?php echo $cartItemId; ?>";
        }

        function toggleFavs() {
            if (<?php if (! isset($_SESSION["user_id"])) { echo "true"; } else { echo "false"; } ?>) {
                alert("You must be logged in to use favorites");
                window.location.href = "login-signup.php";
                return false;
            }
            window.location.href="toggle_favs.php?product_id=<?php echo $productId ?>";
        }

    </script>
    <script src="js/script.js"></script>

</body>
</html>