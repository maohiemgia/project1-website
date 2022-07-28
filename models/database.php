<?php

$host = 'localhost';
$dbname = 'du_an_1';
$user = 'root';
$password = '';

function connection()
{
     global $host, $dbname, $user, $password;

     try {
          $connect = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $user, $password);
          // echo "ket noi thanh cong";
          return $connect;
     } catch (PDOException $e) {
          echo "Query to DB bug:<br>" . $e->getMessage();
          throw $e;
     }
}


function querySQL($sql, $fetchdata = 0, $fetchid = -1)
{
     $connect = connection();
     $stmt = $connect->prepare($sql);

     try {
          if ($fetchdata == 0) {
               return $stmt->execute();
          }
          if ($fetchdata == 1) {
               if ($fetchid > -1) {
                    $stmt->execute([$fetchid]);
                    return $stmt->fetch(PDO::FETCH_ASSOC);
               }
               $stmt->execute();
               return $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
     } catch (PDOException $err) {
          echo "Query to DB bug:<br>" . $err->getMessage();
     } finally {
          unset($stmt, $connect);
     }
}
