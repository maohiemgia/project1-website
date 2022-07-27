<?php
//dinh tuyen cho duong dan cua website

$routes = [];

// khai báo hàm route định tuyến website
// $path là đường dẫn
// $callback là hành động tương ứng với đường dẫn

function route($path, $callback)
{
     global $routes;
     $routes[$path] = $callback;
}


// khai báo hàm run - xác định các route thích hợp để chạy hành động
// hàm này sẽ xác định các đường dẫn ($path) thích hợp để chạy hành động $callback

function run()
{
     global $routes;

     // lấy đường dẫn hiện tại của website
     $requestURI = parse_url($_SERVER['REQUEST_URI']);
     $uri = $requestURI['path'];

     // $found = false;
     $action = null;

     //parameter 
     $params = [];

     foreach ($routes as $path => $callback) {
          $params = [];

          if ($path === $uri) {
               $action = $callback;
          } elseif (strpos($path, '{')) {
               if (strpos($path, '}')) {
                    $pathDefined = explode('/', trim($path, '/'));
                    $pathUri = explode('/', trim($uri, '/'));

                    // echo "<pre>";
                    // print_r($pathDefined);
                    // print_r($pathUri);
                    // echo "</pre>";

                    // so sánh độ dài của 2 mảng
                    if (count($pathDefined) === count($pathUri)) {
                         // duyệt qua từng phần tử mảng của path được định nghĩa để so sánh với path Uri => lấy params
                         foreach ($pathDefined as $k => $p) {
                              // $k :key, $p :path
                              if ($p === $pathUri[$k]) {
                                   $action = $callback;
                                   continue;
                              }
                              if (preg_match('/^{\w+}$/', $p)) {
                                   $params[] = $pathUri[$k];
                              }
                         }
                    }
               }
          }
     }

     if (!$action) {
          $fileNotFound = $routes['/404'];
          return $fileNotFound();
     }
     if (is_callable($action)) {
          return call_user_func_array($action, $params);
     }


     // foreach ($routes as $path => $callback) {
     //      if ($path !== $uri) {
     //           continue;
     //      }

     //      $found = true;
     //      $callback();
     // }

     // if ($found == false) {
     //      $fileNotFound = $routes['/404'];
     //      return $fileNotFound();
     // }




     echo "<pre>";

     // print_r($uri);
     // kiểm tra thông tin website server
     // print_r($_SERVER);

     echo "</pre>";
}
