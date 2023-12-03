<?php
        session_start();
        extract($_REQUEST);
        unset($_SESSION['cart'][$ma_hh]);
        header('location: cart.php');
    ?>