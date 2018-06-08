<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户中心</title>
    <style type="text/css">
        #tb1{
            width: 100%;
            text-align: center;
        }
        #tb1 tr:hover{
            background-color: rgba(0,0,0,0.25);
        }


        #tb1 tr td{
            border: none;
            padding: 5px;
            color: black;
            font-weight: 300;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

    </style>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/20
 * Time: 下午7:27
 */
session_start();
$user_id=$_SESSION['user_id'];

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query= "SELECT * FROM Order_List WHERE User_Id='$user_id' AND Evaluate='0'" or die(mysqli_error($dbc));
$result= mysqli_query($dbc, $query) ;

$data_row=mysqli_num_rows($result);
echo "
<table id='tb1' id=\"table\">
<tr  style='background: rgba(0, 0, 0, .1);
            -webkit-backdrop-filter: blur(10px)'>          
             
            <td style=\"width: 10%\">订单编号</td>
            <td style=\"width: 10%\">金额</td>
            <td style=\"width: 20%\">手机号</td>
            <td style=\"width: 30%\">下单时间</td>
            <td style=\"width: 10%\">是否支付</td>
            <td style=\"width: 10%\">状态</td>
           <td style=\"width: 10%\">操作</td>
        </tr>
";

for ($i=0;$i<$data_row;$i++) {
    $a=0;
    $sql_arr = mysqli_fetch_assoc($result);
    $order_id = $sql_arr['Order_ID'];
    $price=$sql_arr['Produce_Price'];
    $User_Tel = $sql_arr['User_Tel'];
    $Order_Time=$sql_arr['Order_Time'];
    $pay=$sql_arr['Pay'];
    $arrive=$sql_arr['Arrive'];
    if($pay=="未支付" ){
        echo "<tr>
        
        <td>$order_id</td>
        <td>$price</td>
        <td>$User_Tel </td>
        <td>$Order_Time</td>
        <td>$pay</td>
        <td id='go_pay' name='$order_id' style='color: #a94442;cursor: pointer' class=\"btn\" data-toggle=\"modal\" data-target=\"#myModal\">去支付</td>
        <td><i id='$order_id' name='$order_id' class='icon-search' style='color: #00b4ef;cursor: pointer'></i></td>
    </tr>";
    }else{
if($arrive=="未送达"){
    echo "<tr>
        
        <td>$order_id</td>
        <td>$price</td>
        <td>$User_Tel </td>
        <td>$Order_Time</td>
        <td>$pay</td>
        <td id='go_confirm' name='$order_id' class=\"btn\" style='color: #a94442;cursor: pointer'  data-toggle=\"modal\" data-target=\"#myModal\">确认送达>> </td>
        <td><i id='$order_id' class='icon-search' style='color: #00b4ef;cursor: pointer'></i></td>
    </tr>";
}else{
    echo "<tr>
        
        <td>$order_id</td>
        <td>$price</td>
        <td>$User_Tel </td>
        <td>$Order_Time</td>
        <td>$pay</td>
        <td  style='color: #00b4ef;'>订单已完成</td>
        <td><i id='$order_id' class='icon-search' style='color: #00b4ef;cursor: pointer'></i></td>
    </tr>";
}

    }
};
mysqli_close($dbc);

?>
</body>
</html>
