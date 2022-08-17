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
     <link rel="stylesheet" href="css/login.css">
     <link rel="stylesheet" href="css/profile.css">
</head>

<body>
     <?php
     require_once "../site/menu.php";
     ?>

     <h2 class="text-center text-capitalize my-5 py-5 fw-bold fs-2" style="min-height: 300px;">chào mừng bạn đến giao
          diện quản trị website</h2>

     <!-- footer -->
     <?php require_once "../site/footer.php"; ?>

</body>

</html>