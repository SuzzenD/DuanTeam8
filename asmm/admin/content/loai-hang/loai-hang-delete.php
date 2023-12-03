<?php
    require_once ('dao/loai-hang.php'); // Thay thế bằng đường dẫn thực tế của tệp chứa các hàm xử lý loại hàng
    // require_once(__DIR__ . 'dao/loai-hang.php');

    if(isset($_REQUEST['ma_loai'])){
        $ma_loai = $_REQUEST['ma_loai'];
        loai_hang_soft_delete($ma_loai);
        header('location: index.php?act=loaihang');
    } else {
        // Xử lý khi không có mã loại hàng được truyền vào
        echo "Không có mã loại hàng được cung cấp.";
    }
?>
