<?php

    extract($_REQUEST);

    khach_hang_delete($ma_kh);

    header('location: index.php?act=khachhang');

?>