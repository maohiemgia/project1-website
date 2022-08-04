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

function fetch_khuyenmai_sp()
{
     $sql = "SELECT `id_san_pham`, MAX(`khuyen_mai`) as `khuyen_mai` FROM `thuoc_tinh` GROUP BY `id_san_pham`";
     return querySQL($sql, 1);
}

function top_ban_chay()
{
     // $sql = "SELECT chi_tiet_don_hang.id_san_pham, san_pham.ten_sp, san_pham.gia_sp ,SUM(so_luong_sp) AS 'so_luong_da_ban' FROM `chi_tiet_don_hang` 
     // join san_pham on chi_tiet_don_hang.id_san_pham = san_pham.id
     // GROUP BY chi_tiet_don_hang.id_san_pham ORDER BY SUM(so_luong_sp) DESC LIMIT 0,4";
     $sql = "SELECT chi_tiet_don_hang.id_san_pham, san_pham.ten_sp, san_pham.gia_sp ,SUM(so_luong_sp) AS 'so_luong_da_ban', hinh_anh_sp.url_ha_sp FROM `chi_tiet_don_hang` 
     join san_pham on chi_tiet_don_hang.id_san_pham = san_pham.id
     JOIN hinh_anh_sp on hinh_anh_sp.id_san_pham = san_pham.id
     WHERE hinh_anh_sp.do_uu_tien_ha_sp = 0
     GROUP BY chi_tiet_don_hang.id_san_pham ORDER BY SUM(so_luong_sp) DESC LIMIT 0,4";
     // $top = pdo_query($sql);
     $top = querySQL($sql, 1);
     return $top;
}

