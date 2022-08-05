<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>confirm code</title>
     <link rel="stylesheet" href="../../lib/css/login.css">
     <!-- <link rel="stylesheet" href="../content/css/profile.css"> -->
</head>

<body>

     <!-- slider -->
     <div class="col mx-auto">
          <div class="col-12 col-sm-3 px-0 mx-auto">
               <p class="section-header page-main-header">Nhập mã xác thực email</p>
          </div>
          <form action="/checkconfirmcode" method="post" enctype="multipart/form-data" class="col-10 col-sm-3 mx-auto mx-sm-auto">
               <div class="col px-0 align-items-start form-div-row mx-auto mx-sm-auto">
                    <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                         <?= isset($_SESSION['confirmcode-err']) ? $_SESSION['confirmcode-err'] : '' ?>
                    </p>
                    <p class="error text-success fw-bold text-capitalize text-decoration-underline">
                         <?= isset($notifi) ? $notifi : '' ?>
                    </p>
                    <label class="px-0 py-2" for="#">Nhập mã</label>
                    <input type="number" class="w-100" name="emailcodeconfirm" placeholder="nhập mã xác thực đã nhận được">
                    <input type="submit" class="w-100" value="Xác thực">
               </div>
          </form>
     </div>


</body>

</html>