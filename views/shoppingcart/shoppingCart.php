<?php
if (!isset($_SESSION['itemCartInc'])) {
     $_SESSION['itemCartInc'] = 5;
}
$itemCartInc = $_SESSION['itemCartInc'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
}

?>

<head>
     <title>Shopping cart</title>
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
                    <h2>Shopping Cart</h2>
               </div>

               <table class="table table-bordered">
                    <thead class="table-warning">
                         <tr style="text-align:center">
                              <th>Product Name</th>
                              <th>Product Quantity</th>
                              <th colspan="3">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         <!-- <form action="/check-shopping-cart" method="post">

                         </form> -->

                         <?php if (isset($_SESSION['product_cart_infor'])) : ?>
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
                                                       <a href="/cart-add/<?= $p['id'] ?>" class="cart-add">Thêm</a>
                                                  </td>
                                                  <td>
                                                       <button class="cart-minus">Giảm</button>
                                                  </td>
                                                  <td>
                                                       <button class="cart-del">Xóa khỏi giỏ hàng</button>
                                                  </td>
                                             </tr>
                                             <?php break; ?>
                                        <?php endif; ?>
                                   <?php endforeach ?>
                              <?php endforeach ?>
                         <?php endif; ?>

                    </tbody>
               </table>
          </div>
          <!-- <a href="" class="btn payment-btn">Thanh toán</a> -->
     </div>
</body>