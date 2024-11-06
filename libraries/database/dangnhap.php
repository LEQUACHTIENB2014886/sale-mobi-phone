<?php
// Kết nối cơ sở dữ liệu
try {
  $dsn = 'mysql:host=localhost;dbname=shopee;charset=utf8';
  $username = 'root';
  $password = '';

  $db = new PDO($dsn, $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die('Kết nối cơ sở dữ liệu thất bại: ' . $e->getMessage());
}
?>