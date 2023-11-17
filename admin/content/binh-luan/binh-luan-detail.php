<?php include "./dao/navbar.php" ?>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="header">
                <div class="page-header">
                    <!-- /. XỬ LÝ CODE PHP  -->
                    <?php
                    extract($_REQUEST);

                    $items = binh_luan_select_by_hang_hoa($ma_hh);

                    ?>
                    <h1>CHI TIẾT BÌNH LUẬN</h1>
                    <p>Tên hàng hóa:
                    <h3><?= $items[0]['ten_hh'] ?></h3>
                    </p>

                    <!-- /. CONTENT  -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NỘI DUNG</th>
                                <th>NGÀY BÌNH LUẬN</th>
                                <th>NGƯỜI BÌNH LUẬN</th>
                                <th>HÀNH ĐỘNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item) {
                                extract($item);
                            ?>
                                <tr>
                                    <td><?= $noi_dung ?></td>
                                    <td><?= $ngay_bl ?></td>
                                    <td><?= $ma_kh ?></td>
                                    <td><a href="index.php?act=xoabinhluan&ma_bl=<?= $ma_bl ?>"><button class="btn btn-danger">XÓA</button></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>