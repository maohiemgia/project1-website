<?php
if (session_status() === PHP_SESSION_NONE) {
     session_start();
}
require_once "database.php";

$errorArr = [
     "empty" => "Lỗi chưa nhập",
     "wrong" => "Lỗi nhập sai",
     "length" => "Lỗi số lượng ký tự không phù hợp",
     "oversize" => "Kích cỡ không phù hợp"
];

$_SESSION['menu'] = 1;

// if (
//      !isset($_SESSION['userLogin']) && !isset($_COOKIE['change_pass_verify'])
//      && !isset($_GET['register'])
// ) {
//      header('location: login.php');
//      exit();
// }

if (!isset($_COOKIE['cookie_email_code'])) {
     $mess = "Đã quá thời hạn, vui lòng tạo lại mã";

     alertResult($mess);

     echo "<script>
     window.location.href = '/login';
     </script>";
} else {
     $inp_emailcode = '';

     if (empty($_POST["emailcodeconfirm"])) {
          $_SESSION['confirmcode-err'] = $errorArr['empty'];
     } else {
          $inp_emailcode = $_POST["emailcodeconfirm"];
          if ($inp_emailcode != $_COOKIE['cookie_email_code']) {
               $_SESSION['confirmcode-err'] = $errorArr['wrong'] . " Not this code";
          } else {
               $_SESSION['confirmcode-err'] = '';
               setcookie('cookie_email_code', 'cookie deleted', 1);

               // if (isset($_GET['register'])) {
               //      $sql = $_SESSION['temps_sql'];
               //      querySQL($sql);
               //      header("location: ../index.php?messnoti");
               // } else {
               // $_SESSION['email_code_true'] = 5;
               //      header("location: ./changepass.php");
               //      exit();
               // }
          }
     }
}
