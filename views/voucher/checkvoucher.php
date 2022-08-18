<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $status = 0;
     if (isset($_POST['vouchercode'])) {
          $inp_voucher = $_POST['vouchercode'];
          if (empty($inp_voucher)) {
               $errInput['voucher'] = 'Vui lòng nhập voucher!';
          } else {
               $sql = "SELECT * FROM `phieu_giam_gia`";
               $db_voucher = querySQL($sql, 1);
               $nowTime = time();
               $nowTime = date("Y-m-d", $nowTime);

               foreach ($db_voucher as $voucher) {
                    if (strtolower($voucher['code_giam_gia']) == strtolower($inp_voucher)) {
                         $endDate = $voucher['thoi_gian_ket_thuc'];
                         $status = 1;
                         $_SESSION['voucherUse'] = $voucher;
                         break;
                    }
               }
               if ($status == 0) {
                    $errInput['voucher'] = 'Bạn nhập sai voucher!';
               }
               if ($status == 1) {
                    $nowTime = date_create($nowTime);
                    $endDate = date_create($endDate);

                    if ($nowTime > $endDate) {
                         $countDayExpired = 'Hết hạn rồi!';
                    } else {
                         $countDayExpired = 'Thành công!';
                         $status = 5;
                    }
                    $errInput['voucher'] = $countDayExpired;
               }

               if ($status == 5) {
                    $status = 0;
                    echo "<script>window.location.href = '/payment'</script>";
               } else {
                    unset($_SESSION['voucherUse']);
               }
          }
     }
}
?>
<form class="row" method="POST" style="height: 100vh;">
     <div class="discount_code d-flex justify-content-center flex-column align-items-center">
          <div class="col-auto me-3">
               <p class="text-danger fs-3"><?= isset($errInput['voucher']) ? $errInput['voucher'] : '' ?></p>
               <input type="text" name="vouchercode" class="form-control" id="inputPassword2" placeholder="Nhập mã giảm giá">
          </div>
          <br>
          <div class="col-auto">
               <button class="btn btn-dark mb-3" type="submit">
                    Áp dụng
               </button>
          </div>
          <a href="/payment" class="text-success">Quay lại thanh toán</a>
     </div>
</form>