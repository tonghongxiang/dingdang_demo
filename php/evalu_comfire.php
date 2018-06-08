<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/5/1
 * Time: 下午6:08
 */


$id=$_POST['name1'];
$user_id=$_POST['name3'];
$result=$_POST['name2'];


$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query0="SELECT * FROM Company_Authentication WHERE Company_ID=$id";
$result0=mysqli_query($dbc,$query0);
$sql_arr = mysqli_fetch_assoc($result0);
$state=$sql_arr['sate'];
if($state=='未审核'){
if($result == 1){
    $query1_1="UPDATE User_List SET User_Type='企业会员'  WHERE User_Id=$user_id";
    $query1_2="UPDATE Company_Authentication SET sate='审核通过'  WHERE Company_ID=$id";
    $result1_1=mysqli_query($dbc,$query1_1);
    $result1_2=mysqli_query($dbc,$query1_2);

    echo "已通过审核";
}else{

    $query2_1="UPDATE Company_Authentication SET sate='审核不通过'  WHERE Company_ID=$id";
    $result2_1=mysqli_query($dbc,$query2_1);
    echo "未通过审核";
}
}else{
    echo "已有审核结果！无法再次提交！";
}
mysqli_close($dbc);