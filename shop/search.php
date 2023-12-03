<!DOCTYPE html>
<html>

<head>
   <?php include "./layout/header.php" ?>;
</head>

<body id="home">
   <div class="wrapper">
      <?php include "./layout/nav.php" ?>
      <div class="clearfix"></div>
      <div class="hom-slider">
         <div class="container">
            <div id="sequence">
               <div class="sequence-prev"><i class="fa fa-angle-left"></i></div>
               <div class="sequence-next"><i class="fa fa-angle-right"></i></div>
               <ul class="sequence-canvas">
                  <li class="animate-in">
                     <div class="flat-caption caption2 formLeft delay400 text-center">
                        <h1>FENG SYSTEM RTW SS24</h1>
                     </div>
                     <div class="flat-caption caption3 formLeft delay500 text-center">
                        <p>Là bộ sưu tập Menswear đầu tiên của Feng, tập trung vào việc phục vụ khách hàng từ nhu cầu cơ bản đến đặc biệt</p>
                     </div>
                     <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="#">Xem chi tiết</a></div>
                     <div class="flat-image formBottom delay200" data-duration="5" data-bottom="true"><img src="images/banner3-removebg-preview.png" alt=""></div>
                  </li>
                  <li>
                     <div class="flat-caption caption2 formLeft delay400">
                        <h1>FENG SYSTEM SIGMAVIOR</h1>
                     </div>
                     <div class="flat-caption caption3 formLeft delay500">
                        <h2>Feng kết thúc chuỗi chủ đề “UNDER THE RADAR” bằng một campaign ảnh</h2>
                     </div>
                     <div class="flat-button caption5 formLeft delay600"><a class="more" href="#">Xem chi tiết</a></div>
                     <div class="flat-image formBottom delay200" data-bottom="true"><img src="images/image-removebg-preview (1).png" alt=""></div>
                  </li>
                  <li>
                     <div class="flat-caption caption2 formLeft delay400 text-center">
                        <h1>UNDER THE RADAR</h1>
                     </div>
                     <div class="flat-caption caption3 formLeft delay500 text-center">
                        <p>Sự trở lại của FENG SYSTEM và câu chuyện đi tìm các cá thể Under the radar.</p>
                     </div>
                     <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="#">Xem chi tiết</a></div>
                     <div class="flat-image formBottom delay200" data-bottom="true"><img src="images/slidermain-removebg-preview.png" alt=""></div>
                  </li>
               </ul>
            </div>
         </div>
         <div class="promotion-banner">
            <div class="container">
               <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                     <div class="promo-box"><img src="images/imgbanner4.jpg" alt=""></div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                     <div class="promo-box"><img src="images/imgbanner1.jpg" alt=""></div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                     <div class="promo-box"><img src="images/imgbanner2.jpg" alt=""></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="container_fullwidth">
         <div class="container">
            <div class="hot-products">
               <h3 class="title">Kết quả tìm kiếm</h3>
               <div class="control"><a id="prev_hot" class="prev" href="#">&lt;</a><a id="next_hot" class="next" href="#">&gt;</a></div>
               <ul id="hot">
                  <li>
                     <div class="row">
                        <!-- CODE HIỂN THỊ SẢN PHẨM TỪ CSDL -->
                        <?php
                        require_once('../asmm/admin/dao/hang-hoa.php');
                        extract($_REQUEST);
                        if (array_key_exists('search-keywords', $_REQUEST)) {
                            $items = hang_hoa_select_keyword($keywords);
                        }
                        foreach ($items as $item) {
                            extract($item);
                        ?>
                           <div class="col-md-3 col-sm-6">
                              <div class="products">
                                 <div class="thumbnail"><a href="details.php?ma_hh=<?= $ma_hh ?>"><img src="../../asmm/css/admin/images/products/<?= $hinh ?>" alt="Product Name"></a></div>
                                 <div class="productname"><?= $ten_hh ?></div>
                                 <h4 class="price"> <?= number_format($don_gia - $don_gia * ($giam_gia / 100)) ?> đ <span style="color:grey;font-size:14px;margin-left:40px;"><strike><?= number_format($don_gia) ?> VNĐ</strike></span></h4>
                                 <div class="button_group"><button class="button add-cart" type="button">Thêm Vào Giỏ</button></div>
                              </div>
                           </div>
                        <?php } ?>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="clearfix"></div>
            <div class="our-brand">
               <h3 class="title"><strong></strong> Thương hiệu</h3>
               <div class="control"><a id="prev_brand" class="prev" href="#">&lt;</a><a id="next_brand" class="next" href="#">&gt;</a></div>
               <ul id="braldLogo">
                  <li>
                     <ul class="brand_item">
                        <li>
                           <a href="#">
                              <div class="brand-logo"><img src="images/envato.png" alt=""></div>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <div class="brand-logo"><img src="images/themeforest.png" alt=""></div>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <div class="brand-logo"><img src="images/photodune.png" alt=""></div>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <div class="brand-logo"><img src="images/activeden.png" alt=""></div>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <div class="brand-logo"><img src="images/envato.png" alt=""></div>
                           </a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
   </div>
   <div class="clearfix"></div>
   <?php include "./layout/footer.php" ?>;
</body>

</html>