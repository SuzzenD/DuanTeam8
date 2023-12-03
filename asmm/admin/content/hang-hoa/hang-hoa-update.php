<?php include "./dao/navbar.php" ?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="header">
            <div class="page-header">
                <h1>QUẢN LÝ HÀNG HÓA</h1>
                <p>Cập nhật lại thông tin hàng hóa :</p>

                <!-- /. CODE XỬ LÝ PHP  -->
                <?php
                extract($_REQUEST);
                $item = hang_hoa_select_by_id($ma_hh);
                extract($item);


                extract($_REQUEST);
                if (array_key_exists("btn_update", $_REQUEST)) {
                    $up_hinh = save_file("hinh", "../css/admin/images/products/");
                    $hinh = strlen($up_hinh) > 0 ? $up_hinh : $hinh;

                    hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $mo_ta);

                    echo "<script>alert('Cập nhật thành công!'); window.location.href = 'index.php?act=hanghoa';</script>";
                    exit; // Dừng thực thi mã PHP sau khi chuyển hướng
                }
                ?>
                <!-- /. CONTENT  -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Mã hàng hóa:</label>
                        <input type="text" class="form-control" id="ma_hh" name="ma_hh" placeholder="Nhập tên hàng hóa ..." value=<?= $ma_hh ?> readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Tên hàng hóa:</label>
                        <input type="text" class="form-control" id="ten_hh" name="ten_hh" placeholder="Nhập tên hàng hóa ..." value="<?= $ten_hh ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Đơn giá</label>
                        <input type="number" class="form-control" id="don_gia" name="don_gia" placeholder="Nhập đơn giá ..." value="<?= $don_gia ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Giảm giá (%)</label>
                        <input type="number" class="form-control" id="giam_gia" name="giam_gia" min="0" max="100" placeholder="Nhập giảm giá" value="<?= $giam_gia ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Hình ảnh</label>
                        <!-- <input type="file" class="form-control-file border" name="hinh"> -->
                        <input type="file" class="form-control-file border" name="hinh" id="hinhInput" accept="image/*" onchange="previewImage()">
                        <img id="hinhPreview" class="img-preview" src="#" alt="Preview" style="display: none;">
                        <input name="hinh" type="hidden" value="<?= $hinh ?>"><br>
                        <img src="../../assets/images/products/<?= $hinh ?>" alt="" style="width:80px"><br>
                        (<?= $hinh ?>)
                    </div>

                    <div class="form-group">
                        <label for="">Mô tả:</label>
                        <textarea class="form-control" rows="5" id="mo_ta" name="mo_ta" placeholder="Mô tả hàng hóa ..."><?= $mo_ta ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Mã loại?</label>
                        <select name="ma_loai" class=form-control>
                            <?php
                            $loai_select_list = loai_hang_select_all();
                            foreach ($loai_select_list as $loai) {
                                if ($loai['ma_loai'] == $ma_loai) {
                                    echo '<option selected value="' . $loai['ma_loai'] . '">' . $loai['ten_loai'] . '</option>';
                                } else {
                                    echo '<option value="' . $loai['ma_loai'] . '">' . $loai['ten_loai'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="btn_update" class="btn btn-danger">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage() {
        var input = document.getElementById('hinhInput');
        var preview = document.getElementById('hinhPreview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var image = new Image();

                image.onload = function () {
                    var canvas = document.createElement('canvas');
                    var ctx = canvas.getContext('2d');

                    // Set the canvas dimensions to the resized image dimensions
                    canvas.width = 150; // Set your desired width
                    canvas.height = (canvas.width / image.width) * image.height;

                    // Draw the resized image on the canvas
                    ctx.drawImage(image, 0, 0, canvas.width, canvas.height);

                    // Update the preview image source with the resized image data
                    preview.src = canvas.toDataURL('image/jpeg'); // You can use 'image/png' if you prefer PNG format
                    preview.style.display = 'block';
                };

                image.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>