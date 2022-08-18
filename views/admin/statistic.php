<?php

$sql = "SELECT
     COUNT(dh.id) 'quantity',
     dh.trang_thai_van_chuyen AS 'status'
     FROM
     `don_hang` dh
     GROUP BY dh.trang_thai_van_chuyen;";

$countProductByCate = querySQL($sql, 1);
$dataPoints = array();

foreach ($countProductByCate as $row) {
     $quantity = $row['quantity'];
     $category_name = $row['status'];

     array_push($dataPoints, array("label" => $category_name, "y" => $quantity));
}


?>

<!DOCTYPE HTML>
<html>

<head>
     <script>
          window.onload = function() {

               var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    exportEnabled: true,
                    title: {
                         text: "Thống kê đơn hàng theo trạng thái đơn hàng"
                    },
                    subtitles: [{
                         text: "Đơn vị: Đơn"
                    }],
                    data: [{
                         type: "pie",
                         showInLegend: "true",
                         legendText: "{label}",
                         indexLabelFontSize: 16,
                         indexLabel: "{label} - #percent%",
                         yValueFormatString: "#,##0",
                         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
               });
               chart.render();

          }
     </script>

     <!-- Latest compiled and minified CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- Latest compiled JavaScript -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

     <style>
          .btn-primary {
               margin: 50px 120px;
               width: 100px;
               text-align: center;
          }
     </style>
</head>

<body>
     <div class="container-fluid d-flex flex-lg-row flex-sm-column mt-5">
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
          <br>
          <div class="mt-5 mt-sm-0" id="chartContainer2" style="height: 370px; width: 100%;"></div>
     </div>

     <a class="btn btn-primary" href="/admin">Trở về</a>

     <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>