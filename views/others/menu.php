<?php
if (session_status() === PHP_SESSION_NONE) {
     session_start();
}
require_once "models/product.php";


echo "<pre>";
// print_r($_COOKIE);
// print_r($_SESSION);
// print_r($_SESSION['product-selected-option']);
// print_r($_SESSION['product']);
// print_r($_SESSION['product_cart_infor'][0]['option_detail']);
// print_r($_SESSION['product-selected-option']['option_detail']);
// print_r($_SESSION['itemCartInc']);
// print_r($_SESSION['product_cart_infor']);
echo "</pre>";
// session_destroy();  


//  if (isset($_SESSION['userLogin'])){
//      print_r($_SESSION);
//      echo "<br>".$_SESSION['userLogin']['id'];
//  }
// print_r($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon link section -->
    <link rel="apple-touch-icon" sizes="180x180" href="../../lib/image/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../lib/image/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../lib/image/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../lib/image/favicon/site.webmanifest">
    <!-- end of favicon section -->

    <!-- BS5 -->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/6c87d9fedd.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../lib/css/all.css">
    <link rel="stylesheet" href="../../lib/css/home.css">
    <link rel="stylesheet" href="../../lib/css/shared.css">

</head>

<body>

    <header>
        <div class="row mx-0">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-12">
                <div class="row mx-0">
                    <div class="col-md-2 col-12" id="Logo">
                        <a class="navbar-brand" href="/"><i class="fa-solid fa-tags"></i>GUCCIVN</a>
                    </div>
                    <div class="col-md-7 col-12">
                        <div class="row" id="top_menu">
                            <div class="col-md-3 col-12" id="hotline">
                                <i class="fa-solid fa-phone"></i>
                                <p>HOTLINE:</p>
                                <p class="phone_number">1900 0000</p>
                            </div>
                            <div class="col-md-3 col-12" id="location">
                                <i class="fa-solid fa-location-dot"></i>
                                <p>CỬA HÀNG</p>
                            </div>
                            <div class="col-md-6 col-12" id="search">
                                <input type="search" placeholder="Tìm sản phẩm">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </div>
                        <div class="jumbotron">
                            <hr class="my-4">
                        </div>
                        <div class="row" id="bot_menu">
                            <nav class="navbar navbar-expand-lg">
                                <div class="container-fluid">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <i class="fa-solid fa-bars"></i>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="/">TRANG CHỦ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/product" role="button">
                                                    SẢN PHẨM
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/news">TIN TỨC</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/contact">LIÊN HỆ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/voucher">ƯU ĐÃI</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="row" id="feature">
                            <div class="col-4">
                                <span class="cart-item-total">
                                    <?= isset($_SESSION['product_cart_infor']) ? count($_SESSION['product_cart_infor']) : '0'; ?>
                                </span>
                                <a
                                    href="<?= (isset($_SESSION['userLogin']['id']) && ($_SESSION['userLogin']['id'] != '')) ? "/wishlist" . "/" . $_SESSION['userLogin']['id'] : "/login" ?>">
                                    <img src="../../lib/image/img/Heart 1.png" alt="" class="img-fluid">
                                    <p>YÊU THÍCH</p>
                                </a>
                            </div>
                            <div class="col-4">
                                <?php if (isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin']['ten_dang_nhap'])) : ?>
                                <div id="account-btn">
                                    <a href="/userinfo">
                                        <img src="../../lib/image/img/Profile 1.png" alt="" class="img-fluid">
                                        <p><?= $_SESSION['userLogin']['ten_dang_nhap'] ?></p>
                                    </a>
                                    <button type="button" id="logout-btn" class="btn">Đăng xuất</button>
                                </div>
                                <?php else : ?>
                                <a href="/login">
                                    <img src="../../lib/image/img/Profile 1.png" alt="" class="img-fluid">
                                    <p>TÀI KHOẢN</p>
                                </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-4 cart-section">
                                <span class="cart-item-total">
                                    <?= isset($_SESSION['product_cart_infor']) ? count($_SESSION['product_cart_infor']) : '0'; ?>
                                </span>
                                <a href="/shopping-cart">
                                    <img src="../../lib/image/img/Bag 2.png" alt="" class="img-fluid">
                                    <p>GIỎ HÀNG
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

    </header>
    <script>
    let accountbtn = document.getElementById('account-btn');
    let logoutbtn = document.getElementById('logout-btn');

    if (accountbtn !== null) {
        accountbtn.addEventListener('mouseover', function() {
            logoutbtn.style.display = 'block';
        })
        accountbtn.addEventListener('mouseout', function() {
            logoutbtn.style.display = 'none';
        })
        logoutbtn.addEventListener('click', function() {
            window.location.href = '/logout';
        })
    }
    </script>
</body>

</html>