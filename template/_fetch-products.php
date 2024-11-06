<?php
include'./libraries/database/dangnhap.php';
include'./view/header.php';
?>
<body>
  <div class="container">
    <button class="btn btn-primary my-5">
      <a href="add-product.php" class="text-white text-decoration-none">
        Add product
      </a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">BRAND</th>
      <th scope="col">NAME</th>
      <th scope="col">PRICE</th>
      <th scope="col">IMAGE</th>
      <th scope="col">DEL/UP</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql = "SELECT * FROM `product`";
      $result = mysqli_query($con, $sql);
      if($result) {
        // $row = mysqli_fetch_assoc($result);
        // echo $row['id'];
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['item_id'];
          $brand =  $row['item_brand'];
          $name =  $row['item_name'];
          $price =  $row['item_price'];
          $img =  $row['item_image'];


          echo '<tr>
                  <th scope="row"> '.$id.' </th>
                  <td>'.$brand.'</td>
                  <td>'.$name.'</td>
                  <td>'.$price.'</td>
                  <td><img src="'.$img.'" alt="img1" style="width: 50px;"></td>
                  <td>
                    <button class="btn btn-primary"><a href="update-product.php?update-product-id='.$id.'" class="text-white">Update</a></button>
                    <button class="btn btn-danger"><a href="xoa-product.php?xoa-product-id='.$id.'" class="text-light">Delete</a></button>
                  </td>
                </tr>';
        }
      }
    ?>

  </tbody>
</table>
<button class="btn btn-primary my-5">
      <a href="admin.php" class="text-white text-decoration-none">
        Back
      </a>
    </button>
  </div>
</body>
<?php
include'./view/footer.php';
?>