    <!-- product  -->
    <?php
      $item_id = $_GET['item_id'] ?? 1;
      foreach($product->getData() as $item):
        if ($item['item_id'] == $item_id):
    ?>
    
    <section id="product" class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <img src="<?php echo $item['item_image'] ?? "./assets/products/topsale/1.png"; ?>" alt="product" class="img-fluid">
            <div class="form-row pt-4 font-size-16 font-roboto">
              <div class="col">
                <button type="submit" class="btn btn-danger form-control">
                  Thêm vào giỏ hàng
                </button>
              </div>
              <div class="col">
                <button type="submit" class="btn btn-warning form-control">
                  Thêm vào giỏ hàng
                </button>
              </div>
            </div>
          </div>
          <div class="col-sm-6 py-5">
            <h5 class="font-roboto font-size-20">
              <?php
                echo $item['item_name'] ?? "Sản phẩm không tồn tại";
              ?>
            </h5>
            <small>
              <?php
                echo $item['item_brand'] ?? "Không có brand";
              ?>
            </small>
            <div class="d-flex">
              <div class="rating text-warning font-size-12">
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="far fa-star"></i></span>
              </div>
              <a href="#" class="px-2 font-roboto font-size-14">20,000 Đánh giá |100+ Bình luận</a>
            </div>
            <hr class="m-0">

            <!-- Giá điện thoại  -->
            <table class="my-3">
              <tr class="font-roboto font-size-14">
                <td>M.R.P</td>
                <td><strike>4.100vnd</strike></td>
              </tr>
              <tr class="font-roboto font-size-14">
                <td>Deal price &nbsp;</td>
                <td class="font-size-20"><span class="text-danger"><?php echo $item['item_price'] ?? "Từ 2tr" ?></span>vnd<small>&nbsp;&nbsp;bao gồm thuế</small></td>
              </tr>
              <tr class="font-roboto font-size-14">
                <td>Bạn tiết kiệm được &nbsp;</td>
                <td class="font-size-20"><span class="text-danger">1</span>tr<small></td>
              </tr>
            </table>
            <!-- end giá điện thoại  -->

            <!-- chính sách của shop  -->
            <div class="policy">
              <div class="d-flex">
                <div class="return text-center mr-5">
                  <div class="font-size-20 my-2 color-second">
                    <span class="fas fa-retweet border p-3 rounded-pill"></span>
                  </div>
                  <a href="#" class="font-roboto font-size-12">Hoàn tiền trong 10 ngày</a>
                </div>
                <div class="return text-center mr-5">
                  <div class="font-size-20 my-2 color-second">
                    <span class="fas fa-truck border p-3 rounded-pill"></span>
                  </div>
                  <a href="#" class="font-roboto font-size-12">Vận chuyển</a>
                </div>
                <div class="return text-center mr-5">
                  <div class="font-size-20 my-2 color-second">
                    <span class="fas fa-check-double border p-3 rounded-pill"></span>
                  </div>
                  <a href="#" class="font-roboto font-size-12">1 năm bảo hành</a>
                </div>
              </div>
            </div>
            <!-- end chính sách của shop    -->
            <hr>

            <!-- Chi tiết đơn hàng  -->
            <div id="order-details" class="font-roboto d-flex flex-column text-dark">
              <small>Giao hàng từ 3 -5 ngày</small>
              <small>Được bán bởi <a href="$">Samsung shop</a>(4.5 trên 5 | 18,800 lượt đánh giá)</small>
              <small>
                <i class="fas fa-map-marked-alt color-primary"></i>
                &nbsp;&nbsp;Thành Phố HCM, Quận 1
              </small>
            </div>
            <!-- end chi tiết đơn hàng  -->

            <div class="row">
              <div class="col-6">
                <!-- color  -->
                <div class="color my-3">
                  <div class="d-flex justify-content-between">
                    <h6 class="font-roboto">Color: </h6>
                    <div class="p-2 color-yellow-bg rounded-circle">
                      <button class="btn font-size-14">
                      </button>
                    </div>
                    <div class="p-2 color-second-bg rounded-circle">
                      <button class="btn font-size-14">
                      </button>
                    </div>
                    <div class="p-2 color-primary-bg rounded-circle">
                      <button class="btn font-size-14">
                      </button>
                    </div>
                  </div>
                </div>
                <!-- end color  -->
              </div>

              <!-- số lượng  -->
              <div class="col-6">
                <!-- thanh số lượng  -->
                <div class="qty d-flex">
                  <h6 class="font-roboto">SL:</h6>
                  <div class="px-4 d-flex font-roboto">
                    <button class="qty-up border bg-light">
                      <i class="fas fa-angle-up"></i>
                    </button>
                    <input type="text" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                    <button class="qty-down border bg-light">
                      <i class="fas fa-angle-down"></i>
                    </button>
                  </div>
                </div>
                <!-- end thanh số lượng  -->
              </div>
              <!-- end số lượng  -->
            </div>

            <!-- size -->
            <div class="size my-3">
              <h6 class="font-roboto">
                Size: 
              </h6>
              <div class="d-flex justify-content-between w-75">
                <div class="font-roboto border p-2">
                  <button class="btn p-0 font-size-14">
                    4GB RAM
                  </button>
                </div>
                <div class="font-roboto border p-2">
                  <button class="btn p-0 font-size-14">
                    6GB RAM
                  </button>
                </div>
                <div class="font-roboto border p-2">
                  <button class="btn p-0 font-size-14">
                    8GB RAM
                  </button>
                </div>
              </div>
            </div>
            <!-- end size  -->

          </div>

          <div class="col-12">
            <h6>Chi tiết sản phẩm</h6>
            <hr>
            <p class="font-roboto font-size-14">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. 
              Praesentium consequuntur dolorum saepe officia quaerat culpa 
              assumenda ut esse deleniti debitis. Voluptates obcaecati reiciendis 
              voluptate incidunt accusamus aperiam sit fugit molestias dolorum 
              consectetur corrupti provident veniam, quia at quam exercitationem 
              voluptatibus.
            </p>
            <p class="font-roboto font-size-14">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. 
              Praesentium consequuntur dolorum saepe officia quaerat culpa 
              assumenda ut esse deleniti debitis. Voluptates obcaecati reiciendis 
              voluptate incidunt accusamus aperiam sit fugit molestias dolorum 
              consectetur corrupti provident veniam, quia at quam exercitationem 
              voluptatibus.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- end product  -->
    <?php 
      endif;
      endforeach;
    ?>