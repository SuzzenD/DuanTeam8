<?php
    function getAllSanPham(){
        $sql="SELECT * FROM hang_hoa";
        return pdo_query($sql);
    }
    function getAllDanhMuc(){
        $sql="SELECT * FROM loai_hang";
        return pdo_query($sql);
    }
    function updateSaleProduct($giam_gia,$id_hh){
        $sql="UPDATE hang_hoa SET giam_gia='$giam_gia' WHERE ma_hh=$id_hh";
        return pdo_execute($sql);

    }
    function updateSaleCate($giam_gia,$ma_loai){
        $sql="UPDATE hang_hoa SET giam_gia='$giam_gia' WHERE ma_loai=$ma_loai";
        return pdo_execute($sql);

    }
?>