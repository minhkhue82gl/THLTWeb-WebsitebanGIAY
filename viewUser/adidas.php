<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Coron - Adidas</title>
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


    <!--new product area start-->
    <div class="new_product_area">
        <div class="block_title">
        </div>

        <?php
        function myLoad($tenClass)
        {
            include "./db_php/$tenClass.php";
        }
        spl_autoload_register('myLoad');
        $obj = new Products(); //load Products.php , Db.php
        $data = $obj->product_adidas();
        $soluong=count($data);
        ?>
         <div class="block_title">
             <h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Adidas - <?php echo $soluong?></h3>;
        </div>
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
                    echo '<h3 class="product_title"><a href="single-product.html">' . $item["name"] . '</a></h3>';
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