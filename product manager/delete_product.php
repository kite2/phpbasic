<?php
/**
 * Created by PhpStorm.
 * User: Ha
 * Date: 8/31/2017
 * Time: 6:04 PM
 */
//lấy định danh
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    require_once ('database.php');

    $query = "DELETE FROM guitar_detail
              WHERE productID = '$product_id'";
    $db->exec($query);
}
if (isset($_POST['$category_id'])) {
    $category_id = $_POST['category_id'];
}
//xóa sản phẩm khỏi cơ sở dữ liệu
include "index.php";
?>