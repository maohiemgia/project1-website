<?php
require_once "database.php";

// lấy danh mục sản phẩm
function query_loai_hang()
{
    $sql = "SELECT * FROM loai_hang";
    $loai_hang = pdo_query($sql);
    return $loai_hang;
}

// lấy đối tượng của danh mục, ở trang product lấy để so sánh với id_lh để đổ những đối tượng có trong mỗi lh
function query_object_of_lh()
{
    $sql = "SELECT DISTINCT lh.id,lh.ten_lh, sp.doi_tuong FROM loai_hang lh
    JOIN san_pham sp on sp.id_loai_hang = lh.id";
    $kq = pdo_query($sql);
    return $kq;
}
