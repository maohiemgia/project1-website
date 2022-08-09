<?php
if (session_status() === PHP_SESSION_NONE) {
     session_start();
}
require_once '../global.php';

$_SESSION['menu'] = 3;

if (!isset($_SESSION['userLogin']) || $_SESSION['userLogin']['user_role'] == 0) {
     header('location: ../index.php');
     exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home-Xshop</title>
     <link rel="stylesheet" href="../content/css/login.css">
     <link rel="stylesheet" href="../content/css/profile.css">
     <link rel="stylesheet" href="../content/css/manage.css">
</head>

<body>
     <?php
     require_once "../site/menu.php";
     ?>

     <div class="row mx-0 manage-link-section p-3 ps-sm-5" style="min-height: 300px;">
          <h2 class="text-capitalize fw-bold fs-2">Quản lý</h2>
          <a href="./category.php">Quản lý loại hàng</a>
          <a href="./product.php">Quản lý hàng hóa</a>
          <a href="./customers.php">Quản lý khách hàng</a>
          <a href="./comment.php">Quản lý bình luận</a>
     </div>
     <!-- footer -->
     <?php require_once "../site/footer.php"; ?>

</body>

</html>