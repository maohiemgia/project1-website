
<?php

require_once "lib/route.php";
require_once "controllers/controller.php";

route("/", function () {
     renderByUserRole('homepage');
});

route("/contact", function () {
     renderByUserRole('contactpage');
});

route("/404", function () {
     echo "404 error page";
});

// route("/product", function () {
//      renderByUserRole('productpage');
// });

route("/product", function () {
     if (isset($_GET['doi_tuong'])) {
          $doi_tuong = $_GET['doi_tuong'];
          renderByUserRole('productpage', "$doi_tuong");
     } else {
          if (isset($_POST['timkiemsanpham']) && !empty(trim($_POST['timkiemsanpham']))) {

               $tu_khoa_tksp = trim($_POST['timkiemsanpham']);
               // echo $tu_khoa_tksp;
               renderByUserRole('productpage', $tu_khoa_tksp);
          } else {
               renderByUserRole('productpage', "all");
          }
     }
});

// route("/product", function () {
//      if (isset($_GET['doi_tuong'])) {
//           $doi_tuong = $_GET['doi_tuong'];
//           renderByUserRole('productpage', "$doi_tuong");
//      } else {
//           renderByUserRole('productpage', "all");
//      }
// });

route("/product/{id}", function ($id) {

     // $id = $_GET['id'] ?? null;

     // if ($id === null) {
     //      header("location:/product");
     //      die;
     // }

     renderByUserRole('productdetailpage', $id);
});



// route("/detail", function () {
//      $id = $_GET['id'] ?? null;

//      if ($id === null) {
//           header("location:/product");
//           die;
//      }
//      productdetailpage($id);
// });

route("/login", function () {
     renderByUserRole('loginpage');
});
route("/checklogin", function () {
     renderByUserRole('checklogin');
});
route("/logout", function () {
     logout();
});

route("/register", function () {
     renderByUserRole('registerpage');
});
route("/checkregister", function () {
     renderByUserRole('checkregister');
});

route("/forgotpassword", function () {
     renderByUserRole('forgotpasswordpage');
});
route("/checkforgotpassword", function () {
     checkforgotpass();
});
route("/confirmcode", function () {
     renderByUserRole('confirmcode');
});
route("/checkconfirmcode", function () {
     checkconfirmcode();
});

route("/changepassword", function () {
     renderByUserRole('changepassword');
});
route("/checkchangepassword", function () {
     checkchangepassword();
});

route("/shopping-cart", function () {
     renderByUserRole('shoppingcart');
});
route("/check-shopping-cart", function () {
     renderByUserRole('checkshoppingcart');
});

route("/cart-add/{id}", function ($id) {
     renderByUserRole('cartadd', $id);
});

route("/cart-minus/{id}", function ($id) {
     renderByUserRole('cartminus', $id);
});
route("/news", function () {
     renderByUserRole('newspage');
});

route("/cart-del/{id}", function ($id) {
     renderByUserRole('cartdel', $id);
});

route("/wishlist", function () {
     if (isset($_GET['id_sp']) && isset($_SESSION['userLogin']['id'])) {
          $id_sp = $_GET['id_sp'];
          $id_user = $_SESSION['userLogin']['id'];

          if (isset($_POST['thao_tac_wishlist'])) {
               $thao_tac = $_POST['thao_tac_wishlist'];
               if ($thao_tac == "0") {
                    renderByUserRole('them_wishlist', $id_user, $id_sp);
               } else {
                    renderByUserRole('delete_one_wishlist_ko_vao_wishlist', $id_user, $id_sp);
               }
          }
          // renderByUserRole('them_wishlist', $id_user, $id_sp);
     } else {
          renderByUserRole('productpage', "all");
     }
});

route("/wishlist/{id}", function ($id_user) {
     // là id user
     if ($id_user == $_SESSION['userLogin']['id']) {
          renderByUserRole('wishlistpage', $id_user);
     } else {
          renderByUserRole('homepage');
     }
});

route("/delete_one_wishlist", function () {
     if (isset($_GET['id_sp'])) {
          $id_sp = $_GET['id_sp'];
          $id_user = $_GET['id_user'];
          // $id_user = $_SESSION['userLogin']['id'];
          renderByUserRole('delete_one_wishlist', $id_user, $id_sp);
     }
});



route("/tracuudonhang", function () {
     if (isset($_POST['tra_cuu_don_hang'])&&!empty(trim($_POST['tra_cuu_don_hang']))) {
          $tu_khoa_tk = trim($_POST['tra_cuu_don_hang']);
          renderByUserRole('kq_tracuudonhang',$tu_khoa_tk);
     } else {
          renderByUserRole('tracuudonhang');
     }

});

route("/voucher", function () {
     renderByUserRole('voucherpage');
});
route("/checkvoucher", function () {
     renderByUserRole('checkvoucherpage');
});
route("/removevoucher", function () {
     renderByUserRole('removevoucherpage');
});

route("/payment", function () {
     renderByUserRole('payment');
});

route("/userinfo", function () {
     renderByUserRole('accountpage');
});
route("/changepass", function () {
     renderByUserRole('changepasspage');
});
route("/order", function () {
     renderByUserRole('orderpage');
});
route("/admin", function () {
     renderByUserRole('adminmanagerpage');
});
route("/admin/order", function () {
     renderByUserRole('orderManage');
});
route("/admin/order/{id}", function ($id) {
     renderByUserRole('editOrder', $id);
});
route("/deleteorder/{id}", function ($id) {
     renderByUserRole('delOrder', $id);
});

route("/admin/statistic", function () {
     renderByUserRole('statisticpage');
});




run();
