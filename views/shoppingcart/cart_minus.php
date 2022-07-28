<?php
require_once './checkLogin.php';

$add_status = 0;

// lấy sản phẩm cần thêm
$productId = $_GET['productId'];
$check = $_GET['check'];

$session_name = "product_cart_infor";

if (isset($check) && $check == 1) {
     $index = 0;
     foreach ($_SESSION[$session_name] as $shopping_cart_product) {
          if ($shopping_cart_product['product_id'] == $productId) {
               if ($shopping_cart_product['quantity'] > 0) {
                    $quantity_temp = $shopping_cart_product['quantity'] - 1;
                    $session_object = array(
                         'product_id' => $productId,
                         'quantity' => $quantity_temp
                    );
                    array_splice($_SESSION[$session_name], $index, 1);
                    array_push($_SESSION[$session_name], $session_object);

                    $add_status = 1;
               }
               break;
          }
          $index++;
     }
}

header('location: ./shoppingCart.php');
