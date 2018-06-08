<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/5/18
 * Time: 下午6:47
 */


$user_id1=$_POST['name1'];
$user_mail=$_POST['name2'];


$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");


    $query1="UPDATE User_List SET User_Email='$user_mail'  WHERE User_Id=$user_id1" or die("11");
    $result1=mysqli_query($dbc,$query1) or die("12");
    echo "用户编号：$user_id1 邮箱修改为$user_mail 成功！";


mysqli_close($dbc);