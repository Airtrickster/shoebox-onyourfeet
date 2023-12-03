<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/product-cat-new.css">
    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css">
    <link rel="icon" href="images/icon.png">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Shoebox | Products | <?php echo ucwords($_GET["category"]) . " | " . ucwords( $_GET["gender"]) ?> </title></title>
</head>

<body style="background-color: black;">

    <!--navbar with functionalities-->
    <?php include "header.php"; ?>

     <!--Athletics Men-->
     <div class="container scroll-card">
        <div class="row">
            <div class="col" style="margin-top: 65px;">
                <a href="product.php"><button class="btn btn-cat" style="margin-right: 50px; border-radius: 20px; font-size: 15px;">Back to categories</button></a>
                <a href="product_category.php?category=athletic&gender=<?php echo $_GET["gender"]; ?>"><button class="btn <?php if ($_GET["category"] == "athletic") { echo "btn-cat-current"; } else { echo "btn-cat"; } ?>" style="font-size: 18px;">ATHLETICS</button></a>
                <a href="product_category.php?category=formal&gender=<?php echo $_GET["gender"]; ?>"><button class="btn <?php if ($_GET["category"] == "formal") { echo "btn-cat-current"; } else { echo "btn-cat"; } ?>" style="font-size: 18px;">FORMAL</button></a>
                <a href="product_category.php?category=casual&gender=<?php echo $_GET["gender"]; ?>"><button class="btn <?php if ($_GET["category"] == "casual") { echo "btn-cat-current"; } else { echo "btn-cat"; } ?>" style="font-size: 18px;">CASUAL</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1 class="header-title">
                    <?php echo strtoupper($_GET["category"]); ?> <span style="font-style: italic; color: #eec98b;"><?php echo strtoupper($_GET["gender"]); ?></span>
                </h1>
            </div> 
            <div class="col">
                <a href="product_category.php?category=<?php echo $_GET["category"]?>&gender=<?php if ($_GET["gender"] == "men") { echo "women"; } else { echo "men";} ?>">
                    <button class="btn btn-sex">
                        <?php if ($_GET["gender"] == "men") { echo "WOMEN"; } else { echo "MEN"; } ?>
                        <i class="fa-solid fa-right-long" style="color: #5b3d04; margin-left: 5px;"></i>
                    </button>
                </a>
            </div>  
        </div>
        <div class="dash"></div>

        
        <div class="row">
        <?php
                $productstmt = mysqli_prepare($link, "SELECT * FROM products WHERE category = ? AND gender = ?");
                mysqli_stmt_bind_param($productstmt, "ss", $_GET["category"], $_GET["gender"]);
                mysqli_stmt_execute($productstmt);
                $productResults = mysqli_stmt_get_result($productstmt);


                while ($productRow = mysqli_fetch_array($productResults)) {
                    echo '            
                    <div class="col-md-3 product-card">
                    <div class="card" style="width: 29rem;">
                        <a href="product_details.php?product_id=' . $productRow["product_id"] . '" class="product-link">
                            <div class="row align-items-center">
                                <div class="col-sm ">
                                    <!-- brand logo
                                    <img src="" alt="" width="50px" height="35px" class="">
                                    -->
                                </div>
                                <div class="col-sm">
                                    <h3 class="price">P' . $productRow["price"] . '</h3>
                                </div>
                            </div>
                            <img src="images/products/'. $productRow["image"] . '" alt="'.$productRow["name"].'" class="product-img rounded-0" width="285px" height="250px">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm">
                                        <p class="card-title"><!-- subcategory here --></p>
                                    </div>
                                    <div class="col-sm star">
                                        <i class="fa-solid fa-star" style="color: #ffa50a;"></i>
                                        <i class="fa-solid fa-star" style="color: #ffa50a;"></i>
                                        <i class="fa-solid fa-star" style="color: #ffa50a;"></i>
                                        <i class="fa-solid fa-star" style="color: #ffa50a;"></i>
                                        <i class="fa-solid fa-star" style="color: #ffa50a;"></i>
                                    </div>
                                </div>
                                <h5 class="card-title">' . $productRow["name"] . '</h5>
                                <p class="card-text"><!-- product description here --></p>
                               
                            
                        </a>
                        </div>
                    </div>
                </div>';
                }
        ?>




        </div>
        </div>
    </div>

    <?php include "footer.php"; ?>


    <script src="js/script.js"></script>

</body>

</html>