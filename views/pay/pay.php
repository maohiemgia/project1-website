<?php
if (!isset($totalPrice)) {
    $totalPrice = 0;
}
if (!isset($totalPriceBeforeUseCoupon)) {
    $totalPriceBeforeUseCoupon = 0;
}
if (!isset($content_email_body)) {
    $content_email_body = '';
}

if (isset($_SESSION['product_cart_infor'])) {
    $product_cart = $_SESSION['product_cart_infor'];
    echo "<pre>";
    // print_r($product_cart);
    echo "</pre>";
}
//creat id đơn hàng
$sql = "SELECT
            `id`
        FROM
            `don_hang`
        ORDER BY
            `id`
        DESC
        LIMIT 1";
$idNewest = querySQL($sql, 2);
$idNewest = $idNewest['id'];
$idWillUse = $idNewest + 1;

$shipfee = 40000;
foreach ($product_cart as $product) {
    $totalPrice += ($product['gia_tien_option_sp'] * $product['quantity']);
    $totalPriceBeforeUseCoupon += ($product['gia_sp'] * $product['quantity']);
}
$vatFee = (1 / ($totalPrice + $shipfee)) * 100;

$errorArr = [
    "empty" => "Lỗi chưa nhập",
    "wrong" => "Lỗi nhập sai",
    "length" => "Lỗi số lượng ký tự không phù hợp",
    "oversize" => "Kích cỡ không phù hợp"
];
$errInput = [];

if (isset($_SESSION['userLogin'])) {
    $userId = $_SESSION['userLogin']['id'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['c_email']) || isset($_POST['c_name']) || isset($_POST['c_phone']) || isset($_POST['c_note'])
        || isset($_POST['c_city']) || isset($_POST['c_district']) || isset($_POST['c_wards']) || isset($_POST['c_housenumber'])
    ) {
        $client_email = $_POST['c_email'];
        $client_name = $_POST['c_name'];
        $client_phone = $_POST['c_phone'];
        $client_note = $_POST['c_note'];
        $client_city = $_POST['c_city'];
        $client_district = $_POST['c_district'];
        $client_ward = $_POST['c_wards'];
        $client_housenumber = $_POST['c_housenumber'];

        // validate empty
        if (empty($client_email)) {
            $errInput['email'] = $errorArr['empty'] . ' email';
        }
        if (empty($client_name)) {
            $errInput['name'] = $errorArr['empty'] . ' tên';
        }
        if (empty($client_phone)) {
            $errInput['phone'] = $errorArr['empty'] . ' số điện thoại';
        }
        if (empty($_POST['c_city']) || empty($_POST['c_district']) || empty($_POST['c_wards']) || empty($_POST['c_housenumber'])) {
            $errInput['address'] = 'Lỗi chưa nhập đủ địa chỉ';
        } else {
            $client_address = $client_housenumber . ', ' . $client_ward . ', ' . $client_district . ', ' . $client_city;
        }
        // validate length
        if (strlen($client_name) > 100) {
            $errInput['name'] = $errorArr['length'] . ' ở tên tối đa 100 ký tự!';
        }
        if (strlen($client_phone) > 12 || strlen($client_phone) < 10) {
            $errInput['phone'] = $errorArr['length'] . ' ở số điện thoại yêu cầu từ 10 - 12 ký tự!';
        }
        if (strlen($client_note) > 500) {
            $errInput['note'] = $errorArr['length'] . ' ở ghi chú tối đa 500 ký tự!';
        }

        // validate email
        $inp_email = strtolower($client_email);
        if (!filter_var($inp_email, FILTER_VALIDATE_EMAIL)) {
            $errInput['email'] = $errorArr['wrong'] . " Invalid email format";
        }


        if (count($errInput) == 0) {
            if (!isset($userId)) {
                $sql = "INSERT INTO `don_hang`(
                    `id`,
                    `ten_khach_hang`,
                    `email`,
                    `sdt`,
                    `dia_chi_nhan_hang`,
                    `trang_thai_thanh_toan`,
                    `trang_thai_van_chuyen`,
                    `gia_thanh_hang`,
                    `gia_thanh_tien`,
                    `phu_phi`,
                    `ghi_chu_dh`
                    )
                    VALUES(
                    '$idWillUse',
                    '$client_name',
                    '$client_email',
                    '$client_phone',
                    '$client_address',
                    'Thanh toán khi nhận hàng',
                    'Đang đóng gói',
                    '$totalPriceBeforeUseCoupon',
                    '$totalPrice',
                    '$shipfee',
                    '$client_note'
                    )";
            } else {
                $sql = "INSERT INTO `don_hang`(
                    `id`,
                    `ten_khach_hang`,
                    `email`,
                    `sdt`,
                    `dia_chi_nhan_hang`,
                    `trang_thai_thanh_toan`,
                    `trang_thai_van_chuyen`,
                    `gia_thanh_hang`,
                    `gia_thanh_tien`,
                    `phu_phi`,
                    `ghi_chu_dh`,
                    `id_user`
                    )
                    VALUES(
                    '$idWillUse',
                    '$client_name',
                    '$client_email',
                    '$client_phone',
                    '$client_address',
                    'Thanh toán khi nhận hàng',
                    'Đang đóng gói',
                    '$totalPriceBeforeUseCoupon',
                    '$totalPrice',
                    '$shipfee',
                    '$client_note',
                    '$userId'
                    )";
            }
            querySQL($sql);
            // echo "<pre>";
            // var_dump($product_cart);
            // echo "</pre>";
            // die;
            foreach ($product_cart as $p) {
                $pId = $p['id_san_pham'];
                $pQuantity = $p['quantity'];
                $pPrice = $p['gia_sp'];
                $pSalePrice = $p['gia_tien_option_sp'];
                $pTotalPrice = $pSalePrice * $pQuantity;

                $pName = $p['ten_sp'];

                $sqlDetail = "INSERT INTO `chi_tiet_don_hang`(
                    `id_don_hang`,
                    `id_san_pham`,
                    `so_luong_sp`,
                    `gia_sp`,
                    `gia_ban`,
                    `tong_gia`
                )
                VALUES(
                    '$idWillUse',
                    '$pId',
                    '$pQuantity',
                    '$pPrice',
                    '$pSalePrice',
                    '$pTotalPrice'
                )";
                querySQL($sqlDetail);
            }
            echo "<script>alert('Tạo đơn hàng thành công!!!');</script>";

            // gửi email thông tin đơn hàng tới mail cho khách
            $maDonHang = $idWillUse;
            $email_subject = 'Thông tin đơn hàng';
            $email_head = "<br>Dưới đây là thông tin đơn hàng của bạn: 
