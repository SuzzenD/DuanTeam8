<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đổi mật khẩu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/css/main.css">
<!--===============================================================================================-->

</head>
<body>

	<!-- CODE XỬ LÝ PHP -->
	<?php
		require_once ('../admin/dao/khach-hang.php');

		extract($_REQUEST);
$error_message = '';

if (array_key_exists('btn_change', $_REQUEST)) {
    if (empty($ma_kh) || empty($mat_khau) || empty($mat_khau2) || empty($mat_khau3)) {
        $error_message = 'Vui lòng nhập đầy đủ thông tin!';
    } elseif ($mat_khau2 != $mat_khau3) {
        $error_message = 'Xác nhận mật khẩu không đúng!';
    } elseif (strlen($mat_khau2) < 3) {
        $error_message = 'Mật khẩu phải từ 3 ký tự trở lên!';
    } else {
        $user = khach_hang_select_by_id($ma_kh);
        if ($user) {
            if ($user['mat_khau'] == $mat_khau) {
                khach_hang_change_password($ma_kh, $mat_khau2);
                echo '<script language="javascript">';
                echo 'alert("Bạn đã đổi mật khẩu thành công!")';
                echo '</script>';
            } else {
                $error_message = 'Bạn đã nhập sai mật khẩu!';
            }
        } else {
            $error_message = 'Bạn đã nhập sai tên đăng nhập!';
        }
    }
}
	?>

	<!-- -->
	
	<div class="limiter">
    <div class="container-login100" style="background-image: url('../css/tai-khoan/images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post">
                <span class="login100-form-logo">
                    <a href="../../asmm/trang-chinh/index.php"><img src="../../asmm/css/danh-sach-sp/img/shoes-no.png" width="80px" alt=""></a>
                </span><br>

                <span class="login100-form-title p-b-34 p-t-27">
                    ĐỔI MẬT KHẨU
                </span>

                <?php if (!empty($error_message)) : ?>
                    <div class="alert alert-danger">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>

                <div class="wrap-input100">
                    <input class="input100" type="text" name="ma_kh" placeholder="Tên đăng nhập">
                    <span class="focus-input100" data-placeholder="&#xf18e;"></span>
                </div>

                <div class="wrap-input100">
                    <input class="input100" type="password" name="mat_khau" placeholder="Mật khẩu cũ">
                    <span class="focus-input100" data-placeholder="&#xf18e;"></span>
                </div>

                <div class="wrap-input100">
                    <input class="input100" type="password" name="mat_khau2" placeholder="Mật khẩu mới">
                    <span class="focus-input100" data-placeholder="&#xf18e;"></span>
                </div>

                <div class="wrap-input100">
                    <input class="input100" type="password" name="mat_khau3" placeholder="Xác nhận mật khẩu mới">
                    <span class="focus-input100" data-placeholder="&#xf18e;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" name="btn_change">
                        XÁC NHẬN
                    </button>
                </div>

                <div class="text-center p-t-90">
                    <a class="txt1" href="dang-ky.php">
                        Đăng ký?&nbsp;
                    </a>OR
                    <a class="txt1" href="dang-nhap.php">
                        &nbsp;Đăng nhập?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/bootstrap/js/popper.js"></script>
	<script src="../css/tai-khoan/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/daterangepicker/moment.min.js"></script>
	<script src="../css/tai-khoan/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../css/tai-khoan/js/main.js"></script>

</body>
</html>