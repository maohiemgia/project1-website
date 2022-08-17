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


if (isset($_POST['useremail'])) {
     $_SESSION['forgotpass-err'] = '';
     $inp_email = '';

     if (empty($_POST["useremail"])) {
          $_SESSION['forgotpass-err'] = $errorArr['empty'];
     } else {
          $inp_email = strtolower($_POST["useremail"]);

          $sql = "SELECT
                    `email`
               FROM
                    `user`
               ";
          $userArr = querySQL($sql, 1);

          if (!filter_var($inp_email, FILTER_VALIDATE_EMAIL)) {
               $_SESSION['forgotpass-err'] = $errorArr['wrong'] . " Invalid email format";
          } else {
               foreach ($userArr as $u) {
                    if ($u['email'] == $inp_email) {
                         $email_status = true;
                         break;
                    }
                    $email_status = false;
               }
               if ($email_status == false) {
                    $_SESSION['forgotpass-err'] = "Không có email như vậy!!!";
               }
          }
     }

     if (empty($_SESSION['forgotpass-err']) && $email_status == true) {
          $randomNumber = rand(10000, 99999);
          $email_confirm_code = $randomNumber;

          setcookie('cookie_email_code', $email_confirm_code, time() + 60 * 10, '/');     // live 10 phút
          setcookie('change_pass_verify', 'in progress', time() + 60 * 60, '/');     // live 60 phút
          setcookie('forget_password', $inp_email, time() + 60 * 60, '/');     // live 60 phút

          $email_subject = 'Mã xác nhận';
          $email_body = "<br>Dưới đây là mã xác nhận của bạn:
               <br>------------------------------------------------------------------------------------------------------------------<br>
               Code: $email_confirm_code
               <br>Mã xác nhận sẽ bị vô hiệu hóa sau 10 phút.
               <br>------------------------------------------------------------------------------------------------------------------<br>
               <br>";


          // print_r($_COOKIE);
          $send_email = true;
          require_once 'lib/sendemail.php';

          header("location: /confirmcode");
          exit();
     }
}
