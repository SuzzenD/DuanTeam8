<?php include "./dao/navbar.php" ?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="header">
            <div class="page-header">
                <h1>QUẢN LÝ LOẠI HÀNG</h1>
                <p>Điền đầy đủ thông tin để tiến hành thêm loại hàng mới :</p>
                <!-- /. CODE XỬ LÝ PHP  -->
                <?php
                // extract($_REQUEST);
                // if (array_key_exists("btn_insert", $_REQUEST)) {
                //     loai_hang_insert($ten_loai);
                //     unset($ma_loai, $ten_loai);
                // }

                extract($_REQUEST);
                // Kiểm tra nút "Thêm mới" đã được nhấn hay chưa
                if (array_key_exists("btn_insert", $_REQUEST)) {
                    // Kiểm tra xem các trường thông tin có được nhập đầy đủ hay không
                    if (!empty($ten_loai)) {
                        // Thực hiện thêm mới loại hàng
                        loai_hang_insert($ten_loai);
                        unset($ma_loai, $ten_loai);
                        // Hiển thị thông báo thành công và chuyển hướng đến trang loại sản phẩm
                        echo "<script>alert('Thêm loại hàng mới thành công!'); window.location.href = 'index.php?act=loaihang';</script>";
                        exit; // Dừng thực thi mã PHP sau khi chuyển hướng
                    } else {
                        // Hiển thị thông báo lỗi nếu thông tin không đầy đủ
                        echo "<div class='alert alert-danger'>Vui lòng điền đầy đủ thông tin!</div>";
                    }
                }
                ?>
                <!-- /. CONTENT  -->
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Mã loại:</label>
                        <input class="form-control" placeholder="Auto number ..." name="ma_loai" readonly />
                    </div>
                    <div class="form-group">
                        <label for="">Tên loại:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên loại ..." name="ten_loai" />
                    </div>
                    <div class="form-group form-check"></div>
                    <button type="submit" name="btn_insert" class="btn btn-danger">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
</div>