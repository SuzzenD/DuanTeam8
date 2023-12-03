<?php
    require_once ('pdo.php');
    
    // Insert dữ liệu vào bảng loại hàng
    function loai_hang_insert($ten_loai){
        $sql = "INSERT INTO loai_hang(ten_loai) VALUES (?)";
        pdo_execute($sql, $ten_loai);
    }

    // Cập nhật dữ liệu vào bảng loại hàng
    function loai_hang_update($ma_loai, $ten_loai){
        $sql = "UPDATE loai_hang SET ten_loai=? WHERE ma_loai=?";
        pdo_execute($sql, $ten_loai, $ma_loai);
    }

    // Xóa mềm dữ liệu theo mã loại hàng
    function loai_hang_soft_delete($ma_loai){
        $sql = "UPDATE loai_hang SET deleted_at=NOW() WHERE ma_loai=?";
        if(is_array($ma_loai)){
            foreach($ma_loai as $ma){
                pdo_execute($sql, $ma);
            }
        } else {
            pdo_execute($sql, $ma_loai);
        }
    }

    // Select toàn bộ dữ liệu bảng loại hàng (không lấy những bản ghi đã bị xóa mềm)
    function loai_hang_select_all(){
        $sql = "SELECT * FROM loai_hang WHERE deleted_at IS NULL ORDER BY ma_loai DESC";
        return pdo_query($sql);
    }

    // Select dữ liệu bảng loại hàng theo mã loại hàng (bao gồm cả những bản ghi đã bị xóa mềm)
    function loai_hang_select_by_id($ma_loai){
        $sql = "SELECT * FROM loai_hang WHERE ma_loai=?";
        return pdo_query_one($sql, $ma_loai);
    }
?>
