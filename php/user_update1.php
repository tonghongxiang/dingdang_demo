
<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/12
 * Time: 下午2:28
 */
session_start();
$type=$_SESSION["user_id"];

$user_nick = $_POST['nick'];
$user_sex = $_POST['sex'];
$user_br = $_POST['dt'];
$user_address = $_POST['address'];


$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");
$query0="SELECT * FROM User_List WHERE User_Id<>'$type' AND Nick_Name='$user_nick'";
$result0=mysqli_query($dbc,$query0);
$data_row=mysqli_num_rows($result0);
$rest = substr($user_br,-4);
$age=2018-$rest;

if($data_row!=0){
    echo "此昵称已被使用";
}
else{
    $query="UPDATE User_List SET Nick_Name='$user_nick',User_Sex='$user_sex',User_Broth='$user_br',User_Address='$user_address',User_Age='$age'  WHERE User_Id=$type" or  die(mysqli_error($dbc));

    $result=mysqli_query($dbc,$query);
    echo "修改成功！！";
    mysqli_close($dbc);
}





