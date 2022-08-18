<?php

if (!isset($_SESSION['userLogin']) || $_SESSION['userLogin']['vai_tro'] == 4) {
     echo "<script>window.location.href = '/';</script>";
     exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>admin manage</title>
     <link rel="stylesheet" href="./css/login.css">
     <link rel="stylesheet" href="./css/profile.css">
     <link rel="stylesheet" href="./css/manage.css">
</head>

<body>
     <main>
          <div class="row mx-0 manage-link-section p-3 ps-sm-5" style="min-height: 300px;">
               <h2 class="text-capitalize fw-bold fs-2">Quản lý</h2>
               <a class="text-secondary fs-3" href="/admin/order">Quản lý đơn hàng của website</a>
               <a class="text-secondary fs-3" href="/admin/statistic">Thống kê</a>
          </div>
     </main>
</body>

</html>