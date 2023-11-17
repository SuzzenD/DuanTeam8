<?php
        session_start();
        session_destroy();
        header('location: /asmm/trang-chinh/index.php');
    ?>