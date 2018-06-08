<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2017/12/9
 * Time: 下午4:11
 */
session_start();
$price=$_POST['td'];


$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

if(empty($_SESSION["user_id"]) ){
    echo "请先登陆!<a href='log.html'>点击这里登陆</a>";
}else {
    $type=$_SESSION['user_id'];
    $query0="SELECT * FROM User_List WHERE User_Id='$type'" ;
    $result0=mysqli_query($dbc,$query0) or die(mysqli_error($dbc));
    $sql_arr0=mysqli_fetch_assoc($result0);
    $address=$sql_arr0['User_Address'];
    $tel=$sql_arr0['User_Tel'];
    $user_type=$sql_arr0['User_Type'];



    $query3="SELECT * FROM Car_List WHERE User_Id=$type AND state=0" ;
    $result3=mysqli_query($dbc,$query3) or die(mysqli_error($dbc));
    $sql_arr3=mysqli_fetch_assoc($result3);
    $name=$sql_arr3['Nick_Name'];


    if($address==""){
        echo "请先去个人中心完善个人信息！<br><a href='/design/person.html'>点击此处跳转</a>";
    }else{

    if ($price>0)
    {
        if($user_type=="普通会员"){
            $query1="INSERT INTO Order_List(User_Id,User_Tel,Nick_Name,Produce_Price,User_Address,Order_Time,Evaluate)
        VALUES ('$type','$tel','$name','$price','$address',now(),'0')" ;
        }else{
            $query1="INSERT INTO Order_List(User_Id,User_Tel,Nick_Name,Produce_Price,User_Address,Order_Time,Evaluate)
        VALUES ('$type','$tel','$name','$price','$address',now(),'1')" ;
        }

        $result1=mysqli_query($dbc,$query1) or die(mysqli_error($dbc));

        $query4="SELECT * FROM Order_List ORDER BY Order_ID DESC ";
        $result4=mysqli_query($dbc,$query4);
        $sql_arr1=mysqli_fetch_array($result4);
        $order_id=$sql_arr1['Order_ID'];

       $query = "UPDATE Car_List SET state=1,Order_ID=$order_id WHERE User_Id=$type AND state=0"
       or die(mysqli_error($dbc));
        $result=mysqli_query($dbc,$query)
        or die("ERROR result");
        echo "<span style='position: relative;top:100px'>提交成功 </span>"."<a href='person.html' id='$order_id' class='pay' style='position: relative;top:100px'>去支付！！</a>";
    }else
    {
        echo"无商品可添加！";
    }
}
}
mysqli_close($dbc);
