<?php
require_once "lib/render.php";
require_once "models/product.php";
require_once "models/loaihang.php";
require_once "models/wishlist.php";
require_once "models/login.php";

// function renderByUserRole(callable $functionname, $parameter = 0)
// // kiểm tra thuộc tính role của user rồi render ra dữ liệu phù hợp
// {
//      if (!isset($_SESSION['logintoken'])) {
//      if (!isset($_SESSION['userLogin']) || $_SESSION['userLogin']['vai_tro'] == 4) {
//           headerview();
//           if ($parameter != 0) {
//                $functionname($parameter);
//           } else {
//                $functionname();
//           }
//           footerview();
//      } else {

//           $functionname();

//           headerview();

//           if ($parameter != 0) {
//                $functionname($parameter);
//           } else {
//                $functionname();
//           }
//           footerview();
//      }
// }

function renderByUserRole(callable $functionname, $parameter = 0, $bien = 0)
// kiểm tra thuộc tính role của user rồi render ra dữ liệu phù hợp
{
     if (!isset($_SESSION['userLogin']) || isset($_SESSION['userLogin']['vai_tro']) && $_SESSION['userLogin']['vai_tro'] == 4) {
          headerview();
          if ($parameter != 0) {
               if ($bien == 0) {
                    $functionname($parameter);
               } else {
                    $functionname($parameter, $bien);
               }
          } else {
               $functionname();
          }
          footerview();
     } else {
          headerview();

          if ($parameter != 0) {
               if ($bien == 0) {
                    $functionname($parameter);
               } else {
                    $functionname($parameter, $bien);
               }
          } else {
               $functionname();
          }

          footerview();
     }
}

// function headerview()
// {
//      view('others.menu');
// }

function headerview()
{
     if (isset($_SESSION['userLogin']['id'])) {
          $id_user = $_SESSION['userLogin']['id'];
          $_SESSION['userLogin']['count_wishlist'] = dem_so_yeu_thich($id_user);
          // echo $_SESSION['userLogin']['count_wishlist'];
     }
     view('others.menu');
}

function footerview()
{
     view('others.footer');
}

