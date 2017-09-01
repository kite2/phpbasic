<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset =utf-8">
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    #from, #to {
        width: 200px;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        padding: 12px 10px 12px 10px;
    }
    #submit {
        border-radius: 2px;
        padding: 10px 32px;
        font-size: 16px;
    }
</style>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    Từ: <input id = "from" type="text" name="from" placeholder="yy/mm/dd"/>
    Đến: <input id = "to" type="text" name="to" placeholder="yyyy-mm-dd"/>
    <input type = "submit" id = "submit" value = "Tìm"/>
</form>
<?php
function searchByDate($fromdate, $todate, $customerlist) {
    $flag = 0;
    foreach($customerlist as $key => $values){
        $datevalues = $values['ngaysinh'];
        if($datevalues >= $fromdate && $datevalues <= $todate) {
            echo "<tr>";
            echo "<td>".$key."</td>";
            echo "<td>".$values['ten']."</td>";
            echo "<td>".$values['ngaysinh']."</td>";
            echo "<td>".$values['diachi']."</td>";
            echo "<td><image src = '".$values['anh']."' width = '60px' height = '60px'/></td>";
            echo "</tr>";
            $flag = 1;
        }else if(empty($fromdate) && empty($todate)){
            $flag = 0;
        }
    }
    if($flag == 0) {
        echo "<b style='color:red'>Khong tim thay!.</b>";
    }
}
?>
<table border="0">
    <caption><h1>Danh sách khách hàng</h1></caption>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Ảnh</th>
    </tr>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fromdate = $_POST["from"];
    $todate = $_POST["to"];

    $customerlist = array (
        "1" => array("ten" => "Mai Văn Hoàn",
            "ngaysinh" => "1983-08-20",
            "diachi" => "Hà Nội",
            "anh" => "images/img1.jpg"
        ),
        "2" => array("ten" => "Nguyễn Văn Nam",
            "ngaysinh" => "1983-08-20",
            "diachi" => "Bắc Giang",
            "anh" => "images/img2.jpg"
        ),
        "3" => array("ten" => "Nguyễn Thái Hòa",
            "ngaysinh" => "1983-08-21",
            "diachi" => "Nam Định",
            "anh" => "images/img3.jpg"
        ),
        "4" => array("ten" => "Trần Đăng Khoa",
            "ngaysinh" => "1983-08-22",
            "diachi" => "Hà Tây",
            "anh" => "images/img4.jpg"
        ),
        "5" => array("ten" => "Nguyễn Đình Thi",
            "ngaysinh" => "1983-08-17",
            "diachi" => "Hà Nội",
            "anh" => "images/img5.jpg"
        )
    );
        searchByDate($fromdate, $todate, $customerlist);
    }

    //foreach ($customerlist as $key => $value) {
    //    echo "<tr>";
    //    echo "<td>".$key."</td>";
    //    echo "<td>".$value['ten']."</td>";
    //    echo "<td>".$value['ngaysinh']."</td>";
    //    echo "<td>".$value['diachi']."</td>";
    //    echo "<td><image src ='".$value['anh']."' width = '60px' height = '60px'/></td>";
    //    echo "</tr>";
    //}
    ?>
<!--    --><?php
//    foreach($customerlist as $key => $values){
//        echo "<tr>";
//        echo "<td>".$key."</td>";
//        echo "<td>".$values['ten']."</td>";
//        echo "<td>".$values['ngaysinh']."</td>";
//        echo "<td>".$values['diachi']."</td>";
//        echo "<td><image src ='".$values['anh']."' width = '60px' height ='60px'/></td>";
//        echo "</tr>";
//    }
//    ?>
</table>
<br>



</body>
</html>