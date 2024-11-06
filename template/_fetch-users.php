<?php
include'./libraries/database/dangnhap.php';
include'./view/header.php';
?>

<body>
  <div class="container">
    <button class="btn btn-primary my-5">
      <a href="add-user.php" class="text-white text-decoration-none">
        Add user
      </a>
    </button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Thêm/Xóa</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql = "SELECT * FROM `users`";
      $result = mysqli_query($con, $sql);
      if($result) {
        // $row = mysqli_fetch_assoc($result);
        // echo $row['id'];
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $username =  $row['username'];
          $password =  $row['password'];


          echo '<tr>
                  <th scope="row"> '.$id.' </th>
                  <td>'.$username.'</td>
                  <td>'.$password.'</td>
                  <td>
                    <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-white">Update</a></button>
                    <button class="btn btn-danger"><a href="xoa.php?xoaid='.$id.'" class="text-light">Delete</a></button>
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