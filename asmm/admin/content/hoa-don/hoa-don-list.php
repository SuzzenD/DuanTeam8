<?php include "./dao/navbar.php" ?>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="header">
                <div class="page-header">
                    <h1>QUẢN LÝ ĐƠN HÀNG</h1>
                    <p>Dưới đây là danh sách các đơn hàng mà khách hàng đã đặt mua: </p>

                    <!-- /. XỬ LÝ CODE PHP  -->
                    <?php
                    $items = hoa_don_select_all();
                    ?>
                    <!-- /. CONTENT  -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>MÃ HĐ</th>
                                <th>MÃ KH</th>
                                <th>NGÀY MUA</th>
                                <th>GHI CHÚ</th>
                                <th>TÌNH TRẠNG</th>
                                <th>CHI TIẾT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item) {
                                extract($item);
                                $total
                            ?>
                                <tr>
                                    <td><?= $ma_hd ?></td>
                                    <td><?= $ma_kh ?></td>
                                    <td><?= $ngay_mua ?></td>
                                    <td><?= $ghi_chu ?></td>
                                    <td>
                                        <a href="index.php?act=thanhtoan&ma_hd=<?= $ma_hd ?>">
                                            <?php
                                            if ($tinh_trang == 0) {
                                                echo '<button class="btn btn-danger name="thanh_toan">';
                                                echo "Chưa thanh toán";
                                            } else {
                                                echo '<button class="btn btn-primary name ="thanh_toan">';
                                                echo "Đã thanh toán";
                                            }
                                            ?>
                                            </button></a>
                                    </td>
                                    <td><a href="index.php?act=chitiethoadon&ma_hd=<?= $ma_hd ?>&ma_kh=<?= $ma_kh ?>"><button class="btn btn-success">Chi tiết</button></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>