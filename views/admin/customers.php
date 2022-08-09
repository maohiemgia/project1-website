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

$sql = "SELECT
*
FROM
`user`
ORDER BY
`username` ASC";
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

$i = 0;

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
          <h2 class="text-capitalize fw-bold fs-2 px-0">Quản lý user</h2>
          <!-- <a href="./customersinsert.php" class="btn-insert">thêm user mới</a> -->

          <div class="container">
               <div class="col result-found my-3">
                    <p class="text-capitalize mb-0">
                         <?= $nowIndexFrom - 4 ?> <i class="fa-solid fa-arrow-right-long"></i> <?= $nowIndexFrom > count($categoryArr) ? count($categoryArr) : $nowIndexFrom ?> trong <span style="font-weight: 700; font-size:larger">
                              <?= count($categoryArr) ?>
                         </span>
                         user tìm thấy
                    </p>
               </div>

               <?php if (count($productArr) > 0) : ?>
                    <table class="table table-manage">
                         <thead class="thead-dark">
                              <tr>
                                   <th>tài khoản</th>
                                   <th>nickname</th>
                                   <th>trạng thái</th>
                                   <th>vai trò</th>
                                   <th colspan="2">chức năng</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach ($productArr[$indexDisplay] as $cate) : ?>
                                   <tr>
                                        <td class="table-item-id"><?= $cate['username'] ?></td>
                                        <td class="table-item-name"><?= $cate['user_nickname'] ?></td>
                                        <td><?= $cate['user_active'] == 1 ? 'actived' : 'not actived' ?></td>
                                        <td><?= $cate['user_role'] == 1 ? 'quản trị' : 'khách hàng' ?></td>

                                        <!-- Button to Open the Modal -->
                                        <td class="table-function view-function">
                                             <a href="#" data-bs-toggle="modal" data-bs-target="#myModal<?= $i ?>">
                                                  Xem
                                             </a>
                                        </td>
                                        <td class="table-function"><a href="./customersedit.php?cateid=<?= $cate['username'] ?>">Sửa</a></td>
                                        <?php if ($cate['user_role'] != 1) : ?>
                                             <td class="table-function"><a href="./customersdel.php?cateid=<?= $cate['username'] ?>" onclick="return confirm('Xóa thật không?');">xóa</a></td>
                                        <?php endif; ?>
                                   </tr>

                                   <!-- The Modal -->
                                   <div class="modal fade" id="myModal<?= $i ?>">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                             <div class="modal-content">

                                                  <!-- Modal Header -->
                                                  <div class="modal-header">
                                                       <h4 class="modal-title">Thông tin chi tiết</h4>
                                                       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                  </div>

                                                  <!-- Modal body -->
                                                  <div class="modal-body">
                                                       <p>
                                                            Tài khoản:
                                                            <?= $cate['username'] ?>
                                                       </p>
                                                       <p>
                                                            Nick name:
                                                            <?= $cate['user_nickname'] ?>
                                                       </p>
                                                       <p>
                                                            Trạng thái:
                                                            <?= $cate['user_active'] == 1 ? 'actived' : 'not actived' ?>
                                                       </p>
                                                       <p>
                                                            Vai trò:
                                                            <?= $cate['user_role'] == 1 ? 'quản trị' : 'khách hàng' ?>
                                                       </p>
                                                       <p>
                                                            Email:
                                                            <?= $cate['user_email'] ?>
                                                       </p>
                                                       <p>
                                                            <img class="w-100" src="../content/img/<?= $cate['user_avatar'] ?>" alt="avatar">
                                                       </p>
                                                  </div>

                                                  <!-- Modal footer -->
                                                  <div class="modal-footer">
                                                       <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                                  </div>

                                             </div>
                                        </div>
                                   </div>

                                   <?php $i++ ?>
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