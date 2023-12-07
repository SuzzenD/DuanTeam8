<!DOCTYPE html>
<html>

<head>
  <?php include "./layout/header.php" ?>
</head>

<body>
  <div class="wrapper">
    <?php include "./layout/nav.php" ?>
    <div class="clearfix"></div>
    <div class="container_fullwidth">
      <div class="container">
        <div class="row">
          <!-- CODE HIỂN THỊ DANH MỤC -->
          <?php
          require_once('../../asmm/admin/dao/loai-hang.php');
          extract($_REQUEST);
          $items = loai_hang_select_all();
          ?>
          <div class="col-md-3">
            <div class="category leftbar">
              <h3 class="title">DANH MỤC</h3>
              <ul>
                <?php foreach ($items as $item) {
                  extract($item);
                ?>
                  <a href="sp-cung-loai.php?ma_loai=<?= $ma_loai ?>">
                    <li><?= $ten_loai ?></li>
                  </a>
                <?php } ?>
              </ul>
            </div>
            <!-- CODE HIỂN THI SALE UP 10 - 50% -->
            <?php
            require_once('../../asmm/admin/dao/hang-hoa.php');
            extract($_REQUEST);
            $items = hang_hoa_sale();
            ?>
            <div class="category leftbar">
              <h3 class="title">SẢN PHẨM SALE UP 10 - 50% </h3>
              <ul>
                
              </ul>
              <?php foreach ($items as $item) {
                    extract($item);
                  ?> <li class="list-group-item" style="list-style: none;">
                  <div class="row">
                    <div class="col-sm-4"><a href="details.php?ma_hh=<?= $ma_hh ?>&ma_loai=<?= $ma_loai ?>"><img style="width:80px;" src="../asmm/css/admin/images/products/<?= $hinh ?>" alt=""></a></div>
                    <div class="col-sm-7"><?= $ten_hh ?><br><br><b><?= number_format($don_gia - ($don_gia * $giam_gia / 100)) ?> VNĐ</b></div>
                    <div class="btn btn-warning" id="sale"><?= $giam_gia ?>%</div>
                  </div>
                  </li>
                <?php } ?>
            </div>
          </div>
          <div class="col-md-9">
            <div class="banner">
              <div class="bannerslide" id="bannerslide">
                <ul class="slides">
                  <li>
                    <a href="#">
                      <img src="images/imgbanner1.jpg" alt="" />
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="images/imgbanner4.jpg" alt="" />
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="products-grid">
              <div class="toolbar">
                <div class="sorter">
                  <!-- <div class="view-mode">
                                <a href="productlitst.html" class="list"> List </a>
                                <a href="#" class="grid active"> Grid </a>
                            </div>
                            <div class="sort-by">
                                Tìm kiếm theo:
                                <select name="">
                                    <option value="Default" selected>Mặc định</option>
                                    <option value="Name">Tên</option>
                                    <option value="Price">Danh mục</option>
                                </select>
                            </div> -->
                </div>
                <div class="pager">
                  <?php
                  require_once('../asmm/admin/dao/hang-hoa.php');
                  $items = hang_hoa_select_all_price();
                  $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                  $items_per_page = 6; // Số sản phẩm muốn hiển thị trên mỗi trang
                  $total_pages = ceil(count($items) / $items_per_page);

                  // Hiển thị nút Previous
                  if ($current_page > 1) {
                    echo "<a href='?page=" . ($current_page - 1) . "' class='prev-page'><i class='fa fa-angle-left'></i></a>";
                  }

                  // Hiển thị các trang
                  for ($i = 1; $i <= $total_pages; $i++) {
                    $active_class = ($i == $current_page) ? 'active' : '';
                    echo "<a href='?page=$i' class='$active_class'>$i</a>";
                  }

                  // Hiển thị nút Next
                  if ($current_page < $total_pages) {
                    echo "<a href='?page=" . ($current_page + 1) . "' class='next-page'><i class='fa fa-angle-right'></i></a>";
                  }
                  ?>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="row">
                <?php
                $start_index = ($current_page - 1) * $items_per_page;
                $display_items = array_slice($items, $start_index, $items_per_page);
                foreach ($display_items as $item) {
                  extract($item);

                  // Kiểm tra xem giá và giảm giá có phải là số không
                  $gia_sau_giam = is_numeric($don_gia) && is_numeric($giam_gia) ? $don_gia - $don_gia * ($giam_gia / 100) : 0;
                ?>
                  <div class="col-md-4 col-sm-6">
                    <div class="products">
                      <div class="thumbnail">
                        <a href="details.php?ma_hh=<?= $ma_hh ?>">
                          <img src="../asmm/css/admin/images/products/<?= $hinh ?>" alt="Product Name" />
                        </a>
                      </div>
                      <div class="productname"><?= $ten_hh ?></div>
                      <?php
                      // Hiển thị giá và giảm giá chỉ khi chúng là số
                      if (is_numeric($don_gia) && is_numeric($giam_gia)) {
                        echo "<h4 class='price'> " . number_format($gia_sau_giam) . " đ <span style='color:grey;font-size:14px;margin-left:40px;'><strike>" . number_format($don_gia) . " VNĐ</strike></span></h4>";
                      } else {
                        echo "<h4 class='price'>Giá không hợp lệ</h4>";
                      }
                      ?>
                      <div class="button_group">
                        <button class="button add-cart" type="button">
                          Thêm vào giỏ
                        </button>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include "./layout/footer.php" ?>
</body>

</html>