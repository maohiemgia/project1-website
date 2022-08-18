<?php
if (!isset($_SESSION['userLogin']) || $_SESSION['userLogin']['vai_tro'] == 4) {
     echo "<script>
                window.location.href = '/';
          </script>";
     exit();
}

$sql = "SELECT * FROM `don_hang` dh ORDER BY dh.id DESC";
$orderList = querySQL($sql, 1);

$sqlChitietdonhang = "SELECT * FROM `chi_tiet_don_hang` ctdh JOIN san_pham sp on sp.id = ctdh.id_san_pham ORDER BY ctdh.id_don_hang DESC";
$queryChitietdonhang = querySQL($sqlChitietdonhang, 1);

echo "<pre>";
// print_r(
//      $queryChitietdonhang[1]
// );
echo "</pre>";


$i = 0;
$j = 1;

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

     <main>
          <div class="row mx-0 manage-link-section p-3 ps-sm-5" style="min-height: 300px;">
               <h2 class="text-capitalize fw-bold fs-2 px-0">Quản lý đơn hàng</h2>
               <!-- <a href="./customersinsert.php" class="btn-insert">thêm user mới</a> -->

               <div class="container">
                    <?php if (count($orderList) > 0) : ?>
                         <table class="table table-manage">
                              <thead class="thead-dark">
                                   <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Email</th>
                                        <th>SĐT</th>
                                        <th>Địa chỉ</th>
                                        <th>Tổng tiền(VNĐ)</th>
                                        <th colspan="2">chức năng</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php foreach ($orderList as $order) : ?>
                                        <tr <?= $order['trang_thai_van_chuyen'] == 'Đã giao hàng' ? 'style="background: #ffd7bd;"' : '' ?>>
                                             <td class="table-item-id"><?= $j ?></td>
                                             <td class="table-item-id"><?= $order['ma_tra_cuu'] ?></td>
                                             <td class="table-item-id"><?= $order['ten_khach_hang'] ?></td>
                                             <td class="table-item-name"><?= $order['email'] ?></td>
                                             <td class="table-item-name"><?= $order['sdt'] ?></td>
                                             <td class="table-item-name"><?= $order['dia_chi_nhan_hang'] ?></td>
                                             <td class="table-item-name"><?= number_format($order['gia_thanh_tien']) ?></td>

                                             <!-- Button to Open the Modal -->
                                             <td class="table-function view-function">

                                                  <a href="#" data-bs-toggle="modal" data-bs-target="#myModal<?= $order['id'] ?>">
                                                       Xem
                                                  </a>
                                             </td>
                                             <td class="table-function"><a href="/admin/order/<?= $order['id'] ?>">Sửa</a></td>

                                             <?php if ($_SESSION['userLogin']['vai_tro'] == 0) : ?>
                                                  <td class="table-function"><a href="/deleteorder/<?= $order['id'] ?>" onclick="return confirm('Xóa thật không?');">xóa</a></td>
                                             <?php endif; ?>
                                        </tr>

                                        <!-- The Modal -->
                                        <div class="modal fade" id="myModal<?= $order['id'] ?>">
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
                                                                 Mã đơn hàng:
                                                                 <?= $order['ma_tra_cuu'] ?>
                                                            </p>
                                                            <p>
                                                                 Tên khách:
                                                                 <?= $order['ten_khach_hang'] ?>
                                                            </p>
                                                            <p>
                                                                 Email:
                                                                 <?= $order['email'] ?>
                                                            </p>
                                                            <p>
                                                                 SĐT:
                                                                 <?= $order['sdt'] ?>
                                                            </p>
                                                            <p>
                                                                 Địa chỉ:
                                                                 <?= $order['dia_chi_nhan_hang'] ?>
                                                            </p>
                                                            <p>
                                                                 Sản phẩm:
                                                            </p>
                                                            <?php foreach ($queryChitietdonhang as $chitietdonhang) : ?>
                                                                 <?php if ($chitietdonhang['id_don_hang'] == $order['id']) : ?>
                                                                      <p style="padding-left:20px;"> Tên sản phẩm: <?= $chitietdonhang['ten_sp'] ?>
                                                                           <br>Số lượng: <?= $chitietdonhang['so_luong_sp'] ?>
                                                                           <br>Tùy chọn: <?= $chitietdonhang['thong_tin_them'] ?>
                                                                           <br>Giá: <?= number_format($chitietdonhang['gia_ban']) ?>
                                                                           <br>Tổng giá: <?= number_format($chitietdonhang['tong_gia']) ?>
                                                                      </p>
                                                                 <?php endif; ?>
                                                            <?php endforeach; ?>
                                                            <p>
                                                                 Giá thành tiền(chưa phụ phí):
                                                                 <?= number_format($order['gia_thanh_hang']) ?> VNĐ
                                                            </p>
                                                            <p>
                                                                 Phụ phí:
                                                                 + <?= number_format($order['phu_phi']) ?> VNĐ
                                                            </p>
                                                            <p>
                                                                 Voucher giảm:
                                                                 - <?= number_format($order['gia_thanh_hang'] - $order['gia_thanh_tien'] + $order['phu_phi']) ?> VNĐ
                                                            </p>
                                                            <p>
                                                                 Tổng tiền:
                                                                 <?= number_format($order['gia_thanh_tien']) ?> VNĐ
                                                            </p>
                                                            <p>
                                                                 Thời gian đặt hàng:
                                                                 <?php $timeDisplay = date_create($order['thoi_gian_dat_hang']);
                                                                 echo date_format($timeDisplay, "d/m/Y");
                                                                 ?>
                                                            </p>
                                                            <p>
                                                                 Trạng thái thanh toán:
                                                                 <?= $order['trang_thai_thanh_toan'] ?>
                                                            </p>
                                                            <p>
                                                                 Trạng thái vận chuyển:
                                                                 <?= $order['trang_thai_van_chuyen'] ?>
                                                            </p>
                                                            <p>
                                                                 Ghi chú:
                                                                 <?= $order['ghi_chu_dh'] ?>
                                                            </p>
                                                            <p>
                                                                 <img class="w-100" src="../lib/image/img/camon.jpg" alt="avatar">
                                                            </p>
                                                       </div>

                                                       <!-- Modal footer -->
                                                       <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                                       </div>

                                                  </div>
                                             </div>
                                        </div>

                                        <?php $j++ ?>
                                        <?php $i++ ?>
                                   <?php endforeach; ?>
                              </tbody>
                         </table>
                    <?php else : ?>
                         <p class="text-danger">Không có kết quả nào!</p>
                    <?php endif; ?>

                    <br>
                    <a class="insert_foot_btn back-btn" href="/admin">Trở về</a>
               </div>

          </div>
     </main>
</body>

</html>