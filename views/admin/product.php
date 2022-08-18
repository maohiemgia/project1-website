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
p.*,
c.category_name
FROM
`product` p
LEFT JOIN category c ON
c.category_id = p.category_id
ORDER BY
`product_date_added`
DESC
";
$productArrDB = queryDB($sql, 1);


// phân trang hiển thị
$productArr = array();
$indexDisplay = 0;

$productArr = array_chunk($productArrDB, 5);

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
          <h2 class="text-capitalize fw-bold fs-2 px-0">Quản lý hàng hóa</h2>
          <a href="./productinsert.php" class="btn-insert">thêm hàng hóa mới</a>

          <div class="container">
               <div class="col result-found my-3">
                    <p class="text-capitalize mb-0">
                         <?= $nowIndexFrom - 4 ?> <i class="fa-solid fa-arrow-right-long"></i> <?= $nowIndexFrom > count($productArrDB) ? count($productArrDB) : $nowIndexFrom ?> trong <span style="font-weight: 700; font-size:larger">
                              <?= count($productArrDB) ?>
                         </span>
                         sản phẩm tìm thấy
                    </p>
               </div>

               <?php if (count($productArr) > 0) : ?>
                    <table class="table table-manage product-table-display">
                         <thead class="thead-dark">
                              <tr>
                                   <th>Mã hàng hóa</th>
                                   <th>tên hàng hóa</th>
                                   <th>đơn giá (vnđ)</th>
                                   <th>giảm giá (%)</th>
                                   <th>số lượng</th>
                                   <th colspan="2">chức năng</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach ($productArr[$indexDisplay] as $p) : ?>
                                   <tr>
                                        <td class="table-item-id"><?= $p['product_id'] ?></td>
                                        <td class="table-item-name"><?= $p['product_name'] ?></td>
                                        <td><?= number_format($p['product_price']) ?></td>
                                        <td><?= $p['product_discount'] ?></td>
                                        <td><?= $p['product_quantity'] ?></td>

                                        <!-- Button to Open the Modal -->
                                        <td class="table-function">
                                             <a href="#" data-bs-toggle="modal" data-bs-target="#myModal<?= $i ?>">
                                                  Xem
                                             </a>
                                        </td>
                                        <td class="table-function"><a href="./productedit.php?cateid=<?= $p['product_id'] ?>">Sửa</a></td>
                                        <td class="table-function"><a href="./productdel.php?cateid=<?= $p['product_id'] ?>" onclick="return confirm('Xóa thật không?');">xóa</a></td>
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
                                                            mã sản phẩm:
                                                            <?= $p['product_id'] ?>
                                                       </p>
                                                       <p>
                                                            tên sản phẩm:
                                                            <?= $p['product_name'] ?>
                                                       </p>
                                                       <p>
                                                            giá:
                                                            <?= number_format($p['product_price']) ?><sup>VNĐ</sup>
                                                       </p>
                                                       <p>
                                                            số lượng:
                                                            <?= $p['product_quantity'] ?>
                                                       </p>
                                                       <p>
                                                            hình ảnh:
                                                            <img class="w-100" src="../content/img/<?= $p['product_img'] ?>" alt="avatar">
                                                       </p>
                                                       <p>
                                                            mô tả:
                                                            <?= $p['product_description'] ?>
                                                       </p>
                                                       <p>
                                                            danh mục:
                                                            <?= $p['category_name'] ?>
                                                       </p>
                                                       <p>
                                                            ngày thêm:
                                                            <?php $date = date_create($p['product_date_added']); ?>
                                                            <?= date_format($date, "d/m/y H:i:s") ?>
                                                       </p>
                                                       <p>
                                                            giảm giá:
                                                            <?= $p['product_discount'] ?>%
                                                       </p>
                                                       <p>
                                                            Kiểu sản phẩm:
                                                            <?= $p['product_special'] == 1 ? 'đặc biệt' : 'bình thường' ?>
                                                       </p>
                                                       <p>
                                                            lượt xem:
                                                            <?= $p['product_view'] ?>
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