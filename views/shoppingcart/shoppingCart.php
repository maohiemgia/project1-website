<?php
if (!isset($_SESSION['itemCartInc'])) {
     $_SESSION['itemCartInc'] = array();
}
$itemCartInc = $_SESSION['itemCartInc'];

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
// }
echo "<pre>";
// print_r($_SESSION['product_cart_infor']);
echo "</pre>";
function tinhTongTien($money = 0, $quantity = 1)
{
     $tongTien = $money * $quantity;
     return $tongTien;
}

echo "<pre>";
// print_r($product);
echo "</pre>";

?>

<head>
     <title>Giỏ Hàng</title>
     <style>
          .payment-btn {
               display: block;
               background: #00bc4e;
               color: #fff;
               text-align: center;
               position: relative;
               left: 50%;
               width: 200px;
          }

          .cart-btn.cart-add {
               background: #00bc4e;
               color: #fff;
          }

          .cart-btn.cart-minus {
               background: #01344c;
               color: #fff;
          }

          .cart-btn.cart-del {
               background: red;
               color: #fff;
          }
     </style>
</head>

<body>
     <!--Hiển thị thông báo-->
     <?php if (isset($_GET['message'])) : ?>
          <div class="text-center fs-2 fw-bold text-danger">
               <?= $_GET['message'] ?>
          </div>
     <?php endif ?>
     <div class="container-fluid mt-3">
          <div class="row mx-0 align-items-center justify-content-between">
               <div class="col">
                    <h2>Giỏ Hàng</h2>
               </div>

               <table class="table table-bordered">
                    <thead class="table-warning">
                         <tr style="text-align:center">
                              <th>Tên sản phẩm</th>
                              <th>Đặc điểm</th>
                              <th>Số lượng sản phẩm</th>
                              <th>Giá tiền</th>
                              <th>Thành tiền</th>
                              <th colspan="3">Hành động</th>
                         </tr>
                    </thead>
                    <tbody>

                         <?php if (isset($_SESSION['product_cart_infor']) && count($_SESSION['product_cart_infor']) > 0) : ?>
                              <?php $index = 0; ?>
                              <?php foreach ($_SESSION['product_cart_infor'] as $product_added) : ?>
                                   <?php foreach ($product as $p) : ?>
                                        <?php if (isset($product_added['id_san_pham'])) : ?>
                                             <?php if ($p['id'] == $product_added['id_san_pham']) : ?>
                                                  <tr style="text-align:left">
                                                       <td class="fs-4 fw-bold">
                                                            <a href="/product/<?= $product_added['id_san_pham'] ?>" class="text-decoration-none text-success">
                                                                 <p><?= $p['ten_sp'] ?></p>
                                                            </a>
                                                       </td>
                                                       <td>
                                                            <?php if (strlen($product_added['color']) > 0) : ?>
                                                                 <p>Màu sắc: <?= $product_added['color']; ?> </p>
                                                            <?php endif; ?>
                                                            <?php if (strlen($product_added['size']) > 0) : ?>
                                                                 <p>Size: <?= $product_added['size']; ?> </p>
                                                            <?php endif; ?>

                                                       </td>
                                                       <td>
                                                            <p><?= $product_added['quantity'] ?></p>
                                                       </td>
                                                       <td>
                                                            <p>
                                                                 <?= number_format($product_added['gia_tien_option_sp']); ?>
                                                            </p>
                                                       </td>
                                                       <td>
                                                            <p>
                                                                 <?php $product_added['tong_tien'] = tinhTongTien($product_added['gia_tien_option_sp'], $product_added['quantity']) ?>
                                                                 <?= number_format($product_added['tong_tien']); ?>
                                                            </p>
                                                       </td>
                                                       <td>
                                                            <a href="/cart-add/<?= $index + 10 ?>" class="cart-add cart-btn btn">Tăng</a>
                                                       </td>
                                                       <td>
                                                            <a href="/cart-minus/<?= $index + 10 ?>" class="cart-minus cart-btn btn">Giảm</a>
                                                       </td>
                                                       <td>
                                                            <a href="/cart-del/<?= $index + 10 ?>" class="cart-del cart-btn btn">Xóa</a>
                                                       </td>
                                                  </tr>
                                                  <?php break; ?>
                                             <?php endif; ?>
                                        <?php endif; ?>
                                   <?php endforeach ?>
                                   <?php $index++ ?>
                              <?php endforeach ?>
                         <?php elseif (!isset($_SESSION['product_cart_infor']) || isset($_SESSION['product_cart_infor']) && count($_SESSION['product_cart_infor']) == 0) : ?>
                              <tr>
                                   <td colspan="3" class="text-center fw-bold">
                                        <p class="fs-2 text-danger">Giỏ hàng trống!!!</p>
                                   </td>
                              </tr>
                         <?php endif; ?>

                    </tbody>
               </table>
          </div>
          <br>
          <?php if (isset($_SESSION['product_cart_infor']) && count($_SESSION['product_cart_infor']) > 0) : ?>
               <a href="/payment" class="btn payment-btn">Thanh toán</a>
          <?php endif; ?>
          <br><br><br><br>
     </div>
</body>