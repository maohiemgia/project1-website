<?php

$_SESSION['menu'] = 1;



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../../lib/css/main.css">
    <!-- <link rel="stylesheet" href="../../lib/css/maindangky.css"> -->

</head>

<body>

    <main class="">
        <div class="thanh-duong-dan">
            <div class="container">
                <span class="span span1">
                    Trang chủ
                </span>
                <span class="span span2">
                    > Đăng nhập tài khoản
                </span>
            </div>
        </div>
        <div class="formdangki">
            <form action="/checklogin" class="form-dangki" method="POST">
                <h3>ĐĂNG NHẬP</h3>
                <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                    <?= isset($_SESSION['login-err']) && !empty($_SESSION['login-err']) ? $_SESSION['login-err'] : '' ?>
                </p>
                <br>
                <input type="text" name="account" class="input-top" id="email" placeholder="Tài khoản" autofocus>
                <br>
                <input type="password" name="password" class="input-bot" id="password" placeholder="Mật khẩu">
                <br>
                <div class="dangnhap">
                    <button type="submit" class="btn-sub" >ĐĂNG NHẬP</button>
                </div>
                <div class="box-bot-dangnhap">
                    <div class="quenmk">
                        <a href="/forgotpassword">
                            <p class="quenmatkhau">Quên mật khẩu</p>
                        </a>
                    </div>
                    <div class="dangky">
                        <a href="/register">
                            <p class="quenmatkhau">Đăng ký tại đây</p>
                        </a>
                    </div>
                </div>
                <div class="dangnhapqua">
                    <p>Hoặc đăng nhập bằng</p>
                </div>
                <div class="icon-form-dang-ki">
                    <div class="facebook">
                        <a href="facebook.com"> <i class="fa-brands fa-facebook"></i>Facebook</a>
                    </div>
                    <div class="google">
                        <a href="google.com"><i class="fa-brands fa-google-plus"></i>Google</a>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>