<?php
if (session_status() === PHP_SESSION_NONE) {
     session_start();
}
require_once '../global.php';

if (!isset($_SESSION['userLogin']) || $_SESSION['userLogin']['user_role'] == 0) {
     header('location: ../index.php');
     exit();
}

if (isset($_GET['cateid'])) {
     $cateid = $_GET['cateid'];
}
$sql = "DELETE FROM `user` WHERE `username` = '$cateid'";

queryDB($sql);

$mess = "Xóa thành công!!!";
alertResult($mess);

header("Refresh:0; url=./customers.php");
