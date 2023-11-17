<?php

    extract($_REQUEST);

    binh_luan_delete($ma_bl);

    header('location: index.php?act=binhluan');

?>