<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>đăng ký</title>
    <script src="https://kit.fontawesome.com/6c87d9fedd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../lib/css/main.css">
    <!-- <link rel="stylesheet" href="maindangky.css"> -->
    <link rel="stylesheet" href="../../lib/css/all.css">
    <link rel="stylesheet" href="../../lib/css/login.css">
</head>

<body>

    <main class="">
        <div class="thanh-duong-dan">
            <div class="container">
                <span class="span span1">
                    Trang chủ
                </span>
                <span class="span span2">
                    > Đăng ký tài khoản
                </span>
            </div>
        </div>

        <div class="col col-sm-6 mx-auto">
            <div class="row px-0">
                <p class="section-header page-main-header">Đăng Ký</p>
            </div>
            <form action="/checkregister" method="POST">
                <div class="row px-0 align-items-start form-div-row mx-auto">
                    <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                        <?= isset($_SESSION['register-err'][0]) ? $_SESSION['register-err'][0] : '' ?>
                    </p>
                    <label class="px-0 py-2" for="#">Tài khoản</label>
                    <input type="text" name="account" placeholder="nhập tài khoản" value="<?= !empty($inp_account) ? $inp_account : '' ?>" autofocus>
                    <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                        <?= isset($_SESSION['register-err'][1]) ? $_SESSION['register-err'][1] : '' ?>
                    </p>
                    <label class="px-0 py-2" for="#">Mật khẩu</label>
                    <input type="password" name="password" placeholder="********">
                    <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                        <?= isset($_SESSION['register-err'][2]) ? $_SESSION['register-err'][2] : '' ?>
                    </p>
                    <label class="px-0 py-2" for="#">Email</label>
                    <input type="email" name="email" placeholder="nhập email" value="<?= !empty($inp_email) ? $inp_email : '' ?>">
                    <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                        <?= isset($_SESSION['register-err'][3]) ? $_SESSION['register-err'][3] : '' ?>
                    </p>

                    <input type="submit" value="Đăng ký">
                    <div class="row mt-2 mx-0 px-0 other-option d-flex align-items-center justify-content-between">
                        <a href="/forgotpassword">Quên mật khẩu</a>
                        <a href="/login">Đăng nhập tài khoản</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <br>
    <br>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>