<?php
include './libraries/database/dangnhap.php';

// Cập nhật thông tin người dùng trong cơ sở dữ liệu
$id = $_GET['update-product-id'];

$stmt = $db->conn->prepare("SELECT * FROM `product` WHERE item_id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$brand = $row['item_brand'];
$name = $row['item_name'];
$price = $row['item_price'];
$img = $row['item_image'];
$date = $row['item_register'];

if (isset($_POST['submit'])) {
  $brand = $_POST['brand'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $img = $_POST['img'];
  $date = $_POST['date'];

  $stmt = $db->conn->prepare("UPDATE `product` 
                              SET item_brand=:brand,
                                  item_name=:name,
                                  item_price=:price,
                                  item_image=:img,
                                  item_register=:date
                              WHERE item_id=:id");
  $stmt->bindParam(':brand', $brand);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':price', $price);
  $stmt->bindParam(':img', $img);
  $stmt->bindParam(':date', $date);
  $stmt->bindParam(':id', $id);
  $result = $stmt->execute();

  if ($result) {
    // echo "Cập nhật thành công";
    header('Location: fetch-product.php');
  } else {
    die($stmt->errorInfo());
  }
}
