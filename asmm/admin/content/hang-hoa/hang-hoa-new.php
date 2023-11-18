<?php include "./dao/navbar.php" ?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="header">
            <div class="page-header">
                <h1>QUẢN LÝ HÀNG HÓA</h1>
                <p>Điền đầy đủ thông tin để tiến hành thêm hàng hóa mới :</p>

                <!-- /. CODE XỬ LÝ PHP  -->
                <?php
                // extract($_REQUEST);
                // if (array_key_exists("btn_insert", $_REQUEST)) {
                //     $up_hinh = save_file("hinh", "../css/admin/images/products/");
                //     $hinh = strlen($up_hinh) > 0 ? $up_hinh : 'product.png';

                //     hang_hoa_insert($ten_hh, $hinh, $don_gia, $giam_gia, $mo_ta, $ma_loai);
                //     unset($ten_hh, $hinh, $don_gia, $giam_gia, $mo_ta, $ma_loai);
                // }

                extract($_REQUEST);

                if (array_key_exists("btn_insert", $_REQUEST)) {
                    // Kiểm tra xem các trường thông tin có được nhập đầy đủ hay không
                    if (!empty($ten_hh) && !empty($don_gia) && !empty($mo_ta) && !empty($ma_loai)) {
                        // Thực hiện thêm mới hàng hóa
                        $up_hinh = save_file("hinh", "../css/admin/images/products/");
                        $hinh = strlen($up_hinh) > 0 ? $up_hinh : 'product.png';
                        hang_hoa_insert($ten_hh, $hinh, $don_gia, $giam_gia, $mo_ta, $ma_loai);
                        unset($ten_hh, $hinh, $don_gia, $giam_gia, $mo_ta, $ma_loai);

                        echo "<script>alert('Thêm sản phẩm mới thành công!'); window.location.href = 'index.php?act=hanghoa';</script>";
                        exit; // Dừng thực thi mã PHP sau khi chuyển hướng
                    } else {
                        // Hiển thị thông báo lỗi nếu thông tin không đầy đủ
                        echo "<div class='alert alert-danger'>Vui lòng điền đầy đủ thông tin!</div>";
                    }
                }
                ?>
                <!-- /. CONTENT  -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tên hàng hóa:</label>
                        <input type="text" class="form-control" id="ten_hh" name="ten_hh" placeholder="Nhập tên hàng hóa ...">
                    </div>

                    <div class="form-group">
                        <label for="">Đơn giá</label>
                        <input type="number" class="form-control" id="don_gia" name="don_gia" placeholder="Nhập đơn giá ...">
                    </div>

                    <div class="form-group">
                        <label for="">Giảm giá (%)</label>
                        <input type="number" class="form-control" id="giam_gia" name="giam_gia" min="0" max="100" placeholder="Nhập giảm giá">
                    </div>

                    <div class="form-group">
                        <label for="">Hình ảnh</label>
                        <input type="file" class="form-control-file border" name="hinh">
                    </div>

                    <div class="form-group">
                        <label for="">Mô tả:</label>
                        <textarea class="form-control" rows="5" id="mo_ta" name="mo_ta" placeholder="Mô tả hàng hóa ..."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Mã loại?</label>
                        <select name="ma_loai" class="form-control">
                            <?php
                            $loai_select_list = loai_hang_select_all();
                            foreach ($loai_select_list as $loai) {
                                echo '<option value="' . $loai['ma_loai'] . '">' . $loai['ten_loai'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="btn_insert" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
</div>