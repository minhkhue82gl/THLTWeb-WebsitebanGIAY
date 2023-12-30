<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Coron-cart</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets\img\favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\plugin.css">
    <link rel="stylesheet" href="assets\css\bundle.css">
    <link rel="stylesheet" href="assets\css\style.css">
    <link rel="stylesheet" href="assets\css\responsive.css">
    <script src="assets\js\vendor\modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- Add your site or application content here -->

    <!--pos page start-->
    <div class="pos_page">
        <div class="container">
            <!--pos page inner-->
            <div class="pos_page_inner">
                <!--header area -->

                <!--header end -->
                <!--breadcrumbs area start-->
                <div class="breadcrumbs_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb_content">
                                <ul>
                                    <li><a href="index.php">home</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li>Shopping Cart</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <!--breadcrumbs area end-->



                <!--shopping cart area start -->
                <div class="shopping_cart_area">

                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product_remove">Delete</th>
                                                <th class="product_thumb">Image</th>
                                                <th class="product_name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product_quantity">Quantity</th>
                                                <th class="product_total">Total</th>
                                            </tr>
                                        </thead>




                                        <?php
                                        function myLoad($tenClass)
                                        {
                                            include "./db_php/$tenClass.php";
                                        }
                                        spl_autoload_register('myLoad');
                                        $obj = new Payment(); //load Products.php , Db.php

                                        $id = $_SESSION['id'];
                                        $data = $obj->all($id);




                                        ?>
                                        <div class="row">
                                            <div class="product_active owl-carousel">
                                                <?php
                                                $gia = 100000;
                                                $sum = 0;
                                                $ship = 30000;
                                                foreach ($data as $item) {
                                                    $user_id = $item['user_id'];
                                                    echo '<tbody>';
                                                    echo '<tr>';
                                                    echo '<td class="product_remove"><a href="./viewUser/delete.php?id=' . $item['id'] . '"><i class="fa fa-trash-o"></i></a></td>';
                                                    echo '<td class="product_thumb"><a href="#"><img src="./assets/img/product/' . $item["img_name"] . '.jpg"  alt=""></a></td>';
                                                    echo '<td class="product_name"><a href="#">' . $item["img_name"] . '</a></td>';
                                                    echo '<td class="product-price">' . $gia . ' VND</td>';
                                                    //$total += $gia;
                                                    echo '<td class="product-price">
                                                                <form action="./viewUser/addToCartUpdate.php" method="post">
                                                                    <input type="number" name="quantity" value="' . $item['quantity'] . '" />
                                                                    <input type="hidden" name="product_code" value="' . $item['id'] . '"/>
                                                                    <input type="submit"  value="Up" />
                                                                </form>
                                                            </td>';
                                                    $total = $gia * $item["quantity"];

                                                    echo '<td class="product_total">' . $total . '</td>';
                                                    $sum+=$total;
                                                    echo '</tr>';
                                                }
                                                ?>
                                                </tbody>
                                    </table>
                                </div>
                                <div class="cart_submit">
                                    <?php if ($sum == 0) {
                                    } else {
                                        echo '<a href="./viewUser/deleteAll.php?id=' . $user_id . '">Xóa tất cả</a>';
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area start-->
                    <div class="coupon_area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code">
                                    <?php if ($sum == 0) {
                                    } else {


                                        echo '<h3>Cart Totals</h3>';
                                        echo '<div class="coupon_inner">';
                                        echo '<div class="cart_subtotal">';
                                        echo '<p>Subtotal</p>';
                                        echo '<p class="cart_amount">' . $sum . ' </p>';
                                        echo '</div>';
                                        echo '<div class="cart_subtotal ">';
                                        echo '<p>Shipping</p>';
                                        echo '<p class="cart_amount">' . $ship . ' VND</p>';
                                        echo '</div>';

                                        echo '<div class="cart_subtotal">';
                                        echo '<p>Total</p>';
                                        echo '<p class="cart_amount">' . $sum + $ship . ' VND</p>';
                                        echo '</div>';
                                        echo '<div class="checkout_btn">';
                                        echo '<a href="#">Proceed to Checkout</a>';
                                        echo '</div>';
                                        echo '</div>';
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area end-->

                </div>
                <!--shopping cart area end -->

            </div>
            <!--pos page inner end-->
        </div>
    </div>


    <!-- all js here -->
    <script src="assets\js\vendor\jquery-1.12.0.min.js"></script>
    <script src="assets\js\popper.js"></script>
    <script src="assets\js\bootstrap.min.js"></script>
    <script src="assets\js\ajax-mail.js"></script>
    <script src="assets\js\plugins.js"></script>
    <script src="assets\js\main.js"></script>
</body>

</html>