<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/5/18
 * Time: 下午6:34
 */


$u_id=$_POST['name1'];

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query3="DELETE FROM User_List WHERE User_Id=$u_id";

$result3=mysqli_query($dbc,$query3)
or die("删除操作失败");

echo "账户ID：$u_id 用户删除成功，请刷新页面";

mysqli_close($dbc);