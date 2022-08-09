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

$sql = "SELECT * FROM `category`";
$categoryArr = queryDB($sql, 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $inp_catename = '';
     $cateStatus = true;
     $inp_catename = $_POST['catename'];

     $inp_catename = check_input($inp_catename);
     $inp_catename = strtolower($inp_catename);

     if (empty($inp_catename)) {
          $err = $errorArr['empty'];
     } else if (strlen($inp_catename) < 5 || strlen($inp_catename) > 30) {
          $err = $errorArr['empty'] . " Trong khoảng 5 đến 30 ký tự!";
     }

     foreach ($categoryArr as $cate) {
          if (strtolower($cate['category_name']) == $inp_catename) {
               $err = "Loại hàng nãy đã tồn tại, hãy thêm bằng loại khác đi!!!";
               $cateStatus = false;
               break;
          }
     }

     if (empty($err) && $cateStatus == true) {
          $sql = "INSERT INTO `category`(`category_name`) VALUES('$inp_catename')";

          queryDB($sql);
          header('location: ./category.php?mess=Thêm thành công');
     }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>admin - insert category</title>
     <link rel="stylesheet" href="../content/css/login.css">
     <link rel="stylesheet" href="../content/css/profile.css">
     <link rel="stylesheet" href="../content/css/manage.css">
     <link rel="stylesheet" href="../content/css/productdetail.css">
</head>

<body>
     <?php
     require_once "../site/menu.php";
     ?>

     <div class="row mx-0 manage-link-section p-3 ps-sm-5" style="min-height: 300px;">
          <h2 class="text-capitalize fw-bold fs-2 px-0">Thêm loại hàng</h2>

          <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
               <?= isset($err) ? $err : '' ?>
          </p>
          <form action="" method="post">
               <label class="px-0 py-2" for="#">Mã loại</label>
               <input type="text" class="w-100 inputid" placeholder="auto number" readonly>
               <label class="px-0 py-2" for="#">tên loại</label>
               <input type="text" class="w-100 inputname" placeholder="nhập tên loại" name="catename">
               <input class="insert_foot_btn" type="submit" value="Thêm mới">
               <a class="insert_foot_btn" href="./category.php">Trở về</a>
          </form>
     </div>
     <!-- footer -->
     <?php require_once "../site/footer.php"; ?>

</body>

</html>