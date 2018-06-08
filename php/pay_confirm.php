<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/25
 * Time: 上午2:09
 */

$order_id=$_POST["name2"];

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query= "UPDATE  Order_List SET Pay='已支付'  WHERE Order_ID=$order_id"or die(mysqli_error($dbc));
$result= mysqli_query($dbc, $query) ;

echo "支付成功！！请刷新页面查看。<button class=\"btn btn-default\" data-dismiss=\"modal\" id='queren1' onclick='window.location = \"person.html\"'>确定</button>";
mysqli_close($dbc);