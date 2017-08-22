<?php
/**
 * Created by PhpStorm.
 * User: Ha
 * Date: 8/15/2017
 * Time: 10:22 AM
 */

    $txt = "W3Schools.com";
    echo "I love $txt";
?>
<br>

<?php
    $txt = "W3Schools.com";
    echo "I love " . $txt . "!";
?>
<br>

<?php
    $x = 5;
    $y = 4;
    echo $x + $y;
?>
<br>
<!--Biến Toàn Cục-->
<?php
    $x = 5; //biến toàn cục

    function myTest() {
        /* sử dụng biến x ở bên trong hàm sẽ tính ra lỗi */
        echo "<p>Variable x insinde function is: $x</p>";
    }
    myTest();
    echo "<p>Variable x outside function is: $x</p>";
?>
<br>
<!--Biến cục bộ-->
<?php
    function myTest1() {
        $g = 5; // bien cuc bo
        echo "<p>Variable x inside function is: $g</p>";
    }
    myTest1();
    //Sử dụng  biến x ở bên ngoài khối lệnh sẽ gây lỗi
    echo "<p>Variable x outside function is: $g</p>";
?>
<br>
<!--Từ khóa Global-->
<?php
    $x = 5;
    $y = 10;
    function myTest2() {
        global $x, $y;
        $y = $x + $y;
    }
    myTest2();
    echo $y;
?>
<br>
<!--Global mảng-->
<?php
    $x = 5;
    $y = 10;

    function myTest3() {
        $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
    }
    myTest3();
    echo $y;
?>
<br>
<!--từ khóa static-->
<?php
    function myTest4() {
        static $z = 0;
        echo $z;
        $z++;
    }
    myTest4();
    echo "<br>";
    myTest4();
    echo "<br>";
    myTest4();
?>