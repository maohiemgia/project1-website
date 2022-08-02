<?php
require_once "lib/render.php";
require_once "models/product.php";

function renderByUserRole(callable $functionname, $parameter = 0)
// kiểm tra thuộc tính role của user rồi render ra dữ liệu phù hợp
{
     if (!isset($_SESSION['logintoken'])) {
          headerview();
          if ($parameter != 0) {
               $functionname($parameter);
          } else {
               $functionname();
          }
          footerview();
     } else {
          $functionname();

          footerview();
     }
}

function headerview()
{
     view('others.menu');
}

function footerview()
{
     view('others.footer');
}

function homepage()
{
     $top = top_ban_chay();
     view('home.index',['top_ban_chay'=>  $top]);
}

function loginpage()
{
     view('login.dangnhap');
}

function registerpage()
{
     view('login.dangky');
}

function forgotpasswordpage()
{
     view('login.quenmk');
}

function contactpage()
{
     view('contact.lienhe');
}

function productpage()
{
     // $productArr = fetch_all_product();
     $sql = "SELECT * FROM `hinh_anh_sp` hasp
     RIGHT JOIN san_pham sp on sp.id = hasp.id_san_pham
     WHERE hasp.do_uu_tien_ha_sp = 1";
     $productArr = querySQL($sql, 1);
     $productSale = fetch_khuyenmai_sp();
     view('product.product', ['product' => $productArr, 'sale' => $productSale]);
}

function productdetailpage($id)
{
     $product = fetch_single_product($id, 1);
     if (!$product) {
          echo "<script>
          window.location.href = '/product';
          </script>";
          die;
     }
     view('product.productdetail', ['productArr' => $product, 'product' => $product[0]]);
}

function newspage()
{
     view('news.news');
}

function wishlistpage()
{
     view('wishlist.wishlist');
}
function voucherpage()
{
     view('voucher.voucher');
}
function shoppingcart()
{
     $productArr = fetch_all_product();
     view('shoppingcart.shoppingCart', ['product' => $productArr]);
}

function checkshoppingcart()
{
     $_SESSION['itemCartStatus'] = 'themvaogio';

     view('shoppingcart.checkShoppingCart');
}

function cartadd($id)
{
     $_SESSION['itemCartInc'] = $id;
     $_SESSION['itemCartStatus'] = 'tang';

     $product = fetch_single_product($id);
     if (!$product) {
          echo "<script>
          window.location.href = '/shopping-cart';
          </script>";
          die;
     }
     view('shoppingcart.checkShoppingCart');
}

function cartminus($id)
{
     $_SESSION['itemCartInc'] = $id;
     $_SESSION['itemCartStatus'] = 'giam';

     $product = fetch_single_product($id);
     if (!$product) {
          echo "<script>
          window.location.href = '/shopping-cart';
          </script>";
          die;
     }
     view('shoppingcart.checkShoppingCart');
}

function cartdel($id)
{
     $_SESSION['itemCartInc'] = $id;
     $_SESSION['itemCartStatus'] = 'xoa';

     $product = fetch_single_product($id);
     if (!$product) {
          echo "<script>
          window.location.href = '/shopping-cart';
          </script>";
          die;
     }
     view('shoppingcart.checkShoppingCart');
}

