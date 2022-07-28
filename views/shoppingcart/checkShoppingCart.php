<?php
require_once './checkLogin.php';

require_once "..\BS & FontAwesome\bsFontIcon.php";

//   include connection.php
require_once './connection.php';

$add_status = 0;

//   select to product table 
$sql = "select * from product";

//   prepared
$stmt = $connection->prepare($sql);

//   executes
$stmt->execute();

//   get data
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);      // key and value

// lấy sản phẩm cần thêm
$productId = $_GET['productId'];
$check = $_GET['check'];
$sql = "select * from product where product_id=$productId";
$stmt = $connection->prepare($sql);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

$session_name = "product_cart_infor";
$session_object = array(
     'product_id' => $productId,
     'quantity' => 1
);

if (!isset($_SESSION[$session_name])) {
     $_SESSION[$session_name] = array();
} 

if (isset($check) && $check == 1) {
     $index = 0;
     foreach ($_SESSION[$session_name] as $shopping_cart_product) {
          if ($shopping_cart_product['product_id'] == $productId) {
               $quantity_temp = $shopping_cart_product['quantity'] + 1;
               $session_object = array(
                    'product_id' => $productId,
                    'quantity' => $quantity_temp
               );
               array_splice($_SESSION[$session_name], $index, 1);
               array_push($_SESSION[$session_name], $session_object);

               $add_status = 1;

               break;
          }
          $index++;
     }
}

if (isset($check) && $check == 1 && $add_status != 1) {
     array_push($_SESSION[$session_name], $session_object);
}

header('location: ./product.php');

// unset($_SESSION[$session_name]);
