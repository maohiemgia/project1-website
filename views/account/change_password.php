<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change_password</title>
    <link rel="stylesheet" href="../../lib/css/order.css">

</head>

<body>
  
    <main>
        <div class="row" id="path">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-12">
                <p><a href="./Home.html">Trang chủ</a> > <a href="./account.html">Tài khoản</a> > <a
                        href="./change_password.html">Thay đổi mật khẩu</a></p>
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
                                <a class="account_link active" href="./change_password.html">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a class="account_link" href="./address.html">Sổ địa chỉ (0)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8" id="change_password">
                        <h5>ĐỔI MẬT KHẨU</h5>
                        <span>Để đảm bảo tính năng bảo mật bạn vui lòng đặt mật khẩu ít nhất 8 ký tự</span>
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Mật khẩu cũ *</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Mật khẩu mới *</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Xác nhận lại mật khẩu *</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-dark">Đặt lại mật khẩu</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </main>

  
   
</body>

</html>