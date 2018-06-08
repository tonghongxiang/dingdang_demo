<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/5/18
 * Time: 下午9:55
 */


$order_id1=$_POST['name1'];
$order_adress=$_POST['name2'];


$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");


    $query1="UPDATE Order_List SET User_Address='$order_adress'  WHERE 	Order_ID='$order_id1'" or die("11");
    $result1=mysqli_query($dbc,$query1) or die("12");

echo "恭喜！订单编号：$order_id1 地址修改为：$order_adress 成功！";

mysqli_close($dbc);