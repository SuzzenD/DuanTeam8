<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        .container {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        form {
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            padding: 20px;
            margin-top: 20%;
        }

        h2 {
            text-align: center;
        }

        p {
            text-align: center;
        }

        .form-group {
            margin-bottom: 10px;
            padding: 6px;
            margin: 6px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="POST">
            <h2>Đăng nhập Admin</h2>
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="ma_kh" placeholder="Nhập tên đăng nhập">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="mat_khau" placeholder="Nhập mật khẩu">
            </div>
            <?php if (isset($_SESSION['messages'])) : ?>
                <div><?php echo $_SESSION['messages']; ?></div>
            <?php endif; ?>
            <button type="submit">Đăng nhập</button>
            <a href="../../../asmm/trang-chinh/index.php">
                <p>Về Trang chủ</p>
            </a>
        </form>
    </div>
</body>

</html>
<?php
$ma_kh = $_POST['ma_kh'] ?? "";
$mat_khau = $_POST['mat_khau'] ?? "";
$khach_hang = new khach_hang();

if ($ma_kh == "" || $mat_khau == "") {
    $_SESSION['messages'] = "Vui lòng nhập thông tin!";
} else {
    if ($khach_hang->checkUser($ma_kh, $mat_khau)) {
        $result = $khach_hang->userid($ma_kh, $mat_khau);
        $_SESSION['admin'] = $ma_kh;
        header('Location: index.php');
        exit();
    }
}
?>