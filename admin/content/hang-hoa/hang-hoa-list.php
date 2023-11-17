<?php include "./dao/navbar.php" ?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="header">
            <div class="page-header">
                <h1>QUẢN LÝ HÀNG HÓA</h1>
                <p>Dưới đây là danh sách các hàng hóa đã được thêm vào: </p>

                <!-- /. XỬ LÝ CODE PHP  -->
                <?php
                $items = hang_hoa_select_all();
                ?>
                <!-- /. CONTENT  -->

                <a href="index.php?act=hanghoamoi"><button class="btn btn-danger">Thêm mới</button></a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>MÃ HH</th>
                            <th>TÊN HH</th>
                            <th>HÌNH ẢNH</th>
                            <th>ĐƠN GIÁ</th>
                            <th>GIẢM GIÁ</th>
                            <th>HÀNH ĐỘNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) { //lấy tt của mảng
                            extract($item);
                        ?>
                            <tr>
                                <td><?= $ma_hh ?></td>
                                <td><?= $ten_hh ?></td>
                                <td><img src="./css/admin/images/products/<?= $hinh ?>" alt="" style="width:80px;"></td>
                                <td><?= number_format($don_gia) ?> <sup>đ</sup></td>
                                <td><?= $giam_gia ?> <sup>%</sup></td>
                                <td>
                                    <a href="index.php?act=suahanghoa&ma_hh=<?= $ma_hh ?>"><button class="btn btn-primary">Sửa</button></a>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" href="index.php?act=xoahanghoa&ma_hh=<?= $ma_hh ?>"><button class="btn btn-danger">Xóa</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>