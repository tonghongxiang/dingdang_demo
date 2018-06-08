<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/5/19
 * Time: 上午1:04
 */
session_start();

$admin_name=$_SESSION['admin_nick'];
$parent=$_POST['name1'];
$comment=$_POST['name2'];

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query1="SELECT * FROM comments WHERE com_id='$parent'" or die(mysqli_error($dbc));
$result1=mysqli_query($dbc,$query1);
$sql_arr1 = mysqli_fetch_array($result1);
$ord_id=$sql_arr1['Order_ID'];
$pro_id=$sql_arr1['produce_id'];
$pro_name=$sql_arr1['produce_name'];
$pro_style=$sql_arr1['pro_style'];

$query2="INSERT INTO comments(Order_ID,produce_id,produce_name,content,user_nickname,time,pro_style) VALUES
('$ord_id','$pro_id','$pro_name','$comment','$admin_name',now(),'$pro_style')"  or die(mysqli_error($dbc));
$result2=mysqli_query($dbc,$query2);
$new_id=mysqli_insert_id($dbc);


mysqli_query($dbc,"UPDATE comments SET parent='$new_id' WHERE com_id=$parent");


echo "回复成功。";

mysqli_close($dbc);