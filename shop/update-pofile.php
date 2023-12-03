<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./layout/header.php" ?>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            max-height: 1080px;
        }

        .customer-info {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <div class="logo"><a href="index.php"><img src="images/logofeg.avif" alt="FlatShop"></a></div>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <div class="header_top">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="usermenu">
                                        <!-- CODE CHECK ĐĂNG NHẬP -->
                                        <!-- <li><a href="login.php" class="log">Đăng nhập</a></li>
                                    <li><a href="register.php" class="reg">Đăng ký</a></li> -->
                                        <?php
                                        session_start();
                                        ob_start();
                                        if (!isset($_SESSION['user'])) {
                                        ?>
                                            <a href="login.php">
                                                <p><strong>ĐĂNG NHẬP / ĐĂNG KÍ</strong></p>
                                            </a>
                                        <?php } else { ?>
                                            <a href="profile.php">
                                                <p><strong>Xin chào <?= $_SESSION['user']['ho_ten'] ?></strong></p>
                                            </a>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="header_bottom">
                            <ul class="option">
                                <li class="search">
                                    <form action="search.php" method="post">
                                        <button class="search-submit" type="submit" name="search-keywords"></button>
                                        <input class="search-input" placeholder="Nhập sản phẩm cần tìm..." type="text" value="" name="keywords">
                                    </form>
                                </li>
                                <li class="option-cart">
                                    <?php
                                    $sll = 0;
                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $item) {
                                            extract($item);
                                            $sll += $sl;
                                        }
                                    }
                                    ?>
                                    <a href="cart.php" class="cart-icon">Giỏ <span style="position: absolute;padding:3px 8px;background-color:#fff;border-radius:50px;left:295px;top:25px;"><?= $sll ?></span></a>
                                    <!-- <ul class="option-cart-item">
                                    <li>
                                        <div class="cart-item">
                                            <div class="image"><img src="images/products/thum/products-01.png" alt=""></div>
                                            <div class="item-description">
                                                <p class="name">Lincoln chair</p>
                                                <p>Size: <span class="light-red">One size</span><br>Quantity: <span class="light-red">01</span></p>
                                            </div>
                                            <div class="right">
                                                <p class="price">$30.00</p>
                                                <a href="#" class="remove"><img src="images/remove.png" alt="remove"></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="cart-item">
                                            <div class="image"><img src="images/products/thum/products-02.png" alt=""></div>
                                            <div class="item-description">
                                                <p class="name">Lincoln chair</p>
                                                <p>Size: <span class="light-red">One size</span><br>Quantity: <span class="light-red">01</span></p>
                                            </div>
                                            <div class="right">
                                                <p class="price">$30.00</p>
                                                <a href="#" class="remove"><img src="images/remove.png" alt="remove"></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="total">Total <strong>$60.00</strong></span><button class="checkout" onClick="location.href='checkout.php'">CheckOut</button></li>
                                </ul> -->
                                </li>
                            </ul>
                            <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php">Trang chủ</a></li>
                                    <li><a href="products.php">Sản phẩm</a></li>
                                    <li><a href="contact.php">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CODE XỬ LÝ PHP -->
    <?php
    // session_start();
    require_once('../asmm/admin/dao/khach-hang.php');

    extract($_REQUEST);
    // if(array_key_exists('btn_update',$_REQUEST)){
    //     khach_hang_update($ma_kh,$ho_ten,$mat_khau,$email,$dia_chi);
    //     $_SESSION['user'] = khach_hang_select_by_id($ma_kh);
    //     echo '<script language="javascript">';
    //     echo 'alert("Cập nhật thành công!")';
    //     echo '</script>';
    // }else{
    //     extract($_SESSION['user']);
    // }

    $error_message = '';

    if (array_key_exists('btn_update', $_REQUEST)) {
        // Kiểm tra mật khẩu mới
        if (strlen($mat_khau) < 3) {
            $error_message = 'Mật khẩu phải từ 3 ký tự trở lên!';
        }

        // Kiểm tra địa chỉ email
        if (!preg_match('/^[\w\-]+(\.[\w\-]+)*@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,})$/', $email)) {
            $error_message = 'Địa chỉ email không hợp lệ!';
        }

        if (empty($error_message)) {
            khach_hang_update($ma_kh, $ho_ten, $mat_khau, $email, $dia_chi);
            $_SESSION['user'] = khach_hang_select_by_id($ma_kh);
            echo '<script language="javascript">';
            echo 'alert("Cập nhật thành công!")';
            echo '</script>';
        }
    } else {
        extract($_SESSION['user']);
    }
    ?>

    <div class="customer-info">
        <h1>Cập nhật thông tin</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="ma_kh" value="<?= $ma_kh ?>">
                <span class="focus-input100" data-placeholder="&#xf18e;"></span>
            </div>

            <div class="form-group">
                <label for="fullName">Họ và tên:</label>
                <input type="text" name="ho_ten" value="<?= $ho_ten ?>">
                <span class="focus-input100" data-placeholder="&#xf18e;"></span>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" name="mat_khau" value="<?= $mat_khau ?>">
                <span class="focus-input100" data-placeholder="&#xf18e;"></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?= $email ?>">
                <span class="focus-input100" data-placeholder="&#xf18e;"></span>
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" name="dia_chi" value="<?= $dia_chi ?>">
                <span class="focus-input100" data-placeholder="&#xf18e;"></span>
            </div>
            <button type="submit" name="btn_update">Cập nhật</button>
            <?php if (!empty($error_message)) : ?>
                <div class="alert alert-danger">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
    <?php include "./layout/footer.php" ?>
</body>

</html>