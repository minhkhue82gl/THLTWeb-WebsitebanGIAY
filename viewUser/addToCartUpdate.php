<?php
session_start();



$servername = "localhost";
$username = "root";
$database = "shoe";

$quantity = $_POST['quantity'];
$product_code = $_POST['product_code'];


try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // Update the count column in the payment table
   $updateStmt = $conn->prepare("UPDATE `order` SET `quantity` = :quantity WHERE `id` = :product_code");

   // Gán giá trị cho các tham số
   $updateStmt->bindParam(":quantity", $quantity);
   $updateStmt->bindParam(":product_code", $product_code);

   // Thực thi truy vấn INSERT
   $updateStmt->execute();

} catch (PDOException $e) {
    echo "Thêm không thành công: " . $e->getMessage();
} finally {
    // Đóng kết nối
    $conn = null;
}
header("location:../index.php?act=cart");


?>