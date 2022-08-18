<?php

$add_status = 0;
$session_name = "product_cart_infor";

// tạo session shopping cart
if (!isset($_SESSION[$session_name])) {
     $_SESSION[$session_name] = array();
}

if (isset($_SESSION['itemCartStatus'])) {
     $itemCartStatus = $_SESSION['itemCartStatus'];

     if ($itemCartStatus == 'themvaogio') {
          if (isset($_SESSION['product-selected-option']['id_san_pham'])) {
               $productId = $_SESSION['productId'];
               $session_object = $_SESSION['product-selected-option'];
               $productIdTemp = $productId;
               $session_object['option_detail'] = $session_object['color'] . $session_object['size'];
               $session_object['quantity'] = 1;

               // if (isset($_SESSION['addToCartStat']) && $_SESSION['addToCartStat'] == 1) {
               //      $_SESSION['addToCartStat'] = 0;
               //      echo "<script>
               //           window.location.href = '/check-shopping-cart';
               //      </script>";
               // }
          }
     }

     if (!is_array($_SESSION['itemCartInc']) || count($_SESSION['itemCartInc']) < 1) {
          $_SESSION['itemCartInc'] = [];
     }

     $index = 0;
     foreach ($_SESSION[$session_name] as $shopping_cart_product) {
          $productAvailableCheck = 0;

          if (count($_SESSION['itemCartInc']) > 0) {
               foreach ($_SESSION['itemCartInc'] as $pid) {
                    if (isset($shopping_cart_product['id_san_pham']) && $shopping_cart_product['id_san_pham'] == $pid) {
                         // sản phẩm có tồn tại trong giỏ rồi
                         $productAvailableCheck = 1;
                         break;
                    }
               }
          }
     }

     foreach ($_SESSION[$session_name] as $shopping_cart_product) {
          if (isset($productAvailableCheck) && $productAvailableCheck == 1) {
               if (
                    isset($_SESSION['product-selected-option']['option_detail']) &&
                    $shopping_cart_product['option_detail'] == $_SESSION['product-selected-option']['option_detail'] &&
                    $shopping_cart_product['gia_tien_option_sp'] == $_SESSION['product-selected-option']['gia_tien_option_sp'] &&
                    $shopping_cart_product['id'] ==  $_SESSION['product-selected-option']['id']
               ) {
                    if ($itemCartStatus == 'themvaogio') {
                         $_SESSION[$session_name][$index]['quantity']++;
                         $add_status = 1;
                         break;
                    }
               }
               $index++;
          }
     }

     if (isset($_SESSION['cart-index'])) {
          $itemIndex = $_SESSION['cart-index'];

          if ($itemCartStatus == 'tang') {
               $_SESSION[$session_name][$itemIndex]['quantity']++;
               $add_status = 1;
          }
          if ($itemCartStatus == 'giam') {
               if ($_SESSION[$session_name][$itemIndex]['quantity'] > 1) {
                    $_SESSION[$session_name][$itemIndex]['quantity']--;
               } else {
                    unset($_SESSION[$session_name][$itemIndex]);
                    $_SESSION[$session_name] = array_values($_SESSION[$session_name]);
               }
               $add_status = 1;
          }
          if ($itemCartStatus == 'xoa') {
               unset($_SESSION[$session_name][$itemIndex]);
               $_SESSION[$session_name] = array_values($_SESSION[$session_name]);
               $add_status = 1;
          }
     }

     if ($add_status != 1) {
          array_push($_SESSION[$session_name], $session_object);
     }

     $checkDone = true;

     if (isset($checkDone) && $checkDone && $itemCartStatus == 'themvaogio') {
          $_SESSION['message'] = ['Thêm vào giỏ thành công!', 1];
          $stringJS = "/product/$productIdTemp";
     } else if (
          isset($checkDone) && $checkDone && $itemCartStatus == 'tang' ||
          $itemCartStatus == 'giam' ||
          $itemCartStatus == 'xoa'
     ) {
          $stringJS = "/shopping-cart";
     } else {
          $stringJS = "/product";
     }

     $_SESSION['itemCartStatus'] = '';

     echo "<script>
               window.location.href = '$stringJS';
          </script>";
}
