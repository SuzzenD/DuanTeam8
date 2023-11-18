<?php include "./dao/navbar.php" ?>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="header">
                <div class="page-header">
                    <h1>QUẢN LÝ KHÁCH HÀNG</h1>
                    <p>Cập nhật lại thông tin khách hàng: </p>

                    <!-- /. CODE XỬ LÝ PHP  -->
                    <?php
                    extract($_REQUEST);
                    $item = khach_hang_select_by_id($ma_kh);
                    extract($item);

                    extract($_REQUEST);
                    if (array_key_exists("btn_update", $_REQUEST)) {
                        khach_hang_update($ma_kh, $ho_ten, $mat_khau, $email, $dia_chi);
                        echo "<script>alert('Cập nhật thành công!'); window.location.href = 'index.php?act=khachhang';</script>";
                    exit;
                    }
                    ?>
                    <!-- /. CONTENT  -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tên đăng nhập:</label>
                            <input type="text" class="form-control" name="ma_kh" placeholder="Nhập tên đăng nhập ..." value="<?= $ma_kh ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Họ và tên:</label>
                            <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ và tên ..." value="<?= $ho_ten ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Mật khẩu:</label>
                            <input type="text" class="form-control" name="mat_khau" placeholder="Nhập mật khẩu ..." value="<?= $mat_khau ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="text" class="form-control" name="email" placeholder="Nhập email ..." value="<?= $email ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Địa chỉ:</label>
                            <input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ ..." value="<?= $dia_chi ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Vai trò:</label>
                            <input type="text" class="form-control" placeholder="Khách hàng ..." readonly>
                        </div>

                        <button type="submit" name="btn_update" class="btn btn-danger">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>