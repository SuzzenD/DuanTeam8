<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./dao/header.php" ?>
</head>

<body>
    <div id="wrapper">
        <?php
        include "./dao/pdo.php";
        include "./dao/khach-hang.php";
        include "./dao/thong-ke.php";
        include "./dao/loai-hang.php";
        include "./dao/hang-hoa.php";
        include "./dao/binh-luan.php";
        include "./dao/hoa-don.php";
        include "./dao/sale.php";
        $action = "home";
        if (isset($_GET['act']))
            $action = $_GET['act'];
        if (!isset($_SESSION['admin'])) {
            $action = "login";
        }
        switch ($action) {
            case "home":
                include "../admin/content/thong-ke/thong-ke-list.php";
                break;
            case "login":
                include "./dao/login.php";
                break;
            case "logout":
                unset($_SESSION['admin']);
                header("location: index.php");
                break;
            case "loaihang":
                include "../admin/content/loai-hang/loai-hang-list.php";
                break;
            case "loaihangmoi":
                include "../admin/content/loai-hang/loai-hang-new.php";
                break;
            case "sualoaihang":
                include "../admin/content/loai-hang/loai-hang-update.php";
                break;
            case "xoaloaihang":
                include "../admin/content/loai-hang/loai-hang-delete.php";
                break;
            case "hanghoa":
                include "../admin/content/hang-hoa/hang-hoa-list.php";
                break;
            case "hanghoamoi";
                include "../admin/content/hang-hoa/hang-hoa-new.php";
                break;
            case "suahanghoa";
                include "../admin/content/hang-hoa/hang-hoa-update.php";
                break;
            case "xoahanghoa";
                include "../admin/content/hang-hoa/hang-hoa-delete.php";
                break;
            case "khachhang":
                include "../admin/content/khach-hang/khach-hang-list.php";
                break;
            case "khachhangmoi":
                include "../admin/content/khach-hang/khach-hang-new.php";
                break;
            case "suakhachhang":
                include "../admin/content/khach-hang/khach-hang-update.php";
                break;
            case "xoakhachhang":
                include "../admin/content/khach-hang/khach-hang-delete.php";
                break;
            case "binhluan":
                include "../admin/content/binh-luan/binh-luan-list.php";
                break;
            case "chitietbinhluan":
                include "../admin/content/binh-luan/binh-luan-detail.php";
                break;
            case "xoabinhluan":
                include "../admin/content/binh-luan/binh-luan-delete.php";
                break;
            case "hoadon":
                include "../admin/content/hoa-don/hoa-don-list.php";
                break;
            case "chitiethoadon":
                include "../admin/content/hoa-don/chi-tiet-hoa-don.php";
                break;
            case "thanhtoan":
                include "../admin/content/hoa-don/thanh-toan-gio-hang.php";
                break;
            case'sale':
                include "../admin/content/sale/sale.php";
                break;    
        }
        ?>
    </div>
    <?php include "./dao/footer.php" ?>
</body>

</html>