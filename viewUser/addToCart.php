<?php
session_start();

$servername = "localhost";
$username = "root";
$database = "shoe";

$img = $_GET['img'];
$name = $_GET['name'];
$user_id = $_GET['user_id'];

if ($user_id == 0) {
    header("location:../index?act=login");
} else {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Chuẩn bị truy vấn INSERT
        $stmt = $conn->prepare("INSERT INTO `order` (`user_id`, `name`, `img_name`,`quantity`) 
                                VALUES (:user_id, :name, :img,1)");

        // Gán giá trị cho các tham số
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":img", $img);

        // Thực thi truy vấn INSERT
        $stmt->execute();




        $_SESSION['user_id'] = $user_id;
        echo "Insert thành công!";
        header("location:../index.php");
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}



// Update the count column in the payment table
// $updateStmt = $conn->prepare("UPDATE payment SET count = 1 WHERE product_code = :product_code");

// // Gán giá trị cho các tham số
// $updateStmt->bindParam(":product_code", $product_code);

// // Thực thi truy vấn INSERT
// $updateStmt->execute();

// // Lấy số lượng
// $selectStmt = $conn->query("SELECT count(count) FROM `payment` WHERE user_id=$user_id GROUP BY user_id");
// // Lấy kết quả trả về dưới dạng số
// $sl = $selectStmt->fetchColumn();
// //gán cho session
// $_SESSION['sl'] = $sl;


//header("location:../index.php");
