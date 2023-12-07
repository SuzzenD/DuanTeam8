<?php include "./dao/navbar.php" ?>

<?php
    if(isset($_POST['cate'])){
        updateSaleCate($_POST['sale'],$_POST['id']);
    }
    if(isset($_POST['product'])){
        updateSaleProduct($_POST['sale'],$_POST['id']);
    }
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="header">
            <div class="page-header">
                <h1>QUẢN LÝ SALE</h1>
                <p></p>

                <!-- /. XỬ LÝ CODE PHP  -->
                <?php
                $items = getAllSanPham();
                $items1 = getAllDanhMuc();
                ?>
                <!-- /. CONTENT  -->
                <h3 style="color:red;">SALE THEO SẢN PHẨM</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Sale</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) {
                            extract($item);
                        ?>
                <form action="index.php?act=sale" method="post">
                            <tr>
                                <td><?= $ma_hh ?></td>
                                <td><?= $ten_hh ?></td>
                                <td><input type="number" value="<?= $giam_gia ?>" min="0" max="100" step="1" name="sale"> (%)</td>
                                <td>
                                    <input type="number" value="<?= $ma_hh ?>" name="id" hidden>
                                    <button class="btn btn-primary" name="product" type="submit">Lưu</button>
                                </td>
                            </tr>
                </form>
                        <?php } ?>
                    </tbody>
                </table>

                <h3 style="color:red;">SALE THEO DANH MỤC</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Sale</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items1 as $item) {
                            extract($item);
                        ?>
                <form action="index.php?act=sale" method="post">
                            <tr>
                                <td><?= $ma_loai ?></td>
                                <td><?= $ten_loai ?></td>
                                <td><input type="number" value="" min="0" max="100" step="1" name="sale"> (%)</td>
                                <td>
                                    <input type="number" value="<?= $ma_loai ?>" name="id" hidden>
                                    <button class="btn btn-primary" name="cate" type="submit">Lưu</button>
                                </td>
                            </tr>
                </form>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>