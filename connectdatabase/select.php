<?php
/**
 * Created by PhpStorm.
 * User: Ha
 * Date: 8/30/2017
 * Time: 8:59 AM
 */
$dsn = 'mysql:host=localhost;dbname=guitar_shop';
$username = 'root';
$password = '';
$db = new PDO($dsn,$username,$password);

$querySelect = 'SELECT * FROM guitar_detail
          WHERE categoryID = 1
          ORDER BY productID';
$products = $db->query($querySelect);
$product = $products->fetch();
$product_code = $product['productCode'];
echo $product_code."<br>";
$product_name = $product['productName'];
echo $product_name."<br>";
$product_list_price = $product['listPrice'];
echo $product_list_price."<br>";
echo "<h1>Dùng Foreach</h1>";
?>

