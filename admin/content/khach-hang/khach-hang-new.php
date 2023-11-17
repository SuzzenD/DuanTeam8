<?php include "./dao/navbar.php" ?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="header">
            <div class="page-header">
                <h1>QUẢN LÝ KHÁCH HÀNG</h1>
                <p>Điền đầy đủ thông tin để tiến hành đăng ký khách hàng mới :</p>

                <!-- /. CODE XỬ LÝ PHP  -->
                <?php
                // extract($_REQUEST);
                // if (array_key_exists("btn_insert", $_REQUEST)) {

                //     khach_hang_insert($ma_kh, $ho_ten, $mat_khau, $email, $dia_chi);
                //     unset($ma_kh, $ho_ten_, $mat_khau, $email, $dia_chi);
                // }

                extract($_REQUEST);
                if (array_key_exists("btn_insert", $_REQUEST)) {
                    // Kiểm tra xem tất cả các trường đã được điền hay chưa
                    if (empty($ma_kh) || empty($ho_ten) || empty($mat_khau) || empty($email) || empty($dia_chi)) {
                        echo "<div class='alert alert-danger'>Vui lòng điền đầy đủ thông tin!</div>";
                    } else {
                        khach_hang_insert($ma_kh, $ho_ten, $mat_khau, $email, $dia_chi);
                        unset($ma_kh, $ho_ten, $mat_khau, $email, $dia_chi);

                        // Chuyển hướng trình duyệt đến trang mới sau khi thêm mới khách hàng thành công
                        echo "<script>alert('Thêm khách hàng mới thành công!'); window.location.href = 'index.php?act=khachhang';</script>";
                        exit; // Dừng thực thi mã PHP sau khi chuyển hướng
                    }
                }
                ?>
                <!-- /. CONTENT  -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tên đăng nhập:</label>
                        <input type="text" class="form-control" name="ma_kh" placeholder="Nhập tên đăng nhập ...">
                    </div>

                    <div class="form-group">
                        <label for="">Họ và tên:</label>
                        <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ và tên ...">
                    </div>

                    <div class="form-group">
                        <label for="">Mật khẩu:</label>
                        <input type="text" class="form-control" name="mat_khau" placeholder="Nhập mật khẩu ...">
                    </div>

                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="Nhập email ...">
                    </div>

                    <div class="form-group">
                        <label for="">Địa chỉ:</label>
                        <input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ ...">
                    </div>

                    <div class="form-group">
                        <label for="">Vai trò:</label>
                        <input type="text" class="form-control" placeholder="Khách hàng ..." readonly>
                    </div>

                    <button type="submit" name="btn_insert" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
</div>