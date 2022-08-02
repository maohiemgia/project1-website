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
