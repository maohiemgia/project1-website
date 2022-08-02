<?php

$add_status = 0;
$session_name = "product_cart_infor";

// tạo session shopping cart
if (!isset($_SESSION[$session_name])) {
     $_SESSION[$session_name] = array();
}

if (isset($_SESSION['itemCartStatus'])) {
     $itemCartStatus = $_SESSION['itemCartStatus'];

     if ($_SESSION['itemCartStatus'] == 'themvaogio') {
          if (isset($_SESSION['productId'])) {
               $productId = $_SESSION['productId'];

               $session_object = array(
                    'product_id' => $productId,
                    'quantity' => 1
               );
          }
     }

     if (
          $_SESSION['itemCartStatus'] == 'tang' ||
          $_SESSION['itemCartStatus'] == 'giam' ||
          $_SESSION['itemCartStatus'] == 'xoa'
     ) {
          $productId = $_SESSION['itemCartInc'];
     }


     if (isset($_SESSION[$session_name]) && isset($itemCartStatus)) {
          $index = 0;
          foreach ($_SESSION[$session_name] as $shopping_cart_product) {
               if ($shopping_cart_product['product_id'] == $productId) {
                    if ($itemCartStatus == 'themvaogio' || $itemCartStatus == 'tang') {
                         $_SESSION[$session_name][$index]['quantity']++;
                    } else if ($itemCartStatus == 'giam' && $_SESSION[$session_name][$index]['quantity'] > 1) {
                         $_SESSION[$session_name][$index]['quantity']--;
                    } else {
                         array_splice($_SESSION[$session_name], $index, 1);
                    }

                    $add_status = 1;
                    break;
               }
               $index++;
          }

          if ($add_status != 1) {
               array_push($_SESSION[$session_name], $session_object);
          }

          $checkDone = true;
     }

     if (isset($checkDone) && $checkDone && $itemCartStatus == 'themvaogio') {
          $_SESSION['message'] = ['Thêm vào giỏ thành công!', 1];
          $stringJS = "/product/$productId";
     } else if (
          isset($checkDone) && $checkDone && $itemCartStatus == 'tang' ||
          $itemCartStatus == 'giam' ||
          $itemCartStatus == 'xoa'
     ) {
          $stringJS = "/shopping-cart";
     } else {
          $stringJS = "/product";
     }
     echo "<script>
               window.location.href = '$stringJS';
          </script>";

     // unset($_SESSION[$session_name]);
}
