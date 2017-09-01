<!DOCTYPE HTML>
<html>
    <head>
        <style>
            .error {
                color: #FF0000;
            }
        </style>
    </head>
    <body>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $flag = true;

            if (empty($name)) {
                $nameErr = "Tên đăng nhập không được để trống!";
                $flag = false;

            }

            if (empty($email)) {
                $emailErr = "Email không được để trống!";
                $flag = false;
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Định dạng email sai (xxx@xxx.xxx.xxx)!";
                    $flag = false;
                }
            }

            if (empty($phone)) {
                $phoneErr = " Số điện thoại không được để trống!";
                $flag = false;
            }

            if ($flag == true) {
                saveDataJSON("data.json", $name, $email, $phone);
            }

        }

        function saveDataJSON($filename, $name, $email, $phone)
        {
            $arr_data = array(); // create empty array
            try {
                //Get form data
                $contact = array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone
                );

                //Get data from existing json file
                $jsondata = file_get_contents($filename);

                // converts json data into array
                $arr_data = json_decode($jsondata, true);

                // Push user data to array
                array_push($arr_data, $contact);

                //Convert updated array to JSON
                $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

                //write json data into data.json file
                file_put_contents($filename, $jsondata);
                echo "Lưu dữ liệu thành công!";
            } catch (Exception $e) {
                echo 'Lỗi: ', $e->getMessage(), "\n";
            }
        }

        ?>

        <h2>Registration</h2>
        <p><span class="error">* required field.</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Name: <input type="text" name="name">
            <span class="error">* <?php if (isset($nameErr)) {
                echo $nameErr;
                }
                ?></span>
            <br><br>
            E-mail: <input type="text" name="email">
            <span class="error">* <?php if (isset($emailErr)){
                    echo $emailErr;
                }
                 ?></span>
            <br><br>
            Phone: <input type="text" name="phone">
            <span class="error">*<?php if (isset($phoneErr)){
                    echo $phoneErr;
                }
                 ?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>