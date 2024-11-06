<?php
// Kiểm tra đăng nhập
if (isset($_POST['dangnhap'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  try {
    $stmt = $db->prepare("SELECT * FROM `users` WHERE username=:username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      // Kiểm tra mật khẩu
      if (password_verify($password, $user['password'])) {
        if ($username == 'admin') {
          header("Location: admin.php");
        } else {
          header("Location: user-page.php");
        }
      } else {
        die("Sai mật khẩu");
      }
    } else {
      die("Người dùng không tồn tại");
    }
  } catch (PDOException $e) {
    die("Lỗi khi thực hiện truy vấn: " . $e->getMessage());
  }
}
?>