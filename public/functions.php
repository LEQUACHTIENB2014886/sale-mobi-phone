<?php
  //require MySQL connect
  require'./libraries/database/connect-pdo-funtion.php';
  //require product
  require'./libraries/database/Product.php';
  //require giohang
  require'./libraries/database/giohang.php';
  //require login
  require'./libraries/database/dangnhap.php';
  // DBController Ojt
  $db = new DBController();

  //product obj
  $product = new Product($db);
  $product_shuffle = $product->getData();

  //them vao gio hang
  $giohang = new giohang($db);

  //login


  //logout

?>