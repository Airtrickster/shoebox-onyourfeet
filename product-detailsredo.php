<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Css links-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/prod-details.css">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="lib/fontawesome-free-6.2.1-web/css/all.min.css">

    <title>On your feet |</title>
</head>
<body>

    <?php include "header.php"; ?>

    <section class="main-box-details">

        <div class="container">

            <div class="flexwrapping">

                <div class="prod-box widthbox1">
                    <div class="frame">
                        <img src="images/products/athletic_shoes/men/4a84bea3f312fd5e41a20303bcdefde8d1.rsquare.w600.webp" alt="athletic shoes">
                    </div>
                </div>

                <div class="detail-container widthbox2">

                    <div class="detail-box">

                        <div class="prod-title">
                            <h1>nike</h1>
                        </div>

                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, doloremque adipisci voluptatibus, possimus hic dolores libero vitae delectus labore, amet vero! Voluptatem praesentium ut totam blanditiis ipsum cum. Consectetur, ea. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit eligendi dolores ad quos ex unde dolorem architecto repudiandae totam dicta. Quidem, ipsa facilis. Obcaecati aperiam nobis, similique consequuntur iure qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit cumque aut incidunt voluptates id provident facilis vitae ad architecto sed tenetur quas odio ex, quis veniam consectetur itaque porro rerum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate velit facere quia eum reprehenderit harum quisquam cumque! Ipsa, obcaecati deserunt? Aut quaerat quas quidem mollitia adipisci, velit fugit nesciunt similique.</p>
                        </div>

                        <div class="selection">
                            <div class="select">
                                <h1>Size:</h1>
                                <select name="" id="">
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="select">
                                <h1>Color:</h1>
                                <select name="" id="">
                                        <option value="Blue">Blue</option>
                                        <option value="Red">Red</option>
                                        <option value="Green">Green</option>
                                </select>
                            </div>
                            <div class="quantity-adder">
                                <button class="btndesign"><i class="fa-solid fa-minus"></i></button>
                                <input type="number" value="1" name="" id="">
                                <button class="btndesign"><i class="fa-solid fa-plus"></i></button>
                                <button class="longbtn">Apply</button>
                            </div>
                        </div>

                        <div class="addtocart-btn">
                            <button class="longbtn">Add to Cart</button>
                            <button class="favoritebtn"><i class="fa-regular fa-xl  fa-heart"></i> </button> <!--<i class="fa-solid fa-heart"></i>-->
                        </div>

                    </div>
                    
                </div>

            </div>

        </div>

    </section>

    <?php include "footer.php"; ?>
    
</body>
</html>