function homepage()
{
     $top_ban_chay = top_ban_chay();

     $top_xu_huong_nam = top_xu_huong('nam');
     $top_xu_huong_nu = top_xu_huong('nữ');
     $top_xu_huong_tre_em = top_xu_huong('trẻ em');

     $top_object_nam = top_object('nam');
     $top_object_nu = top_object('nu');
     $top_object_tre_em = top_object('trẻ em');

     view('home.index', [
          'top_ban_chay' =>  $top_ban_chay, 'top_xu_huong_nam' => $top_xu_huong_nam,
          'top_xu_huong_nu' => $top_xu_huong_nu, 'top_xu_huong_tre_em' => $top_xu_huong_tre_em,
          'top_object_nam' =>  $top_object_nam, 'top_object_nu' => $top_object_nu,
          'top_object_tre_em' =>  $top_object_tre_em
     ]);
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

     // unset($_SESSION['userLogin']);
     session_destroy();
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
          session_destroy();
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

// function productpage()
// {
//      // $productArr = fetch_all_product();
//      $sql = "SELECT * FROM `hinh_anh_sp` hasp
//      RIGHT JOIN san_pham sp on sp.id = hasp.id_san_pham
//      WHERE hasp.do_uu_tien_ha_sp = 1";
//      $productArr = querySQL($sql, 1);
//      $productSale = fetch_khuyenmai_sp();
//      view('product.product', ['product' => $productArr, 'sale' => $productSale]);
// }

function productpage($doi_tuong)
{

     // $productArr = fetch_all_product();
     if ($doi_tuong == "all") {
          $productArr = all_product_object("all");
     } else
     if ($doi_tuong == "nam") {
          $productArr = all_product_object("nam");
     } else
     if ($doi_tuong == "nu") {
          $productArr = all_product_object("nữ");
     } else
     if ($doi_tuong == "tre_em") {
          $productArr = all_product_object("trẻ em");
     } else
     if ($doi_tuong == "top_ban_chay") {
          $productArr = top_ban_chay('lay_het');
     }

     $productSale = fetch_khuyenmai_sp();

     unset($_SESSION['product-selected-option']);

     $loai_hang = query_loai_hang();
     $doi_tuong_lh = query_object_of_lh();
     if (!isset($_SESSION['reload_page']) || isset($_SESSION['reload_page']) &&  $_SESSION['reload_page'] == 0) {
          echo "<script>
          window.location.href = '/product';
          </script>";
          $_SESSION['reload_page'] = 1;
     }

     view('product.product', [
          'product' => $productArr, 'sale' => $productSale, 'loai_hang' => $loai_hang,
          'doi_tuong_lh' => $doi_tuong_lh
     ]);
}

function productdetailpage($id)
{
     $product = fetch_single_product($id, 1);
     $product_option_color = fetch_product_option($id, 1);
     $product_option_size = fetch_product_option($id, 2);

     $product_option_img = fetch_product_option_img($id, 1);

     $_SESSION['productId'] =  $id;
     if (!isset($_SESSION['product-selected-option'])) {
          $_SESSION['product-selected-option'] = $product[0];
     }

     if (!isset($_SESSION['product-selected-option']['color']) || empty($_SESSION['product-selected-option']['color'])) {
          $_SESSION['product-selected-option']['color'] = '';
     }
     if (!isset($_SESSION['product-selected-option']['size']) || empty($_SESSION['product-selected-option']['size'])) {
          $_SESSION['product-selected-option']['size'] = '';
     }
     if (!isset($_SESSION['product-selected-option']['khuyen_mai'])) {
          $_SESSION['product-selected-option']['khuyen_mai'] = 0;
     }

     $_SESSION['product-selected-option']['option_detail'] = $_SESSION['product-selected-option']['color'] . $_SESSION['product-selected-option']['size'];

     if (!$product) {
          echo "<script>
          window.location.href = '/product';
          </script>";
          die;
     }

     // check sản phẩm đã có trong wishlist hay chưa
     if (isset($_SESSION['userLogin']['id'])) {
          $id_sp = $id;
          $id_user = $_SESSION['userLogin']['id'];
          check_pro_in_wishlist($id_user, $id_sp);
          $check_ton_tai = check_pro_in_wishlist($id_user, $id_sp);
          $check_wl = 0;
          if (is_array($check_ton_tai) && !empty($check_ton_tai)) {
               $check_wl = 1;
          }
          view('product.productdetail', [
               'productArr' => $product, 'product' => $product[0], 'productOptionColor' => $product_option_color, 'productOptionSize' => $product_option_size,
               'productOptionImg' => $product_option_img, 'check_pro_in_wl' => $check_wl
          ]);
     } else {
          view('product.productdetail', [
               'productArr' => $product, 'product' => $product[0], 'productOptionColor' => $product_option_color, 'productOptionSize' => $product_option_size,
               'productOptionImg' => $product_option_img
          ]);
     }


     //      view('product.productdetail', ['productArr' => $product, 'product' => $product[0], 'productOptionColor' => $product_option_color, 'productOptionSize' => $product_option_size, 'productOptionImg' => $product_option_img]);
}

// function productdetailpage($id)
// {
//      $product = fetch_single_product($id, 1);
//      $product_option_color = fetch_product_option($id, 1);
//      $product_option_size = fetch_product_option($id, 2);

//      $product_option_img = fetch_product_option_img($id, 1);

//      $_SESSION['productId'] =  $id;
//      if (!isset($_SESSION['product-selected-option'])) {
//           $_SESSION['product-selected-option'] = $product[0];
//      }

//      if (!isset($_SESSION['product-selected-option']['color']) || empty($_SESSION['product-selected-option']['color'])) {
//           $_SESSION['product-selected-option']['color'] = '';
//      }
//      if (!isset($_SESSION['product-selected-option']['size']) || empty($_SESSION['product-selected-option']['size'])) {
//           $_SESSION['product-selected-option']['size'] = '';
//      }
//      if (!isset($_SESSION['product-selected-option']['khuyen_mai'])) {
//           $_SESSION['product-selected-option']['khuyen_mai'] = 0;
//      }

//      $_SESSION['product-selected-option']['option_detail'] = $_SESSION['product-selected-option']['color'] . $_SESSION['product-selected-option']['size'];

//      if (!$product) {
//           echo "<script>
//           window.location.href = '/product';
//           </script>";
//           die;
//      }
//      if (isset($_SESSION['reload_page']) && $_SESSION['reload_page'] == 1) {
//           echo "<script>
//           window.location.href = '/product/$id';
//           </script>";
//           $_SESSION['reload_page'] = 0;
//      }

//      // check sản phẩm đã có trong wishlist hay chưa
//      $id_sp = $id;
//      if (isset($_SESSION['userLogin']['id'])) {
//           $id_user = $_SESSION['userLogin']['id'];
//           check_pro_in_wishlist($id_user, $id_sp);
//           $check_ton_tai = check_pro_in_wishlist($id_user, $id_sp);
//           $check_wl = 0;
//           if (is_array($check_ton_tai) && !empty($check_ton_tai)) {
//                $check_wl = 1;
//           }
//           view('product.productdetail', [
//                'productArr' => $product, 'product' => $product[0], 'productOptionColor' => $product_option_color, 'productOptionSize' => $product_option_size,
//                'productOptionImg' => $product_option_img, 'check_pro_in_wl' => $check_wl
//           ]);
//      }
// }

function newspage()
{
     view('news.news');
}

// lấy danh sách wishlist của người dùng
function wishlistpage($id_user)
{
     // if($id_user!= )
     $wishlist = list_wishlist($id_user);
     view('wishlist.wishlist', ['wish_list' => $wishlist]);
}

function them_wishlist($id_user, $id_sp)
{
     // echo $id_user . "<br>" . $id_sp;
     $check_pro_ton_tai = check_pro_in_listpro($id_sp);
     $check_ton_tai = check_pro_in_wishlist($id_user, $id_sp);
     // print_r($check_ton_tai);
     $thong_bao = [];
     if (
          is_array($check_ton_tai) && empty($check_ton_tai)  && is_array($check_pro_ton_tai) &&
          !empty($check_pro_ton_tai)
     ) {
          add_wishlist($id_user, $id_sp);
     }
     // wishlistpage($id_user);
     // $wishlist = list_wishlist($id_user);
     // view('wishlist.wishlist', ['wish_list' => $wishlist,'thong_bao' => $thong_bao]);
     productdetailpage($id_sp);
     echo "<script>
               window.location.href = '/product/" . $id_sp . "';
          </script>";
}

// xóa khi ở giao diện chi tiết sản phẩm
function delete_one_wishlist_ko_vao_wishlist($id_user, $id_sp)
{
     xoa_one_wishlist($id_user, $id_sp);
     productdetailpage($id_sp);
     echo "<script>
               window.location.href = '/product/" . $id_sp . "';
          </script>";
}

// xóa khi ở giao diện wishlist
function delete_one_wishlist($id_user, $id_sp)
{
     xoa_one_wishlist($id_user, $id_sp);
     wishlistpage($id_user);
     echo "<script>
               window.location.href = '/wishlist/" . $id_user . "';
          </script>";
}




function tracuudonhang()
{


     view('tracuudonhang.tracuudonhang');
}

function voucherpage()
{
     view('voucher.voucher');
}
function accountpage()
{
     view('account.account');
}
function orderpage()
{
     view('account.order');
}
function changepasspage()
{
     view('account.change_password');
}
function shoppingcart()
{
     $productArr = fetch_all_product();
     unset($_SESSION['product-selected-option']);
     view('shoppingcart.shoppingCart', ['product' => $productArr]);
}

function checkshoppingcart()
{
     if (!isset($_SESSION['addToCartStat'])) {
          $_SESSION['addToCartStat'] = 1;
     }

     $id = $_SESSION['productId'];
     $check = false;
     $_SESSION['itemCartStatus'] = 'themvaogio';
     if (!isset($_SESSION['itemCartInc'])) {
          $_SESSION['itemCartInc'] = [];
     }
     foreach ($_SESSION['itemCartInc'] as $item) {
          if ($item == $id) {
               $check = true;
               break;
          }
     }
     if ($check == false) {
          array_push($_SESSION['itemCartInc'], "$id");
     }


     view('shoppingcart.checkShoppingCart');
}

function cartadd($id)
{
     $_SESSION['cart-index'] = $id - 10;
     $_SESSION['itemCartStatus'] = 'tang';
     $check = false;

     if (is_array($_SESSION['itemCartInc'])) {
          foreach ($_SESSION['itemCartInc'] as $item) {
               if ($item == $_SESSION['productId']) {
                    $check = true;
                    break;
               }
          }
          if ($check == false) {
               array_push($_SESSION['itemCartInc'], $_SESSION['productId']);
          }
     }

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
     $_SESSION['cart-index'] = $id - 10;
     $_SESSION['itemCartStatus'] = 'giam';
     $check = false;

     if (is_array($_SESSION['itemCartInc'])) {
          foreach ($_SESSION['itemCartInc'] as $item) {
               if ($item == $_SESSION['productId']) {
                    $check = true;
                    break;
               }
          }
          if ($check == false) {
               array_push($_SESSION['itemCartInc'], $_SESSION['productId']);
          }
     }

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
     $_SESSION['cart-index'] = $id - 10;
     $_SESSION['itemCartStatus'] = 'xoa';
     $check = false;

     if (is_array($_SESSION['itemCartInc'])) {
          foreach ($_SESSION['itemCartInc'] as $item) {
               if ($item == $_SESSION['productId']) {
                    $check = true;
                    break;
               }
          }
          if ($check == false) {
               array_push($_SESSION['itemCartInc'], $_SESSION['productId']);
          }
     }

     $product = fetch_single_product($id);
     if (!$product) {
          echo "<script>
          window.location.href = '/shopping-cart';
          </script>";
          die;
     }
     view('shoppingcart.checkShoppingCart');
}

function payment()
{
     view('pay.pay');
}

function orderManage()
{
     view('admin.ordermanage');
}
