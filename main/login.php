<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Coron-login</title>
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
  <style>
    
  </style>
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
                  <li><a href="./index.php">home</a></li>
                  <li><i class="fa fa-angle-right"></i></li>
                  <li>login</li>
                </ul>

              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs area end-->

        <!-- customer login start -->
        <div class="customer_login">
          <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
              <div class="account_form">
                <h2>login</h2>
                <form action="./main/login.php" method="post">
                  <p>
                    <label>Username <span>*</span></label>
                    <input type="text" name="username">
                  </p>
                  <p>
                    <label>Passwords <span>*</span></label>
                    <input type="password" name="pw">
                  </p>
                  <div class="login_submit">
                    <button type="submit">login</button>
                    <a href="./index.php?act=signup">Đăng ký tài khoản</a>
                  </div>
                </form>
              </div>
            </div>
            <!--login area start-->

          </div>
        </div>
        <!-- customer login end -->

      </div>
      <!--pos page inner end-->
    </div>
  </div>
  <!--pos page end-->






  <!-- all js here -->
  <script src="assets\js\vendor\jquery-1.12.0.min.js"></script>
  <script src="assets\js\popper.js"></script>
  <script src="assets\js\bootstrap.min.js"></script>
  <script src="assets\js\ajax-mail.js"></script>
  <script src="assets\js\plugins.js"></script>
  <script src="assets\js\main.js"></script>
</body>

</html>

<!-- Code PHP -->
<?php

$servername = "localhost";
$username = "root";
$database = "shoe";

// Kiểm tra xem form đã được gửi đi hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Lấy giá trị từ form
  $user = $_POST["username"];
  $pw = $_POST["pw"];

  // Tạo kết nối đến cơ sở dữ liệu
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
    exit();
  }

  //Thực hiện truy vấn SELECT
  $stmt = $conn->query("SELECT * FROM user WHERE username='$user' AND password='$pw'");
  // Lấy kết quả trả về dưới dạng mảng kết hợp
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  //var_dump($results);
  if (empty($results)) {
    header('location:../index.php?act=login');
  } else {
    //Duyệt qua các kết quả
    foreach ($results as $row) {
      if (($row['username']) == $user && ($row['password']) == $pw && $row['role'] == 1) {

        //$ss = $row['username'];
        $_SESSION['admin'] = $user;
        header('location:../viewAdmin/user.php');
        break;
      }
      if (($row['username']) == $user && ($row['password']) == $pw && $row['role'] == 0) {
        // $_SESSION['user'] = $user;
        // $_SESSION['pw'] = $pw;

        $_SESSION['ten'] = $row['username'];
        //echo $_SESSION['ten1'];
        // $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id'];

        header('location:../index.php');
        break;
      }
    }
  }

  // Đóng kết nối
  $conn = null;
}
?>
<!-- Code PHP -->