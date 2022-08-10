<?php

// $_SESSION['productDetail'] = $product;

// $_SESSION['productId'] =  $product['id'];


// session_destroy();
if (!isset($gia_sp)) {
    $gia_sp = 0;
}
if (!isset($_SESSION['product-selected-option']['optionAdd'])) {
    $_SESSION['product-selected-option']['optionAdd'] = false;
}

$selectedOption = $_SESSION['product-selected-option']['id_san_pham'];

function calculate($price, $salePercent)
{
    if ($salePercent == 0) {
        return $price;
    }
    $priceSale = ($price * $salePercent) / 100;
    $price = $price - $priceSale;
    return $price;
}
$gia_sp = $_SESSION['product-selected-option']['gia_sp'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['addToCartStat'] = 1;

    if (isset($_POST['color']) && strlen($_POST['color']) > 0) {
        $_SESSION['product-selected-option']['color'] = $_POST['color'];

        if (isset($_SESSION['itemCartInc'])) {
            foreach ($_SESSION['itemCartInc'] as $idItem) {
                if ($idItem == $_SESSION['productId']) {
                    echo "<script>
                    window.location.href = '/product/{$idItem}';
                    </script>";
                    break;
                }
            }
        }

        foreach ($productOptionColor as $poc) {
            if ($poc['gia_tri_mo_ta'] == $_SESSION['product-selected-option']['color']) {
                if (!isset($gia_sp)) {
                    $gia_sp += $poc['gia_tri_tien'];
                }
                $_SESSION['product-selected-option']['gia_sp'] = $gia_sp;
                $_SESSION['salePercentColor'] = $poc['khuyen_mai'];
                $_SESSION['product-selected-option']['optionAdd'] = true;
                break;
            }
        }
    }
    if (isset($_POST['size']) && strlen($_POST['size']) > 0) {
        $_SESSION['product-selected-option']['size'] = $_POST['size'];
        $size_sp = $_SESSION['product-selected-option']['gia_sp'];
        if (isset($_SESSION['itemCartInc'])) {
            foreach ($_SESSION['itemCartInc'] as $idItem) {
                if ($idItem == $_SESSION['productId']) {
                    echo "<script>
                    window.location.href = '/product/{$idItem}';
                    </script>";
                    break;
                }
            }
        }

        foreach ($productOptionSize as $poc) {
            if ($poc['gia_tri_mo_ta'] == $_SESSION['product-selected-option']['size']) {
                $gia_sp += $poc['gia_tri_tien'];

                if ($gia_sp > $_SESSION['product-selected-option']['gia_sp']) {
                    $_SESSION['product-selected-option']['gia_sp'] = $gia_sp;
                }

                $_SESSION['salePercentSize'] = $poc['khuyen_mai'];
                $_SESSION['product-selected-option']['optionAdd'] = true;
                break;
            }
        }
    }
    if (isset($_SESSION['salePercentColor']) && isset($_SESSION['salePercentSize'])) {
        if ($_SESSION['salePercentColor'] > $_SESSION['salePercentSize']) {
            $_SESSION['product-selected-option']['khuyen_mai'] = $_SESSION['salePercentColor'];
        } else {
            $_SESSION['product-selected-option']['khuyen_mai'] = $_SESSION['salePercentSize'];
        }
    }

    // echo $_SESSION['product-selected-option']['gia_sp'];
    // echo calculate($_SESSION['product-selected-option']['gia_sp'], $_SESSION['product-selected-option']['khuyen_mai']);
}


function checkSelected($template, $string)
{
    if (isset($template) && isset($string)) {
        if ($template == $string) {
            echo "input-selected";
        } else {
            echo "";
        }
    }
}


function addToCartCheck($status)
{
    if ($status) {
        echo  "";
    } else {
        echo "hidden";
    }
}

// check xem sản phẩm đã có trong wishlist hay chưa
// echo $data['check_pro_in_wl'];
echo "<pre>";
// print_r($_SESSION);
// print_r($productOptionColor);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="../../lib/css/productdetail.css">
</head>

