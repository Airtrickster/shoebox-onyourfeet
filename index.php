<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    if (isset($_SESSION["user_id"]) && $_SESSION["user_type"] == "admin") {
        echo '<script> window.location.href = "product_maintenance.php"; </script>';
    }
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoebox | Home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">

    <link rel="icon" href="images/icon.png">

</head>
<body>

<!-- header section starts  -->

<?php include "header.php"; ?>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <p>Get your shoes at...</p>
        <img src="images/icon.png" alt="mini logo">
        <p><q>If I ever let my head down, it will be to admire my shoes.</q> - Marilyn Monroe</p>
        <a class="btn" href="product.php">Get Yours Now!</a>
    </div>

</section>

<!-- home section ends -->

<section class="service">
        <div class="container services">
            <div class="box1">
                <img src="images/fastDelivery.webp" alt="">
                <h2>Fast Delivery</h2>
                <p>Experience the joy of swift service with our Fast Delivery option. We understand that time is precious, and that’s why we ensure your favorite shoes reach your doorstep in record time. Our efficient logistics and dedicated team work tirelessly to deliver your order promptly, without compromising on care or accuracy. Step into style sooner with our trusted delivery service</p>
            </div>
            <div class="box1">
                <img src="images/highQuality.webp" alt="">
                <h2>High Quality</h2>
                <p>Step up your shoe game with our High Quality collection. Each pair is crafted with meticulous attention to detail, using only the finest materials to ensure durability and comfort. Our commitment to excellence is evident in every stitch and sole, providing you with footwear that not only looks exceptional but feels great too. Choose quality that stands the test of time and makes every step a statement.</p>
            </div>
            <div class="box1">
                <img src="images/affordable.webp" alt="">
                <h2>Affordable Prize</h2>
                <p>Discover the perfect blend of style and value with our Affordable Price range. We believe that high fashion shouldn’t come with a high cost, which is why we offer competitive pricing on all our shoes. Indulge in the latest trends and classic designs without breaking the bank. Quality footwear is now accessible to everyone, because you deserve to look your best, for less.</p>
            </div>
        </div>
     </section>

     <section class="review" id="review">

<h1 class="heading"> customer's <span>review</span> </h1>

<div class="box-container">

    <div class="box">
        <img src="images/quote-img.png" alt="" class="quote">
        <p>Wow! I finally found the shoe that I was looking for and it fits with my size! This store is a lifesaver</p>
        <img src="images/hern.jpg" class="user" alt="">
        <h3>Person 1</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
    </div>

    <div class="box">
        <img src="images/quote-img.png" alt="" class="quote">
        <p>"I ordered the Axel Arigato Clean 90, it is indeed cleaaannnn!! sheeshhh..., I'll order again"</p>
        <img src="images/eme.jpg" class="user" alt="">
        <h3>Person 2</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
    </div>
    
    <div class="box">
        <img src="images/quote-img.png" alt="" class="quote">
        <div>
        <p class="text-wrap">This website is amazing! The layout is very user-friendly, and the search engine optimization is top notch. I would definitely recommend this website to anyone looking for a great online shopping experience.  </p>
        <p id="hide" style="display:none;"> The website was very easy to use and I enjoyed browsing through the different styles of shoes and it was helpful to be able to see how the shoes would look before making a purchase.  I enjoy shopping online and using this website for purchasing online was a smooth and easy process. I will definitely shop on this website again.</p>
        <button id="show">show more</button>
        <button id="hider">hide</button>
    </div>
        <img src="images/cal.jpg" class="user" alt="">
        <h3>Person 3</h3>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
        </div>
    </div>

</div>

</section>

<!-- footer section starts  -->

<?php include "footer.php"; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>