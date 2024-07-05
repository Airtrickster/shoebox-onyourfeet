<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    include "db_conn.php";

    $productDetailstmt = mysqli_prepare($link, "SELECT products.product_id AS \"products_product_id\", cart.quantity AS \"cart_quantity\", name, price, stock, image, description, cart.product_id AS \"is_in_cart\", cart.item_id AS \"cart_item_id\", favorites.product_id AS \"is_in_favs\" FROM products LEFT JOIN cart ON products.product_id = cart.product_id AND cart.user_id = ? LEFT JOIN favorites ON products.product_id = favorites.product_id AND favorites.user_id = ? WHERE products.product_id = ?;");
    mysqli_stmt_bind_param($productDetailstmt, "iii", $_SESSION["user_id"], $_SESSION["user_id"], $_GET["product_id"]);
    mysqli_stmt_execute($productDetailstmt);
    $productDetailResults = mysqli_stmt_get_result($productDetailstmt);
    $productDetailArray = mysqli_fetch_array($productDetailResults);

    if (is_array($productDetailArray)) {
        $productId= $productDetailArray["products_product_id"];
        $productName = $productDetailArray["name"];
        $productPrice = $productDetailArray["price"];
        $productStock = $productDetailArray["stock"];
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
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/product_details.css">
    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link href="lib/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/icon.png">
    <title>Shoebox | <?php echo $productName ?></title>

<style>
     .details-page-body {
        margin: 0;
        padding: 0;
    }
    
    .details-page-container {
        max-width: 1300px;
        margin: 50px 100px auto;
        padding: 5px;
        background-color: rgb(0, 0, 0);
        border-radius: 30px;
        border: solid 5px white;

    }
    
    .details-page-product {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 20px;
        padding: 20px;
        background-color: rgba(245, 245, 245, 0.0);
    }
    
    .details-page-product img {
        width: 100%;
        max-width: 100%;
        height: auto;
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
                    <img src="images/products/<?php echo $productImage; ?>" 
                    class="img-fluid" alt="Product Image"> 
                </div>
			
            <div class="details-page-product-details">
            <!-- 3 -->

                    <div class="rbox">
                    <h1 class="productName"><?php echo $productName; ?></h1> 
    
                        <h2 class="productName"> Php <?php echo $productPrice; ?> </h2>
                            <h3 class="details-right">
                            <?php echo $productDescription; ?>
                            </h3>
                            <?php
                                if ($productStock > 0) {
                                    echo '<h3 class="details-right">' . $productStock . ' left </h3>
                                    ';
                                } else {
                                    echo '<h3 style="color: red;" class="details-right"> Out of Stock! </h3>';
                                }
                            ?>
                               
                            <!-- SIZE AND COLOR
                            <div class="size-color">
                                <label for="size" class="size">Size:</label>
                                <select name="size" id="size" class="details-page-product-size-select">
                                    <option value="small">30</option>
                                    <option value="medium">35</option>
                                    <option value="large">40</option>
                                </select>
                
                                <label for="color" style="margin-left: 50px;">Color:</label>
                                <select name="color" id="color">
                                    <option value="red">Red</option>
                                    <option value="blue">Blue</option>
                                    <option value="green">Green</option>
                                </select>
                            </div>
                            -->

                            <!-- QUANTITY -->
                            <?php
                                if ($productStock > 0) {
                                    if (! $isInCart) { $quantityValue = "1"; } else { $quantityValue = $cartQuantity; };
                                    echo '
                                    <div class="quantity-button">
                                    <button class="subtract" onclick="subtractQuantity()">-</button>
                                    <input type="number" min="1" max="' . $productStock . '" step="1" id="quantity" value="' . $quantityValue . '"
                                    style="color: white; background-color: black; text-align: center; padding: 3px 5px; margin-bottom: 10px;">
                                    <button class="add" onclick="addQuantity()">+</button>
                                    ';

                                    if ($isInCart) {
                                        echo '<button class="apply" onclick="applyQuantity()">Apply</button>';
                                    }
                                }
                            ?>

                                <button class="<?php if (! isset($_SESSION["user_id"]) || ! $isInFavs) { echo "fa-regular"; } else { echo "fa-solid"; } ?> fa-heart" id="fav-btn" onclick="toggleFavs()" style="padding: 15px 20px; margin-left: 180px">
                                </button>
               
                            </div>
                            
                            <?php
                                if ($productStock > 0) {
                                    if (! isset($_SESSION["user_id"]) || ! $isInCart) { $cartAction = 'addToCart()'; } else { $cartAction = 'removeFromCart()'; }
                                    if (! $isInCart) { $cartButtonText = "Add To Cart"; } else { $cartButtonText = "Remove From Cart"; }
                                    echo '
                                    <button onclick=\'' . $cartAction . '\' class="btn btn-standard" style="font-weight: 500;">
                                    <i class="fa-solid fa-cart-plus" style="color: #ffffff; margin-right: 10px; font-size: 20px;"></i>
                                    ' . $cartButtonText . '
                                </button>
                                    ';
                                }
                            ?>

                            <!-- Reviews removed
                            <div id="app">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-2">
                                      <div class="comment">
                                    <p v-for="items in item" v-text="items"></p>
                                      </div>
                                      </div>
                                      </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                         <textarea type="text" class="input" placeholder="Write a review" v-model="newItem" @keyup.enter="addItem()"></textarea>
                                      <button v-on:click="addItem()" class='primaryContained float-right' type="submit">Add Comment</button>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            
                              <div class="row" style="font-size: 20px; padding: 0;">
                                <div class="col">
                                    <i class="fa-solid fa-star" style="color: #ffa50a;"></i>
                                    <i class="fa-solid fa-star" style="color: #ffa50a;"></i>
                                    <i class="fa-solid fa-star" style="color: #ffa50a;"></i>
                                    <i class="fa-solid fa-star" style="color: #ffa50a;"></i>
                                    <i class="fa-solid fa-star" style="color: #ffa50a;"> 5.5</i>
                                </div>

                            </div>
                            -->
                            
                    
                            
                    </div>
            
                                
                    
                        
                

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
            if (quantity < <?php echo $productStock; ?>) {
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

    <!-- Vue JS -->
    <script src='lib/vue-js-2.5.17.js'></script>
    <!-- jQuery -->
    <script src='lib/jquery-3.6.3.js'></script>
    <script>
        $(document).ready(function(){ 
 
            $(".primaryContained").on('click', function(){
            $(".comment").addClass("commentClicked");
            });//end click
            $("textarea").on('keyup.enter', function(){
            $(".comment").addClass("commentClicked");
            });//end keyup
            });//End Function

            new Vue({
            el: "#app",
            data:{
                title: 'Add a comment',
            newItem: '',
            item: [],
            },
            methods:{
            addItem  (){
            this.item.push(this.newItem);
                this.newItem = "";
            }
            }

            });
    </script>

</body>
</html>