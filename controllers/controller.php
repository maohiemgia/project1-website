<?php
require_once "lib/render.php";
require_once "models/product.php";

function renderByUserRole(callable $functionname)
// kiểm tra thuộc tính role của user rồi render ra dữ liệu phù hợp
{
     if (!isset($_SESSION['logintoken'])) {
          headerview();

          $functionname();

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

function product_index()
{
     $product = fetch_all_product();
     view('product.product', ['product' => $product]);
}

function product_show($id)
{
     $product = fetch_single_product($id);
     view('product.show', ['product' => $product]);
}

function homepage()
{
     view('home.index');
}

function loginpage()
{
     view('login.dangnhap');
}

function registerpage() {
     view('login.dangky');
}

function forgotpasswordpage() {
     view('login.quenmk');
}

function contactpage()
{
     view('contact.lienhe');
}

function productpage()
{
     view('product.product');
}

function newspage()
{
     view('news.news');
}

function wishlistpage()
{
}

function shoppingcart() {
     
}