<?php

$add_status = 0;
$session_name = "product_cart_infor";

if (isset($_SESSION['productId'])) {
     $productId = $_SESSION['productId'];

     $session_object = array(
          'product_id' => $productId,
          'quantity' => 1
     );
}

// tạo session shopping cart
if (!isset($_SESSION[$session_name])) {
     $_SESSION[$session_name] = array();
}

if (isset($_SESSION[$session_name]) && isset($_SESSION['productId'])) {
     $index = 0;
     foreach ($_SESSION[$session_name] as $shopping_cart_product) {
          if ($shopping_cart_product['product_id'] == $productId) {
               $_SESSION[$session_name][$index]['quantity']++;
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

if (isset($checkDone) && $checkDone) {
     $stringJS = "/product/$productId";
} else {
     $stringJS = "/product";
}

echo "<script>
          window.location.href = '$stringJS';
     </script>";

// unset($_SESSION[$session_name]);


