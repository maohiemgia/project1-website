<?php
if (!isset($_SESSION['userLogin']) || $_SESSION['userLogin']['vai_tro'] == 4) {
     echo "<script>
                window.location.href = '/';
          </script>";
     exit();
}

$sql = "SELECT * FROM `don_hang` dh ORDER BY dh.thoi_gian_dat_hang DESC";
$orderList = querySQL($sql, 1);
echo "<pre>";
print_r($orderList);
echo "</pre>";


$i = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Quản lý đơn hàng</title>
     <link rel="stylesheet" href="./css/login.css">
     <link rel="stylesheet" href="./css/profile.css">
     <link rel="stylesheet" href="./css/manage.css">
     <link rel="stylesheet" href="./css/productdetail.css">
</head>

<body>


     <div class="row mx-0 manage-link-section p-3 ps-sm-5" style="min-height: 300px;">
          <h2 class="text-capitalize fw-bold fs-2 px-0">Quản lý đơn hàng</h2>
          <!-- <a href="./customersinsert.php" class="btn-insert">thêm user mới</a> -->

          <div class="container">
               <div class="col result-found my-3">
                    <p class="text-capitalize mb-0">
                         <!-- <?= $nowIndexFrom - 4 ?> <i class="fa-solid fa-arrow-right-long"></i> <?= $nowIndexFrom > count($categoryArr) ? count($categoryArr) : $nowIndexFrom ?> trong <span style="font-weight: 700; font-size:larger"> -->
                         <!-- <?= count($categoryArr) ?> -->
                         <!-- </span> -->
                         user tìm thấy
                    </p>
               </div>

               <?php if (count($orderList) > 0) : ?>
                    <table class="table table-manage">
                         <thead class="thead-dark">
                              <tr>
                                   <th>ID đơn</th>
                                   <th>Tên khách</th>
                                   <th>Email</th>
                                   <th>SĐT</th>
                                   <th>Tiền</th>
                                   <th colspan="2">chức năng</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach ($orderList as $order) : ?>
                                   <tr>
                                        <td class="table-item-id"><?= $order['id'] ?></td>
                                        <td class="table-item-id"><?= $order['ten_khach_hang'] ?></td>
                                        <td class="table-item-name"><?= $order['email'] ?></td>
                                        <td class="table-item-name"><?= $order['sdt'] ?></td>
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

</body>

</html>