<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quen MK</title>
    <link rel="stylesheet" href="../../lib/css/main.css">
    <!-- <link rel="stylesheet" href="maindangky.css"> -->
    <link rel="stylesheet" href="../../lib/css/login.css">

</head>

<body>
    <!-- menu -->

    <main class="">
        <div class="thanh-duong-dan">
            <div class="container">
                <span class="span span1">
                    Trang chủ
                </span>
                <span class="span span2">
                    > Quên mật khẩu
                </span>
            </div>
        </div>
        <!-- slider -->
        <div class="col mx-auto">
            <div class="col-12 col-sm-3 px-0 mx-auto">
                <p class="section-header page-main-header">Gửi mã tới email</p>
            </div>
            <form action="/checkforgotpassword" method="post" enctype="multipart/form-data" class="col-10 col-sm-3 mx-auto mx-sm-auto">
                <div class="col px-0 align-items-start form-div-row mx-auto mx-sm-auto">
                    <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                        <?= isset($_SESSION['forgotpass-err']) ? $_SESSION['forgotpass-err'] : '' ?>
                    </p>
                    <p class="error text-success fw-bold text-capitalize text-decoration-underline">
                        <?= isset($notifi) ? $notifi : '' ?>
                    </p>
                    <label class="px-0 py-2" for="#">Nhập email</label>
                    <input type="email" class="w-100" name="useremail" placeholder="nhập email nhận mã xác thực">
                    <input type="submit" class="w-100" value="Gửi yêu cầu">
                    <div class="row mt-2 mx-0 px-0 other-option">
                        <a href="/login" class="text-success fw-bold text-decoration-underline">Trở lại</a>
                    </div>
                </div>
            </form>
        </div>
        <br><br>
    </main>
    <!-- footer -->


</body>

</html>