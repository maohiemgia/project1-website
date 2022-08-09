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
          renderByUserRole('productpage', "all");
     }
});

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
     if (isset($_GET['id_sp']) && isset($_GET['id_user'])) {
          $id_sp = $_GET['id_sp'];
          $id_user = $_GET['id_user'];
          renderByUserRole('wishlist', $id_user, $id_sp);
     } else {
          renderByUserRole('wishlist', -1, -1);
     }
});

route("/wishlist/{id}", function ($id_user) {
     // là id user
     renderByUserRole('wishlistpage', $id_user);
});

route("/voucher", function () {
     renderByUserRole('voucherpage');
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
// route("/admin/product", function () {
//      echo "Quản lý sản phẩm là";
// });

// route("/admin/product/edit/{id}", function ($id) {
//      echo "Edit sản phẩm là $id";
// });

run();