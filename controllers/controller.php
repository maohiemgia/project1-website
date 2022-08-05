<?php
require_once "lib/render.php";
require_once "models/product.php";
require_once "models/login.php";

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
     view('home.index', ['top_ban_chay' =>  $top]);
}

function loginpage()
{
     view('login.dangnhap');
     if (isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin'])) {
          echo "<script>
                window.location.href = '/';
                </script>";
          exit();
     }
}
function checklogin()
{
     include_once "models/login.php";
     if (isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin'])) {
          echo "<script>
                window.location.href = '/';
                </script>";
          exit();
     }
     if (!empty($_SESSION['login-err'])) {
          echo "<script>
          window.location.href = '/login';
          </script>";
          exit();
     }
}
function logout()
{
     if (session_status() === PHP_SESSION_NONE) {
          session_start();
     }

     unset($_SESSION['userLogin']);
     echo "<script>window.location.href = '/'; </script>";
     exit();
}

function registerpage()
{
     view('login.dangky');
     if (isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin'])) {
          echo "<script>
                window.location.href = '/';
                </script>";
          exit();
     }
}

function checkregister()
{
     include_once "models/register.php";

     if (isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin'])) {
          echo "<script>
                window.location.href = '/';
                </script>";
          exit();
     }
     if (isset($_SESSION['register-err']) && count($_SESSION['register-err']) > 0) {
          echo "<script>
          window.location.href = '/register';
          </script>";
          exit();
     } else {
          $notifi = $_SESSION['notification'];
          echo "<script>
          window.alert('$notifi');
          window.location.href = '/login';
          </script>";
          exit();
     }
}

function forgotpasswordpage()
{
     view('login.quenmk');
}
function confirmcode()
{
     view('login.confirmemailcode');
}
function checkconfirmcode()
{
     include_once "models/confirmcode.php";

     if (isset($_SESSION['confirmcode-err']) && strlen($_SESSION['confirmcode-err']) > 0) {
          echo "<script>
          window.location.href = '/confirmcode';
          </script>";
          exit();
     } else {
          echo "<script>
          window.location.href = '/changepassword';
          </script>";
          exit();
     }
}

function checkforgotpass()
{
     include_once "models/forgetpass.php";

     if (isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin'])) {
          echo "<script>
                window.location.href = '/';
                </script>";
          exit();
     }

     if (isset($_SESSION['forgotpass-err']) && strlen($_SESSION['forgotpass-err']) > 0) {
          echo "<script>
          window.location.href = '/forgotpassword';
          </script>";
          exit();
     } else {
          $notifi = 'Đã gửi mã xác thực tới email của bạn!';
          echo "<script>
          window.alert('$notifi');
          window.location.href = '/login';
          </script>";
          exit();
     }
}


function changepassword()
{
     view('login.changepass');
}
function checkchangepassword()
{
     include_once "models/changepass.php";

     if (isset($_SESSION['newpassword-err']) && strlen($_SESSION['newpassword-err']) > 0) {
          echo "<script>
          window.location.href = '/changepassword';
          </script>";
          exit();
     } else {
          $notifi = 'Đổi mật khẩu thành công!';
          echo "<script>
               window.alert('$notifi');
          </script>";
          echo "<script>
          window.location.href = '/login';
          </script>";
          exit();
     }
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

     $_SESSION['productId'] =  $id;

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
function accountpage(){
     view('account.account');
}
function orderpage(){
     view('account.order');
}
function changepasspage(){
     view('account.change_password');
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
