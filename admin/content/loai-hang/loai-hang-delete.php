<?php
    extract($_REQUEST);
    loai_hang_delete($ma_loai);
    header('location: index.php?act=loaihang');
?>