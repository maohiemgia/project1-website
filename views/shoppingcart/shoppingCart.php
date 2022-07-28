<?php

// $sql = "select * from product";

// //   prepared
// $stmt = $connection->prepare($sql);

// //   executes
// $stmt->execute();

// //   get data
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);      // key and value


?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
               <div class="col text-end">
                    <button class="btn-primary rounded my-3" data-bs-toggle="modal" data-bs-target="#shoppingcart">
                         <a class="text-decoration-none text-white">Shopping Cart</a>
                    </button>
                    <!-- The Modal -->
                    <div class="modal fade" id="shoppingcart">
                         <div class="modal-dialog">
                              <div class="modal-content">
                                   <!-- Modal Header -->
                                   <div class="modal-header">
                                        <h4 class="modal-title">Shopping Cart</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                   </div>
                                   <!-- Modal body -->
                                   <div class="modal-body">
                                        <div class="row w-100">
                                             <div class="col">
                                                  <p>Product Name:</p>
                                             </div>
                                             <div class="col">
                                                  <p>Product Quantity:</p>
                                             </div>
                                        </div>
                                        <?php if (isset($_SESSION['product_cart_infor'])) : ?>
                                             <?php foreach ($_SESSION['product_cart_infor'] as $product_added) : ?>
                                                  <div class="row w-100">
                                                       <div class="col">
                                                            <?php foreach ($result as $product) : ?>
                                                                 <?php if ($product['product_id'] == $product_added['product_id']) : ?>
                                                                      <p><?= $product['product_name'] ?></p>
                                                                      <?php break; ?>
                                                                 <?php endif; ?>
                                                            <?php endforeach ?>
                                                       </div>
                                                       <div class="col">
                                                            <?php foreach ($result as $product) : ?>
                                                                 <?php if ($product['product_id'] == $product_added['product_id']) : ?>
                                                                      <p><?= $product_added['quantity'] ?></p>
                                                                      <?php break; ?>
                                                                 <?php endif; ?>
                                                            <?php endforeach ?>
                                                       </div>
                                                  </div>
                                             <?php endforeach; ?>
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-secondary">
                                             <a href="./shoppingCart.php" class="text-decoration-none text-white">Xem thêm</a>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <!-- <button class="btn-primary rounded my-3">
                         <a class="text-decoration-none text-white" onclick="return confirm('are you sure to logout?')" href="./logout.php">Logout</a>
                    </button> -->
               </div>
          </div>
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
               <?php if (isset($_SESSION['product_cart_infor'])) : ?>
                    <?php foreach ($_SESSION['product_cart_infor'] as $product_added) : ?>
                         <tr style="text-align:left">
                              <td class="fs-4 fw-bold">
                                   <?php foreach ($result as $product) : ?>
                                        <?php if ($product['product_id'] == $product_added['product_id']) : ?>
                                             <p><?= $product['product_name'] ?></p>
                                             <?php break; ?>
                                        <?php endif; ?>
                                   <?php endforeach ?>
                              </td>
                              <td>
                                   <?php foreach ($result as $product) : ?>
                                        <?php if ($product['product_id'] == $product_added['product_id']) : ?>
                                             <p><?= $product_added['quantity'] ?></p>
                                             <?php break; ?>
                                        <?php endif; ?>
                                   <?php endforeach ?>
                              </td>
                              <td>
                                   <a href="./cart_add.php?productId=<?= $product_added['product_id'] ?>&check=1">Thêm</a>
                              </td>
                              <td>
                                   <a href="./cart_minus.php?productId=<?= $product_added['product_id'] ?>&check=1">Giảm</a>
                              </td>
                              <td>
                                   <a href="./cart_delete.php?productId=<?= $product_added['product_id'] ?>&check=1">Xóa khỏi giỏ hàng</a>
                              </td>
                         </tr>
                    <?php endforeach ?>
               <?php endif; ?>

          </tbody>
     </table>
     <a href="" class="btn payment-btn">Thanh toán</a>
                       
</body>

</html>