<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link href="lib/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css">
    <script src="lib/jquery-3.6.3.js"></script>
    <link rel="icon" href="images/logo-2.png">
    <title>ShoeBox | Product</title>
</head>
<body style="background-color:#000000;">
    <div id="top"></div>

    <!--header bg-->
    <img class="bg-img" src="images/shoe-header-2.jpg" alt="header image">
    <!---->

    <!--nav bar but dont have functionalites
    <header>
        <div class="wrap">
            <div class="flex brand">
                <a href="#">
                    <h1>Shoe Box</h1>
                </a>
            </div>
            <div class="flex navbar active" > 
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="product.html">Products</a></li>
                    <li><a href="about.html">About us</a></li>
                    <li><a href="contact.html">Contact us</a></li>
                </ul>
                <div href="#" class="closebtn"><i class="fa-solid fa-lg fa-xmark"></i></div>
            </div>
            <div class="flex" id="signin">
                <a href="#"><i class="fa-solid fa-star "></i></a>
                <a href="#"><i class="fa-solid fa-cart-shopping "></i></a>
                <a href="#" id="myBtn">Sign in</a>
                <a href="#" id="myBtn2">Log in</a>
            </div>
            <div class="menubar"><i id="menu-nav" class="fa-solid fa-bars"></i></div>
        </div>
    </header> -->

    <!--navbar with functionalities-->
 

    <?php include "header.php"; ?>

 <!--header-->
        <div class="header-content position-relative">
            <h1 class="header-text">DISCOVER LIMITED SHOES WITHOUT LIMITATION</h1>
        </div>

        <!--deal of the day (Removed for now)
        <div class="container scroll-card">
            <div class="row">
                <h1 class="top" style="padding-bottom: 50px; color: rgb(255, 255, 255); font-size: 70px;">DEAL OF THE DAY</h1>
            </div>
            <div class="dash"></div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="row align-items-center">
                            <div class="col-sm ">
                                <img src="images/adidas-logo.png" alt="" width="50px" height="35px" class="">
                            </div>
                            <div class="col-sm">
                                <h3 class="price">P8500</h3>
                            </div>
                        </div>
                        <img src="images/athetics-men/adidas-men-basketball.png" alt="" class="featured-img rounded-0" width="285px" height="250px">
                        <div class="card-body">
                            <p class="card-title">Basketball</p>
                            <h5 class="card-title">TRAE YOUNG 3 SHOES</h5>
                            <p class="card-text">Signature Sneakers from Trae Young and Adidas Bastketball</p>
                            <a href="athletics-product-men-new.html" class="btn  btn-standard">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="row align-items-center">
                            <div class="col">
                                <img src="images/vans-logo.jpg" alt="" width="65px" height="35px" class="">
                            </div>
                            <div class="col">
                                <h3 class="price">P3899</h3>
                            </div>
                        </div>
                        <img src="images/vans-product-1.png" alt="" class="featured-img rounded-0" width="285px" height="250px">
                        <div class="card-body">
                            <p class="card-title">Old Skool</p>
                            <h5 class="card-title">OLD SKOOL SHOE</h5>
                            <p class="card-text">The Iconic Shoe that Brought our Sidestripe to Life</p>
                            <a href="#" class="btn btn-standard">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="row align-items-center">
                            <div class="col-sm ">
                                <img src="images/alexander-mcqueen-logo.png" alt="" width="65px" height="35px" class="">
                            </div>
                            <div class="col-sm">
                                <h3 class="price">P4900</h3>
                            </div>
                        </div>
                        <img src="images/alexander-mac-product-1.jpg" alt="" class="featured-img rounded-0" width="285px" height="250px">
                        <div class="card-body">
                            <p class="card-title">Style Boots</p>
                            <h5 class="card-title">WANDER LACE UP BOOT</h5>
                            <p class="card-text">Presented in Black Calf Leather with a Rubberised Hand Feel</p>
                            <a href="#" class="btn btn-standard">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="row align-items-center">
                            <div class="col-sm ">
                                <img src="images/nike-logo.png" alt="" width="65px" height="35px" class="">
                            </div>
                            <div class="col-sm">
                                <h3 class="price">P4900</h3>
                            </div>
                        </div>
                        <img src="images/athetics-men/nike-men-football.jpg" alt="" class="featured-img rounded-0" width="285px" height="250px">
                        <div class="card-body">
                            <p class="card-title">FootBall</p>
                            <h5 class="card-title">NIKE AIR ZOOM VICTORY</h5>
                            <p class="card-text">Push for your Personal Pest in the Nike Air Zoom Victory</p>
                            <a href="athletics-product-men-new.html#football" class="btn btn-standard">Shop Now</a>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        -->

        <!--ads-->
        <section class="sale">
            <div class="box-sale">
                <h1>25% off select styles</h1>
                <p>Sign in and use code <span>OYFT25</span> for 25% off. Not a member? Use code <span>FEET20</span> for an extra 20% off. Select styles. Exclusions apply.</p>
                <button onclick='window.location.href="#product"'>Shop</button>
            </div>
        </section>
       
        <!--Trending now -->
        <div class="container trend">
            <div class="row">
                <h1 style="padding-bottom: 50px; color: rgb(255, 255, 255); font-size: 70px;">TRENDING NOW</h1>
                <div class="dash"></div>
            </div>

            <div class="row" style="margin-bottom: 100px; margin-top: 25px;">
                <div class="container cont-mod">
                    <img class="img-trend-1 rounded" src="images/trend-1.jpg" alt="trending shoes">
                    <div class="position-relative trend-content">
                        <h1 style="font-size: 70px;">Step into Style</h1>
                        <p style="font-size: 20px;">Where innovative designs seamlessly blend comfort and style, <br>ensuring every step is a statement.</p>
                        <button class="btn btn-primary btn-standard" onclick="window.location.href = 'product_category.php?category=casual&gender=women'">Shop</button>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <img class="rounded img-trend"src="images/trend-2.jpg" alt="">
                    <div class="row-2-context">
                        <h3 style="font-style: italic; font-size: 40px; font-weight: bold; margin-bottom: 20px;">Footwear <br> Frenzy</h3>
                        <button class="btn btn-primary btn-standard" onclick="window.location.href = 'product_category.php?category=casual&gender=men'">Shop</button>
                    </div>
                </div>
                <div class="col">
                    <img class="rounded img-trend"src="images/trend-3.jpg" alt="">
                    <div class="row-3-context">
                        <h3 style="font-style: italic; font-size: 40px; font-weight: bold; margin-bottom: 20px;">Sole Statements</h3>
                        <button class="btn btn-primary btn-standard" onclick="window.location.href = 'product_category.php?category=casual&gender=men'">Shop</button>
                    </div>
                </div>
            </div>

        </div>

        <!--Categories-->
        <div class="container products-cat">
            <div class="row">
                <h1 style="text-align: center; padding-top: 10px; color: rgb(255, 255, 255); font-size: 70px;">Our Products</h1>
                <div class="dash" style="margin-top: 35px; margin-bottom: 0"></div>
            </div>
            <div class="row">
                    <div class="card card-cat align-items-center" >
                        <div class="card-body">
                            <h2 class="card-title">ATHLETIC SHOES</h2>
                        </div>
                        <img src="images/product-athletic.jpg" alt="" class="category-product-img rounded-0">
                        <div class="btn-men-women">
                        <a href="product_category.php?category=athletic&gender=men" class="btn btn-men-women-b">Shop Men's</a>
                        <a href="product_category.php?category=athletic&gender=women" class="btn btn-men-women-b">Shop Women's</a>
                        </div>
                    </div>
            </div>

            <div class="row">
                    <div class="card card-cat align-items-center">
                        <div class="card-body">
                            <h2 class="card-title">FORMAL SHOES</h2>
                        </div>
                        <img src="images/product-formal.jpg" alt="" class="category-product-img rounded-0">
                        <div class="btn-men-women">
                        <a href="product_category.php?category=formal&gender=men" class="btn btn-men-women-b">Shop Men's</a>
                        <a href="product_category.php?category=formal&gender=women" class="btn btn-men-women-b">Shop Women's</a>
                        </div>
                    </div>
            </div>
            
            <div class="row">
                    <div class="card card-cat align-items-center">
                        <div class="card-body">
                            <h2 class="card-title">CASUAL SHOES</h2>
                        </div>
                        <img src="images/product-casual.jpg" alt="" class="category-product-img rounded-0">
                        <div class="btn-men-women">
                        <a href="product_category.php?category=casual&gender=men" class="btn btn-men-women-b">Shop Men's</a>
                        <a href="product_category.php?category=casual&gender=women" class="btn btn-men-women-b">Shop Women's</a>
                        </div>
                    </div>
            </div>

            <div class="dash" style="margin-top: 25px;"></div>
        </div>

        <div class="nav-bottom">
            <a href="#top" class="btn btn-nav-bottom">Go Back to Top</a>
        </div>

    <?php include "footer.php"; ?>


    <script src="js/script.js"></script>
     <!--boostrap js-->
     <script src="lib/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
     <script src="lib/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>

</body>
</html>