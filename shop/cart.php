<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./layout/header.php" ?>
</head>

<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../asmm/css/chi-tiet-sp/plugin/js/owl.carousel.min.js"></script>
    <?php include "./layout/nav.php" ?>

    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="col-sm-7">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SẢN PHẨM</th>
                            <th>HÌNH ẢNH</th>
                            <th>GIÁ</th>
                            <th>SL</th>
                            <th>TỔNG</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- CODE PHP DANH SÁCH GIỎ HÀNG -->
                        <form action="update-cart.php" method="post">
                            <?php
                            $total = $i = 0;
                            if (!empty($_SESSION['cart'])) {
                                $items = $_SESSION['cart'];
                                foreach ($items as $item) {
                                    extract($item);
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?= $name ?></td>
                                        <td><img src="../asmm/css/admin/images/products/<?= $hinh ?>" alt="" style="width:80px;"></td>
                                        <td><?= number_format($price - ($price * ($giam_gia / 100))) ?> VNĐ</td>
                                        <td><input class="form-control" type="number" name='sl[<?= $ma_hh ?>]' value="<?= $sl ?>" style="width:54px;"></td>
                                        <td><?= number_format(($price - ($price * ($giam_gia / 100))) * $sl);
                                            $total += (($price - ($price * ($giam_gia / 100))) * $sl);
                                            ?> VNĐ</td>
                                        <td><a onclick="return confirm('Bạn muốn bỏ sản phẩm này khỏi giỏ hàng ?')" style="color:black;" href="delete-cart.php?ma_hh=<?= $ma_hh ?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
                                    </tr>
                                    <!-- NẾU KHÔNG CÓ SẢN PHẨM NÀO SẼ XUẤT HIỆN THẺ P -->
                            <?php }
                            } else {
                                echo '<p>Giỏ hàng của bạn chưa có sản phẩm nào !</p>';
                            } ?>
                    </tbody>
                </table>
                <button class="btn btn-info"><a style="color:#fff;text-decoration:none;" href="products.php">Tiếp tục xem sản phẩm</a></button>
                <button type="submit" class="btn btn-secondary" name="btn_update_gio_hang">Cập nhật giỏ hàng</button>
                </form>
            </div>
            <div class="col-sm-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>TỔNG SỐ LƯỢNG</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tổng phụ</td>
                            <td style="text-align:right;"><?= number_format($total) ?> VNĐ</td>
                        </tr>
                        <tr>
                            <td>Giao hàng</td>
                            <td style="text-align:right;">Giao hàng miễn phí <br>
                                Ứơc tính cho Việt Nam <br>
                                Đổi địa chỉ</td>
                        </tr>
                        <tr>
                            <td>Tổng</td>
                            <td style="text-align:right;"><b><?= number_format($total) ?> VNĐ</b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="checkout.php"><button class="btn btn-danger" style="width:100%;">TIẾN HÀNH THANH TOÁN</button></a></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Phiếu ưu đãi</b></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" class="form-control" placeholder="Mã ưu đãi"><br>
                                <button class="btn btn-light" style="width:100%;"><b>ÁP DỤNG</b></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <?php include "./layout/footer.php" ?>
</body>

</html>