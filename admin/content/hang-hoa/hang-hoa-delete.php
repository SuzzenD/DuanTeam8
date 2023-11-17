<?php
    extract($_REQUEST);

    hang_hoa_delete($ma_hh);

    header('location: index.php?act=hanghoa');

?>