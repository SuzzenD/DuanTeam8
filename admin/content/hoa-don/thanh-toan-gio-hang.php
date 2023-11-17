<?php
    extract($_REQUEST);
    $item = hoa_don_select_by_id($ma_hd);
    extract($item);

     $mahd = $ma_hd;
     $ngaymua = $ngay_mua;
     $ghichu = $ghi_chu;
     $tinhtrang = 1;
     $makh = $ma_kh;
     $conn = pdo_get_connection();
     $sql = "UPDATE hoa_don SET ngay_mua = '".$ngaymua."',ghi_chu = '".$ghi_chu."',tinh_trang = '".$tinhtrang."',ma_kh = '".$ma_kh."' WHERE ma_hd = '".$mahd."'";
     $conn->exec($sql);

     header('location: index.php?act=hoadon');
?>