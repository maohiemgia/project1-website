<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/tracuudonhang" method="POST">
        <div>
            Nhập mã đơn hàng:
            <input type="text" name="tra_cuu_don_hang">
            <button>TRA CỨU</button>
        </div>
        <?php 
        if(isset($data['thongbao_tra_cuu'])){
            echo $data['thongbao_tra_cuu'];
        }
        ?>
    </form>
</body>
</html>