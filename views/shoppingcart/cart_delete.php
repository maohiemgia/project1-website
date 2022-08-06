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
               array_splice($_SESSION[$session_name], $index, 1);
               $add_status = 1;

               break;
          }
          $index++;
     }
}

// header('location: ./shoppingCart.php');
