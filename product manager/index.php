<?php
/**
 * Created by PhpStorm.
 * User: Ha
 * Date: 8/31/2017
 * Time: 3:17 PM
 */
require_once ('database.php');
//$category_id = 1;
//if (isset($_GET['category_id'])) {
//    $category_id = $_GET['category_id'];
//}
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
} else {
    $category_id = 1;
}
if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];
}

//lấy tên danh mục hiện thời
$query = "SELECT * FROM guitar_type
          WHERE categoryID = $category_id";
$category = $db->query($query);
$category = $category->fetch();
$category_name = $category['categoryName'];
//lấy tất cả danh mục
$query = "SELECT * FROM guitar_type
          ORDER BY categoryID";
$categories = $db->query($query);
//lất tất cả các sản phẩm cho danh mục được chọn
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
    <div id="header">
        <h1>Product Manager</h1>
    </div>
    <div id="main">
        <h1>Product List</h1>
        <div id="sidebar" style="float: left">
            <h2>Categories</h2>
            <ul class="nav">
                <?php foreach ($categories as $category) : ?>
                <li>
                    <a href="?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div id="content" style="float:left;;">
            <h2><?php echo $category_name; ?></h2>
            <table>
                <tr>
                    <th>CODE</th>
                    <th>Name</th>
                    <th align="right">Price</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['productCode']; ?></td>
                    <td><?php echo $product['productName']; ?></td>
                    <td align="right"><?php echo $product['listPrice']; ?></td>
                    <td>
                        <form action="delete_product.php" method="post" id="delete_product_form">
                            <input type="hidden" name="product_id"
                                   value="<?php echo $product['productID']; ?>">
                            <input type="hidden" name="category_id"
                                   value="<?php echo $product['categoryID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <p><a href="add_product_form.php">Add Product</a> </p>
        </div>
    </div>
    <div id="footer" style="clear: both">
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </div>
</div>
</body>
</html>
