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

if (!isset($_GET['cateid'])) {
     header('location: ../index.php');
     exit();
} else {
     $idQuery = $_GET['cateid'];
}

$sql = "SELECT * FROM `user` WHERE `username` = '$idQuery'";
$productArrDB = queryDB($sql, 1, 0);

$bug_img = true;
$inp_img_name = $productArrDB['user_avatar'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (!isset($err)) {
          $err = array();
     }

     $inp_nickname = $_POST['usernickname'];
     $inp_active = $_POST['useractive'];
     $inp_email = $_POST['useremail'];
     $inp_role = $_POST['userrole'];

     if (!isset($productArrDB['user_avatar']) || !empty($_FILES['userimg']['name'])) {
          $inp_img = $_FILES['userimg'];

          // validate img
          $img_tail = array('jpg', 'png', 'gif', 'jpeg');
          if ($inp_img['size'] < 1) {
               $err['img'] = $errorArr['oversize'];
          } else if ($inp_img['size'] > 3072000) { // <3mb
               $err['img'] = $errorArr['oversize'] . ". Quá lớn";
          } else {
               $upload_ext = pathinfo($inp_img['name'], PATHINFO_EXTENSION);
               if (!in_array($upload_ext, $img_tail)) {
                    $err['img'] = $errorArr['wrong'] . ". Chỉ hỗ trợ JPG, PNG, GIF, JPEG";
               }
          }

          $bug_img = false;
          $inp_img_name = $inp_img['name'];
     }

     //validate nickname
     if (empty($inp_nickname)) {
          $err['nickname'] = $errorArr['empty'];
     } else if (strlen($inp_nickname) < 2 || strlen($inp_nickname) > 45) {
          $err['nickname'] = $errorArr['length'] . " Trong khoảng 2 đến 45 ký tự!";
     }

     if (empty($err)) {
          $notifi = "Cập nhật thành công";

          if ($bug_img == false) {
               move_uploaded_file($inp_img['tmp_name'], '../content/img/' . $inp_img_name);
          }

          $sql = "UPDATE
               `user`
          SET
               `user_nickname` = '$inp_nickname',
               `user_avatar` = '$inp_img_name',
               `user_active` = '$inp_active',
               `user_role` = '$inp_role'
               -- `user_active` = '0',
               -- `user_role` = '0'
          WHERE
               `username` = '$idQuery'";

          queryDB($sql);
          header('location: ./customers.php?mess=Sửa thành công');
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
          <h2 class="text-capitalize fw-bold fs-2 px-0">Sửa user</h2>

          <!-- <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
               <?= isset($err) ? $err : '' ?>
          </p> -->
          <form action="" method="post" enctype="multipart/form-data">
               <label class="px-0 py-2" for="#">username</label>
               <input type="text" class="w-50 d-block inputid" value="<?= $productArrDB['username'] ?>" readonly>

               <label class="px-0 py-2" for="#">user_email</label>
               <input type="email" value="<?= $productArrDB['user_email'] ?>" class="w-50 d-block inputname inputid" name="useremail" readonly>
               <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                    <?= isset($err['sale']) ? $err['sale'] : '' ?>
               </p>

               <label class="px-0 py-2" for="#">user_nickname</label>
               <input type="text" class="w-50 d-block inputname" name="usernickname" value="<?= $productArrDB['user_nickname'] ?>">
               <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                    <?= isset($err['nickname']) ? $err['nickname'] : '' ?>
               </p>

               <label class="px-0 py-2 d-flex" for="#">user_active
                    <select name="useractive" class="ms-5">
                         <option value="0" <?= $productArrDB['user_active'] == 0 ? 'selected' : '' ?>>
                              chưa kích hoạt
                         </option>
                         <option value="1" <?= $productArrDB['user_active'] == 1 ? 'selected' : '' ?>>
                              đã kích hoạt
                         </option>
                    </select>
               </label>

               <label class="px-0 py-2" for="#">user_avatar</label>
               <input type="file" class="w-100 inputname" name="userimg">
               <img src="../content/img/<?= $productArrDB['user_avatar'] ?>" alt="img" style="max-width: 150px;">
               <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                    <?= isset($err['img']) ? $err['img'] : '' ?>
               </p>

               <label class="px-0 py-2 d-flex" for="#">user_role
                    <select name="userrole" class="ms-5">
                         <option value="0" <?= $productArrDB['user_role'] == 0 ? 'selected' : '' ?>>
                              khách hàng
                         </option>
                         <option value="1" <?= $productArrDB['user_role'] == 1 ? 'selected' : '' ?>>
                              quản trị
                         </option>
                    </select>
               </label>
               <br>

               <input class="insert_foot_btn" type="submit" value="cập nhật">
               <a class="insert_foot_btn" href="./customers.php">Trở về</a>
          </form>
     </div>
     <!-- footer -->
     <?php require_once "../site/footer.php"; ?>

</body>

</html>