<br>------------------------------------------------------------------------------------
------------------------------<br>Mã đơn hàng: $maDonHang<br>Người đặt hàng: " . strtoupper($client_name) . "<br>
Số điện thoại nhận hàng: $client_phone<br>";
            $email_foot =  "<br><br>Tổng tiền: " . number_format($totalPrice) .
                " VNĐ<br>Tình trạng đơn hàng: chưa thanh toán. <br>
Tình trạng giao hàng: đang giao hàng. <br>
Điểm đến: $client_address<br>
Dự kiến giao hàng trong vòng 2 tới 7 ngày. <br>Ghi chú:" . $client_note . "<br>
---------------------------------------------------------------------------------------
---------------------------<br>Cảm ơn bạn đã tin tưởng và đặt hàng, chúng tôi sẽ giao hàng nhanh nhất chất lượng nhất có thể.<br>Chúc bạn một ngày tốt lành!
<br>Liên hệ hỗ trợ: <br><pre>               <b>Nhân viên hỗ trợ 24/24: 0342 737 862</b></pre><br>
<pre>               <b>Hỗ trợ qua email: tuannvph19078@fpt.edu.vn</b></pre>";

            foreach ($product_cart as $p) {
                $pId = $p['id_san_pham'];
                $pQuantity = $p['quantity'];
                $pPrice = $p['gia_sp'];
                $pSalePrice = $p['gia_tien_option_sp'];
                $pTotalPrice = $pSalePrice * $pQuantity;
                $pName = $p['ten_sp'];

                $content_email_body = "$content_email_body <br>
   <br> Tên sản phẩm: $pName
   <br> Số lượng: $pQuantity
   <br> Thành tiền:  " . number_format($pSalePrice) . ' * ' . $pQuantity . ' = ' . number_format($pSalePrice * $pQuantity);
            }

            $email_body = "<br><b> $email_head $content_email_body $email_foot </b><br>";
            $send_email = true;
            require_once 'lib/sendemail.php';

            unset($_SESSION['product_cart_infor']);

            if (isset($_SESSION['userLogin'])) {
                echo "<script>window.location.href = '/order';</script>";
            } else {
                echo "<script>window.location.href = '/';</script>";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca716ab036.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../lib/css/pay.css">
</head>

<body>

    <main>
        <div class="row" id="path">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-12">
                <p><a href="/">Trang chủ</a> > <a href="/payment">Thanh toán</a></p>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-12">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-4 col-12" id="info">
                            <div class="title_info">
                                <h4>Thông tin nhận hàng</h4>
                            </div>
                            <?php if (isset($errInput) && count($errInput) > 0) : ?>
                                <p class="text-danger fs-3">
                                    <?php foreach ($errInput as $err) : ?>
                                        <?= $err . "<br>" ?>
                                    <?php endforeach; ?>
                                </p>
                            <?php endif; ?>
                            <div class="mb-3">
                                <input type="email" value="<?= isset($client_email) ? $client_email : '' ?>" name="c_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email nhận thông tin đơn hàng">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="c_name" value="<?= isset($client_name) ? $client_name : '' ?>" class="form-control" id="exampleInputPassword1" placeholder="Họ và tên người nhận">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="c_phone" value="<?= isset($client_phone) ? $client_phone : '' ?>" class="form-control" id="exampleInputPassword1" placeholder="Số điện thoại">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="c_city" value="<?= isset($client_city) ? $client_city : '' ?>" class="form-control" id="exampleInputPassword1" placeholder="Tỉnh/Thành phố">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="c_district" value="<?= isset($client_district) ? $client_district : '' ?>" class="form-control" id="exampleInputPassword1" placeholder="Quận/Huyện">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="c_wards" value="<?= isset($client_ward) ? $client_ward : '' ?>" class="form-control" id="exampleInputPassword1" placeholder="Phường/Xã">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="c_housenumber" value="<?= isset($client_housenumber) ? $client_housenumber : '' ?>" class="form-control" id="exampleInputPassword1" placeholder="Số nhà">
                            </div>
                            <div class="mb-3">
                                <textarea name="c_note" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ghi chú"><?= isset($client_note) ? $client_note : '' ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3 col-12" id="ship_cod">
                            <div class="ship">
                                <div class="title_ship">
                                    <h4>Vận chuyển</h4>
                                </div>
                                <div class="form-check" id="form_check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked disabled>
                                    <label class="form-check-label" for="defaultCheck1">
                                        Giao hàng tận nơi
                                    </label>
                                </div>
                            </div>
                            <div class="cod">
                                <div class="title_cod">
                                    <h4>Vận chuyển</h4>
                                </div>
                                <div class="form-check" id="form_check">
                                    <label class="form-check-label" for="defaultCheck2">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" checked disabled>
                                        Thanh toán khi nhận hàng(COD)
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-12" id="payment_products">
                            <div class="title_payment_products">
                                <h4>Đơn hàng(<?= isset($_SESSION['product_cart_infor']) ? count($_SESSION['product_cart_infor']) : '0' ?>)</h4>
                            </div>
                            <div class="order-summary__sections">
                                <div class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                                    <table class="product-table">
                                        <caption class="visually-hidden">Chi tiết đơn hàng</caption>
                                        <thead class="product-table__header">
                                            <tr>
                                                <th>
                                                    <span class="visually-hidden">Ảnh sản phẩm</span>
                                                </th>
                                                <th>
                                                    <span class="visually-hidden">Mô tả</span>
                                                </th>
                                                <th>
                                                    <span class="visually-hidden">Sổ lượng</span>
                                                </th>
                                                <th>
                                                    <span class="visually-hidden">Đơn giá</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($product_cart)) : ?>
                                                <?php foreach ($product_cart as $product) : ?>
                                                    <tr class="product">
                                                        <td class="product__image">
                                                            <div class="product-thumbnail">
                                                                <div class="product-thumbnail__wrapper" data-tg-static="">

                                                                    <img src="<?= $product['url_ha_sp'] ?>" alt="" class="product-thumbnail__image img-fluid">

                                                                </div>
                                                                <span class="product-thumbnail__quantity">
                                                                    <?= $product['quantity'] ?>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="product__description">
                                                            <span class="product__description__name">
                                                                <?= $product['ten_sp'] ?>
                                                            </span>
                                                            <br>
                                                            <?php $tempOption = $product['option_detail'];
                                                            $tempOptionSize = $product['size'];
                                                            $tempOptionColor = $product['color'];  ?>
                                                            <?php echo strlen($tempOptionColor) > 0 ? "<span>Màu sắc: $tempOptionColor</span><br>" : '' ?>
                                                            <?php echo strlen($tempOptionSize) > 0 ? "<span>Size: $tempOptionSize</span>" : '' ?>
                                                        </td>
                                                        <!-- <td class="product__quantity visually-hidden"><em>Số lượng:</em>3412</td> -->
                                                        <td class="product__price">
                                                            <?= number_format($product['gia_tien_option_sp']) . ' * ' . number_format($product['quantity'])  ?>
                                                            <br>
                                                            = <?= number_format($product['gia_tien_option_sp'] * $product['quantity'])  ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <form method="POST" class="row g-3">
                                    <div class="discount_code d-flex justify-content-between">
                                        <div class="col-auto me-3">
                                            <input type="text" class="form-control" id="inputPassword2" placeholder="Nhập mã giảm giá">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-dark mb-3">Áp dụng</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="price">
                                    <div class="temporary row">
                                        <div class="col-6">Tạm tính</div>
                                        <div class="col-6">
                                            <?= number_format($totalPrice); ?>
                                        </div>
                                    </div>
                                    <div class="transport_fee row">
                                        <div class="col-6">Phí vận chuyển</div>
                                        <div class="col-6"><?= number_format($shipfee); ?></div>
                                    </div>
                                    <div class="total row">
                                        <div class="col-6">Tổng cộng</div>
                                        <div class="col-6 fs-3">
                                            <?= number_format($totalPrice + 40000); ?> VNĐ
                                        </div>

                                    </div>
                                </div>
                                <div class="row order">
                                    <div class="col-6">
                                        <a href="/shopping-cart">
                                            <p>Quay về giỏ hàng</p>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <!-- <a href="/"> -->
                                        <button type="submit" class="btn btn-dark mb-3">Đặt hàng</button>
                                        <!-- </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-2"></div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>