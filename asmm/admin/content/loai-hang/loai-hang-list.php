<?php include "./dao/navbar.php" ?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="header">
            <div class="page-header">
                <h1>QUẢN LÝ LOẠI HÀNG</h1>
                <p>Dưới đây là danh sách các loại hàng đã được thêm vào:</p>

                <!-- /. XỬ LÝ CODE PHP  -->
                <?php
                $items = loai_hang_select_all();
                ?>
                <!-- /. CONTENT  -->
                <a href="index.php?act=loaihangmoi"><button class="btn btn-danger">Thêm mới</button></a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>MÃ LOẠI</th>
                            <th>TÊN LOẠI</th>
                            <th>HÀNH ĐỘNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) {
                            extract($item);
                        ?>
                            <tr>
                                <td><?= $ma_loai ?></td>
                                <td><?= $ten_loai ?></td>
                                <td>
                                    <a href="index.php?act=sualoaihang&ma_loai=<?= $ma_loai ?>"><button class="btn btn-primary">Sửa</button></a>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" href="index.php?act=xoaloaihang&ma_loai=<?= $ma_loai ?>"><button class="btn btn-danger">Xóa</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>