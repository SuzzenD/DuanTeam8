<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../asmm/css/chi-tiet-sp/products.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../asmm/css/chi-tiet-sp/plugin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../asmm/css/chi-tiet-sp/plugin/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Giới thiệu</title>
</head>

<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../../asmm/css/chi-tiet-sp/plugin/js/owl.carousel.min.js"></script>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4" style="background-color: rgb(54, 54, 54);text-align: center">
                <div class="login">


                    <!-- CODE CHECK ĐĂNG NHẬP -->
                    <?php
                    session_start();
                    if (!isset($_SESSION['user'])) {
                    ?>
                        <a href="../../asmm/tai-khoan/dang-nhap.php">
                            <p><strong>ĐĂNG NHẬP / ĐĂNG KÍ</strong></p>
                        </a>
                    <?php } else { ?>
                        <a href="../../asmm/tai-khoan/thong-tin-tk.php">
                            <p><strong>Xin chào <?= $_SESSION['user']['ho_ten'] ?></strong></p>
                        </a>
                    <?php } ?>
                </div>



            </div>
            <div class="col-md-4" style="background-color: rgb(54, 54, 54);text-align: center">
                <div class="logo">
                    <a href="index.php"><img src="../../asmm/css/danh-sach-sp/img/shoes-no.png" alt="anh"></a>
                </div>
            </div>
            <div class="col-md-4" style="background-color: rgb(54, 54, 54);text-align: center">
                <!-- MÃ CODE PHP CHECK SỐ LƯỢNG SẢN PHẨM THÊM VÀO GIỎ HÀNG  -->

                <div class="giohang" style="position: reletive;">

                    <?php
                    $sll = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $item) {
                            extract($item);
                            $sll += $sl;
                        }
                    }
                    ?>
                    <span style="position: absolute;padding:3px 8px;background-color:#fff;border-radius:50px;left:295px;top:25px;"><?= $sll ?></span>
                    <ul>
                        <li style="list-style: none;">
                            <p style="color: rgb(212, 212, 212);font-size: 14px;">GIỎ HÀNG</p>
                        </li>
                        <a href="danh-sach-gio-hang.php">
                            <li style="list-style: none;"><i class="fa fa-shopping-basket" style="font-size:28px;color:rgb(255, 255, 255)"></i></li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>







    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="background-color: rgb(211, 211, 211);">
                <div class="nav">
                    <ul>
                        <li><a href="index.php">TRANG CHỦ</a></li>
                        <li><a href="danh-sach-sp.php">SẢN PHẨM</a></li>
                        <li><a href="gioi-thieu.php">GIỚI THIỆU</a></li>
                        <li><a href="lien-he.php">LIÊN HỆ</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-7" style="padding-left: 0px;">
                <div class="chuyen">
                    <p><a href="index.php"><span>TRANG CHỦ </span></a> / GIỚI THIỆU</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>TẤT TẦN TẬT VỀ SHOES</h2>
                        <p style="text-align:justify;">SHOES – Hệ thống cửa hàng, Website mua sắm thời trang thể thao, chúng tôi cam kết mang đến một bộ sưu tập giày thể thao thời trang khổng lồ đến từ nhiều thương hiệu lớn, nhỏ và cả ở Việt Nam. Được trải qua các khâu tuyển lựa kỹ lưỡng sao cho phù hợp thị hiếu, phong cách Á Đông, đồng thời, bắt nhịp cùng xu hướng chung đang thịnh hành khắp thế giới.</p>
                    </div>
                </div>
            </div>
        </div> <br><br>

        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-2"><img src="../css/trang-chu/img/freeship.jpg" alt="" style="width:80px;"></div>
                    <div class="col-sm-10">
                        <b>Miễn phí giao hàng</b> <br>
                        Shop miễn phí giao hàng cho tất cả các đơn hàng trên 2.000.000 VNĐ. Giao hàng nhanh chóng và đảm bảo hàng nguyên vẹn cho quý khách !
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-2"><img src="../css/trang-chu/img/new.jpg" alt="" style="width:80px;"></div>
                    <div class="col-sm-10">
                        <b>Sản phẩm mới 100%</b> <br>
                        Sản phẩm tại shop đảm bảo là sản phẩm mới 100% và được nhập khẩu từ các nhãn hàng uy tín trên toàn quốc và trên thế giới.
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-2"><img src="../css/trang-chu/img/chinhhang.jpg" alt="" style="width:80px;"></div>
                    <div class="col-sm-10">
                        <b>Hàng chính hãng</b> <br>
                        Sản phẩm tại shop đảm bảo là sản phẩm chính hãng và được nhập khẩu từ các nhãn hàng uy tín trên toàn quốc và trên thế giới.
                    </div>
                </div><br>
            </div>

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-2"><img src="../css/trang-chu/img/doitra.jpg" alt="" style="width:80px;"></div>
                    <div class="col-sm-10">
                        <b>Đổi trả trong vòng 7 ngày</b> <br>
                        Shop có chính sách đổi trả trong vòng 7 ngày đối với những khách hàng có nhu cầu đổi trả sản phẩm 1 cách nhanh chóng và tận tình
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-2"><img src="../css/trang-chu/img/cskh.jpg" alt="" style="width:80px;"></div>
                    <div class="col-sm-10">
                        <b>Chăm sóc khách hàng</b> <br>
                        Chế độ chăm sóc khách hàng tại shop tận tình , nhiệt tình hỗ trợ và phục vụ quý khách chu đáo.Đáp ứng nhu cầu của mọi khách hàng !
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-2"><img src="../css/trang-chu/img/thanhtoan.jpg" alt="" style="width:80px;"></div>
                    <div class="col-sm-10">
                        <b>Thanh toán đa dạng</b> <br>
                        Thanh toán tại shop đa dạng bằng cách trả tiền mặt hoặc sử dụng các loại thẻ như : VISA, MASTER CARD , ....
                    </div>
                </div><br>
            </div>
        </div>
    </div>





    <div class="container-fluid now2" style="margin-top: 70px;">
        <div class="row">
            <div class="container" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="fo">
                            <img src="../../asmm/css/danh-sach-sp/img/shoes-no.png" alt="" style="width:60px;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="fo">
                            <h5>Shop</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h5>Hỗ trợ</h5>
                    </div>
                </div>
                <div class="row" style="margin-top: 0px;">
                    <div class="col-md-4">
                        <div class="fo">
                            <ul>
                                <li>
                                    <p>
                                        Nhiệm vụ của chúng tôi là mang đến những sản phẩm chất lượng với giá cả tốt nhất cho khách hàng. Được hỗ trợ khách hàng là niềm vinh dự của chúng tôi . <br><br>
                                        Xin cám ơn !
                                    </p>
                                </li>
                                <li><i class="fa fa-facebook "></i>
                                    <i class="fa fa-firefox"></i>
                                    <i class="fa fa-pinterest-p"></i>
                                    <i class="fa fa-youtube"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="fo">
                            <ul>
                                <li>
                                    <p>Trang chủ</p>
                                </li>
                                <li>
                                    <p>Cửa hàng</p>
                                </li>
                                <li>
                                    <p>Giới thiệu</p>
                                </li>
                                <li>
                                    <p>Liên hệ</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="fo">
                            <ul>
                                <li>
                                    <p>Ưu đãi</p>
                                </li>
                                <li>
                                    <p>Giao nhận</p>
                                </li>
                                <li>
                                    <p>Đổi trả</p>
                                </li>
                                <li>
                                    <p>Bảo mật</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









        <script type="text/javascript">
            const nextIcon = ' <i class="fa fa-chevron-left" style="font-size:36px;color:black"></i>';
            const preIcon = ' <i class="fa fa-chevron-right" style="font-size:36px;color:black"></i>';
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                navText: [
                    nextIcon,
                    preIcon
                ],
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1200: {
                        items: 5,
                        nav: true,
                        loop: false
                    }
                }
            })
        </script>




        <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>











</body>

</html>