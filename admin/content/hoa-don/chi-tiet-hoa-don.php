<?php include "./dao/navbar.php" ?>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="header">
                <!-- /. XỬ LÝ CODE PHP  -->
                <?php
                extract($_REQUEST);
                $items = hoa_don_chi_tiet_select_by_id($ma_hd);
                $Total = 0;

                ?>
                <div class="page-header">
                    <h1>CHI TIẾT ĐƠN HÀNG SỐ <b><?= $ma_hd ?></b></h1><br>
                    <h3>MÃ KHÁCH HÀNG : <b><?= $ma_kh; ?></b></h3>
                    <p>Dưới đây là những sản phẩm mà khách hàng đã mua: </p>

                    <!-- /. CONTENT  -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>TÊN HÀNG HÓA</th>
                                <th>SỐ LƯỢNG</th>
                                <th>ĐƠN GIÁ/SP</th>
                                <th>THÀNH TIỀN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item) {
                                extract($item);
                            ?>
                                <tr>
                                    <td><?= $ten_hh ?></td>
                                    <td><?= $so_luong ?></td>
                                    <td><?= number_format($don_gia) ?> VNĐ</td>
                                    <td><?= number_format($don_gia * $so_luong);
                                        $Total += ($don_gia * $so_luong) ?> VNĐ</td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3" style="text-align:center;"><b>TỔNG TIỀN</b></td>
                                <td><b><?= number_format($Total) ?> VNĐ</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="index.php?act=hoadon"><button class="btn btn-danger">Danh sách đơn hàng</button></a>
            </div>
        </div>
    </div>