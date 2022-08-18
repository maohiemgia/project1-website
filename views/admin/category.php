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

$sql = "SELECT * FROM `category` ORDER BY `category_name` ASC";
$categoryArr = queryDB($sql, 1);


// phân trang hiển thị
$productArr = array();
$indexDisplay = 0;

$productArr = array_chunk($categoryArr, 5);

if (isset($_GET['indexPage'])) {
     $indexPage = $_GET["indexPage"];
} else {
     $indexPage = 0;
}
$indexDisplay = $indexPage;
$nowIndexFrom = ($indexDisplay + 1) * 5;

if (isset($_GET['mess'])) {
     $mess = $_GET['mess'];
     alertResult($mess);
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
     <link rel="stylesheet" href="../content/css/productdetail.css">
</head>

<body>
     <?php
     require_once "../site/menu.php";
     ?>

     <div class="row mx-0 manage-link-section p-3 ps-sm-5" style="min-height: 300px;">
          <h2 class="text-capitalize fw-bold fs-2 px-0">Quản lý loại hàng</h2>
          <a href="./categoryinsert.php" class="btn-insert">thêm loại hàng mới</a>

          <div class="container">
               <div class="col result-found my-3">
                    <p class="text-capitalize mb-0">
                         <?= $nowIndexFrom - 4 ?> <i class="fa-solid fa-arrow-right-long"></i> <?= $nowIndexFrom > count($categoryArr) ? count($categoryArr) : $nowIndexFrom ?> trong <span style="font-weight: 700; font-size:larger">
                              <?= count($categoryArr) ?>
                         </span>
                         loại hàng tìm thấy
                    </p>
               </div>
               
               <?php if (count($productArr) > 0) : ?>
                    <table class="table table-manage">
                         <thead class="thead-dark">
                              <tr>
                                   <th>Mã loại</th>
                                   <th>tên loại</th>
                                   <th colspan="2">chức năng</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach ($productArr[$indexDisplay] as $cate) : ?>
                                   <tr>
                                        <td class="table-item-id"><?= $cate['category_id'] ?></td>
                                        <td class="table-item-name"><?= $cate['category_name'] ?></td>
                                        <td class="table-function"><a href="./categoryedit.php?cateid=<?= $cate['category_id'] ?>">Sửa</a></td>
                                        <td class="table-function"><a href="./categorydel.php?cateid=<?= $cate['category_id'] ?>" onclick="return confirm('Xóa thật không?');">xóa</a></td>
                                   </tr>
                              <?php endforeach; ?>
                         </tbody>
                    </table>
               <?php else : ?>
                    <p class="text-danger">Không có kết quả nào!</p>
               <?php endif; ?>

               <!-- display page number -->
               <?php if (count($productArr) > 1) : ?>
                    <div class="row mx-0 pages">
                         <form action="" method="GET">
                              <ul class="pagination justify-content-center">
                                   <li class="page-item <?= $indexDisplay <= 0 ? 'hidden' : ''; ?>">
                                        <button class="page-link-btn btn" type="submit" name="indexPage" value="<?= $indexPage - 1 ?>">
                                             <i class="fa-solid fa-chevron-left"></i>
                                        </button>
                                   </li>
                                   <?php for ($i = 0; $i < count($productArr); $i++) : ?>
                                        <li class="page-item <?= $i == $indexDisplay ? 'active' : ''; ?>">
                                             <button class="page-link-btn btn" type="submit" name="indexPage" value="<?= $i ?>">
                                                  <?= $i + 1 ?>
                                             </button>
                                        </li>
                                   <?php endfor; ?>
                                   <li class="page-item <?= $indexDisplay >= count($productArr) - 1 ? 'hidden' : ''; ?>">
                                        <button class="page-link-btn btn" type="submit" name="indexPage" value="<?= $indexPage + 1 ?>">
                                             <i class="fa-solid fa-chevron-right"></i>
                                        </button>
                                   </li>
                              </ul>
                         </form>
                    </div>
               <?php endif; ?>
                                   
               <a class="insert_foot_btn back-btn" href="./adminmanager.php">Trở về</a>
          </div>

     </div>
     <!-- footer -->
     <?php require_once "../site/footer.php"; ?>

</body>

</html>