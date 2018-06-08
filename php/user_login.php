
<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2017/11/22
 * Time: 下午2:03
 */
session_start();

$zhang_hao=$_POST['inputphone1'];
$mi_ma=$_POST['inputPassword1'];


    if (!isset($_POST['submit'])) {
        if ($zhang_hao == "" || $mi_ma == "") {
            echo "<script>alert('请输入账号或者密码！');history.go(-1);</script>";
        } else {
            include "db_config.php";

            $query = "SELECT * FROM User_List WHERE User_Tel='$zhang_hao' AND User_Password='$mi_ma'";

            $result = mysqli_query($dbc, $query);
            if (mysqli_num_rows($result) >= 1) {
                $row = mysqli_fetch_array($result);
                $_SESSION['user_id'] = $row['User_Id'];
                $_SESSION['user_name'] = $row['User_Tel'];
                $_SESSION['user_nick']=$row['Nick_Name'];
                header("Location:../index.html");

            } else {
                echo "<script>alert('账号或者密码错误');history.go(-1);</script>";
            }
        }

    } else {
        echo '失效页面';
    }