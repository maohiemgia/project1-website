<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>doi mat khau</title>
     <link rel="stylesheet" href="../../lib/css/login.css">
     <!-- <link rel="stylesheet" href="../content/css/profile.css"> -->
</head>

<body>

     <!-- slider -->
     <div class="col mx-auto">
          <div class="col-12 col-sm-3 px-0 mx-auto">
               <p class="section-header page-main-header">Đổi mật khẩu</p>
          </div>
          <form action="/checkchangepassword" method="post" enctype="multipart/form-data" class="col-10 col-sm-3 mx-auto mx-sm-auto">
               <div class="col px-0 align-items-start form-div-row mx-auto mx-sm-auto">
                    <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                         <?= isset($_SESSION['newpassword-err']) ? $_SESSION['newpassword-err'] : '' ?>
                    </p>
                    <p class="error text-success fw-bold text-capitalize text-decoration-underline">
                         <?= isset($notifi) ? $notifi : '' ?>
                    </p>

                    <label class="px-0 py-2" for="#">Mật khẩu mới</label>
                    <input type="password" class="w-100" name="newpassword" placeholder="********" autofocus>
                    <label class="px-0 py-2" for="#">xác nhận mật khẩu mới</label>
                    <input type="password" class="w-100" name="confirmnewpassword" placeholder="********">

                    <input type="submit" class="w-100" value="Thay Đổi">
               </div>
          </form>
     </div>
     <br><br>
</body>

</html>