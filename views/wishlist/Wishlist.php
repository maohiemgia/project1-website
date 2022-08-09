<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wish list</title>
    <link rel="stylesheet" href="../../lib/css/Wishlist.css">
    <script language="javascript" src="../../lib/js/vocher.js"></script>
</head>

<body></body>
<main>
    <div class="row" id="path">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-12">
            <p><a href="/">Trang chủ</a> > <a href="<?= $_SESSION['userLogin']['id']; ?>">Yêu thích</a></p>
            <!-- đã tồn tại user mới vàod đk đây nên ko cần if -->
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-12">
            <div class="row" id="title_wishlist">
                <h4>SẢN PHẨM YÊU THÍCH</h4>
            </div>
            <div class="row" id="wishlist_product">
                <!-- <div class="col-md-3 col-sm-6 col-12">
                        <div class="image">
                            <a href=""><img src="../../lib/image/img/ao-polo-gucci-gg-stretch-cotton-polo-mau-xanh-green-62d52ff294d58-18072022170330.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <a href="">
                            <h6>Áo Polo Gucci GG Stretch Cotton Polo Màu Xanh Green</h6>
                        </a>
                        <p>1.990.000</p>
                    </div> -->
                <?php
                if (isset($data['wish_list']) && $data['wish_list'] != "") {
                    foreach ($data['wish_list'] as $value) {
                        extract($value);
                        echo '
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="image">
                                            <a href=""><img
                                                src="' . $url_ha_sp . '"
                                                alt="" class="img-fluid"></a>
                                        </div>
                                        <a href="/product/' . $id . '">
                                            <h6>' . $ten_sp . '</h6>
                                        </a>
                                        <p>' . number_format($gia_sp) . ' VND</p>
                                    </div>
                                ';
                    }
                }

                ?>

            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
    </div>
</main>
<?php
// if (isset($thong_bao) && $thong_bao != "") {
//     foreach ($thong_bao as $va) {
//         extract($va);
//         echo '
//         <script>
//         window.alert("' . $va . '");
//         </script>
//         ';
//     }
// }
if (isset($thong_bao) && $thong_bao != "") {
        echo '
        <script>
        window.alert("' . $thong_bao . '");
        </script>
        ';
    
}
?>
</body>

</html>