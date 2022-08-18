<?php
// phân trang hiển thị
$productArr = array();
$indexDisplay = 0;

$productArr = array_chunk($product, 16);

if (isset($_POST['indexPage'])) {
    $indexPage = $_POST["indexPage"];
} else {
    $indexPage = 0;
}
$indexDisplay = $indexPage;
$nowIndexFrom = ($indexDisplay + 1) * 8;


echo "<pre>";
// print_r($productArr[0]);
echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product page</title>

    <link rel="stylesheet" href="../../lib/css/product.css">

</head>

<body>


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
                            <?php foreach ($data['loai_hang'] as $value) : ?>
                                <?php extract($value); ?>
                                <li>
                                    <div class="sub-dropdown">
                                        <a href="#">
                                            <?php echo $ten_lh  ?>
                                        </a>
                                        <span class="view-more-btn">
                                            <i class="fa-solid fa-plus"></i>
                                        </span>
                                    </div>
                                    <ul class="sub-sub-dropdown">
                                        <?php foreach ($data['doi_tuong_lh'] as $val) : ?>
                                            <?php
                                            extract($val);
                                            if ($value['id'] == $val['id']) {
                                                echo '<li>
                                                            <a href="#">
                                                                 ' . $doi_tuong . '
                                                            </a>
                                                       </li>';
                                            }
                                            ?>
                                        <?php endforeach; ?>

                                    </ul>
                                </li>

                            <?php endforeach; ?>


                            <!-- 
                                   <?php foreach ($data['doi_tuong_lh'] as $val) : ?>
                                        <?php
                                        extract($val);
                                        ?>
                                        <li>
                                             <a href="#">
                                                  ' . $doi_tuong . '
                                             </a>
                                        </li>

                                   <?php endforeach; ?> -->

                            <!-- <li>
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
                                   </li> -->
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
                    <?php if (!empty($data['product'])) : ?>
                        <?php foreach ($productArr[$indexDisplay] as $p) : ?>
                            <div class="col-6 col-sm-3 product-display">
                                <div class="row mx-0 product-img-section">
                                    <a href="/product/<?= $p['id_san_pham'] ?>" class="px-0">
                                        <img src="<?= $p['url_ha_sp'] ?>" alt="fef">
                                        <span>
                                            <?php foreach ($sale as $s) : ?>
                                                <?php if ($s['id_san_pham'] == $p['id_san_pham']) : ?>
                                                    <?= $s['khuyen_mai']; ?>%
                                                    <?php break; ?>
                                                <?php else : ?>
                                                    <?= 0 ?>%
                                                    <?php break; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <br>
                                            giảm
                                        </span>
                                    </a>
                                </div>
                                <div class="row mx-0 product-infor my-2">
                                    <a href="/product/<?= $p['id_san_pham'] ?>" class="text-decoration-none">
                                        <p class="product-name">
                                            <?= $p['ten_sp'] ?>
                                        </p>
                                    </a>
                                    <p class="product-price">
                                        <span class="product-price-display">
                                            <?= number_format($p['gia_sp']) ?>
                                        </span>
                                        <span>
                                            VNĐ
                                        </span>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Không có sản phẩm</p>
                    <?php endif; ?>

                    <!-- <div class="col-6 col-sm-3 product-display">
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
                         </div> -->
                </div>

                <!-- display page number -->
                <!-- <div class="row mx-0 pages">
                    <form method="POST">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <button class="page-link-btn btn" type="submit" name="indexPage" value="">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </button>
                            </li>
                            <?php foreach ($productArr as $pA) : ?>
                                <li class="page-item">
                                    <button class="page-link-btn btn" type="submit" name="indexPage" value="">
                                        <?= $pA ?>
                                    </button>
                                </li>
                            <?php endforeach; ?>
                <li class="page-item">
                    <button class="page-link-btn btn" type="submit" name="indexPage" value="" id="aboutus-section">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </li>
                </ul>
                </form> -->
            </div>
        </div>
    </div>


    </div>




    <script src="../../lib/js/filterproduct.js"></script>
</body>

</html>