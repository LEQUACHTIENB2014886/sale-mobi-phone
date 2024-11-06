<?php
// Include file kết nối CSDL
include 'connect-pdo-function.php';

// Thêm sản phẩm vào CSDL
if (isset($_POST['submit'])) {
  $brand = $_POST['brand'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $img = $_POST['img'];
  $date = $_POST['date'];

  $sql = "INSERT INTO `product` (item_brand, item_name, item_price, item_image, item_register)
          VALUES (?, ?, ?, ?, ?)";
  try {
    // Sử dụng kết nối PDO từ biến $_SESSION
    $conn = $_SESSION['pdo_connection'];
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $brand);
    $stmt->bindParam(2, $name);
    $stmt->bindParam(3, $price);
    $stmt->bindParam(4, "./assets/products/topsale/$img");
    $stmt->bindParam(5, $date);
    $stmt->execute();

    // Chuyển hướng đến trang fetch-product.php sau khi thêm thành công
    header('Location: fetch-product.php');
    exit;
  } catch (PDOException $e) {
    die("Lỗi khi thực hiện truy vấn: " . $e->getMessage());
  }
}
