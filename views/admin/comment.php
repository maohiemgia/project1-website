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
c.*,
p.product_name
FROM
`comment` c
LEFT JOIN product p ON
p.product_id = c.product_id
ORDER BY
`comment_date`
DESC
";
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
          <h2 class="text-capitalize fw-bold fs-2 px-0">Quản lý bình luận</h2>

          <div class="container">
               <div class="col result-found my-3">
                    <p class="text-capitalize mb-0">
                         <?= $nowIndexFrom - 4 ?> <i class="fa-solid fa-arrow-right-long"></i> <?= $nowIndexFrom > count($categoryArr) ? count($categoryArr) : $nowIndexFrom ?> trong <span style="font-weight: 700; font-size:larger">
                              <?= count($categoryArr) ?>
                         </span>
                         bình luận tìm thấy
                    </p>
               </div>

               <?php if (count($productArr) > 0) : ?>
                    <table class="table table-manage">
                         <thead class="thead-dark">
                              <tr>
                                   <th>Mã bình luận</th>
                                   <th>sản phẩm</th>
                                   <th>người tạo</th>
                                   <th>ngày tạo</th>
                                   <th colspan="2">chức năng</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach ($productArr[$indexDisplay] as $cate) : ?>
                                   <tr>
                                        <td class="table-item-id"><?= $cate['comment_id'] ?></td>
                                        <td class="table-item-name"><?= $cate['product_name'] ?></td>
                                        <td class="table-item-name"><?= $cate['username'] ?></td>
                                        <td class="table-item-name">
                                             <?php $date = date_create($cate['comment_date']); ?>
                                             <?= date_format($date, "d/m/y H:i:s") ?>
                                        </td>

                                        <!-- Button to Open the Modal -->
                                        <td class="table-function">
                                             <a href="#" data-bs-toggle="modal" data-bs-target="#myModal<?= $i ?>">
                                                  Xem
                                             </a>
                                        </td>
                                        <td class="table-function"><a href="./commentdel.php?cateid=<?= $cate['comment_id'] ?>" onclick="return confirm('Xóa thật không?');">xóa</a></td>
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
                                                  <div class="modal-body text-capitalize">
                                                       <p>
                                                            Mã Bình luận:
                                                            <?= $cate['comment_id'] ?>
                                                       </p>
                                                       <p>
                                                            người bình luận:
                                                            <?= $cate['username'] ?>
                                                       </p>
                                                       <p>
                                                            sản phẩm bình luận:
                                                            <?= $cate['product_name'] ?>
                                                       </p>
                                                       <p>
                                                            nội dung bình luận:
                                                            <?= $cate['comment_content'] ?>
                                                       </p>
                                                       <p>
                                                            ngày bình luận:
                                                            <?php $date = date_create($cate['comment_date']); ?>
                                                            <?= date_format($date, "d/m/y H:i:s") ?>
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