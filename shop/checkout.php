<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./layout/header.php"; ?>
</head>

<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../asmm/css/chi-tiet-sp/plugin/js/owl.carousel.min.js"></script>
    <?php include "./layout/nav.php"; ?>

    <!-- CODE PHP THANH TOÁN GIỎ HÀNG -->
    <?php
    require_once('../asmm/admin/dao/khach-hang.php');
    require_once('../asmm/admin/dao/hang-hoa.php');

    extract($_REQUEST);

    $ma_kh = $_SESSION['user']['ma_kh'];
    $item = khach_hang_select_by_id($ma_kh);
    extract($item);
    ?>
    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="col-sm-7">
                <form action="" method="post">
                    <h4>THÔNG TIN THANH TOÁN</h4>
                    <br>
                    <table class="table table-borderless" border="0">
                        <input type="text" class="form-control" id="" name="ma_kh" value="<?= $ma_kh ?>" hidden>
                        <tr>
                            <div class="form-group">
                                <label for=""> <b>Họ và tên:</b> </label>
                                <input type="text" class="form-control" id="" name="ho_ten" value="<?= $ho_ten ?>">
                            </div>

                        </tr>
                        <tr>
                            <div class="form-group">
                                <label for=""><b>Email:</b></label>
                                <input type="text" class="form-control" id="" name="email" value="<?= $email ?>">
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <label for=""><b>Địa chỉ:</b></label>
                                <input type="text" class="form-control" id="" name="dia_chi" value="<?= $dia_chi ?>">
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <label for=""><b>Ghi chú:</b></label>
                                <textarea class="form-control" rows="5" id="" name="ghi_chu"></textarea>
                            </div>
                        </tr>
                    </table>
            </div>
            <div class="col-sm-5">
                <h4>ĐƠN HÀNG CỦA BẠN</h4>
                <br>
                <table class="table" style="border:3px solid #c30005;">
                    <thead>
                        <tr>
                            <th>SẢN PHẨM</th>
                            <th style="text-align:right;">TỔNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- CODE PHP HIỂN THỊ LẠI DANH SÁCH SẢN PHẨM ĐÃ MUA -->
                        <?php
                        $total = $i = 0;
                        if (!empty($_SESSION['cart'])) {
                            $items = $_SESSION['cart'];
                            foreach ($items as $item) {
                                extract($item);
                                $i++;
                        ?>
                                <tr>
                                    <td><?= $name ?> x <?= $sl; ?></td>
                                    <td style="text-align:right;"><?= number_format(($price - ($price * ($giam_gia / 100))) * $sl);
                                                                    $total += (($price - ($price * ($giam_gia / 100))) * $sl);

                                                                    ?> VNĐ</td>
                                </tr>
                        <?php }
                        } ?>
                        <tr>
                            <td><b>Tổng phụ</b></td>
                            <td style="text-align:right;"><b><?= number_format($total) ?> VNĐ</b></td>
                        </tr>
                        <tr>
                            <td><b>Giao hàng</b></td>
                            <td style="text-align:right;">Giao hàng miễn phí <br>
                                Ứơc tính cho Việt Nam <br>
                                Đổi địa chỉ</td>
                        </tr>
                        <tr>
                            <td><b>TỔNG</b></td>
                            <td style="text-align:right;"><b><?= number_format($total) ?> VNĐ</b></td>
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
                        <tr>
                            <td colspan="2"><i>Quý khách vui lòng kiểm tra lại thông tin giao hàng và thông tin đơn hàng để tiến hành đặt hàng. Quý khách có thể tra cứu tình trạng đơn hàng tại BIGSHOES.com. Chúc quý khách ngày mới tốt lành !</i></td>
                        </tr>
                        <tr>
                            <td><button type="submit" name="dathang" class="btn btn-danger"><b>ĐẶT HÀNG</b></button></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                </form>
            </div>
        </div>
    </div>
    <!-- KHI KHÁCH HÀNG TIẾN HÀNH ĐẶT HÀNG -->
    <?php
    require_once('../asmm/admin/dao/hoa-don.php');
    extract($_REQUEST);
    if (array_key_exists('dathang', $_REQUEST)) {

        try {
            // Tạo kết nối
            $conn = pdo_get_connection();

            // Tạo ngày mua
            $ngaymua = date("Y-m-d"); // Đổi định dạng ngày thành 'YYYY-MM-DD'

            // Câu SQL Insert
            $sql = "INSERT INTO hoa_don(ngay_mua, ghi_chu, ma_kh) 
                            VALUES ('" . $ngaymua . "','" . $ghi_chu . "','" . $ma_kh . "')";

            // Thực hiện thêm record
            $conn->exec($sql);

            // Lấy id hóa đơn vừa insert
            $ma_hd = $conn->lastInsertId();

            $items = $_SESSION['cart'];
            foreach ($items as $item) {
                extract($item);
                $sql = "INSERT INTO hoa_don_chi_tiet(ma_hd, ma_hh, so_luong, don_gia) 
                                VALUES ('" . $ma_hd . "','" . $ma_hh . "','" . $sl . "','" . $price . "')";
                $conn->exec($sql);
            }
            echo '<script language="javascript">';
            echo 'alert("Bạn đã đặt đơn hàng thành công !")';
            echo '</script>';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
    
    <?php include "./layout/footer.php"; ?>
</body>

</html>