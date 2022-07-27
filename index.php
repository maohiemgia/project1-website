<?php

require_once "lib/route.php";
require_once "controllers/controller.php";

route("/", function () {
     renderByUserRole('homepage');
});

route("/contact", function () {
     renderByUserRole('contactpage');
});

route("/about-us", function () {
     echo "About us Page";
});

route("/404", function () {
     echo "404 error page";
});

route("/product", function () {
     // product_index();
     renderByUserRole('productpage');
});

route("/product/{id}", function ($id) {
     echo "Sản phẩm là $id";
     product_show($id);
});

route("/login", function () {
     renderByUserRole('loginpage');
});

// route("/admin/product", function () {
//      echo "Quản lý sản phẩm là";
// });

// route("/admin/product/edit/{id}", function ($id) {
//      echo "Edit sản phẩm là $id";
// });

run();
