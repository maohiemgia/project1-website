<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>THÔNG TIN ĐƠN HÀNG</h2>
    <ul>
        <li>Tên khách hàng: <?= isset($data['thongtindonhang']['0']['ten_khach_hang']) ? $data['thongtindonhang']['0']['ten_khach_hang'] : "Sai cột tên người dùng"; ?></li>
        <li>Số điện thoại: <?= isset($data['thongtindonhang']['0']['sdt']) ? "******".substr($data['thongtindonhang']['0']['sdt'],6) : "Sai cột tên người dùng"; ?></li>
        <li>Thời gian đặt hàng: <?= isset($data['thongtindonhang']['0']['thoi_gian_dat_hang']) ? $data['thongtindonhang']['0']['thoi_gian_dat_hang'] : "Sai cột tên người dùng"; ?></li>
        <li>Trạng thái thanh toán: <?= isset($data['thongtindonhang']['0']['trang_thai_thanh_toan']) ? $data['thongtindonhang']['0']['trang_thai_thanh_toan'] : "Sai cột tên người dùng"; ?></li>
        <li>Trạng thái vận chuyển: <?= isset($data['thongtindonhang']['0']['trang_thai_van_chuyen']) ? $data['thongtindonhang']['0']['trang_thai_van_chuyen'] : "Sai cột tên người dùng"; ?></li>
        <li>Giá thành hàng: <?= isset($data['thongtindonhang']['0']['gia_thanh_hang']) ? number_format($data['thongtindonhang']['0']['gia_thanh_hang'])." VND" : "Sai cột tên người dùng"; ?></li>
        <li>Giá thành tiền: <?= isset($data['thongtindonhang']['0']['gia_thanh_tien']) ? number_format($data['thongtindonhang']['0']['gia_thanh_tien'])." VND" : "Sai cột tên người dùng"; ?></li>
        <li>Phụ phí: <?= isset($data['thongtindonhang']['0']['phu_phi']) ? number_format($data['thongtindonhang']['0']['phu_phi'])." VND" : "Sai cột tên người dùng"; ?></li>
        <li>Ghi chú đơn hàng: <?= isset($data['thongtindonhang']['0']['ghi_chu_dh']) ? $data['thongtindonhang']['0']['ghi_chu_dh'] : "Sai cột tên người dùng"; ?></li>

        <?php
        foreach ($data['thongtindonhang'] as $key => $value) {
            extract($value);
        ?>
            <li>
                Sản phẩm <?= $key + 1 ?>
                <ul>
                    <li>
                        <a href="/product/<?= $id_san_pham ?>">Tên sản phẩm: <?= $ten_sp ?></a>
                    </li>
                    <li>
                        <a href="/product/<?= $id_san_pham ?>"><img src="<?= $url_ha_sp ?>" alt="<?= $alt_ha_sp ?>" width="70" height="70"></a>
                    </li>
                    <li>
                        Giá sản phẩm: <?= $gia_sp ?>
                    </li>
                    <li>
                        Số lượng sản phẩm: <?= $so_luong_sp ?>
                    </li>
                    <li>
                        Tổng giá: <?= $tong_gia ?>
                    </li>
                    <li>
                        Thông tin thêm: <?= $thong_tin_them ?>
                    </li>
                </ul>
            </li>
        <?php
        }
        ?>
    </ul>
</body>

</html>