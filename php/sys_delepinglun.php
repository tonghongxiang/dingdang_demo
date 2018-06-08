<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/5/19
 * Time: 上午6:27
 */

$com_id=$_POST['name1'];

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query3="DELETE FROM comments WHERE com_id='$com_id'";
$result3=mysqli_query($dbc,$query3);

echo "已删除编号为$com_id的评论！";

mysqli_close($dbc);