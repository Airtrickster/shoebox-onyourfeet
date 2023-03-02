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
                $productstmt = mysqli_prepare($link, "SELECT * FROM products WHERE category = ? AND gender = ?");
                mysqli_stmt_bind_param($productstmt, "ss", $_GET["category"], $_GET["gender"]);
                mysqli_stmt_execute($productstmt);
                $productResults = mysqli_stmt_get_result($productstmt);
                while ($productRow = mysqli_fetch_array($productResults)) {
                    echo "<div class=\"box\">";
                    echo "<div class=\"icons\">";
                    echo "<a href=\"add_to_cart.php?product_id="; echo $productRow["product_id"]; echo "\" class=\"fas fa-shopping-cart\"></a>";
                    echo "<a href=\"#\" class=\"fas fa-heart\"></a>";
                    echo "<a href=\"#\" class=\"fas fa-eye\"></a>";
                    echo "</div>";
                    echo "<div class=\"image\">";
                    echo "<img src=\"images/products/"; echo $productRow["image"]; echo "\" alt=\""; echo $productRow["name"]; echo "\">";
                    echo "</div>";
                    echo "<div class=\"content\">";
                    echo "<h3>"; echo $productRow["name"] ; echo "</h3>";
                    echo "<div class=\"stars\">";
                    echo "<i class=\"fas fa-star\"></i>";
                    echo "<i class=\"fas fa-star\"></i>";
                    echo "<i class=\"fas fa-star\"></i>";
                    echo "<i class=\"fas fa-star\"></i>";
                    echo "<i class=\"fas fa-star-half-alt\"></i>";
                    echo "</div>";
                    echo "<div class=\"price\">Php "; echo $productRow["price"]; echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
    
        </div>
    </section>

    <?php include "footer.php"; ?>


    <script src="js/script.js"></script>

</body>
</html>