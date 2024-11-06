<?php
session_start();
$host = "localhost"; 
$dbname = "shopee"; 
$username = "root"; 
$password = ""; 

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // Lưu trữ kết nối PDO trong biến $_SESSION
  $_SESSION['pdo_connection'] = $conn;
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
