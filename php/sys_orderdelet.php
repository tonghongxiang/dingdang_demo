<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/5/19
 * Time: 上午7:31
 */



$ord_id=$_POST['name1'];

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query3="DELETE FROM Order_List WHERE Order_ID='$ord_id'";

$result3=mysqli_query($dbc,$query3)
or die("ERROR query");

echo "您已成功删除！";

mysqli_close($dbc);