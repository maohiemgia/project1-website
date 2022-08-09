<?php

$host = 'localhost';
$dbname = 'du_an_1';
$user = 'root';
$password = '';
// $host = 'sql109.byethost12.com';
// $dbname = 'b12_32077860_guccivn';
// $user = 'b12_32077860';
// $password = 'Anhbn123';

function connection()
{
     global $host, $dbname, $user, $password;
     try {
          $connect = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $user, $password);
          // echo "ket noi thanh cong";
          $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $connect;
     } catch (PDOException $e) {
          echo "Query to DB bug:<br>" . $e->getMessage();
          throw $e;
     }
}


function querySQL($sql, $fetchdata = 0, $fetchid = -1, $fetchAll = 0)
//fetchdata 
{
     $connect = connection();
     $stmt = $connect->prepare($sql);

     try {
          if ($fetchdata == 0) {
               return $stmt->execute();
          }
          if ($fetchdata == 1) {
               if ($fetchid > -1) {
                    if ($fetchAll == 1) {
                         $stmt->execute([$fetchid]);
                         return $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }
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


/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}