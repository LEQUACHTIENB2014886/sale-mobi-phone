<?php
include './libraries/database/dangnhap.php';

// Xóa người dùng trong cơ sở dữ liệu
if (isset($_GET['xoaid'])) {
  $id = $_GET['xoaid'];

  $stmt = $db->prepare("DELETE FROM `users` WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $result = $stmt->execute();

  if ($result) {
    // echo "Xóa thành công";
    header('Location: fetch-user.php');
  } else {
    die($stmt->errorInfo());
  }
}
?>