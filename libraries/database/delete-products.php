<?php
include './libraries/database/dangnhap.php';

// Xóa sản phẩm trong cơ sở dữ liệu
if (isset($_GET['xoa-product-id'])) {
  $id = $_GET['xoa-product-id'];

  $stmt = $db->prepare("DELETE FROM `product` WHERE item_id = :id");
  $stmt->bindParam(':id', $id);
  $result = $stmt->execute();

  if ($result) {
    // echo "Xóa thành công";
    header('Location: fetch-product.php');
  } else {
    die($stmt->errorInfo());
  }
}
?>