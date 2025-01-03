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
    <script src="https://kit.fontawesome.com/97e495b249.js" crossorigin="anonymous"></script>
    <title>Shoe Box | Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

*{
    margin: 0px;
    padding: 0px;
    font-family: "Inter";
    color: #fff;
}

/* Global */

.wrap{
    width: 90%;
    margin: auto;

    display: flex;
    justify-content: center;
    align-items: center;
}

.container{
    width: 80%;
    margin: auto;
}

::-webkit-scrollbar{
    background: #13131a;
    width: 10px;
    height: 10px;
}

::-webkit-scrollbar-thumb{
    background: #3f3f50;
    border-radius: 20px;
}

/* Nav bar */

header{
    background: #13131a;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.flex{
    display: flex;
    width: 33.3%;
}

.flex:first-child{
    justify-content: flex-start;
}

.flex:nth-child(2){
    justify-content: center;
}

.flex:nth-child(3){
    justify-content: flex-end;
}

.brand a{
    color: #000;
    text-decoration: none;
}

.brand a h1{
    font-size: 25px;
}

ul {
    list-style: none;

}

ul li{
    display: inline;
    margin: 0px 15px;
}

ul li a{
    color: #fff;
    text-decoration: none;
    font-size: 16px;
}

ul li a:hover{
    text-decoration-line: underline;
    text-decoration-color: #d3ad7f;
    text-decoration-thickness: 2px;
    text-underline-offset: .25em;
}

#signin{
    display: flex;
    align-items: center;
}

#signin a{
    margin: 0px 8px;
}

#signin a:nth-child(3), #signin a:nth-child(4){
    color: #000;
    text-decoration: none;
    background-color: #d3ad7f;
    padding: 3px 15px;
    border-radius: 20px;
}

#signin a:nth-child(3):hover,#signin a:nth-child(4):hover{
    background: #ffd5a1;
    transition: all .15s ease-in;
}

/* Showcase */
.showcase{
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(images/bgs3.webp) no-repeat center;
    background-size: cover;
    height: 80vh;
    display: grid;
    place-items: center ;
}

.box{
    /* max-width: 60%;
    min-height: 55%; */
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 30px;
}

.box img{
    width: 30%;
    aspect-ratio: 1/1;
    margin-bottom: 20px;
}

.box h1{
    font-size: 5rem;
    text-transform: uppercase;
    margin: 15px 0px;
}

.box p{
    font-size: 15px;
    text-align: center;
}

/* Service*/
.service{
    background: #13131a;
    height: 50vh;
    display: grid;
    place-items: center;
}

.services{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 40px;
}

.box1{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.box1 img{
    width:30%;
    aspect-ratio: 1/1;
    border-radius: 50%;
    margin-bottom: 20px;
}

.box1 h2{
    margin-bottom: 20px;
    font-size: 18px;
    text-transform: uppercase;
}

.box1 p{
    font-size: 15px;
    text-align: center;
}

/* New Arrivals */

.new-arrivals{
    background: #13131a;
    padding: 20px 0px;
}


.design h1{
    font-size: 30px;
    text-align: center;
}


.scroll-box{
    /* border: 2px solid #fff; */
    overflow-x: hidden;
    overflow-x: scroll;
    white-space: nowrap;
}


.box2{
    display: inline-block;
    background: #1c1c26;
    border-radius: 10px;
    max-width: 50%;
    margin: 40px 10px;
}

.new-content{
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px 0px;
    display: flex;
    gap: 20px;
}

.new-content img{
    width: 30%;
    border-radius: 5px;
}

.new-content h3{
    margin: 15px 0px;
}


.new-content a{
    text-decoration: none;
    background: #d3ad7f;
    color: #000;
    padding: 3px 15px;
    border-radius: 5px;
}

.new-content a:hover{
    background: #ffd5a1;
    transition: all .15s ease-in;
}

/* Reviews */

.reviews{
    background: #13131a;
}

.review-design h1{
    font-size: 30px;
    text-align: center;
}  

.scroll-reviews{
    height: 80vh;
    overflow: hidden;
    overflow-y: scroll;
}

.box-reviews{
    background: #1c1c26;
    padding: 20px;
    margin: 15px;
    border-radius: 10px;
}

.user-profile{
    display: flex;
    align-items: center;
    gap: 10px;
}

.user-profile img{
    width: 5%;
    border-radius: 50%;
    border: solid #fff 2px;
}

.user-profile h1{
    font-size: 20px;
}

.user-profile h3{
    font-size: 15px;
    font-weight: 200;
}

.user-profile p{
    font-size: 12px;
    font-weight: 200;
}

.message h1{
    text-align: start;
    margin: 15px 0px 5px ;
    font-size: 18px;
}

.message p{
    margin: 10px 0px 15px;
    font-size: 15px;
}

.message img{
    width: 15%;
}

.reacts{
    display:flex ;
    align-items: center;
}

.reacts :is(.like,.dislike){
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.reacts :is(.like i,.dislike i):hover{
    color: #c4c4c4;
    cursor: pointer;
}

/* Footer */

.main-footer{
    background: #13131a;
    padding: 20px 0px;
}

.footer-des{
    display: flex;
}

#services{
    display: flex;
    justify-content: center;
    align-items: center;
}

#services a{
    font-size: 13px;
    color: #fff;
    border-right: 1px solid #c4c4c4;
    display: inline-block;
    text-decoration: none;
    padding: 0 10px;
    font-size: 13px;
}

#services a:hover{
    text-decoration: underline;
}

#services a:last-child {
    border-right:0;
} 

#social-media{
    display: flex;
    align-items: center;
    gap: 15px;
}

#social-media a{
    border: #fff 2px solid;
    padding: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    border-radius: 50%;
}

#social-media a:first-child{
    width: 16px;
}

#social-media a:nth-child(2){
    width: 16px;
}

#social-media a:hover{
    background: #d3ad7f;
}

.sub-footer{
    background: #13131a;
    padding: 10px 0px;
}

.copyright{
    text-align: center;
    font-size: 14px;
}

@media screen and (max-width: 767px){

    /* header */

    header ul{
        display: none;
    }

    header .brand h1{
        font-size: 18px;
    }

    header #signin a:nth-child(4), #signin a:nth-child(3){
        font-size: 10px;
        padding: 0px 20px;
        margin: 0px 4px;
    }

    .menubar{
        margin: 0px 5px;
    }

    /* Showcase */

    .showcase{
        height: 60vh;
    }

    .box h1{
       text-align: center;
       font-size: 3rem;
    }
    
    .box p{
        text-align: center;
    }

    /* Service */
    .service{
        background: #13131a;
        height: 140vh;
        display: grid;
        place-items: center;
    }
    
    .services{
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        margin: 30px 0px;
    }

    /* new arrivals */

    .scroll-box{
        /* border: 2px solid #fff; */
        overflow-y: hidden;
        overflow-y: scroll;
        white-space: normal;
    }

    .box2{
        background: #1c1c26;
        border-radius: 10px;
        max-width: 100%;
        margin: 10px 0px;
    }
    
    .new-content{
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px 0px;
    }


    .details{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .details h1{
        font-size: 20px;
    }

}
    </style>
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
                <p>Experience the joy of swift service with our Fast Delivery option. We understand that time is precious, and that’s why we ensure your favorite shoes reach your doorstep in record time. Our efficient logistics and dedicated team work tirelessly to deliver your order promptly, without compromising on care or accuracy. Step into style sooner with our trusted delivery service</p>
            </div>
            <div class="box1">
                <img src="images/high-quality.jpg" alt="">
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

