<?php
ob_start();
include'./view/user-header.php';
include'./template/_bg-home.php';
include'./template/_top-sale.php';
include'./template/_special-prices.php';
?>

    <!-- quang cao - giam gia  -->
    <section id="banner_adds">
      <div class="container py-5 text-center">
        <img src="./assets/discount-pic/banner1-cr-500x150.jpg" alt="banner-1-giamgia" class="img-fluid">
        <img src="./assets/discount-pic/banner2-cr-500x150.jpg" alt="banner-1-giamgia" class="img-fluid">
      </div>
    </section>
    <!-- end quang cao - giam gia  -->

<?php 
include'./template/_new-product.php';
include'./template/_latest-blog.php';
include'./view/footer.php';
?>