<body>

    <!--Hiển thị thông báo-->
    <?php if (isset($_SESSION['message']) && $_SESSION['message'][1] == 1) : ?>
    <!-- <div class="text-center fs-2 fw-bold text-danger"> -->
    <script>
    window.alert(" <?= $_SESSION['message'][0] ?> ");
    </script>
    <!-- </div> -->
    <?php $_SESSION['message'][1] = 0; ?>
    <?php endif ?>

    <main>
        <p class="ms-sm-5 mx-2 mb-sm-5 link-title-path">
            Trang chủ
            <i class="fa-solid fa-chevron-right"></i>
            Sản phẩm
            <i class="fa-solid fa-chevron-right"></i>
            <?= $product['ten_sp']; ?>
        </p>
        <div class="row mx-0 justify-content-center">
            <div class="col-12 col-sm-4 product-img text-center d-flex flex-sm-row flex-column">
                <img src="<?= $product['url_ha_sp'] ?>" alt="img">
                <div class="row mx-0">
                    <?php foreach ($productArr as $p) : ?>
                    <div class="col">
                        <img src="<?= $p['url_ha_sp'] ?>" alt="img">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col col-sm-8 text-center text-sm-start product-detail ms-sm-3">
                <p class="product-name-header fw-bolder fs-3 text-capitalize">
                    <?= $product['ten_sp']; ?>
                </p>
                <p class="product-view">
                    <?= $product['luot_xem_sp']; ?>
                    <i class="fa-solid fa-eye"></i>
                </p>
                <div class="product-option">
                    <div class="option-color">
                        <?php if (count($productOptionColor) > 0) : ?>
                        <label>Màu sắc</label>
                        <form method="post">
                            <?php foreach ($productOptionColor as $po) : ?>
                            <input type="submit" name="color" value="<?= $po['gia_tri_mo_ta'] ?>"
                                class="<?php checkSelected($_SESSION['product-selected-option']['color'], $po['gia_tri_mo_ta']) ?>">
                            <?php endforeach; ?>
                        </form>
                        <?php endif; ?>

                    </div>
                    <div class="option-size">
                        <?php if (count($productOptionSize) > 0) : ?>
                        <label>Size</label>
                        <form method="post">
                            <?php foreach ($productOptionSize as $po) : ?>
                            <input type="submit" name="size" value="<?= $po['gia_tri_mo_ta'] ?>"
                                class="<?php checkSelected($_SESSION['product-selected-option']['size'], $po['gia_tri_mo_ta']) ?>">
                            <?php endforeach; ?>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
                <p class="product-price d-flex align-items-center flex-wrap">
                    <i class="fa-solid fa-coins money-icon"></i>
                    <?php if (isset($_SESSION['product-selected-option']['khuyen_mai']) && $_SESSION['product-selected-option']['khuyen_mai'] > 0) : ?>
                    <span class="mx-auto ps-0 mx-sm-0 beforesale saleprice">
                        <?= number_format(
                                $_SESSION['product-selected-option']['gia_sp']
                            ) ?>
                    </span>
                    <?php endif; ?>

                    <span class="aftersalesale rawprice">
                        <?php $rawprice = calculate($_SESSION['product-selected-option']['gia_sp'], $_SESSION['product-selected-option']['khuyen_mai']) ?>
                        <?= number_format($rawprice); ?>
                        <?php $_SESSION['product-selected-option']['gia_tien_option_sp'] = $rawprice; ?>
                    </span>
                    <sup>VNĐ</sup>

                    <?php if (isset($_SESSION['product-selected-option']['khuyen_mai']) && $_SESSION['product-selected-option']['khuyen_mai'] > 0) : ?>
                    <span class="salepercent">
                        <?= $_SESSION['product-selected-option']['khuyen_mai'] ?>
                        % giảm
                    </span>
                    <?php endif; ?>
                </p>
                <p class="product-des mt-5">
                    <span class="fw-bolder fs-4 text-capitalize">
                        Mô tả sản phẩm:
                    </span>
                    <br>
                    <?= $product['mo_ta_sp']; ?>
                </p>
                <div class="product-user-function">
                    <form action="<?php if (isset($_SESSION['userLogin']['id'])) {
                                        echo "/wishlist?id_sp=" . $product['id_san_pham'] . "&id_user=" . $_SESSION['userLogin']['id'];
                                    } else {
                                        echo "/login";
                                    }
                                    ?>" method="POST">
                        <button name="thao_tac_wishlist" type="submit" id="add-to-wishlist"
                            class="btn add-to-wishlist-btn"
                            value="<?php if ($data['check_pro_in_wl'] == 0) { echo "0";} else { echo "1";}?>">
                            <?php
                            if ($data['check_pro_in_wl'] == 0) {
                                echo "Thêm vào Wishlist";
                            } else {
                                echo "Xóa khỏi Wishlist";
                            }
                            ?>
                        </button>
                    </form>
                    <form action="/check-shopping-cart" method="POST">
                        <button type="submit" id="add-to-cart"
                            class="btn add-to-cart-btn <?= addToCartCheck($_SESSION['product-selected-option']['optionAdd']) ?>"
                            name="addtocart">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mx-0 ms-sm-3 mt-sm-5 mx-3 mx-sm-4">
            <p class="product-des mt-5">
                <span class="fw-bolder fs-4 text-capitalize">
                    Bình luận (50):
                </span>
            </p>
            <p class="text-center">
                Bạn cần
                <a class="fw-bold fs-5" href="./login.php">Đăng nhập </a>
                để có thể bình luận
            </p>

            <div class="row mx-0 comment-section p-sm-3 py-4 py-sm-5 mb-3">
                <div class="row">
                    <p class="error text-danger fw-bold text-capitalize text-center text-decoration-underline">
                        <?= isset($err) ? $err : '' ?>
                    </p>
                    <div class="col-3 w-auto m-auto">
                        <img class="rounded-circle w-auto avt-comment" src="../../lib/image/product/pepe3.png"
                            alt="image">
                        <p class="text-center w-auto fw-bold">user50534</p>
                    </div>
                    <div class="col w-auto">
                        <form action="" method="post">
                            <input type="text" name="comment" placeholder="nhập bình luận vào đây"
                                class="w-100 comment-input">
                            <input type="submit" value="Comment" class="submit-input">
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mx-0 comment-section p-sm-3 py-5">

                <div class="row py-2">
                    <div class="col-3 w-auto m-auto">
                        <img class="rounded-circle w-auto avt-comment" src="../../lib/image/product/pepe5.png"
                            alt="image">
                        <p class="text-center w-auto fw-bold">Dương Quá</p>
                    </div>
                    <div class="col w-auto">
                        <p class="date-comment fw-bold">
                            22-05-2022
                        </p>
                        <p class="comment-content">cũng đẹp đấy</p>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-3 w-auto m-auto">
                        <img class="rounded-circle w-auto avt-comment" src="../../lib/image/product/pepe5.png"
                            alt="image">
                        <p class="text-center w-auto fw-bold">Dương Quá</p>
                    </div>
                    <div class="col w-auto">
                        <p class="date-comment fw-bold">
                            22-05-2022
                        </p>
                        <p class="comment-content">cũng đẹp đấy</p>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-3 w-auto m-auto">
                        <img class="rounded-circle w-auto avt-comment" src="../../lib/image/product/pepe5.png"
                            alt="image">
                        <p class="text-center w-auto fw-bold">Dương Quá</p>
                    </div>
                    <div class="col w-auto">
                        <p class="date-comment fw-bold">
                            22-05-2022
                        </p>
                        <p class="comment-content">cũng đẹp đấy</p>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-3 w-auto m-auto">
                        <img class="rounded-circle w-auto avt-comment" src="../../lib/image/product/pepe5.png"
                            alt="image">
                        <p class="text-center w-auto fw-bold">Dương Quá</p>
                    </div>
                    <div class="col w-auto">
                        <p class="date-comment fw-bold">
                            22-05-2022
                        </p>
                        <p class="comment-content">cũng đẹp đấy</p>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-3 w-auto m-auto">
                        <img class="rounded-circle w-auto avt-comment" src="../../lib/image/product/pepe5.png"
                            alt="image">
                        <p class="text-center w-auto fw-bold">Dương Quá</p>
                    </div>
                    <div class="col w-auto">
                        <p class="date-comment fw-bold">
                            22-05-2022
                        </p>
                        <p class="comment-content">cũng đẹp đấy</p>
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
                                <button class="page-link-btn btn" type="submit" name="indexPage" value=""
                                    id="aboutus-section">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </main>



</body>

</html>