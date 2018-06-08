<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/21
 * Time: 下午3:26
 */
session_start();
$type=$_SESSION["user_id"];

$old_pass=$_POST['old_pass'];
$new_pass1=$_POST['new_pass1'];
$new_pass2=$_POST['new_pass2'];

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query1="SELECT * FROM User_List WHERE User_Id=$type";
$result1=mysqli_query($dbc,$query1);
$row = mysqli_fetch_assoc($result1);
$old_pd=$row['User_Password'];

$query2="UPDATE User_List SET User_Password='$new_pass1'  WHERE User_Id=$type";

if( empty($_SESSION["user_id"]) ){
    echo "失效页面， 请重新登录！";
}else{

    if($old_pd==$old_pass AND $new_pass1==$new_pass2){
        $query2="UPDATE User_List SET User_Password='$new_pass1'  WHERE User_Id=$type";
        $result2=mysqli_query($dbc,$query2);
        echo "修改成功";
    }
    else{
        echo "修改失败，请确认旧密码正确或俩次输入一致。";
    }
}

mysqli_close($dbc);