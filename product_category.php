<?php
    session_start();
    include "db_conn.php";
    include "check_item.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="icon" href="images/icon.png">
    <title>On your feet | Products | <?php echo $_GET["category"] ?> Shoes <?php $_GET["gender"] ?></title>
</head>
<body>

    <?php include "header.php"; ?>
    
    <section class="product-category" class="product-category">
        <h1 class="heading"> <span><?php echo $_GET["category"] ?> Shoes </span><?php echo $_GET["gender"] ?></h1>
        <div class="box-container">
    
            <?php
                if (isset($_SESSION["user_id"])) {
                    $productstmt = mysqli_prepare($link, "SELECT products.product_id, category, gender, name, price, image, favorites.product_id AS \"is_in_fav\" FROM products LEFT JOIN favorites ON products.product_id = favorites.product_id AND favorites.user_id = ? WHERE category = ? AND gender = ?;");
                    mysqli_stmt_bind_param($productstmt, "iss", $_SESSION["user_id"] , $_GET["category"], $_GET["gender"]);
                } else {
                    $productstmt = mysqli_prepare($link, "SELECT * FROM products WHERE category = ? AND gender = ?");
                    mysqli_stmt_bind_param($productstmt, "ss", $_GET["category"], $_GET["gender"]);
                }

                mysqli_stmt_execute($productstmt);
                $productResults = mysqli_stmt_get_result($productstmt);         

                while ($productRow = mysqli_fetch_array($productResults)) {
                    if (is_null($productRow["is_in_fav"])) {
                        $favIcon = "fa-regular";
                    } else {
                        $favIcon = "fa-solid";
                    }

                    echo '<div class="box">
                    <div class="icons">
                    <a href="add_to_cart.php?product_id=' . $productRow["product_id"] . '" class="fas fa-shopping-cart"></a>
                    <a href="toggle_favs.php?product_id='. $productRow["product_id"] .'" class="' . $favIcon .' fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    </div>
                    <div class="image">";
                    <img src="images/products/'. $productRow["image"] . '" alt="'.$productRow["name"].'">
                    </div>
                    <div class="content">
                    <h3>' . $productRow["name"] . '</h3>
                    <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price">Php ' . $productRow["price"] . '</div>
                    </div>
                    </div>';
                }
            ?>
    
        </div>
    </section>

    <?php include "footer.php"; ?>


    <script src="js/script.js"></script>

</body>
</html>