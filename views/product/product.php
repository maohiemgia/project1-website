<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>product page</title>

     <?php
     require_once "../faviconlink/faviconlink.php";
     require_once "../../lib/boostrapAndFonticon/BSandFontIcon.php";
     ?>

     <link rel="stylesheet" href="../../lib/css/all.css">
     <link rel="stylesheet" href="../../lib/css/product.css">

</head>

<body>
     <div class="">
          <!-- menu -->
          <?php require_once "../others/menu.php" ?>
     </div>


     <div class="row dir-infor padding-page">
          <a href="./">
               Trang chủ
          </a>
          <span class="dir-infor-icon">></span>
          <a href="./">
               Tất cả sản phẩm
          </a>
     </div>

     <div class="row padding-page productandfilter">
          <div class="col leftcol filtercol">
               <div class="offcanvas offcanvas-end" id="demo">
                    <div class="offcanvas-header">
                         <h1 class="offcanvas-title">Lọc sản phẩm</h1>
                         <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                         <div class="row filterrow filterrow">
                              <h3 class="rowtitle">
                                   DANH MỤC SẢN PHẨM
                              </h3>
                              <div class="dropdown-section">
                                   <!-- <span class="title-dropdown">
                                   Xem tất cả danh mục
                                   <i class="fa-solid fa-sort-down"></i>
                              </span> -->
                                   <div class="dropdown-content">
                                        <ul>
                                             <li>
                                                  <a href="#">
                                                       Túi xách
                                                  </a>
                                             </li>
                                             <li>
                                                  <div class="sub-dropdown">
                                                       <a href="#">
                                                            Nữ
                                                       </a>
                                                       <span class="view-more-btn">
                                                            <i class="fa-solid fa-plus"></i>
                                                       </span>
                                                  </div>
                                                  <ul class="sub-sub-dropdown">
                                                       <li>
                                                            <a href="#">
                                                                 Quần
                                                            </a>
                                                       </li>
                                                       <li>
                                                            <a href="#">
                                                                 Áo
                                                            </a>

                                                       </li>
                                                       <li>
                                                            <a href="#">
                                                                 Giày
                                                            </a>
                                                       </li>
                                                       <li>
                                                            <a href="#">
                                                                 phụ kiện
                                                            </a>
                                                       </li>
                                                  </ul>
                                             </li>
                                             <li>
                                                  <div class="sub-dropdown">
                                                       <a href="#">
                                                            Nam
                                                       </a>
                                                       <span class="view-more-btn">
                                                            <i class="fa-solid fa-plus"></i>
                                                       </span>
                                                  </div>
                                                  <ul class="sub-sub-dropdown">
                                                       <li>
                                                            <a href="#">
                                                                 Quần
                                                            </a>
                                                       </li>
                                                       <li>
                                                            <a href="#">
                                                                 Áo
                                                            </a>
                                                       </li>
                                                       <li>
                                                            <a href="#">
                                                                 Giày
                                                            </a>
                                                       </li>
                                                       <li>
                                                            <a href="#">
                                                                 phụ kiện
                                                            </a>
                                                       </li>
                                                  </ul>
                                             </li>
                                             <li>
                                                  <div class="sub-dropdown">
                                                       <a href="#">
                                                            Trẻ em
                                                       </a>
                                                       <span class="view-more-btn">
                                                            <i class="fa-solid fa-plus"></i>
                                                       </span>
                                                  </div>
                                                  <ul class="sub-sub-dropdown">
                                                       <li>
                                                            <a href="#">
                                                                 Quần
                                                            </a>
                                                       </li>
                                                       <li>
                                                            <a href="#">
                                                                 Áo
                                                            </a>
                                                       </li>
                                                       <li>
                                                            <a href="#">
                                                                 Giày
                                                            </a>
                                                       </li>
                                                       <li>
                                                            <a href="#">
                                                                 phụ kiện
                                                            </a>
                                                       </li>
                                                  </ul>
                                             </li>
                                             <li>
                                                  <a href="#">
                                                       Đá quý & đồng hồ
                                                  </a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                         <div class="row filterrow filterrow">
                              <div class="filter-selected">
                                   <h3 class="rowtitle">
                                        Bạn chọn
                                   </h3>
                                   <a href="#">
                                        <i class="fa-solid fa-xmark"></i>
                                   </a>
                              </div>
                              <div class="filter-selected-option">
                                   <span>
                                        <i class="fa-solid fa-xmark"></i>
                                        Dưới 10 triệu
                                   </span>
                                   <span>
                                        <i class="fa-solid fa-xmark"></i>
                                        Dưới 10 - 25 triệu
                                   </span>
                                   <span>
                                        <i class="fa-solid fa-xmark"></i>
                                        Dưới 10 triệu
                                   </span>
                                   <span>
                                        <i class="fa-solid fa-xmark"></i>
                                        Dưới 10 triệu
                                   </span>
                                   <span>
                                        <i class="fa-solid fa-xmark"></i>
                                        Dưới 10 triệu
                                   </span>
                              </div>
                              <div class="dropdown-section">
                                   <form action="#" method="post">
                                        <div class="filter-option-menu">
                                             <h3 class="rowtitle">
                                                  CHỌN MỨC GIÁ
                                             </h3>
                                             <div class="filter-option">
                                                  <button type="submit">
                                                       <input type="checkbox" name="" id="filter-option-1">
                                                       <label for="filter-option-1">Dưới 17 triệu</label>
                                                  </button>
                                             </div>
                                             <div class="filter-option">
                                                  <button type="submit">
                                                       <input type="checkbox" name="" id="filter-option-2">
                                                       <label for="filter-option-2">Dưới 27 triệu</label>
                                                  </button>
                                             </div>
                                             <div class="filter-option">
                                                  <button type="submit">
                                                       <input type="checkbox" name="" id="filter-option-3">
                                                       <label for="filter-option-3">Dưới 37 triệu</label>
                                                  </button>
                                             </div>
                                        </div>
                                        <div class="filter-option-menu">
                                             <h3 class="rowtitle">
                                                  LOẠI SẢN PHẨM
                                             </h3>
                                             <div class="filter-option">
                                                  <button type="submit">
                                                       <input type="checkbox" name="" id="filter-option-4">
                                                       <label for="filter-option-4">Bản giới hạn</label>
                                                  </button>
                                             </div>
                                             <div class="filter-option">
                                                  <button type="submit">
                                                       <input type="checkbox" name="" id="filter-option-5">
                                                       <label for="filter-option-5">Bộ sưu tập</label>
                                                  </button>
                                             </div>
                                             <div class="filter-option">
                                                  <button type="submit">
                                                       <input type="checkbox" name="" id="filter-option-6">
                                                       <label for="filter-option-6">Hợp tác</label>
                                                  </button>
                                             </div>
                                        </div>
                                        <div class="filter-option-menu">
                                             <h3 class="rowtitle">
                                                  màu sắc
                                             </h3>
                                             <div class="filter-option">
                                                  <button type="submit">
                                                       <input type="checkbox" name="" id="filter-option-4">
                                                       <label for="filter-option-4">đỏ</label>
                                                  </button>
                                             </div>
                                             <div class="filter-option">
                                                  <button type="submit">
                                                       <input type="checkbox" name="" id="filter-option-5">
                                                       <label for="filter-option-5">xanh</label>
                                                  </button>
                                             </div>
                                             <div class="filter-option">
                                                  <button type="submit">
                                                       <input type="checkbox" name="" id="filter-option-6">
                                                       <label for="filter-option-6">vàng</label>
                                                  </button>
                                             </div>
                                        </div>
                                        <div class="filter-option-menu">
                                             <h3 class="rowtitle">
                                                  kích cỡ
                                             </h3>
                                             <div class="filter-option">
                                                  <button type="submit">
                                                       <input type="checkbox" name="" id="filter-option-4">
                                                       <label for="filter-option-4">S</label>
                                                  </button>
                                             </div>
                                             <div class="filter-option">
                                                  <button type="submit">
                                                       <input type="checkbox" name="" id="filter-option-5">
                                                       <label for="filter-option-5">M</label>
                                                  </button>
                                             </div>
                                             <div class="filter-option">
                                                  <button type="submit">
                                                       <input type="checkbox" name="" id="filter-option-6">
                                                       <label for="filter-option-6">L</label>
                                                  </button>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>

               <div class="container-fluid">
                    <button class="btn filter-respon-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                         <i class="fa-solid fa-filter"></i>
                    </button>
               </div>

               <div class="row filterrow filterrow2">
                    <h3 class="rowtitle">
                         DANH MỤC SẢN PHẨM
                    </h3>
                    <div class="dropdown-section">
                         <!-- <span class="title-dropdown">
                                   Xem tất cả danh mục
                                   <i class="fa-solid fa-sort-down"></i>
                              </span> -->
                         <div class="dropdown-content">
                              <ul>
                                   <li>
                                        <a href="#">
                                             Túi xách
                                        </a>
                                   </li>
                                   <li>
                                        <div class="sub-dropdown">
                                             <a href="#">
                                                  Nữ
                                             </a>
                                             <span class="view-more-btn">
                                                  <i class="fa-solid fa-plus"></i>
                                             </span>
                                        </div>
                                        <ul class="sub-sub-dropdown">
                                             <li>
                                                  <a href="#">
                                                       Quần
                                                  </a>
                                             </li>
                                             <li>
                                                  <a href="#">
                                                       Áo
                                                  </a>

                                             </li>
                                             <li>
                                                  <a href="#">
                                                       Giày
                                                  </a>
                                             </li>
                                             <li>
                                                  <a href="#">
                                                       phụ kiện
                                                  </a>
                                             </li>
                                        </ul>
                                   </li>
                                   <li>
                                        <div class="sub-dropdown">
                                             <a href="#">
                                                  Nam
                                             </a>
                                             <span class="view-more-btn">
                                                  <i class="fa-solid fa-plus"></i>
                                             </span>
                                        </div>
                                        <ul class="sub-sub-dropdown">
                                             <li>
                                                  <a href="#">
                                                       Quần
                                                  </a>
                                             </li>
                                             <li>
                                                  <a href="#">
                                                       Áo
                                                  </a>
                                             </li>
                                             <li>
                                                  <a href="#">
                                                       Giày
                                                  </a>
                                             </li>
                                             <li>
                                                  <a href="#">
                                                       phụ kiện
                                                  </a>
                                             </li>
                                        </ul>
                                   </li>
                                   <li>
                                        <div class="sub-dropdown">
                                             <a href="#">
                                                  Trẻ em
                                             </a>
                                             <span class="view-more-btn">
                                                  <i class="fa-solid fa-plus"></i>
                                             </span>
                                        </div>
                                        <ul class="sub-sub-dropdown">
                                             <li>
                                                  <a href="#">
                                                       Quần
                                                  </a>
                                             </li>
                                             <li>
                                                  <a href="#">
                                                       Áo
                                                  </a>
                                             </li>
                                             <li>
                                                  <a href="#">
                                                       Giày
                                                  </a>
                                             </li>
                                             <li>
                                                  <a href="#">
                                                       phụ kiện
                                                  </a>
                                             </li>
                                        </ul>
                                   </li>
                                   <li>
                                        <a href="#">
                                             Đá quý & đồng hồ
                                        </a>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </div>
               <div class="row filterrow filterrow3">
                    <div class="filter-selected">
                         <h3 class="rowtitle">
                              Bạn chọn
                         </h3>
                         <a href="#">
                              <i class="fa-solid fa-xmark"></i>
                         </a>
                    </div>
                    <div class="filter-selected-option">
                         <span>
                              <i class="fa-solid fa-xmark"></i>
                              Dưới 10 triệu
                         </span>
                         <span>
                              <i class="fa-solid fa-xmark"></i>
                              Dưới 10 - 25 triệu
                         </span>
                         <span>
                              <i class="fa-solid fa-xmark"></i>
                              Dưới 10 triệu
                         </span>
                         <span>
                              <i class="fa-solid fa-xmark"></i>
                              Dưới 10 triệu
                         </span>
                         <span>
                              <i class="fa-solid fa-xmark"></i>
                              Dưới 10 triệu
                         </span>
                    </div>
                    <div class="dropdown-section">
                         <form action="#" method="post">
                              <div class="filter-option-menu">
                                   <h3 class="rowtitle">
                                        CHỌN MỨC GIÁ
                                   </h3>
                                   <div class="filter-option">
                                        <button type="submit">
                                             <input type="checkbox" name="" id="filter-option-1">
                                             <label for="filter-option-1">Dưới 17 triệu</label>
                                        </button>
                                   </div>
                                   <div class="filter-option">
                                        <button type="submit">
                                             <input type="checkbox" name="" id="filter-option-2">
                                             <label for="filter-option-2">Dưới 27 triệu</label>
                                        </button>
                                   </div>
                                   <div class="filter-option">
                                        <button type="submit">
                                             <input type="checkbox" name="" id="filter-option-3">
                                             <label for="filter-option-3">Dưới 37 triệu</label>
                                        </button>
                                   </div>
                              </div>
                              <div class="filter-option-menu">
                                   <h3 class="rowtitle">
                                        LOẠI SẢN PHẨM
                                   </h3>
                                   <div class="filter-option">
                                        <button type="submit">
                                             <input type="checkbox" name="" id="filter-option-4">
                                             <label for="filter-option-4">Bản giới hạn</label>
                                        </button>
                                   </div>
                                   <div class="filter-option">
                                        <button type="submit">
                                             <input type="checkbox" name="" id="filter-option-5">
                                             <label for="filter-option-5">Bộ sưu tập</label>
                                        </button>
                                   </div>
                                   <div class="filter-option">
                                        <button type="submit">
                                             <input type="checkbox" name="" id="filter-option-6">
                                             <label for="filter-option-6">Hợp tác</label>
                                        </button>
                                   </div>
                              </div>
                              <div class="filter-option-menu">
                                   <h3 class="rowtitle">
                                        màu sắc
                                   </h3>
                                   <div class="filter-option">
                                        <button type="submit">
                                             <input type="checkbox" name="" id="filter-option-4">
                                             <label for="filter-option-4">đỏ</label>
                                        </button>
                                   </div>
                                   <div class="filter-option">
                                        <button type="submit">
                                             <input type="checkbox" name="" id="filter-option-5">
                                             <label for="filter-option-5">xanh</label>
                                        </button>
                                   </div>
                                   <div class="filter-option">
                                        <button type="submit">
                                             <input type="checkbox" name="" id="filter-option-6">
                                             <label for="filter-option-6">vàng</label>
                                        </button>
                                   </div>
                              </div>
                              <div class="filter-option-menu">
                                   <h3 class="rowtitle">
                                        kích cỡ
                                   </h3>
                                   <div class="filter-option">
                                        <button type="submit">
                                             <input type="checkbox" name="" id="filter-option-4">
                                             <label for="filter-option-4">S</label>
                                        </button>
                                   </div>
                                   <div class="filter-option">
                                        <button type="submit">
                                             <input type="checkbox" name="" id="filter-option-5">
                                             <label for="filter-option-5">M</label>
                                        </button>
                                   </div>
                                   <div class="filter-option">
                                        <button type="submit">
                                             <input type="checkbox" name="" id="filter-option-6">
                                             <label for="filter-option-6">L</label>
                                        </button>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>

          </div>

          <div class="col rightcol productlistcol">
               <div class="row productlist-row">
                    <div class="col">
                         <h3>
                              TẤT CẢ SẢN PHẨM
                         </h3>
                    </div>
                    <div class="col col-sort-by">
                         <span>
                              <i class="fa-solid fa-arrow-down-wide-short"></i>
                              Sắp xếp: Tên a-z <i class="fa-solid fa-sort-down"></i>
                         </span>
                         <ul>
                              <li>Tên A-Z</li>
                              <li>Tên Z-A</li>
                              <li>Giá tăng dần</li>
                              <li>Giá giảm dần</li>
                         </ul>
                    </div>
               </div>
               <div class="row productshow-row">
                    <div class="row mx-0 mt-3 product-display-section">
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                    </div>
                    <div class="row mx-0 mt-3 product-display-section">
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                    </div>
                    <div class="row mx-0 mt-3 product-display-section">
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                    </div>
                    <div class="row mx-0 mt-3 product-display-section">
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                         <div class="col-6 col-sm-3 product-display">
                              <div class="row mx-0 product-img-section">
                                   <a href="../product/productdetail.php" class="px-0">
                                        <img src="../../lib/image/product/1.avif" alt="fef">
                                        <span>
                                             50%
                                             <br>
                                             giảm
                                        </span>
                                   </a>
                              </div>
                              <div class="row mx-0 product-infor my-2">
                                   <a href="../product/productdetail.php" class="text-decoration-none">
                                        <p class="product-name">
                                             Avita p50553
                                        </p>
                                   </a>
                                   <p class="product-price">
                                        <span class="product-price-display">
                                             25.000.000
                                        </span>
                                        <span>
                                             VNĐ
                                        </span>
                                   </p>
                              </div>
                         </div>
                    </div>


                    <!-- display page number -->
                    <div class="row mx-0 pages">
                         <form action="" method="POST">
                              <ul class="pagination justify-content-center">
                                   <li class="page-item">
                                        <button class="page-link-btn btn" type="submit" name="indexPage" value="">
                                             <i class="fa-solid fa-chevron-left"></i>
                                        </button>
                                   </li>
                                   <li class="page-item">
                                        <button class="page-link-btn btn" type="submit" name="indexPage" value="">
                                             1
                                        </button>
                                   </li>
                                   <li class="page-item active">
                                        <button class="page-link-btn btn" type="submit" name="indexPage" value="">
                                             2
                                        </button>
                                   </li>
                                   <li class="page-item">
                                        <button class="page-link-btn btn" type="submit" name="indexPage" value="">
                                             3
                                        </button>
                                   </li>
                                   <li class="page-item">
                                        <button class="page-link-btn btn" type="submit" name="indexPage" value="" id="aboutus-section">
                                             <i class="fa-solid fa-chevron-right"></i>
                                        </button>
                                   </li>
                              </ul>
                         </form>
                    </div>
               </div>
          </div>

     </div>


     <!-- footer -->
     <?php require_once "../others/footer.php" ?>

     <script src="../../lib/js/filterproduct.js"></script>
</body>

</html>