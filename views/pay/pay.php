<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
                <p><a href="../home/index.php">Trang chủ</a> > <a href="./pay.php">Thanh toán</a></p>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-12">
                <div class="row">
                    <div class="col-md-4 col-12" id="info">
                        <div class="title_info">
                            <h4>Thông tin nhận hàng</h4>
                        </div>
                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    placeholder="Họ và tên">
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control" id="exampleInputPassword1"
                                    placeholder="Số điện thoại">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    placeholder="Tỉnh/Thành phố">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    placeholder="Quận/Huyện">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    placeholder="Phường/Xã">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    placeholder="Địa chỉ chi tiết">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Ghi chú"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 col-12" id="ship_cod">
                        <div class="ship">
                            <div class="title_ship">
                                <h4>Vận chuyển</h4>
                            </div>
                            <div class="form-check" id="form_check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Thanh toán khi nhận hàng(COD)
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12" id="payment_products">
                        <div class="title_payment_products">
                            <h4>Đơn hàng(2 sản phẩm)</h4>
                        </div>
                        <div class="order-summary__sections">
                            <div
                                class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
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

                                        <tr class="product">
                                            <td class="product__image">
                                                <div class="product-thumbnail">
                                                    <div class="product-thumbnail__wrapper" data-tg-static="">

                                                        <img src="./img/ao-polo-gucci-gg-stretch-cotton-polo-mau-xanh-green-62d52ff294d58-18072022170330.jpg"
                                                            alt="" class="product-thumbnail__image img-fluid">

                                                    </div>
                                                    <span class="product-thumbnail__quantity">1</span>
                                                </div>
                                            </td>
                                            <th class="product__description">
                                                <span class="product__description__name">

                                                    Áo Polo Nam Dệt Đường Line 2 Màu Vải Pique
                                                </span>


                                            </th>
                                            <td class="product__quantity visually-hidden"><em>Số lượng:</em> 1</td>
                                            <td class="product__price">

                                                349.000₫

                                            </td>
                                        </tr>

                                        <tr class="product">
                                            <td class="product__image">
                                                <div class="product-thumbnail">
                                                    <div class="product-thumbnail__wrapper" data-tg-static="">

                                                        <img src="./img/ao-polo-gucci-gg-stretch-cotton-polo-mau-xanh-green-62d52ff294d58-18072022170330.jpg"
                                                            alt="" class="product-thumbnail__image img-fluid">

                                                    </div>
                                                    <span class="product-thumbnail__quantity">1</span>
                                                </div>
                                            </td>
                                            <th class="product__description">
                                                <span class="product__description__name">

                                                    Set đồ tập nữ áo ngắn tay Icado AH1 và quần Legging Icado QD23
                                                </span>


                                            </th>
                                            <td class="product__quantity visually-hidden"><em>Số lượng:</em> 1</td>
                                            <td class="product__price">

                                                525.000₫

                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="discount_code">
                                <form class="row g-3">
                                    <div class="col-auto">
                                      <input type="text" class="form-control" id="inputPassword2" placeholder="Nhập mã giảm giá">
                                    </div>
                                    <div class="col-auto">
                                      <button type="submit" class="btn btn-dark mb-3">Áp dụng</button>
                                    </div>
                                  </form>
                            </div>
                            <div class="price">
                                <div class="temporary row">
                                    <div class="col-6">Tạm tính</div>
                                    <div class="col-6" >874.000đ</div>
                                </div>
                                <div class="transport_fee row">
                                    <div class="col-6">Phí vận chuyển</div>
                                    <div class="col-6">40.000đ</div>
                                </div>
                                <div class="total row">
                                    <div class="col-6">Tổng cộng</div>
                                    <div class="col-6">914.000đ</div>

                                </div>
                            </div>
                            <div class="row order">
                                <div class="col-6">
                                    <a href="../shoppingcart/shoppingCart.php"><p>Quay về giỏ hàng</p></a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-dark mb-3">Đặt hàng</button>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </main>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
        crossorigin="anonymous"></script>
</body>

</html>