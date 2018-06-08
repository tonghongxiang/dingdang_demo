<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/25
 * Time: 上午2:33
 */
$order_id=$_POST["name3"];

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query= "UPDATE  Order_List SET Arrive='已送达'  WHERE Order_ID=$order_id"or die(mysqli_error($dbc));
$result= mysqli_query($dbc, $query) ;

echo "恭喜您已收获成功";
mysqli_close($dbc);