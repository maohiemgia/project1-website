<?php

$id = $idDel;
$sql = "DELETE FROM `don_hang` WHERE `id` = $id";
querySQL($sql);
$string = "/admin/order";
echo "<script>window.alert('Xóa thành công')</script>";
echo "<script> window.location.href = '$string' </script>";
