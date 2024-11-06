<!-- Special prices  -->
<?php
  $brand = array_map(function($pro){return $pro['item_brand'];},$product_shuffle);
  $unique = array_unique($brand);
  sort($unique);
  shuffle($product_shuffle);

  //post require
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['special_prices_submit'])){
      // goi ham them vao gio hang
      $giohang->addToCart($_POST['user_id'], $_POST['item_id']);
    }
  }
?>

<section id="special-price">
      <div class="container">
        <h4 class="font-roboto font-size-20">
          Special Prices
        </h4>
        <div id="filters" class="button-group text-right">
          <button class="btn is-checked" data-filter="*">Tất cả</button>
          <?php 
            array_map(function($brand){
              printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
            },$unique)
          ?>
<!--           
          <button class="btn" data-filter=".Samsung">Samsung</button>
          <button class="btn" data-filter=".Redmi">Redmi</button> -->
        </div>

        <div class="grid">
          <?php array_map(function($item){?>
          <div class="grid-item border <?php echo $item['item_brand'] ?? "Apple"; ?>">
            <div class="item py-2 bg-light" style="width:200px">
              <div class="product font-roboto">
                <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>">
                  <img src="<?php echo $item['item_image'] ?? "./assets/products/topsale/13.png"; ?>" alt="product1" class="img-fluid">
                </a>
                <div class="text-center">
                  <h6><?php echo $item['item_name'] ?? "Điện thoại không tồn tại";?></h6>
                  <div class="rating text-warning font-size-12">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="far fa-star"></i></span>
                  </div>
                  <div class="price py-2">
                    <span><?php echo $item['item_price'] ?? "Từ 2tr" ?></span>
                  </div>
                  <form method="post">
                  <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                  <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                  <button type="submit" name="special_prices_submit" class="btn btn-warning font-size-12">Thêm vào giỏ hàng</button>
                </form>
                </div>
              </div>
            </div>
          </div>
          <?php }, $product_shuffle)?>
        </div>
      </div>
    </section>
    <!-- end Special prices  -->