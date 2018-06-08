<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2017/11/22
 * Time: 下午2:03
 */
session_start();

$zhang_hao=$_POST['zhanghao'];
$mi_ma=$_POST['mima'];


if(!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
        if ($zhang_hao == "" || $mi_ma == "") {
            echo "<script>alert('请输入账号或者密码！');history.go(-1);</script>";
        } else {
            $dbc = mysqli_connect('127.0.0.1', 'root', '765256', 'dingdang') or die('ERROR to connect!');

            $query = "SELECT * FROM sys_user WHERE sys_zhanghao='$zhang_hao' AND sys_pass='$mi_ma'";

            $result = mysqli_query($dbc, $query);
            if (mysqli_num_rows($result) >= 1) {
                $row = mysqli_fetch_array($result);
                $_SESSION['admin_name'] = $row['sys_zhanghao'];
                $_SESSION['admin_nick']=$row['sys_name'];
                $_SESSION['admin_pw'] = $row['sys_pass'];
                header("Location:../sys_index");

            } else {
                echo "<script>alert('账号或者密码错误');history.go(-1);</script>";
            }
        }

    } else {
        echo '失效页面';
    }
}
else{
    header("Location:../index");
}