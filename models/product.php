<?php
require_once "database.php";

function fetch_all_product()
{
     $sql = "select * from san_pham";
     return querySQL($sql, 1);
}

function fetch_single_product($id) {
     $sql = "select * from san_pham where id = ?";
     return querySQL($sql, 1, $id);
}