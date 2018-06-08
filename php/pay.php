<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>支付中心</title>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/25
 * Time: 上午12:26
 */

session_start();
$u_id=$_SESSION["user_id"];

$order_id=$_POST["name1"];


$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query0="SELECT * FROM User_List WHERE User_Id='$u_id'";
$result0=mysqli_query($dbc,$query0);
$sql_arr0 = mysqli_fetch_array($result0);
$adrr1=$sql_arr0['User_Address'];
$phone=$sql_arr0['User_Tel'];

$query= "SELECT * FROM Order_List WHERE Order_ID='$order_id'" or die(mysqli_error($dbc));
$result= mysqli_query($dbc, $query) ;

$sql_arr = mysqli_fetch_assoc($result);
$price=$sql_arr['Produce_Price'];
$Order_Time=$sql_arr['Order_Time'];

echo
    "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">
                    &times;
                </button>
                <h4 class=\"modal-title\" id=\"myModalLabel\">
                    请确认
                </h4>
            </div>
            <div class=\"modal-body\">
                下单时间为：$Order_Time<br>"."收货地址为：$adrr1 <br>收货手机号：$phone<br>订单总金额为：$price
            </div>
            <div class=\"modal-footer\"> 
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">取消
                </button>
                <button id='queren_pay' name='$order_id'  type=\"button\" class=\"btn btn-primary\" '>
                    提交
                </button>
            </div>
    "
?>
</body>
</html>
