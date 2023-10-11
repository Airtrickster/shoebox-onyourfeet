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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homepage.css">
    <script src="https://kit.fontawesome.com/97e495b249.js" crossorigin="anonymous"></script>
    <title>Shoe Box | Home</title>
</head>
<body>

    <header>
        <div class="wrap">
            <div class="flex brand">
                <a href="#">
                    <h1>Shoe Box</h1>
                </a>
            </div>
            <div class="flex">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="product.php">Products</a></li>
                    <li><a href="about.php">About us</a></li>
                    <li><a href="contact.php">Contact us</a></li>
                </ul>
            </div>
            <div class="flex" id="signin">
                <a href="#"><i class="fa-solid fa-star "></i></a>
                <a href="#"><i class="fa-solid fa-cart-shopping "></i></a>
                <a href="#">Sign in</a>
                <a href="login-signup.php">Log in</a>
            </div>
            <div class="menubar"><i class="fa-solid fa-bars"></i></div>
        </div>
    </header>

    <section class="showcase">
        <div class="box">  
            <p>Get your shoes at...</p>
            <h1>Shoe Box</h1>
            <p><Q>If I ever let my head down, it will be to admire my shoes.</Q> - Marilyn Monroe</p>
        </div>
    </section>

    <section class="service">
        <div class="container services">
            <div class="box1">
                <img src="images/fast-deliver.jpg" alt="">
                <h2>Fast Delivery</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, nesciunt nam! Dolor perspiciatis voluptatem, beatae quia, a mollitia atque magnam ea minus eum quasi deleniti fuga reiciendis, accusantium suscipit ullam!</p>
            </div>
            <div class="box1">
                <img src="images/high-quality.jpg" alt="">
                <h2>High Quality</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, nesciunt nam! Dolor perspiciatis voluptatem, beatae quia, a mollitia atque magnam ea minus eum quasi deleniti fuga reiciendis, accusantium suscipit ullam!</p>
            </div>
            <div class="box1">
                <img src="images/affordable.webp" alt="">
                <h2>Affordable Prize</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, nesciunt nam! Dolor perspiciatis voluptatem, beatae quia, a mollitia atque magnam ea minus eum quasi deleniti fuga reiciendis, accusantium suscipit ullam!</p>
            </div>
        </div>
     </section>

     <section class="new-arrivals">
        <div class="container design">
            <h1>New Arrivals</h1>
            <div class="scroll-box">

                <div class="box2 ">
                    <div class="new-content">
                        <img src="images/Jordan.webp" alt="">
                        <div class="details">
                            <h1>Jordan 1 | Black and White</h1>
                            <h3>&#8369;3600.00</h3>
                            <a href="">Add to cart</a>
                        </div>
                        
                    </div>
                </div>

                <div class="box2">
                    <div class="new-content">
                        <img src="images/Jordan.webp" alt="">
                        <div class="details">
                            <h1>Jordan 1 | Black and White</h1>
                            <h3>&#8369;3600.00</h3>
                            <a href="">Add to cart</a>
                        </div>
                        
                    </div>
                </div>

                <div class="box2">
                    <div class="new-content">
                        <img src="images/Jordan.webp" alt="">
                        <div class="details">
                            <h1>Jordan 1 | Black and White</h1>
                            <h3>&#8369;3600.00</h3>
                            <a href="">Add to cart</a>
                        </div>
                        
                    </div>
                </div>

                <div class="box2">
                    <div class="new-content">
                        <img src="images/Jordan.webp" alt="">
                        <div class="details">
                            <h1>Jordan 1 | Black and White </h1>
                            <h3>&#8369;3600.00</h3>
                            <a href="">Add to cart</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="reviews">
        <div class="container review-design">
            <h1>Reviews</h1>
            <div class="scroll-reviews">
                <div class="box-reviews">
                    <div class="user-profile">
                        <img src="images/profile.jpg" alt="">
                        <div class="user-names">
                            <h1>Juri Turiano</h1>
                            <h3>Subtilizer</h3>
                            <p>10:50 pm </p>
                        </div>
                    </div>
                    <div class="message">
                        <h1>The shoes is great</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum tempora veniam delectus. Perferendis est, neque ut, vero dolorem quas repellendus totam ipsa sapiente quisquam minima velit magnam reprehenderit asperiores cumque. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo, delectus? Ipsa voluptatem aliquam culpa perferendis, velit, porro et beatae a iste explicabo eligendi in accusantium, sed incidunt laboriosam architecto placeat!</p>
                        <div class="imgaes">
                            <img src="images/Jordan.webp" alt="">
                            <img src="images/Jordan.webp" alt="">
                        </div>
                    </div>
                    <div class="reacts">
                        <div class="like"><i class="fa-regular fa-thumbs-up fa-xl"></i></div>
                        <div class="dislike"><i class="fa-regular fa-thumbs-down fa-xl"></i></div>
                    </div>
                </div>

                <div class="box-reviews">
                    <div class="user-profile">
                        <img src="images/profile.jpg" alt="">
                        <div class="user-names">
                            <h1>Juri Turiano</h1>
                            <h3>Subtilizer</h3>
                            <p>10:50 pm </p>
                        </div>
                    </div>
                    <div class="message">
                        <h1>The shoes is great</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum tempora veniam delectus. Perferendis est, neque ut, vero dolorem quas repellendus totam ipsa sapiente quisquam minima velit magnam reprehenderit asperiores cumque. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo, delectus? Ipsa voluptatem aliquam culpa perferendis, velit, porro et beatae a iste explicabo eligendi in accusantium, sed incidunt laboriosam architecto placeat!</p>
                        <div class="imgaes">
                            <img src="images/Jordan.webp" alt="">
                            <img src="images/Jordan.webp" alt="">
                        </div>
                    </div>
                    <div class="reacts">
                        <div class="like"><i class="fa-regular fa-thumbs-up fa-xl"></i></div>
                        <div class="dislike"><i class="fa-regular fa-thumbs-down fa-xl"></i></div>
                    </div>
                </div>

                <div class="box-reviews">
                    <div class="user-profile">
                        <img src="images/profile.jpg" alt="">
                        <div class="user-names">
                            <h1>Juri Turiano</h1>
                            <h3>Subtilizer</h3>
                            <p>10:50 pm </p>
                        </div>
                    </div>
                    <div class="message">
                        <h1>The shoes is great</h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum tempora veniam delectus. Perferendis est, neque ut, vero dolorem quas repellendus totam ipsa sapiente quisquam minima velit magnam reprehenderit asperiores cumque. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo, delectus? Ipsa voluptatem aliquam culpa perferendis, velit, porro et beatae a iste explicabo eligendi in accusantium, sed incidunt laboriosam architecto placeat!</p>
                        <div class="imgaes">
                            <img src="images/Jordan.webp" alt="">
                            <img src="images/Jordan.webp" alt="">
                        </div>
                    </div>
                    <div class="reacts">
                        <div class="like"><i class="fa-regular fa-thumbs-up fa-xl"></i></div>
                        <div class="dislike"><i class="fa-regular fa-thumbs-down fa-xl"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="main-footer">
        <div class="container footer-des">
            <div class="flex">
                <div id="Logo">
                    <h1>Shoe Box</h1>
                </div>
            </div>
            <div class="flex">
                <div id="services">
                    <a href="FAQ.html">FAQs</a>
                    <a href="privacy_policy.php">Privacy Policy</a>
                    <a href="shipping_policy.php">Shipping Policy</a>
                    <a href="refund_policy.php">Refund Policy</a>
                </div>
            </div>
            <div class="flex">
                <div id="social-media">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-regular fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <footer class="sub-footer">
        <div class="container copyright">
            <p>&copy; Shoe box 2023. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="js/script.js"></script>

</body>
</html>

