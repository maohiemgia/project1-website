<?php
require_once "database.php";
function querydonhang($ma_tra_cuu)
{
    $sql = "SELECT * FROM `don_hang` dh 
    JOIN chi_tiet_don_hang ctdh ON ctdh.id_don_hang =dh.id
    JOIN san_pham sp ON sp.id = ctdh.id_san_pham
    JOIN hinh_anh_sp hasp on hasp.id_san_pham = sp.id
    WHERE dh.ma_tra_cuu = '".$ma_tra_cuu."' AND hasp.do_uu_tien_ha_sp = 0";
    $kq = pdo_query($sql);
    return $kq;
}
