<?php
include './libraries/database/dangnhap.php';

// Cập nhật thông tin người dùng trong cơ sở dữ liệu
$id = $_GET['updateid'];

$stmt = $db->conn->prepare("SELECT * FROM `users` WHERE id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$username = $row['username'];
$password = $row['password'];

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $db->conn->prepare("UPDATE `users` 
                              SET username=:username, password=:password 
                              WHERE id=:id");
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $password);
  $stmt->bindParam(':id', $id);
  $result = $stmt->execute();

  if ($result) {
    // echo "Cập nhật thành công";
    header('Location: fetch-user.php');
  } else {
    die($stmt->errorInfo());
  }
}
?>