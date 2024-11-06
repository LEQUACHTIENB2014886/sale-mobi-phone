<?php
session_start();
include 'connect-pdo-function.php';

// Thêm người dùng vào cơ sở dữ liệu
if (isset($_POST['submit']) || isset($_POST['reg']) || isset($_POST['add'])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];

  try {
    // Sử dụng kết nối PDO từ biến $_SESSION
    $conn = $_SESSION['pdo_connection'];

    // Thực hiện truy vấn dựa trên hành động được gửi từ biểu mẫu
    if (isset($_POST['submit'])) {
      $stmt = $conn->prepare("INSERT INTO `user` (first_name, last_name) VALUES (:first_name, :last_name)");
    } elseif (isset($_POST['reg'])) {
      $stmt = $conn->prepare("SELECT * FROM `user` WHERE first_name=:first_name");
      $stmt->bindParam(':first_name', $first_name);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        echo 'First name already exists.';
        exit;
      }

      $stmt = $conn->prepare("INSERT INTO `user` (first_name, last_name) VALUES (:first_name, :last_name)");
    } elseif (isset($_POST['add'])) {
      $stmt = $conn->prepare("SELECT * FROM `user` WHERE first_name=:first_name");
      $stmt->bindParam(':first_name', $first_name);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        echo 'First name already exists.';
        exit;
      }

      $stmt = $conn->prepare("INSERT INTO `user` (first_name, last_name) VALUES (:first_name, :last_name)");
    }

    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $result = $stmt->execute();

    if ($result) {
      header('Location: fetch-user.php');
      exit;
    } else {
      die("Lỗi khi thực hiện truy vấn.");
    }
  } catch (PDOException $e) {
    die("Lỗi khi thực hiện truy vấn: " . $e->getMessage());
  }
}
?>