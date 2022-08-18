<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../../lib/css/account.css">

</head>

<body>

    <main>
        <div class="row" id="path">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-12">
                <p><a href="/">Trang chủ</a> > <a href="/userinfo">Tài khoản</a></p>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-12">
                <div class="row">
                    <div class="col-md-4" id="management">
                        <h5>TRANG TÀI KHOẢN</h5>

                        <p><b>Xin chảo <?= $_SESSION['userLogin']['ten_dang_nhap'] ?> !</b></p>
                        <ul>
                            <li>
                                <a class="account_link active" href="/userinfo">Thông tin tài khoản</a>
                            </li>
                            <li>
                                <a class="account_link" href="./order">Đơn hàng của bạn</a>
                            </li>
                            <li>
                                <a class="account_link" href="./changepass">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a class="account_link" href="/admin">Quản trị website</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8" id="order_detail">
                        <h5>THÔNG TIN TÀI KHOẢN</h5>
                        <p><b>Họ tên:</b><?= $_SESSION['userLogin']['ho_ten'] ?></p>
                        <p><b>Email:</b><?= $_SESSION['userLogin']['email'] ?></p>
                        <p><b>Số điện thoại:</b><?= $_SESSION['userLogin']['so_dien_thoai'] ?></p>
                        <p><b>Giới tính:</b><?= $_SESSION['userLogin']['gioi_tinh'] ?></p>
                        <p><b>Năm sinh:</b><?= $_SESSION['userLogin']['nam_sinh'] ?></p>
                        <p><b>Địa chỉ:</b><?= $_SESSION['userLogin']['dia_chi'] ?></p>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Thay đổi thông tin
                        </button>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">


                                    <form method="POST" style="margin: 20px;">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="name" id="recipient-name" placeholder="Họ tên*" >
                                        </div>
                                        <div class="mb-3">
                                            <input type="tel" class="form-control" name="tel" id="recipient-name" placeholder="Số điện thoại*">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="gender" id="recipient-name" placeholder="Giới tính*">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="age" id="recipient-name" placeholder="Năm sinh*">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="address" id="recipient-name" placeholder="Địa chỉ*">
                                        </div>
                                        <button type="submit" class="btn btn-dark">Thay đổi</button>
                                    </form>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </main>
    <?php

    require_once "models/product.php";

    if (isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['age']) && isset($_POST['tel']) && isset($_POST['address'])) {

        $inp_name = $inp_gender = $inp_age = $inp_tel = $inp_adr = '';
        $id = $_SESSION['userLogin']['id'];
            $inp_name = $_POST["name"];
            $inp_gender = $_POST["gender"];
            $inp_age = $_POST["age"];
            $inp_tel = $_POST["tel"];
            $inp_adr = $_POST["address"];
            $sql = "UPDATE `user` SET `ho_ten`='$inp_name',`so_dien_thoai`='$inp_tel',`nam_sinh`='$inp_age',`gioi_tinh`='$inp_gender',`dia_chi`='$inp_adr' WHERE `id`= $id";

            querySQL($sql);
        
    } ?>
</body>

</html>