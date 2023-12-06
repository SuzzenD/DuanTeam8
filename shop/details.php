<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "./layout/header.php"; ?>
</head>

<body>
  <div class="wrapper">
    <?php include "./layout/nav.php" ?>
    <div class="container_fullwidth">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="special-deal leftbar">
              <h4 class="title">
                Sản phẩm
                <strong> Giảm giá 10% - 50%</strong>
              </h4>
              <!-- CODE HIỂN THỊ SALE UP 10% - 50% -->
              <?php
              require_once('../../asmm/admin/dao/hang-hoa.php');
              extract($_REQUEST);
              $items = hang_hoa_sale();
              ?>
              <?php foreach ($items as $item) {
                extract($item);
              ?>
                <div class="special-item">
                  <div class="product-image">
                    <a href="details.php?ma_hh=<?= $ma_hh ?>&ma_loai=<?= $ma_loai ?>">
                      <img src="../asmm/css/admin/images/products/<?= $hinh ?>" alt="" />
                    </a>
                  </div>
                  <div class="product-info">
                    <p><?= $ten_hh ?></p>
                    <h5 class="price"><b><?= number_format($don_gia - ($don_gia * $giam_gia / 100)) ?> VNĐ</b></h5>
                  </div>
                </div>
              <?php } ?>
            </div>
            <div class="clearfix"></div>
            <div class="product-tag leftbar">
              <!-- CODE HIỂN THỊ DANH MỤC -->
              <?php
              require_once('../../asmm/admin/dao/loai-hang.php');
              extract($_REQUEST);
              $items = loai_hang_select_all();
              ?>
              <h3 class="title">
                Danh mục
              </h3><?php foreach ($items as $item) {
                      extract($item);
                    ?>
                <ul>
                  <a href="sp-cung-loai.php?ma_loai=<?= $ma_loai ?>">
                    <li><?= $ten_loai ?></li>
                  </a>
                </ul>
              <?php } ?>
            </div>
          </div>
          <div class="col-md-9">
            <div class="products-details">
              <!-- CODE HIỂN THỊ CHI TIẾT SẢN PHẨM -->
              <?php
              require_once('../asmm/admin/dao/hang-hoa.php');
              extract($_REQUEST);
              $items = hang_hoa_select_by_id($ma_hh);
              extract($items);
              ?>
              <div class="preview_image">
                <div class="preview-small">
                  <img id="zoom_03" src="../../asmm/css/admin/images/products/<?= $hinh ?>" data-zoom-image="../../asmm/css/admin/images/products/<?= $hinh ?>" alt="" />
                </div>
              </div>
              <div class="products-description">
                <h5 class="name"><?= $ten_hh ?></h5>
                <p><?= $mo_ta ?></p>
                <hr class="border" />
                <div class="price">
                  Giá:
                  <?php
                  $gia_sau_giam = $don_gia - $don_gia * ($giam_gia / 100);
                  $phan_tram_giam_gia = $giam_gia > 0 ? $giam_gia : 0;
                  ?>
                  <span class="new_price"><?= number_format($gia_sau_giam) ?> <sup> ₫ </sup></span>
                  <?php
                  if ($phan_tram_giam_gia > 0) {
                  ?>
                    <span class="old_price"><?= number_format($don_gia) ?> <sup> ₫ </sup></span>
                    <span class="discount_percentage">(Giảm giá <?= $phan_tram_giam_gia ?>%)</span>
                  <?php } else {
                    echo "<span class='discount_percentage'> Không giảm giá </span>";
                  } ?>
                </div>
                <hr class="border" />
                <div class="wided">
                  <div class="button_group">
                    <input type="number" placeholder="1" readonly style="width: 53px;">
                    <!-- CODE ĐĂNG NHẬP ĐỂ MUA HÀNG -->
                    <!-- MÃ CODE PHP CHECK ĐĂNG NHẬP ĐỂ MUA HÀNG -->
                    <?php
                            if (!isset($_SESSION['user'])) {
                            ?>
                                <a href="login.php"><button style="margin-top:-5px;" class="btn btn-dark">ĐĂNG NHẬP ĐỂ MUA HÀNG</button></a>
                            <?php } else { ?>
                                <a href="add-cart.php?ma_hh=<?= $ma_hh ?>"><button style="margin-top:-5px;" class="button">THÊM VÀO GIỎ HÀNG</button></a>
                    <?php } ?>
                    <button class="button favorite">
                      <i class="fa fa-heart-o"> </i>
                    </button>
                  </div>
                </div>
                <hr class="border" />
                <ul style="list-style: none;">
                  <li>Mã: #<?= $ma_hh ?></li>
                  <hr class="border" />
                  <?php
                  $items = loai_hang_select_by_id($ma_loai);
                  extract($items);
                  ?>
                  <li>Danh mục: <?= $ten_loai ?></li>
                </ul>
                <div class="clearfix"></div>
                <hr class="border" />
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="tab-box">
              <div id="tabnav">
                <ul>
                  <li>
                    <h3> Bình luận </h3>
                    <p></p>
                  </li>
                </ul>
              </div>
              <!-- CODE HIỂN THỊ BÌNH LUẬN -->
              <?php
              require_once('../asmm/admin/dao/binh-luan.php');
              extract($_REQUEST);

              if (array_key_exists("noi_dung", $_POST) && isset($_SESSION['user'])) {
                $ma_kh = $_SESSION['user']['ma_kh'];
                $ngay_bl = DateTime::createFromFormat('d-m-Y', date_format(date_create(), 'd-m-Y'))->format('Y-m-d');

                binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl);
              }

              $binh_luan_list = binh_luan_select_by_hang_hoa($ma_hh);
              ?>

              <div class="tab-content-wrap">
                <div class="tab-content">
                  <!-- Form Bình luận -->
                  <?php
                  if (!isset($_SESSION['user'])) {
                    echo '<b class="text-danger" style="font-size: 20px">Đăng nhập để bình luận về sản phẩm này</b>';
                  } else {
                  ?>
                    <div class="owl-carousel owl-theme">
                      <form action="" method="post">
                        <div class="row">
                          <div class="col-sm-10">
                            <div class="form-group">
                              <input class="form-control" name="noi_dung" style="width:100%;height:auto; font-size: 14" />
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <button class="btn btn-danger" style="margin-left:auto;">Gửi</button>
                          </div>
                        </div>
                      </form>
                    <?php } ?>
                    </div>

                    <!-- Hiển thị các bình luận đã có -->
                    <div>
                      <?php
                      foreach ($binh_luan_list as $bl) {
                      ?>
                        <div class="row">
                          <div class="col-sm-10">
                            <?php echo "<li style='color: black; font-size: 14px'>$bl[noi_dung]</li>" ?>
                          </div>
                          <div class="col-sm-2" style="text-align:right;">
                            <?php echo "$bl[ma_kh]</b>, $bl[ngay_bl]" ?>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                </div>
              </div>
            </div>
            <div id="productsDetails" class="hot-products">
              <h3 class="title"><strong> Sản phẩm liên quan </strong></h3>
              <div class="control">
                <a id="prev_hot" class="prev" href="#"> &lt; </a>
                <a id="next_hot" class="next" href="#"> &gt; </a>
              </div>
              <ul id="hot">
                <li>
                  <div class="row">
                    <!-- CODE HIỂN THỊ SẢN PHẨM LIÊN QUAN -->
                    <?php
                    $items = hang_hoa_select_by_loai($ma_loai);
                    $count = 0; // Biến đếm số sản phẩm đã hiển thị
                    foreach ($items as $item) {
                      extract($item);
                    ?>
                      <div class="col-md-4 col-sm-4">
                        <div class="products">
                          <!-- <div class="offer">- %20</div> -->
                          <div class="thumbnail">
                            <a href="details.php?ma_hh=<?= $ma_hh ?>"><img style="width: 300px" src="../../asmm/css/admin/images/products/<?= $hinh ?>" alt=""><span class='new_price'><?= $ten_loai ?></span></a>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </li>
                <!-- Các sản phẩm khác ở đây -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include "./layout/footer.php" ?>
</body>

</html>