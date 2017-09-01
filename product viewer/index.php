<?php
/**
 * Created by PhpStorm.
 * User: Ha
 * Date: 8/31/2017
 * Time: 9:14 AM
 */
require 'database.php';

$category_id = 1;
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
}
//lấy tên của danh mục hiện thời
$query = "SELECT * FROM guitar_type
          WHERE categoryID = $category_id";
$category = $db->query($query);
$category = $category->fetch();
$category_name = $category['categoryName'];
//lấy tất cả danh mục
$query = "SELECT * FROM guitar_type
          ORDER BY categoryID";
$categories = $db->query($query);
//lấy tất cả các sản phẩm cho danh mục đã chọn
$query = "SELECT * FROM guitar_detail
          WHERE categoryID = $category_id
          ORDER BY productID";
$products = $db->query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Guitar Shop</title>
</head>
<body>
<div id="page">
    <div id="main">
        <h1>Product List</h1>
        <div id="sidebar" style="float: left">
            <h2>Categories</h2>
            <ul class="nav">
                <?php foreach ($categories as $category) : ?>
                <li>
                    <a href="?category_id= <?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div id="content" style="float: left">
            <h2><?php echo $category_name; ?></h2>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th align="right">Price</th>
                </tr>
                <tr>
                    <?php foreach($products as $product) : ?>
                    <td><?php echo $product['productCode']; ?></td>
                    <td><?php echo $product['productName']; ?></td>
                    <td align="right"><?php echo $product['listPrice']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>