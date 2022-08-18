<?php
$order = $order[0];
$queryChitietdonhang = $orderDetail;

echo "<pre>";
echo "</pre>";
$orderId = $order['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
     $trangthaiship =  $_POST['trangthaiship'];
     $sql = "UPDATE
               `don_hang`
          SET
               `trang_thai_van_chuyen` = '$trangthaiship'
          WHERE
               `id` = '$orderId'";
     querySQL($sql);

     // gửi email thông tin đơn hàng tới mail cho khách
     $inp_email = strtolower($order['email']);
     $maDonHang = $order['ma_tra_cuu'];
     $client_name_display = "<b style=\"font-family: 'Open Sans', sans-serif;font-size: 25px;\">" . $order['ten_khach_hang'] . "</b>";

     $email_subject = 'Thông tin đơn hàng';
     $email_head = "<br>Dưới đây là thông tin đơn hàng của bạn: 
         <br>------------------------------------------------------------------------------------
         ------------------------------<br>Mã đơn hàng: <b style='font-size: 25px;'>$maDonHang</b><br>Người đặt hàng: " . "  " . $client_name_display . "<br>
         Số điện thoại nhận hàng:" . $order['sdt'] . "<br>";
     $email_foot =  "<br>Thành tiền(chưa tính ship): " . number_format($order['gia_thanh_hang']) . "<br>Phí ship: + " . number_format($order['phu_phi']) . "<br>Voucher:  - " . number_format($order['gia_thanh_hang'] - $order['gia_thanh_tien'] + $order['phu_phi']) . "<br><b style='font-size: 25px;'>Tổng tiền thanh toán: " . number_format($order['gia_thanh_tien']) .
          " VNĐ</b><br><br>Tình trạng đơn hàng: chưa thanh toán. <br>
         Tình trạng giao hàng: " . $trangthaiship . "<br>
         Điểm đến: " . $order['dia_chi_nhan_hang'] . "<br>
         Dự kiến giao hàng trong vòng 2 tới 7 ngày từ khi đặt hàng. <br>Ghi chú: " . $order['ghi_chu_dh'] . "<br>
         ---------------------------------------------------------------------------------------
         ---------------------------<br>Cảm ơn bạn đã tin tưởng và đặt hàng, chúng tôi sẽ giao hàng nhanh nhất chất lượng nhất có thể.<br>Chúc bạn một ngày tốt lành!
         <br>Liên hệ hỗ trợ: <br><pre>               <b>Nhân viên hỗ trợ 24/24: 0342 737 862</b></pre><br>
         <pre>               <b>Hỗ trợ qua email: tuannvph19078@fpt.edu.vn</b></pre>";

     foreach ($queryChitietdonhang as $chitietdonhang) {
          if (!isset($content_email_body)) {
               $content_email_body = '';
          }
          if ($chitietdonhang['id_don_hang'] == $order['id']) {
               $content_email_body = $content_email_body . "<p style=\"padding-left:20px;\"> Tên sản phẩm: " . $chitietdonhang['ten_sp'] .
                    "<br>Số lượng: " . $chitietdonhang['so_luong_sp'] .
                    "<br>Tùy chọn: " . $chitietdonhang['thong_tin_them'] .
                    "<br>Giá: " . number_format($chitietdonhang['gia_ban']) .
                    "<br>Tổng giá: " . number_format($chitietdonhang['tong_gia']) .
                    "</p>";
          }
     }

     $email_body = "<br><b> $email_head $content_email_body $email_foot </b><br>";
     $send_email = true;

     require_once 'lib/sendemail.php';

     $string = "/admin/order";
     echo "<script>window.location.href='$string'</script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edit order</title>
</head>

<body>
     <main>
          <div class="px-5">
               <form method="POST">
                    <div class="form-group">
                         <label>Mã đơn hàng:</label>
                         <input type="text" class="form-control" name="madonhang" readonly value="<?= $order['ma_tra_cuu'] ?>">
                    </div>
                    <div class="form-group">
                         <label>Tên khách hàng:</label>
                         <input type="text" class="form-control" name="tenkhachhang" value="<?= $order['ten_khach_hang'] ?>" readonly>
                    </div>
                    <div class="form-group">
                         <label>Email:</label>
                         <input type="text" class="form-control" name="email" value="<?= $order['email'] ?>" readonly>
                    </div>
                    <div class="form-group">
                         <label>SĐT:</label>
                         <input type="text" class="form-control" name="sdt" value="<?= $order['sdt'] ?>" readonly>
                    </div>
                    <div class="form-group">
                         <label>Địa chỉ:</label>
                         <input type="text" class="form-control" name="diachi" value="<?= $order['dia_chi_nhan_hang'] ?>" readonly>
                    </div>

                    <br>
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
                         Trạng thái đơn hàng: <?= $order['trang_thai_van_chuyen'] ?>
                         <span> => </span>
                         <select name="trangthaiship">
                              <option>Đang chuẩn bị hàng</option>
                              <option>Đang đóng gói</option>
                              <option>Đang giao hàng</option>
                              <option>Đã giao hàng</option>
                         </select>
                    </p>
                    <br>
                    <p>
                         Ghi chú:
                         <?= $order['ghi_chu_dh'] ?>
                    </p>
                    <br>
                    <a href="/admin/order" class="btn btn-warning">Trở về</a>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                    <br>
                    <br>
                    <br>
               </form>
          </div>
     </main>

</body>

</html>