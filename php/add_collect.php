<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/5/19
 * Time: 上午4:45
 */
session_start();
$u_id=$_SESSION["user_id"];
$pro_name=$_POST['name'];

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query="SELECT * FROM Produce_List WHERE Produce_Name='$pro_name'$pro_name and Produce_Color='星空黑'";


$result=mysqli_query($dbc,$query);

$sql_arr = mysqli_fetch_array($result);
$pro_id=$sql_arr['Produce_ID'];

$query3="SELECT * FROM Collect_List WHERE Produce_Name=$pro_name";
$result3=mysqli_query($dbc,$query3);

$rows= mysqli_fetch_row($result3);
if(rows>0){
    $query2="INSERT INTO Collect_List(User_ID,Produce_ID,Produce_Name,Add_Time) VALUES ('$u_id','$pro_id','$pro_name',now())" or die(mysqli_error($dbc));
    $result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));

    echo "<span style='margin-top: 50px'>已成功收藏，感谢您的青睐！</span>";
}
else{
    echo "您已添加过此类收藏！";
}



mysqli_close($dbc);

