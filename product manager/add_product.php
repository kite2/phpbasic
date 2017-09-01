<?php
/**
 * Created by PhpStorm.
 * User: Ha
 * Date: 9/1/2017
 * Time: 1:44 PM
 */
if (isset($_POST['category_id']) && isset($_POST['code']) && isset($_POST['name']) && isset($_POST['price'] )) {
    $category_id = $_POST['category_id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    if (empty($code) || empty($name) || empty($price)) {
        $error = "Invalid product data. Check all fields and try again";
        echo $error;
    } else {
        require_once ('database.php');
        $query = "INSERT INTO guitar_detail
              (categoryID, productCode, productName, listPrice)
              VALUES 
              ('$category_id', '$code', '$name', '$price')";
        $db->exec($query);
    }
}
include 'index.php';
?>