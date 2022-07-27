<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Product</title>
</head>

<body>
     <?php foreach ($product as $p) : ?>
          <a href="../product/<?= $p['product_id'] ?>">
               <?= $p['product_name'] ?>
          </a>
          <br>
     <?php endforeach; ?>
</body>

</html>