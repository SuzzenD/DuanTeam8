<?php include "./dao/navbar.php" ?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="header">
            <div class="page-header">
                <h1>QUẢN LÝ BÌNH LUẬN</h1>
                <p>Dưới đây là danh sách các bình luận về sản phẩm: </p>

                <!-- /. XỬ LÝ CODE PHP  -->
                <?php
                $items = thong_ke_binh_luan();
                ?>
                <!-- /. CONTENT  -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>HÀNG HÓA</th>
                            <th>SỐ BÌNH LUẬN</th>
                            <th>MỚI NHẤT</th>
                            <th>CŨ NHẤT</th>
                            <th>HÀNH ĐỘNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) {
                            extract($item);
                        ?>
                            <tr>
                                <td><?= $ten_hh ?></td>
                                <td><?= $so_luong ?></td>
                                <td><?= $moi_nhat ?></td>
                                <td><?= $cu_nhat ?></td>
                                <td><a href="index.php?act=chitietbinhluan&ma_hh=<?= $ma_hh ?>"><button class="btn btn-danger">Chi tiết</button></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>