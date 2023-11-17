<?php include "./dao/navbar.php" ?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="header">
            <div class="page-header">
                <h1>QUẢN LÝ HÀNG HÓA</h1>
                <p>Dưới đây là danh sách các khách hàng đã được thêm vào: </p>

                <!-- /. XỬ LÝ CODE PHP  -->
                <?php
                $items = khach_hang_select_all();
                ?>
                <!-- /. CONTENT  -->
                <a href="index.php?act=khachhangmoi"><button class="btn btn-danger">Thêm mới</button></a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>TÊN ĐĂNG NHẬP</th>
                            <th>HỌ VÀ TÊN</th>
                            <th>MẬT KHẨU</th>
                            <th>EMAIL</th>
                            <th>ĐỊA CHỈ</th>
                            <th>VAI TRÒ</th>
                            <th>HÀNH ĐỘNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) {
                            extract($item);
                        ?>
                            <tr>
                                <td><?= $ma_kh ?></td>
                                <td><?= $ho_ten ?></td>
                                <td><?= $mat_khau ?></td>
                                <td><?= $email ?></td>
                                <td><?= $dia_chi ?></td>
                                <td><?php if ($vai_tro == 0) {
                                        echo "Khách hàng";
                                    } else {
                                        echo "Admin";
                                    } ?></td>
                                <td>
                                    <a href="index.php?act=suakhachhang&ma_kh=<?= $ma_kh ?>"><button class="btn btn-primary">Sửa</button></a>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" href="index.php?act=xoakhachhang&ma_kh=<?= $ma_kh ?>"><button class="btn btn-danger">Xóa</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>