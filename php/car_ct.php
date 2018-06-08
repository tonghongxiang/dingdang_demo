<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/2
 * Time: 上午11:07
 */

$u_id=$_POST['name6'];
$cut=$_POST['name4'];

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query3="UPDATE Car_List SET Produce_Count='$cut'  WHERE Car_ID='$u_id' AND state=0";

$result3=mysqli_query($dbc,$query3)
or die(mysqli_error($dbc));

mysqli_close($dbc);