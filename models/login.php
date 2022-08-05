<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "database.php";

$_SESSION['menu'] = 1;
$accountLogin = 0;
$passwordLogin = 0;


if (isset($_POST['account']) && isset($_POST['password'])) {
    $inp_account = $inp_password = '';
    $_SESSION['login-err'] = '';

    if (empty($_POST['account'])) {
        $_SESSION['login-err'] = $errorArr['empty'];
    } else {
        $inp_account = $_POST['account'];
        $accountLogin = 1;
    }
    if (empty($_POST['password'])) {
        $_SESSION['login-err'] = $errorArr['empty'];
    } else {
        $inp_password = $_POST['password'];
        $passwordLogin = 1;
    }


    echo  $_SESSION['login-err'];


    if (empty($_SESSION['login-err'])) {
        $sql = "SELECT
                    *
                FROM
                    `user`
                WHERE
                    `ten_dang_nhap` = '$inp_account'";

        // key and value
        $accountresult = querySQL($sql, 1);

        if (count($accountresult) < 1 && $accountLogin == 1 && $passwordLogin == 1) {
            $_SESSION['login-err'] = $errorArr['wrong'];
        } else {
            if ($inp_account == $accountresult[0]['ten_dang_nhap']) {
                $passworddb = $accountresult[0]['mat_khau'];
                // echo password_verify($inp_password, $accountresult[0]['mat_khau']);
                // if ($inp_password == $accountresult[0]['mat_khau']) {


                if (password_verify($inp_password, $passworddb)) {
                    $_SESSION['userLogin'] = $accountresult[0];

                    // giới hạn thời gian đăng nhập bởi time() sau đó sẽ auto logout
                    setcookie('limit_time_login', 'logined', time() + 60 * 15, '/');
                } else {
                    // $_SESSION['login-err'] = $errorArr['wrong'];
                    echo password_verify($inp_password, $accountresult[0]['mat_khau']);
                }
            } else {
                $_SESSION['login-err'] = $errorArr['wrong'];
            }
        }
    }
}
