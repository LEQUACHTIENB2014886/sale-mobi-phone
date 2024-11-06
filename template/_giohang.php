    <!-- giỏ hàng  -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['delete-cart-submit'])) {
        $deleterecord = $giohang->deleteCart($_POST['item_id']);
      }
    }

    ?>
    <section id="cart" class="py-3 mb-5">
      <div class="container-fluid w-75">
        <h5 class="font-roboto font-size-20">Giỏ Hàng</h5>

        <!-- sản phảm trong giỏ hàng  -->
        <div class="row">
          <div class="col-sm-9">
            <?php

            foreach ($product->getData('cart') as $item) :
              $giohang = $product->getProduct($item['item_id']);
              $subTotal[] = array_map(function ($item) {
            ?>
                <!-- sản phẩm -->
                <div class="row border-top py-3 mt-3">
                  <div class="col-sm-2">
                    <img src="<?php echo $item['item_image'] ?? "./assets/products/topsale"; ?>" alt="sanpham1" class="img-fluid" style="height: 120px;">
                  </div>
                  <div class="col-sm-8">
                    <h5 class="font-roboto font-size-20"><?php echo $item['item_name'] ?? "Sản phẩm không tồn tại"; ?></h5>
                    <small><?php echo $item['item_brand'] ?? "Không có thương hiệu"; ?></small>
                    <!-- đánh giá  -->
                    <div class="d-flex">
                      <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                      </div>
                      <a href="#" class="px-2 font-roboto font-size-14">18,880 lượt đánh giá</a>
                    </div>
                    <!-- end đánh giá  -->


                    <!-- số lượng  -->
                    <div class="qty d-flex pt-2">
                      <div class="d-flex font-roboto w-25">
                        <!-- thanh số lượng  -->
                        <button class="qty-up border bg-light" data-id="pro1">
                          <i class="fas fa-angle-up"></i>
                        </button>
                        <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                        <button class="qty-down border bg-light" data-id="pro1">
                          <i class="fas fa-angle-down"></i>
                        </button>
                        <!-- end thanh số lượng  -->
                      </div>
                      <form method="post">
                        <input type="hidden" value="<?php echo $item['item_id'] ?>" name="item_id">
                        <button type="submit" name="delete-cart-submit" class="btn font-roboto text-danger px-3 border-right">
                          Xóa
                        </button>
                      </form>

                      <button type="submit" class="btn font-roboto text-danger border-right">
                        Thêm vào giỏ hàng
                      </button>
                    </div>
                    <!-- end số lượng  -->
                  </div>

                  <div class="col-sm-2">
                    <div class="font-size-20 text-danger font-roboto">
                      <span class="product_price"><?php echo $item['item_price'] ?? "Từ 2tr"; ?></span>vnd
                    </div>
                  </div>
                </div>
                <!-- end sản phẩm  -->
            <?php
                return $item['item_price'];
              }, $giohang);
            endforeach;
            ?>
          </div>
          <!-- tổng  -->
          <div class="col-sm-3">
            <div class="sub-total border text-center mt-2">
              <h6 class="font-roboto font-size-14 py-3 text-success">
                <i class="fas fa-check"></i>
                Đơn hàng của bạn đủ điều kiện để được miễn ship
              </h6>
              <div class="border-top py-4">
                <?php if (isset($subTotal) && is_array($subTotal)) : ?>
                  <h5 class="font-roboto font-size-20">
                    Tổng (<?php echo count($subTotal) ?> món): &nbsp;<span class="text-danger" id="deal-price">
                      <?php
                      // echo $giohang->getSum($subTotal);
                      ?>
                    </span>vnd
                  </h5>
                <?php else : ?>
                  <h5 class="font-roboto font-size-20">
                    Tổng: &nbsp;<span class="text-danger" id="deal-price">0</span>vnd
                  </h5>
                <?php endif; ?>
                <button type="submit" class="btn btn-warning">Mua</button>
              </div>
            </div>
          </div>
          <!-- end tổng  -->
        </div>
        <!-- end sản phẩm trong giỏ hàng -->
      </div>
    </section>
    <!-- end giỏ hàng  -->