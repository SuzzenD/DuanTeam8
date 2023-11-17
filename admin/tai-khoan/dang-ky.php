<!DOCTYPE html>
<html lang="en">

<head>
	<title>Đăng ký</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
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
	require_once('../admin/dao/khach-hang.php');

	extract($_REQUEST);
	$error_message = ""; // Biến để lưu trữ thông báo lỗi
	$error_email = ""; // Bi
	$error_pass = ""; // Bi
	if (array_key_exists('btn_register', $_REQUEST)) {
		// Kiểm tra tất cả các trường đã được điền đầy đủ
		if (empty($ma_kh) || empty($ho_ten) || empty($mat_khau) || empty($email) || empty($dia_chi)) {
			$error_message = "Vui lòng điền đầy đủ thông tin!";
		} else {
			// Kiểm tra độ dài mật khẩu
			if (strlen($mat_khau) < 3) {
				$error_pass = "Mật khẩu phải có ít nhất 3 ký tự!";
			}
			// Kiểm tra cú pháp email
			elseif (!preg_match('/^[\w\-]+(\.[\w\-]+)*@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,})$/', $email)) {
				$error_email = "Vui lòng nhập đúng cú pháp email!";
			} else {
				// Mọi thông tin hợp lệ, thực hiện lưu trữ dữ liệu
				khach_hang_insert($ma_kh, $ho_ten, $mat_khau, $email, $dia_chi);

				echo '<script language="javascript">';
				echo 'alert("Đăng ký thành công!");';
				echo 'window.location.href = "dang-nhap.php";'; // Chuyển hướng đến trang dang-nhap.php
				echo '</script>';

				exit; // Dừng thực hiện mã PHP để chuyển hướng ngay lập tức
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
					</span>


					<span class="login100-form-title p-b-34 p-t-27">
						ĐĂNG KÝ
					</span>

					<div class="wrap-input100">
						<input class="input100" type="text" name="ma_kh" placeholder="Tên đăng nhập">
						<span class="focus-input100" data-placeholder="&#xf18e;"></span>
					</div>
					<span style="color: indianred" class="error-message"><?php echo $error_message; ?></span>

					<div class="wrap-input100">
						<input class="input100" type="text" name="ho_ten" placeholder="Họ và tên">
						<span class="focus-input100" class='fas' data-placeholder="&#xf18e;"></span>
					</div>
					<span style="color: indianred" class="error-message"><?php echo $error_message; ?></span>

					<div class="wrap-input100">
						<input class="input100" type="password" name="mat_khau" placeholder="Mật khẩu">
						<span class="focus-input100" data-placeholder="&#xf18e;"></span>
					</div>
					<span style="color: indianred" class="error-message"><?php echo $error_pass; ?></span>
					<span style="color: indianred" class="error-message"><?php echo $error_message; ?></span>

					<div class="wrap-input100">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf18e;"></span>
					</div>
					<span style="color: indianred" class="error-message"><?php echo $error_email; ?></span>
					<span style="color: indianred" class="error-message"><?php echo $error_message; ?></span>

					<div class="wrap-input100">
						<input class="input100" type="text" name="dia_chi" placeholder="Địa chỉ">
						<span class="focus-input100" data-placeholder="&#xf18e;"></span>
					</div>
					<span style="color: indianred" class="error-message"><?php echo $error_message; ?></span>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="btn_register">
							XÁC NHẬN
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="dang-nhap.php">
							Đăng nhập?&nbsp;
						</a>OR
						<a class="txt1" href="quen-mk.php">
							&nbsp;Quên mật khẩu?
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