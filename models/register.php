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

if (isset($_POST['account']) && isset($_POST['password']) && isset($_POST['email'])) {
     $_SESSION['register-err'] = [];

     $inp_account = $inp_password = $inp_email = '';

     if (
          empty($_POST['account'])
          || empty($_POST['password']) || empty($_POST['email'])
     ) {
          $_SESSION['register-err'][0] = $errorArr['empty'] . " hết các phần!";
     }
     if (
          !empty($_POST['account'])
          && !empty($_POST['password']) && !empty($_POST['email'])
     ) {
          $inp_account = strtolower($_POST["account"]);
          $inp_password = $_POST['password'];
          $inp_email = strtolower($_POST["email"]);


          $sql = "SELECT
               *
          FROM
               `user`
          ";
          $userArr = querySQL($sql, 1);


          if (strlen($inp_account) < 5 || strlen($inp_account) > 20) {
               $_SESSION['register-err'][1] = "Tài khoản từ 5 đến 20 ký tự";
          } else {
               foreach ($userArr as $u) {
                    if ($u['ten_dang_nhap'] == $inp_account) {
                         $err = "Tài khoản đã tồn tại!!!";
                         $accAble = 1;
                         break;
                    }
                    $accAble = 0;
               }
               if ($accAble == 0) {
                    $uppercase = preg_match('@[A-Z]@', $inp_password);
                    $lowercase = preg_match('@[a-z]@', $inp_password);
                    $number    = preg_match('@[0-9]@', $inp_password);
                    $specialChars = preg_match('@[^\w]@', $inp_password);

                    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($inp_password) < 8 || strlen($inp_password) > 16) {
                         $_SESSION['register-err'][2] = 'Mật khẩu từ 8 đến 16 ký tự, bao gồm ít nhất 1 chữ in hoa, 1 số và một ký tự đặc biệt.';
                    } else {
                         if (!filter_var($inp_email, FILTER_VALIDATE_EMAIL)) {
                              $_SESSION['register-err'][3] = $errorArr['wrong'] . " Invalid email format";
                         } else {
                              foreach ($userArr as $u) {
                                   if ($u['email'] == $inp_email) {
                                        $_SESSION['register-err'][3] = "Email này đã tồn tại!!!";
                                        break;
                                   }
                              }
                         }
                    }
               }
          }
     }

     if (count($_SESSION['register-err']) == 0) {
          //      // encode password
          $passwordEncode = password_hash($inp_password, PASSWORD_DEFAULT);

          $sql = "INSERT INTO `user`(
                    `ten_dang_nhap`,
                    `mat_khau`,
                    `email`
                )
                VALUES(
                    '$inp_account',
                    '$passwordEncode',
                    '$inp_email'
                )";

          querySQL($sql);
          $_SESSION['notification'] = "Đăng ký thành công!";
          // $_SESSION['temps_sql'] = $sql;


          //      // $mess = "Đăng ký tạm thời thành công. Vui lòng vào email đã đăng ký để nhận mã kích hoạt tài khoản.";
          //      // alertResult($mess);

          //      $randomNumber = rand(10000, 99999);
          //      $email_confirm_code = $randomNumber;

          //      setcookie('cookie_email_code', $email_confirm_code, time() + 60 * 10);     // live 10 phút

          //      $email_subject = 'Mã xác nhận';
          //      $email_body = "<br>Dưới đây là mã xác nhận của bạn:
          //      <br>------------------------------------------------------------------------------------------------------------------<br>
          //      Code: $email_confirm_code
          //      <br>Mã xác nhận sẽ bị vô hiệu hóa sau 10 phút.
          //      <br>------------------------------------------------------------------------------------------------------------------<br>
          //      <br>";

          //      $send_email = true;
          //      require_once '../dao/sendemail.php';
          //      header("location: ./confirmemailcode.php?register=123");
          //      exit();
     }
}
