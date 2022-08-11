<?php
require_once "database.php";

function list_wishlist($id)
{
    $sql = "SELECT * FROM user
    JOIN list_yeu_thich lyt on lyt.id_user = user.id
    JOIN san_pham sp on lyt.id_san_pham = sp.id
    JOIN hinh_anh_sp hasp on hasp.id_san_pham = sp.id
    WHERE hasp.do_uu_tien_ha_sp = 0 AND user.id = " . $id;
    $kq =  pdo_query($sql);
    return $kq;
}

function dem_so_yeu_thich($id_user){
    $sql = "SELECT COUNT(*) FROM `list_yeu_thich` WHERE id_user = ".$id_user;
    // $kq =  pdo_query($sql);
    $kq = pdo_query_value($sql);
    return $kq;
}
// $a= dem_so_yeu_thich(7);
// print_r($a);

function check_pro_in_wishlist($id_user, $id_sp)
{
    $sql = "SELECT * FROM user
    JOIN list_yeu_thich lyt on lyt.id_user = user.id
    JOIN san_pham sp on lyt.id_san_pham = sp.id
    JOIN hinh_anh_sp hasp on hasp.id_san_pham = sp.id
    WHERE hasp.do_uu_tien_ha_sp = 0 AND user.id = " . $id_user . "
    and lyt.id_san_pham = " . $id_sp;
    $kq =  pdo_query($sql);
    return $kq;
}
function add_wishlist($id_user, $id_sp)
{
    $sql = "INSERT INTO `list_yeu_thich`(`id_user`, `id_san_pham`) 
    VALUES ('" . $id_user . "','" . $id_sp . "')";
    pdo_execute($sql);
}
function xoa_one_wishlist($id_user, $id_sp)
{
    $sql = "DELETE FROM `list_yeu_thich` WHERE id_user = ".$id_user." and id_san_pham = ".$id_sp;
    pdo_execute($sql);
}