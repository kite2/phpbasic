<h1>Kết nối database</h1>
<!--Kết nối DataBase-->
<?php
/**
 * Created by PhpStorm.
 * User: Ha
 * Date: 8/29/2017
 * Time: 10:39 AM
 */
$dsn = 'mysql:host=localhost;dbname=guitar_shop';
$username = 'root';
$password = '';
try {
    $db = new PDO($dsn,$username,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Đã kết nối thành công";
} catch (PDOException $e) {
    $errormessenger = $e->getMessage();
    echo "<p>Connection Fail ".$errormessenger."</p>";
}


//phương thức query với câu lệnh SELECT là biến
$querySelect = 'SELECT * FROM guitar_detail
          WHERE categoryID = 1
          ORDER BY productID';
$products = $db->query($querySelect);
//phương thức query với câu lệnh SELECT được coi là tham sô
$products1 = $db->query('SELECT * FROM guitar_detail');

//    hướng dẫn câu lệnh INSERT
$category_id = 2;
$code = "strats";
$name = "Fender Stratocaster";
$price = 699.99;
$queryInsert = "INSERT INTO guitar_detail
                (categoryID, productCode, productName, listPrice)
                VALUES
                ($category_id, '$code','$name','$price')";
$insertCount = $db->exec($queryInsert);
//phương thức query là tham số
$db->exec("INSERT INTO guitar_detail
                    (categoryID, productCode, productName, listPrice)
                    VALUES
                    (2,'abc','HHHH',5.99)");

//hướng dẫn câu lệnh UPDATE
$products_id = 4;
$price1 = 599.99;
$queryUpdate = "UPDATE guitar_detail
                SET listPrice = $price1
                WHERE productID = $products_id";
$update_count = $db->exec($queryUpdate);

//hướng dẫn câu lệnh DELETE
$products_id1 = 16;
$queryDelete = "DELETE FROM guitar_detail
                WHERE productID = $products_id1";
$delete_count = $db->exec($queryDelete);


?>
<!--<p>số bản ghi được thêm vào bảng: --><?php //echo $insertCount;?><!--</p>-->
<!--<p>số bản ghi được cập nhật: --><?php //echo $update_count;?><!--</p>-->
<!--<p>số bản ghi được xóa: --><?php //echo $delete_count;?><!--</p>-->