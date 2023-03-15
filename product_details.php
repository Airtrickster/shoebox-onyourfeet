<?php
    session_start();
    include "db_conn.php";

    $productDetailstmt = mysqli_prepare($link, "SELECT name, price, image, description FROM products WHERE product_id = ?");
    mysqli_stmt_bind_param($productDetailstmt, "i", $_GET["product_id"]);
    mysqli_stmt_execute($productDetailstmt);
    $productDetailResults = mysqli_stmt_get_result($productDetailstmt);
    $productDetailArray = mysqli_fetch_array($productDetailResults);

    if (is_array($productDetailArray)) {
        $productName = $productDetailArray["name"];
        $productPrice = $productDetailArray["price"];
        $productImage = $productDetailArray["image"];
        $productDescription = $productDetailArray["description"];
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
</head>
<body id="product_details" class="pdetails">

    <?php include "header.php"; ?>
    
    <section class="pdetails bg-img">
        <div class="container ">

            <div class="row ">

                <div class="col-lg-6 col-md-6 col-sm-12 imgbox">
                    <img src="images/products/<?php echo $productImage; ?>" class="img-fluid" alt="Product Image">
                </div>

                <div class="col">
                <div class="row">
                    <div class="col">
                        <h1 class="productName details-right"><?php echo $productName; ?></h1>

                    </div>

                </div>
                    <div class="row rbox">
                        <div class="col">
                            <h3 class="details-right">
                            <?php echo str_replace("\n", "<br>",  $productDescription); ?>
                            </h3>
                            <h2> Php <?php echo $productPrice; ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <button onclick='window.location.href="add_to_cart.php?product_id=<?php echo $_GET["product_id"] ?>"' class="btn btn-primary btn-lg btn-block">Add to Cart</button>
                        </div>           
                    </div>
                        
                </div>

            </div>
            
        </div>
        <script src="lib/jquery-3.6.3.js"></script>
        <script src="lib/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    </section>

    <?php include "footer.php"; ?>

    <script defer src="js/script.js"></script>

</body>
</html>