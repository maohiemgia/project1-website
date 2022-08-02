<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address</title>
    <link rel="stylesheet" href="../../lib/css/address.css">

</head>

<body>
    <main>
        <div class="row" id="path">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-12">
                <p><a href="./Home.html">Trang chủ</a> > <a href="./account.html">Tài khoản</a> > <a
                        href="./address.html">Địa chỉ</a></p>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-12">
                <div class="row" style="margin-bottom: 50px;">
                    <div class="col-md-4" id="management">
                        <h5>TRANG TÀI KHOẢN</h5>
                        <p><b>Xin chảo ... !</b></p>
                        <ul>
                            <li>
                                <a class="account_link" href="./account.html">Thông tin tài khoản</a>
                            </li>
                            <li>
                                <a class="account_link " href="./order.html">Đơn hàng của bạn</a>
                            </li>
                            <li>
                                <a class="account_link " href="./change_password.html">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a class="account_link active" href="./address.html">Sổ địa chỉ (0)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8" id="address">
                        <h5>ĐỔI MẬT KHẨU</h5>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Thêm địa chỉ
                        </button>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Thêm địa chỉ mới</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="recipient-name"
                                                    placeholder="Họ tên*">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="recipient-name"
                                                    placeholder="Số điện thoại*">
                                            </div>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            placeholder="Tỉnh/Thành phố*">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            placeholder="Quận/Huyện*">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            placeholder="Xã/Phường*">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="recipient-name"
                                                    placeholder="Địa chỉ chi tiết*">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn btn-dark">Thêm địa chỉ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jumbotron">
                            <hr class="my-4">
                        </div>
                        <div class="address form-signup">
                            <p><strong>Họ tên: </strong> Nam
                            </p>
                            <p>
                                <strong>Địa chỉ: </strong>


                                Phường Láng Hạ,


                                Quận Đống Đa,


                                Hà Nội,


                                Vietnam

                            </p>

                            <p><strong>Số điện thoại:</strong> 0900000000</p>




                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
        </div>
    </main>
</body>

</html>