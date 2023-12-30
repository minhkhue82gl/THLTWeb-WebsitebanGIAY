<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Coron - Fashion </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/plugin.css">
    <link rel="stylesheet" href="../assets/css/bundle.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <!--pos home section-->
    <div class=" pos_home_section">
        <div class="row pos_home">
            <div class="col-lg-3 col-md-8 col-12">
                <!--sidebar banner-->
                <div class="sidebar_widget banner mb-35">
                    <div class="banner_img mb-35">
                        <a href="#"><img src="assets/img/banner/banner5.jpg" alt=""></a>
                    </div>
                    <div class="banner_img">
                        <a href="#"><img src="assets/img/banner/banner6.jpg" alt=""></a>
                    </div>
                </div>
                <!--sidebar banner end-->
            </div>
            <div class="col-lg-9 col-md-12">
                <!--banner slider start-->
                <div class="banner_slider slider_1">
                    <div class="slider_active owl-carousel">
                        <div class="single_slider" style="background-image: url(assets/img/slider/slide_1.jpg)">
                            <div class="slider_content">
                                <div class="slider_content_inner">
                                    <h1>Women's Fashion</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <a href="#">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="single_slider" style="background-image: url(assets/img/slider/slider_2.jpg)">
                            <div class="slider_content">
                                <div class="slider_content_inner">
                                    <h1>New Collection</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <a href="#">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="single_slider" style="background-image: url(assets/img/slider/slider_3.jpg)">
                            <div class="slider_content">
                                <div class="slider_content_inner">
                                    <h1>Best Collection</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <a href="#">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--banner slider start-->

                <!--new product area start-->
                <div class="new_product_area">
                    <div class="block_title">
                        <h3>New Products</h3>
                    </div>

                    <?php
                    function myLoad($tenClass)
                    {
                        include "./db_php/$tenClass.php";
                    }
                    spl_autoload_register('myLoad');
                    $obj = new Products(); //load Products.php , Db.php
                    $data = $obj->product_new();

                    ?>
                    <div class="row">
                        <div class="product_active owl-carousel">
                            <?php
                            if (!isset($_SESSION['id'])) {
                                $_SESSION['id'] = 0;
                              }
                            foreach ($data as $item) {
                                echo '<div class="col-lg-3">';
                                echo '<div class="single_product">';
                                echo '<div class="product_thumb">';
                                echo '<img src="./assets/img/product/' . $item["img_name"] . '.jpg" ></a>';
                                echo '<div class="img_icone">';
                                echo '<img src="assets/img/cart/span-new.png" alt="">';
                                echo '</div>';
                                echo '<div class="product_action">';
                                echo '<form action="./viewUser/addToCart.php?name=' . $item["name"]
                                    . '&&img=' . $item["img_name"] . '&&user_id=' . $_SESSION['id'] . '" method="post">
                                        <button type="submit">Add to cart</button>
                                    </form>';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="product_content">';
                                echo '<span class="product_price">$50.00</span>';
                                echo '<h3 class="product_title"><a href="">' . $item["name"] . '</a></h3>';
                                echo '</div>';
                                echo '<div class="product_info">';
                                echo '<ul>';
                                // echo '<li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a>';
                                echo '</li>';
                                //echo '<li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>';
                                echo '</ul>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            
                            }
                            ?>


                        </div>
                    </div>
                </div>
                <!--new product area start-->

                <!--featured product start-->
                <div class="featured_product">
                    <div class="block_title">
                        <h3>Featured Products</h3>
                    </div>
                    <?php

                    $d = $obj->featured();

                    ?>
                    <div class="row">
                        <div class="product_active owl-carousel">
                            <?php
                            foreach ($d as $v) {
                                echo '<div class="col-lg-3">';
                                echo '<div class="single_product">';
                                echo '<div class="product_thumb">';
                                echo '<img src="./assets/img/product/' . $v["img_name"] . '.jpg" ></a>';
                                echo '<div class="img_icone">';
                                echo '<img src="assets/img/cart/span-new.png" alt="">';
                                echo '</div>';
                                echo '<div class="product_action">';
                                echo '<form action="./viewUser/addToCart.php?name=' . $v["name"]
                                    . '&&img=' . $v["img_name"] . '&&user_id=' . $_SESSION['id'] . '" method="post">
                                            <button type="submit">Add to cart</button>
                                        </form>';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="product_content">';
                                echo '<span class="product_price">$50.00</span>';
                                echo '<h3 class="product_title"><a href="single-product.html">' . $v["name"] . '</a></h3>';
                                echo '</div>';
                                echo '<div class="product_info">';
                                echo '<ul>';
                                //echo '<li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a>';
                                echo '</li>';
                                //echo '<li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>';
                                echo '</ul>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <!--featured product end-->

                <!--banner area start-->
                <div class="banner_area mb-60">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single_banner">
                                <a href="#"><img src="assets/img/banner/banner5.jpg" alt=""></a>
                                <div class="banner_title">
                                    <p>Up to <span> 40%</span> off</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single_banner">
                                <a href="#"><img src="assets/img/banner/banner6.jpg" alt=""></a>
                                <div class="banner_title title_2">
                                    <p>sale off <span> 30%</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--banner area end-->

                <!--brand logo strat-->
                <div class="brand_logo mb-60">
                    <div class="block_title">
                        <h3>Brands</h3>
                    </div>
                    <div class="row">
                        <div class="brand_active owl-carousel">
                            <div class="col-lg-2">
                                <div class="single_brand">
                                    <a href="#"><img src="assets/img/brand/brand1.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single_brand">
                                    <a href="#"><img src="assets/img/brand/brand2.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single_brand">
                                    <a href="#"><img src="assets/img/brand/brand3.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single_brand">
                                    <a href="#"><img src="assets/img/brand/brand4.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single_brand">
                                    <a href="#"><img src="assets/img/brand/brand5.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="single_brand">
                                    <a href="#"><img src="assets/img/brand/brand6.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--brand logo end-->
            </div>
        </div>
    </div>
    <!--pos home section end-->
    </div>
    <!--pos page inner end-->
    </div>
    </div>
    <!--pos page end-->


    <!-- all js here -->
    <script src="../assets/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/ajax-mail.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>