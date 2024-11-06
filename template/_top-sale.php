<!-- Top sale  -->
<?php
  shuffle($product_shuffle);

  //post require
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['top_sale_submit'])){
      // goi ham them vao gio hang
      $giohang->addToCart($_POST['user_id'], $_POST['item_id']);
    }
  }
?>
<section id="top-sale">
      <div class="container py-5">
        <h4 class="font-roboto font-size-20">Top Sale</h4>
        <hr>
        <!-- owl carousel top sale  -->
        <div class="owl-carousel owl-theme">
          <?php foreach ($product_shuffle as $item) {?>
          <div class="item py-2 bg-light">
            <div class="product font-roboto">
              <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>">
                <img src="<?php echo $item['item_image'] ?? "./assets/products/topsale/1.png" ?>" alt="product1" class="img-fluid">
              </a>
              <div class="text-center">
                <h6><?php echo $item['item_name'] ?? "khong biet" ?></h6>
                <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <div class="price py-2">
                  <span><?php echo $item['item_price'] ?? "Từ 3tr" ?></span>
                </div>
                <form method="post">
                  <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                  <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                  <button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Thêm vào giỏ hàng</button>
                </form>
              </div>
            </div>
          </div>
          <?php } //close foreach funtion?>
        </div>
        <!-- end owl carousel top sale  -->
      </div>
    </section>
    <!-- end Top sale  -->