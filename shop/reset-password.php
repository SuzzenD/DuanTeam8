<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feng Shop</title>
    <link rel="shortcut icon" href="images/iconlogo-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        body {
            margin: 0;
            padding: 0;
            background-color: #f7f8f9;
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
        }

        .auth-container {
            max-width: 750px;
            max-height: 600px;
            margin: 0 auto;
            background: #fff;
            border-radius: 15px;
            box-shadow: 1px 2px 8px 8px #ccc3;
            display: flex;
            margin-top: 4rem;
            overflow: hidden;
        }

        .auth-image img {
            height: 100%;
            width: auto;
        }

        .auth-image {
            overflow: hidden;
        }

        .auth-action-right {
            width: 320px;
        }

        .auth-action-left {
            flex: 2;
        }

        .auth-form-outer {
            padding: 2rem 4rem;
            display: block;
        }

        h2.auth-form-title {
            text-align: center;
            color: #fd5353;
            font-size: 1.7rem;
        }

        .auth-form-outer input {
            border: 1px solid #56aef485;
            margin-bottom: 1rem;
            width: 100%;
            padding: 13px;
            border-radius: 5px;
            box-sizing: border-box;
            background: #f7f8f97a;
        }

        .auth-form-outer input:hover,
        .auth-form-outer input:focus {
            outline: none;
            box-shadow: none;
        }

        .auth-form-outer input:focus {
            background-color: #fff;
            border: 1px solid #fd5353;
        }


        input.auth-form-input::placeholder {
            color: #0f82dd4d;
        }



        input[type="checkbox"] {
            display: none;
        }

        label input[type="checkbox"]~i.fa.fa-square-o {
            color: #fd5353;
            display: inline;
        }

        label input[type="checkbox"]~i.fa.fa-check-square-o {
            display: none;
        }

        label input[type="checkbox"]:checked~i.fa.fa-square-o {
            display: none;
        }

        label input[type="checkbox"]:checked~i.fa.fa-check-square-o {
            color: #fd5353;
            display: inline;
        }

        label:hover input[type="checkbox"]~i.fa {
            color: #fd5353;
        }

        div[data-toggle="buttons"] label.active {
            color: #fd5353;
        }

        .auth-wrapper a {
            text-decoration: none;
            color: #fd5353;
        }

        a.auth-btn-direct {
            flex: 1;
            border: 1px solid #fd5353;
            text-align: center;
            height: 40px;
            border-radius: 5px;
            line-height: 40px;
            font-weight: 500;
            margin-left: 5px;
        }

        input.auth-submit {
            background: #fe5454;
            border: none;
            width: auto;
            color: #fff;
            font-weight: 500;
            border-radius: 5px !important;
            flex: 1;
            margin-right: 5px;
            cursor: pointer;
        }

        input.auth-submit:focus {
            background: #fe5454;
            color: #fff;
        }

        input.auth-submit:hover {
            box-shadow: 3px 3px 7px 2px #f443362b;
        }

        a.auth-btn-direct:hover {
            box-shadow: -2px 3px 0px 0px #F44336;
        }

        .auth-external-list ul li a:hover {
            color: #fd5353;
            border-color: #fd5353;
        }

        .footer-action {
            display: flex;
            width: 100%;
            margin-top: 2rem;
            box-sizing: border-box;
            overflow: hidden;
        }

        .auth-external-list ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .auth-external-list ul li {
            float: left;
        }

        .auth-external-list {
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .auth-external-list ul li a {
            width: 26px;
            height: 26px;
            margin: 7px;
            display: block;
            text-align: center;
            line-height: 27px;
            border-radius: 50%;
            border: 1px solid #00000078;
            color: #555;
        }

        p.auth-sgt {
            text-align: center;
        }

        .auth-forgot-password a {
            text-align: center;
            display: block;
            border-top: 1px dashed #f4433633;
            padding: 20px;
            margin-top: 20px;
        }


        .input-icon {
            position: relative;
        }

        .input-icon input {
            padding-right: 4rem;
        }

        .input-icon i {
            position: absolute;
            top: 38%;
            right: 1.2rem;
            transform: translateY(-50%);
            color: #2196f3b5;
            cursor: pointer;
        }

        /* responsive */
        @media screen and (max-width: 720px) {
            body {
                background-color: #fff;
            }

            .auth-container {
                max-width: 100%;
                max-height: 100vh;
                margin: 0 auto;
                background: #fff;
                border-radius: 0;
                box-shadow: none;
                display: block;
                margin-top: 0;
            }

            .auth-action-left {
                width: 100%;
            }

            .auth-action-right {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Form without bootstrap -->
    <!-- CODE XỬ LÝ PHP -->
    <?php
    require_once('../asmm/admin/dao/khach-hang.php');
    extract($_REQUEST);
    // if(array_key_exists('btn_forgot',$_REQUEST)){

    // 	$user = khach_hang_select_by_id($ma_kh);
    // 	$mes = '';
    //         if($user){
    //             if($user['email'] != $email){
    //                 echo '<script language="javascript">';
    //                 echo 'alert("Bạn đã nhập sai địa chỉ email !")';
    //                 echo '</script>';
    //             }else{
    //                 $mat_khau = $user['mat_khau'];
    //                 $tai_khoan = $user['ma_kh'];
    //             }
    //         }else{
    //                 echo '<script language="javascript">';
    //                 echo 'alert("Bạn đã nhập sai tên đăng nhập !")';
    //                 echo '</script>';
    // 		}
    // }

    $error_message = '';

    if (array_key_exists('btn_forgot', $_REQUEST)) {
        if (empty($ma_kh) || empty($email)) {
            $error_message = 'Vui lòng nhập thông tin để đăng nhập!';
        } else {
            $user = khach_hang_select_by_id($ma_kh);
            if ($user) {
                if ($user['email'] != $email) {
                    $error_message = 'Bạn đã nhập sai địa chỉ email!';
                } else {
                    $mat_khau = $user['mat_khau'];
                    $tai_khoan = $user['ma_kh'];
                }
            } else {
                $error_message = 'Bạn đã nhập sai tên đăng nhập!';
            }
        }
    }
    ?>

    <div class="auth-wrapper">
        <div class="auth-container">
            <div class="auth-action-left">
                <div class="auth-form-outer">
                    <h2 class="auth-form-title">
                        Quên mật khẩu
                    </h2>
                    <!-- <div class="auth-external-container">
                        <div class="auth-external-list">
                            <ul>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <p class="auth-sgt">hoặc đăng nhập bằng:</p>
                    </div> -->
                    <form class="login-form" method="post">
                        <input type="text" class="auth-form-input" placeholder="Tên đăng nhập" name="ma_kh">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        <input type="email" class="auth-form-input" placeholder="Email" name="email">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>

                        <?php if (!empty($error_message)) : ?>
                            <span style="color: indianred" class="error-message"><?php echo $error_message; ?></span>
                        <?php elseif (isset($mat_khau) && isset($tai_khoan)) : ?>
                            <span style="color: indianred" class="success-message">Tên đăng nhập: <?php echo $tai_khoan; ?></span><br>
                            <span style="color: indianred" class="success-message">Mật khẩu: <?php echo $mat_khau; ?></span>
                        <?php endif; ?>
                        <!-- <label class="btn active">
                            <input type="checkbox" name="" checked>
                            <i class="fa fa-square-o"></i><i class="fa fa-check-square-o"></i>
                            <span> Nhớ mật khẩu</span>
                        </label> -->
                        <div class="footer-action">
                            <!-- <input type="submit" value="Đăng nhập" class="auth-submit"> -->
                            <button type="submit" name="btn_forgot" style="font-family: Arial, sans-serif; background-color: #f2f2f2; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  background-color: #FE5454; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                                Xác nhận
                            </button>
                        </div>
                        <br>
                        <div class="text-center p-t-90">
                            <a class="txt1" href="register.php">
                                Đăng ký?&nbsp;
                            </a>OR
                            <a class="txt1" href="login.php">
                                &nbsp;Đăng nhập?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="auth-action-right">
                <div class="auth-image">
                    <img src="./images/vector.jpg" alt="login">
                </div>
            </div>
        </div>
    </div>
</body>

</html>