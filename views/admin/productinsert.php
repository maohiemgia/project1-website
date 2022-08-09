<?php
if (session_status() === PHP_SESSION_NONE) {
     session_start();
}
require_once '../global.php';

$_SESSION['menu'] = 3;

if (!isset($_SESSION['userLogin']) || $_SESSION['userLogin']['user_role'] == 0) {
     header('location: ../index.php');
     exit();
}
$sql = "select * from `category`";
$cateArr = queryDB($sql, 1);

$sql = "SELECT
p.*,
c.category_name
FROM
`product` p
LEFT JOIN category c ON
c.category_id = p.category_id
ORDER BY
product_date_added
DESC
";
$productArrDB = queryDB($sql, 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (!isset($err)) {
          $err = array();
     }

     $inp_name = strtolower($_POST['productname']);
     $inp_price = $_POST['productprice'];
     $inp_quantity = $_POST['productquantity'];
     $inp_cate = $_POST['productcate'];
     $inp_dateadd = $_POST['productdateadd'];
     $inp_img = $_FILES['productimg'];
     $inp_sale = $_POST['productsale'];
     $inp_special = $_POST['productspecial'];
     $inp_descr = $_POST['mota'];

     //validate name
     if (empty($inp_name)) {
          $err['name'] = $errorArr['empty'];
     } else if (strlen($inp_name) < 2 || strlen($inp_name) > 200) {
          $err['name'] = $errorArr['length'] . " Trong khoảng 2 đến 200 ký tự!";
     }

     // validate price
     if ($inp_price < 0 || $inp_price > 999999999) {
          $err['price'] = $errorArr['wrong'] . " Trong khoảng 0 đến 999999999!";
     }

     // validate quantitty
     if ($inp_quantity < 0 || $inp_quantity > 999999999) {
          $err['quantity'] = $errorArr['wrong'] . " Trong khoảng 0 đến 999999999!";
     }

     // validate sale
     if ($inp_sale < 0 || $inp_sale > 100) {
          $err['sale'] = $errorArr['wrong'] . " Trong khoảng 0 đến 100!";
     }

     // validate description
     if (empty($inp_descr)) {
          $inp_descr = 'không có mô tả';
     } else if (strlen($inp_descr) > 1500) {
          $err['des'] = $errorArr['length'] . " Tối đa 1500 ký tự!";
     }

     // validate date add
     if (empty($inp_dateadd)) {
          $err['date'] = "Lỗi chưa chọn thời gian";
     }

     // validate img
     $img_tail = array('jpg', 'png', 'gif', 'jpeg');
     if ($inp_img['size'] < 1) {
          $err['img'] = $errorArr['oversize'];
     } else if ($inp_img['size'] > 3072000) { // <3mb
          $err['img'] = $errorArr['oversize'] . ". Quá lớn";
     } else {
          $upload_ext = pathinfo($inp_img['name'], PATHINFO_EXTENSION);
          if (!in_array($upload_ext, $img_tail)) {
               $err['img'] = $errorArr['wrong'] . ". Chỉ hỗ trợ JPG, PNG, GIF, JPEG";
          }
     }

     if (empty($err)) {
          $inp_img_name = $inp_img['name'];
          $notifi = "Cập nhật thành công";
          move_uploaded_file($inp_img['tmp_name'], '../content/img/' . $inp_img_name);

          $sql = "
          INSERT INTO `product`(
               `product_name`,
               `product_price`,
               `product_img`,
               `product_quantity`,
               `product_description`,
               `category_id`,
               `product_date_added`,
               `product_discount`,
               `product_special`
           )
           VALUES(
               '$inp_name',
               '$inp_price',
               '$inp_img_name',
               '$inp_quantity',
               '$inp_descr',
               '$inp_cate',
               '$inp_dateadd',
               '$inp_sale',
               '$inp_special'
           )";

          queryDB($sql);
          header('location: ./product.php?mess=Thêm thành công');
     }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>admin - insert category</title>
     <link rel="stylesheet" href="../content/css/login.css">
     <link rel="stylesheet" href="../content/css/profile.css">
     <link rel="stylesheet" href="../content/css/manage.css">
     <link rel="stylesheet" href="../content/css/productdetail.css">
</head>

<body>
     <?php
     require_once "../site/menu.php";
     ?>

     <div class="row mx-0 manage-link-section p-3 ps-sm-5" style="min-height: 300px;">
          <h2 class="text-capitalize fw-bold fs-2 px-0">Thêm hàng hóa</h2>

          <!-- <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
               <?= isset($err) ? $err : '' ?>
          </p> -->
          <form action="" method="post" enctype="multipart/form-data">
               <label class="px-0 py-2" for="#">Mã hàng hóa</label>
               <input type="text" class="w-50 d-block inputid" placeholder="auto number" readonly>

               <label class="px-0 py-2" for="#">tên hàng hóa</label>
               <input type="text" class="w-75 d-block inputname" placeholder="nhập tên hàng" name="productname" value="<?= isset($inp_name) ? $inp_name : '' ?>">
               <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                    <?= isset($err['name']) ? $err['name'] : '' ?>
               </p>

               <label class="px-0 py-2" for="#">đơn giá (vnđ)</label>
               <input type="number" class="w-50 d-block inputname" placeholder="nhập giá hàng" name="productprice" value="<?= isset($inp_price) ? $inp_price : '' ?>">
               <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                    <?= isset($err['price']) ? $err['price'] : '' ?>
               </p>

               <label class="px-0 py-2" for="#">số lượng</label>
               <input type="number" class="w-50 d-block inputname" placeholder="nhập số lượng hàng" name="productquantity" value="<?= isset($inp_quantity) ? $inp_quantity : '' ?>">
               <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                    <?= isset($err['quantity']) ? $err['quantity'] : '' ?>
               </p>

               <label class="px-0 py-2 d-flex" for="#">loại hàng
                    <select name="productcate" class="ms-5">
                         <?php foreach ($cateArr as $c) : ?>
                              <option value="<?= $c['category_id'] ?>" <?= isset($inp_cate) && $inp_cate == $c['category_id'] ? 'selected' : '' ?>>
                                   <?= $c['category_name'] ?>
                              </option>
                         <?php endforeach; ?>
                    </select>
               </label>
               <label class="px-0 py-2" for="#">ngày nhập</label>
               <input type="datetime-local" class="w-sm-25 d-block inputname" placeholder="nhập ngày nhập hàng" name="productdateadd" value="<?= isset($inp_dateadd) ? $inp_dateadd : '' ?>">
               <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                    <?= isset($err['date']) ? $err['date'] : '' ?>
               </p>

               <label class="px-0 py-2" for="#">hình ảnh</label>
               <input type="file" class="w-100 inputname" name="productimg">
               <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                    <?= isset($err['img']) ? $err['img'] : '' ?>
               </p>

               <label class="px-0 py-2" for="#">giảm giá (%)</label>
               <input type="number" value="0" class="w-sm-25 d-block inputname" placeholder="nhập % giảm giá" name="productsale">
               <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                    <?= isset($err['sale']) ? $err['sale'] : '' ?>
               </p>

               <label class="px-0 py-2" for="#">số lượt xem</label>
               <input type="number" class="w-25 d-block inputname" name="productview" placeholder="0" readonly style="background: #e6e6e6;">

               <label class="px-0 py-2 d-flex" for="#">kiểu hàng
                    <select name="productspecial" class="ms-5">
                         <option value="0" <?= isset($inp_special) && $inp_special == 0 ? 'selected' : '' ?>>
                              hàng bình thường
                         </option>
                         <option value="1" <?= isset($inp_special) && $inp_special == 1 ? 'selected' : '' ?>>
                              hàng đặc biệt
                         </option>
                    </select>
               </label>

               <label class="px-0 py-2 d-flex" for="#">Mô tả</label>
               <textarea name="mota" cols="30" rows="10" placeholder="mô tả sản phẩm"></textarea>
               <p class="error text-danger fw-bold text-capitalize text-decoration-underline">
                    <?= isset($err['des']) ? $err['des'] : '' ?>
               </p>
               <br>

               <input class="insert_foot_btn" type="submit" value="Thêm mới">
               <a class="insert_foot_btn" href="./product.php">Trở về</a>
          </form>
     </div>
     <!-- footer -->
     <?php require_once "../site/footer.php"; ?>

</body>

</html>