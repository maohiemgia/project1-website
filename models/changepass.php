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

if (!isset($_COOKIE['change_pass_verify'])) {
     echo "<script>
     window.location.href = '/';
     </script>";
     exit();
}
$_SESSION['newpassword-err'] = '';
$inp_newpassword = $inp_confirmnewpassword = '';

// if (isset($_COOKIE['forget_password'])) {
//      $cookie_email = $_COOKIE['forget_password'];
//      $sql = "SELECT
//                     *
//                FROM
//                     `user`
//                WHERE
//                     `email` LIKE '%$cookie_email%';";
//      $userchanging = querySQL($sql, 1);
// } else {
//      $username = '';
//      if (isset($_SESSION['userLogin']['username'])) {
//           $username = $_SESSION['userLogin']['username'];
//           $userchanging = $_SESSION['userLogin'];
//      }
// }

if (empty($_POST["newpassword"]) || empty($_POST["confirmnewpassword"])) {
     $_SESSION['newpassword-err'] = $errorArr['empty'];
}

if (!empty($_POST["newpassword"]) && !empty($_POST["confirmnewpassword"])) {
     $inp_newpassword = $_POST["newpassword"];
     $inp_confirmnewpassword = $_POST["confirmnewpassword"];

     if (!($inp_newpassword == $inp_confirmnewpassword)) {
          $_SESSION['newpassword-err'] = $errorArr['wrong'] . " phần Xác nhận mật khẩu mới";
     } else {

          // encode password
          $passwordEncode = password_hash($inp_newpassword, PASSWORD_DEFAULT);

          if (isset($_COOKIE['forget_password'])) {
               $cookie_email = $_COOKIE['forget_password'];
               $sql = "UPDATE
                              `user`
                         SET
                              `mat_khau` = '$passwordEncode'
                         WHERE
                              `email` = '$cookie_email'";
          } else {
               $username = '';
               if (isset($_SESSION['userLogin']['username'])) {
                    $username = $_SESSION['userLogin']['username'];
               }
               $sql = "UPDATE
                              `user`
                         SET
                              `mat_khau` = '$passwordEncode'
                         WHERE
                              `ten_dang_nhap` = '$username'";
          }

          querySQL($sql);

          if (isset($_COOKIE['change_pass_verify'])) {
               setcookie('change_pass_verify', 'cookie deleted', 1);
          }
          if (isset($_COOKIE['forget_password'])) {
               setcookie('forget_password', 'cookie deleted', 1);
          }
          session_destroy();
          // if (isset($_SESSION['email_code_true'])) {
          //      setcookie('email_code_true', 'cookie deleted', 1);
          // }

     }
}
