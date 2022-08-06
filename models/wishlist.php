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
}