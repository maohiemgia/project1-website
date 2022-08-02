<?php
if (!isset($_SESSION['itemCartInc'])) {
     $_SESSION['itemCartInc'] = 5;
}
$itemCartInc = $_SESSION['itemCartInc'];

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
// }

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
                              <th>Số lượng sản phẩm</th>
                              <th colspan="3">Hành động</th>
                         </tr>
                    </thead>
                    <tbody>

                         <?php if (isset($_SESSION['product_cart_infor']) && count($_SESSION['product_cart_infor']) > 0) : ?>
                              <?php foreach ($_SESSION['product_cart_infor'] as $product_added) : ?>
                                   <?php foreach ($product as $p) : ?>
                                        <?php if ($p['id'] == $product_added['product_id']) : ?>
                                             <tr style="text-align:left">
                                                  <td class="fs-4 fw-bold">
                                                       <p><?= $p['ten_sp'] ?></p>
                                                  </td>
                                                  <td>
                                                       <p><?= $product_added['quantity'] ?></p>
                                                  </td>
                                                  <td>
                                                       <a href="/cart-add/<?= $p['id'] ?>" class="cart-add cart-btn btn">Tăng</a>
                                                  </td>
                                                  <td>
                                                       <a href="/cart-minus/<?= $p['id'] ?>" class="cart-minus cart-btn btn">Giảm</a>
                                                  </td>
                                                  <td>
                                                       <a href="/cart-del/<?= $p['id'] ?>" class="cart-del cart-btn btn">Xóa</a>
                                                  </td>
                                             </tr>
                                             <?php break; ?>
                                        <?php endif; ?>
                                   <?php endforeach ?>
                              <?php endforeach ?>
                         <?php elseif (isset($_SESSION['product_cart_infor']) && count($_SESSION['product_cart_infor']) == 0) : ?>
                              <tr>
                                   <td colspan="3" class="text-center fw-bold">
                                        <p class="fs-2 text-danger">Giỏ hàng trống!!!</p>
                                   </td>
                              </tr>
                         <?php endif; ?>

                    </tbody>
               </table>
          </div>
          <!-- <a href="" class="btn payment-btn">Thanh toán</a> -->
     </div>
</body>