<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/6c87d9fedd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../lib/css/main.css">
    <link rel="stylesheet" href="../../lib/css/all.css">

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
        <div class="formdangki">
            <form action="../../models/login.php" class="form-dangki" method="POST">
                <h3>ĐĂNG KÝ</h3>
                <p class="dacotk-dnduoih3">Đã có tài khoản đăng nhập <a href="/login"> TẠI ĐÂY</a></p>
                <br>
                <input type="text" class="input-top" name="name" placeholder="Họ và tên">
                <br>
                <input type="email" class="input-bot" name="email" placeholder="Email">
                <br>
                <input type="tel" class="input-top" name="phone" placeholder="Số điện thoại">
                <br>
                <input type="text" class="input-bot" name="username" placeholder="Tên đăng nhập">
                <br>
                <input type="password" class="input-top" name="password" placeholder="Mật khẩu">
                <br>
                <input type="password" class="input-bot" name="repassword" placeholder="Nhập lại mật khẩu">
                <br>
                <div class="dangnhap">
                    <a href="index.html">
                        <button class="btn-sub">ĐĂNG NHẬP</button>
                    </a>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>