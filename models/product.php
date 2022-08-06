<?php
require_once "database.php";
function fetch_all_product()
{
     $sql = "select * from san_pham";
     return querySQL($sql, 1);
}

function fetch_single_product($id, $withImg = 0)
{
     $sql = "select * from san_pham where id = ?";
     if ($withImg != 0) {
          $sql = "
          SELECT
          *
      FROM
          san_pham sp
      INNER JOIN hinh_anh_sp hasp ON
          hasp.id_san_pham = sp.id
      WHERE
          sp.id = ?
      ORDER BY
          hasp.do_uu_tien_ha_sp ASC
          ";
     }
     return querySQL($sql, 1, $id, 1);
}

function fetch_product_option_img($id, $idOptionType)
{
     $sql = "SELECT
               tt.*,
               hatt.do_uu_tien_ha_tt,
               hatt.url_ha_tt
          FROM
               `thuoc_tinh` tt
          JOIN hinh_anh_thuoc_tinh hatt ON
               hatt.id_thuoc_tinh = tt.id
          WHERE tt.id_san_pham = ? && tt.id_loai_thuoc_tinh = $idOptionType
          ORDER BY
               tt.gia_tri_mo_ta ASC";
     return querySQL($sql, 1, $id, 1);
}
function fetch_product_option($id, $idOptionType)
{
     $sql = "SELECT
               tt.*
          FROM
               `thuoc_tinh` tt
          WHERE
               tt.id_san_pham = ?  && tt.id_loai_thuoc_tinh = $idOptionType
          ORDER BY
               tt.gia_tri_mo_ta ASC
          ";
     return querySQL($sql, 1, $id, 1);
}

function fetch_khuyenmai_sp()
{
     $sql = "SELECT `id_san_pham`, MAX(`khuyen_mai`) as `khuyen_mai` FROM `thuoc_tinh` GROUP BY `id_san_pham`";
     return querySQL($sql, 1);
}


// top bán chạy theo số lượng sp đã bán của từng sp
function top_ban_chay()
{
     $sql = "SELECT ctdh.id_san_pham, sp.ten_sp, sp.gia_sp ,SUM(ctdh.so_luong_sp) AS 'so_luong_da_ban', hasp.url_ha_sp, hasp.alt_ha_sp FROM `chi_tiet_don_hang` ctdh
     join san_pham sp on ctdh.id_san_pham = sp.id
     JOIN hinh_anh_sp hasp on hasp.id_san_pham = sp.id
     WHERE hasp.do_uu_tien_ha_sp = 0
     GROUP BY hasp.id_san_pham ORDER BY SUM(ctdh.so_luong_sp) DESC LIMIT 0,4";
     // $top = querySQL($sql, 1);
     $top = pdo_query($sql);
     return $top;
}

// top xu hướng sắp xếp theo lượt xem sp
function top_xu_huong($doi_tuong)
{
     $sql = "SELECT sp.id,sp.gia_sp, sp.ten_sp, hasp.url_ha_sp, hasp.do_uu_tien_ha_sp,sp.luot_xem_sp, hasp.alt_ha_sp FROM `san_pham` sp
     join hinh_anh_sp hasp on hasp.id_san_pham = sp.id
     WHERE
     hasp.do_uu_tien_ha_sp = 0 AND
     sp.doi_tuong = '" . $doi_tuong . "' ORDER BY sp.luot_xem_sp
     DESC LIMIT 0,5";
     // $top = querySQL($sql, 1);
     $top = pdo_query($sql);
     return $top;
}

// top object là top san phẩm mới nhập của từng đối tượng
function top_object($object)
{
     $sql = "SELECT * FROM `san_pham` WHERE doi_tuong = '" . $object . "'
     ORDER BY ngay_nhap_sp DESC LIMIT 0,4";
     $sql = "SELECT sp.id, sp.ten_sp, sp.gia_sp, sp.ngay_nhap_sp, hasp.url_ha_sp, hasp.alt_ha_sp FROM `san_pham` sp
     JOIN hinh_anh_sp hasp on hasp.id_san_pham = sp.id
     WHERE sp.doi_tuong = '" . $object . "'
     AND
     hasp.do_uu_tien_ha_sp = 0
     ORDER BY sp.ngay_nhap_sp DESC LIMIT 0,4";
     // $top = querySQL($sql, 1);
     $top = pdo_query($sql);
     return $top;
}
