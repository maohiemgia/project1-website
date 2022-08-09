<?php

// $_SESSION['productDetail'] = $product;

// $_SESSION['productId'] =  $product['id'];



// session_destroy();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//      $add_status = 0;

//      // lấy sản phẩm cần thêm
//      $productId = $_SESSION['addToCartId'];

//      $session_name = "product_cart_infor";

//      $index = 0;
//      foreach ($_SESSION[$session_name] as $shopping_cart_product) {
//           if ($shopping_cart_product['product_id'] == $productId) {
//                $quantity_temp = $shopping_cart_product['quantity'] + 1;
//                $session_object = array(
//                     'product_id' => $productId,
//                     'quantity' => $quantity_temp
//                );
//                array_splice($_SESSION[$session_name], $index, 1);
//                array_push($_SESSION[$session_name], $session_object);

//                $add_status = 1;

//                break;
//           }
//           $index++;
//      }
// }

extract($product);
echo "<pre>";
print_r($product);
echo "</pre>";




?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Product Details</title>
     <link rel="stylesheet" href="../../lib/css/productdetail.css">
</head>

<body>

     <!--Hiển thị thông báo-->
     <?php if (isset($_SESSION['message']) && $_SESSION['message'][1] == 1) : ?>
          <!-- <div class="text-center fs-2 fw-bold text-danger"> -->
          <script>
               window.alert(" <?= $_SESSION['message'][0] ?> ");
          </script>
          <!-- </div> -->
          <?php $_SESSION['message'][1] = 0; ?>
     <?php endif ?>

     <main>
          <p class="ms-sm-5 mx-2 mb-sm-5 link-title-path">
               Trang chủ
               <i class="fa-solid fa-chevron-right"></i>
               Sản phẩm
               <i class="fa-solid fa-chevron-right"></i>
               <?= $product['ten_sp']; ?>
          </p>
          <div class="row mx-0 justify-content-center">
               <div class="col-12 col-sm-4 product-img text-center d-flex flex-sm-row flex-column">
                    <img src="<?= $product['url_ha_sp'] ?>" alt="img">
                    <div class="row mx-0">
                         <?php foreach ($productArr as $p) : ?>
                              <div class="col">
                                   <img src="<?= $p['url_ha_sp'] ?>" alt="img">
                              </div>
                         <?php endforeach; ?>
                    </div>
               </div>
               <div class="col col-sm-8 text-center text-sm-start product-detail ms-sm-3">
                    <p class="product-name-header fw-bolder fs-3 text-capitalize">
                         <?= $product['ten_sp']; ?>
                    </p>
                    <p class="product-view">
                         <?= $product['luot_xem_sp']; ?>
                         <i class="fa-solid fa-eye"></i>
                    </p>
                    <div class="product-option">
                         <div class="option-color">
                              <label>Màu sắc
                                   <input type="radio" name="color">
                                   <input type="radio" name="color">
                                   <input type="radio" name="color">
                              </label>
                              <br>
                              <label>Size
                                   <input type="radio" name="color">
                                   <input type="radio" name="color">
                                   <input type="radio" name="color">
                              </label>

                         </div>
                    </div>
                    <p class="product-price d-flex align-items-center flex-wrap">
                         <i class="fa-solid fa-coins money-icon"></i>
                         <span class="mx-auto ps-0 mx-sm-0 beforesale saleprice">
                              <?= number_format($product['gia_sp']) ?>
                         </span>
                         <span class="aftersalesale rawprice">
                              <?= number_format($product['gia_sp']) ?>
                         </span>

                         <sup>VNĐ</sup>

                         <span class="salepercent">
                              0% giảm
                         </span>
                    </p>
                    <p class="product-des mt-5">
                         <span class="fw-bolder fs-4 text-capitalize">
                              Mô tả sản phẩm:
                         </span>
                         <br>
                         <?= $product['mo_ta_sp']; ?>
                    </p>
                    <div class="product-user-function">
                         <form action="<?php if (isset($_SESSION['userLogin']['id'])) {
                                             echo "/wishlist?&id_user=" . $_SESSION['userLogin']['id'] . "&id_sp=" .  $product['id_san_pham'];
                                        } else {
                                             echo "/login";
                                        }
                                        ?>" method="POST">
                              <button type="submit" id="add-to-wishlist" class="btn add-to-wishlist-btn">Thêm vào wishlist</button>
                              <button type="submit" id="add-to-cart" class="btn add-to-cart-btn" name="addtocart">Thêm vào giỏ hàng</button>
                         </form>
                    </div>
               </div>
          </div>
          <div class="row mx-0 ms-sm-3 mt-sm-5 mx-3 mx-sm-4">
               <p class="product-des mt-5">
                    <span class="fw-bolder fs-4 text-capitalize">
                         Bình luận (50):
                    </span>
               </p>
               <p class="text-center">
                    Bạn cần
                    <a class="fw-bold fs-5" href="./login.php">Đăng nhập </a>
                    để có thể bình luận
               </p>

               <div class="row mx-0 comment-section p-sm-3 py-4 py-sm-5 mb-3">
                    <div class="row">
                         <p class="error text-danger fw-bold text-capitalize text-center text-decoration-underline">
                              <?= isset($err) ? $err : '' ?>
                         </p>
                         <div class="col-3 w-auto m-auto">
                              <img class="rounded-circle w-auto avt-comment" src="../../lib/image/product/pepe3.png" alt="image">
                              <p class="text-center w-auto fw-bold">user50534</p>
                         </div>
                         <div class="col w-auto">
                              <form action="" method="post">
                                   <input type="text" name="comment" placeholder="nhập bình luận vào đây" class="w-100 comment-input">
                                   <input type="submit" value="Comment" class="submit-input">
                              </form>
                         </div>
                    </div>
               </div>

               <div class="row mx-0 comment-section p-sm-3 py-5">

                    <div class="row py-2">
                         <div class="col-3 w-auto m-auto">
                              <img class="rounded-circle w-auto avt-comment" src="../../lib/image/product/pepe5.png" alt="image">
                              <p class="text-center w-auto fw-bold">Dương Quá</p>
                         </div>
                         <div class="col w-auto">
                              <p class="date-comment fw-bold">
                                   22-05-2022
                              </p>
                              <p class="comment-content">cũng đẹp đấy</p>
                         </div>
                    </div>
                    <div class="row py-2">
                         <div class="col-3 w-auto m-auto">
                              <img class="rounded-circle w-auto avt-comment" src="../../lib/image/product/pepe5.png" alt="image">
                              <p class="text-center w-auto fw-bold">Dương Quá</p>
                         </div>
                         <div class="col w-auto">
                              <p class="date-comment fw-bold">
                                   22-05-2022
                              </p>
                              <p class="comment-content">cũng đẹp đấy</p>
                         </div>
                    </div>
                    <div class="row py-2">
                         <div class="col-3 w-auto m-auto">
                              <img class="rounded-circle w-auto avt-comment" src="../../lib/image/product/pepe5.png" alt="image">
                              <p class="text-center w-auto fw-bold">Dương Quá</p>
                         </div>
                         <div class="col w-auto">
                              <p class="date-comment fw-bold">
                                   22-05-2022
                              </p>
                              <p class="comment-content">cũng đẹp đấy</p>
                         </div>
                    </div>
                    <div class="row py-2">
                         <div class="col-3 w-auto m-auto">
                              <img class="rounded-circle w-auto avt-comment" src="../../lib/image/product/pepe5.png" alt="image">
                              <p class="text-center w-auto fw-bold">Dương Quá</p>
                         </div>
                         <div class="col w-auto">
                              <p class="date-comment fw-bold">
                                   22-05-2022
                              </p>
                              <p class="comment-content">cũng đẹp đấy</p>
                         </div>
                    </div>
                    <div class="row py-2">
                         <div class="col-3 w-auto m-auto">
                              <img class="rounded-circle w-auto avt-comment" src="../../lib/image/product/pepe5.png" alt="image">
                              <p class="text-center w-auto fw-bold">Dương Quá</p>
                         </div>
                         <div class="col w-auto">
                              <p class="date-comment fw-bold">
                                   22-05-2022
                              </p>
                              <p class="comment-content">cũng đẹp đấy</p>
                         </div>
                    </div>

                    <!-- display page number -->
                    <div class="row mx-0 pages">
                         <form action="" method="POST">
                              <ul class="pagination justify-content-center">
                                   <li class="page-item">
                                        <button class="page-link-btn btn" type="submit" name="indexPage" value="">
                                             <i class="fa-solid fa-chevron-left"></i>
                                        </button>
                                   </li>
                                   <li class="page-item">
                                        <button class="page-link-btn btn" type="submit" name="indexPage" value="">
                                             1
                                        </button>
                                   </li>
                                   <li class="page-item active">
                                        <button class="page-link-btn btn" type="submit" name="indexPage" value="">
                                             2
                                        </button>
                                   </li>
                                   <li class="page-item">
                                        <button class="page-link-btn btn" type="submit" name="indexPage" value="">
                                             3
                                        </button>
                                   </li>
                                   <li class="page-item">
                                        <button class="page-link-btn btn" type="submit" name="indexPage" value="" id="aboutus-section">
                                             <i class="fa-solid fa-chevron-right"></i>
                                        </button>
                                   </li>
                              </ul>
                         </form>
                    </div>
               </div>
          </div>
     </main>



</body>

</html>