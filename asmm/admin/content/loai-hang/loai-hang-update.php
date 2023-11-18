<?php include "./dao/navbar.php" ?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="header">
            <div class="page-header">
                <h1>QUẢN LÝ LOẠI HÀNG</h1>
                <p>Cập nhật lại thông tin loại hàng: </p>

                <!-- /. CODE XỬ LÝ PHP  -->
                <?php
                extract($_REQUEST);
                $items = loai_hang_select_by_id($ma_loai);
                extract($items);

                extract($_REQUEST);
                if (array_key_exists("btn_update", $_REQUEST)) {
                    loai_hang_update($ma_loai, $ten_loai);
                    echo "<script>alert('Cập nhật thành công!'); window.location.href = 'index.php?act=loaihang';</script>";
                    exit;
                }
                ?>
                <!-- /. CONTENT  -->
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Mã loại:</label>
                        <input class="form-control" placeholder="Auto number ..." name="ma_loai" value="<?= $ma_loai ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label for="">Tên loại:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên loại ..." name="ten_loai" value="<?= $ten_loai ?>" />
                    </div>
                    <div class="form-group form-check"></div>
                    <button type="submit" name="btn_update" class="btn btn-danger">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>