<?php
/**
 * Created by PhpStorm.
 * User: Ha
 * Date: 8/31/2017
 * Time: 8:50 AM
 */
$dsn = 'mysql:host=localhost;dbname=guitar_shop';
$username = 'root';
try {
    $db = new PDO($dsn, $username);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
//    include('database_error.php');
    echo $error_message;
    exit();
}
?>