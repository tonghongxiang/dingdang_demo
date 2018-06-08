<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/20
 * Time: 下午5:22
 */
session_start();
$user_id=$_SESSION['user_id'];

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query= "SELECT * FROM Order_List WHERE User_Id='$user_id' AND Pay='未支付'" or die(mysqli_error($dbc));
$result= mysqli_query($dbc, $query) ;
$data_row=mysqli_num_rows($result);

$query1= "SELECT * FROM Order_List WHERE User_Id='$user_id' AND Pay='已支付' and Arrive='未送达'";
$result1= mysqli_query($dbc, $query1) ;
$data_row1=mysqli_num_rows($result1);

$query2= "SELECT * FROM Order_List WHERE User_Id='$user_id' AND Pay='已支付' and Arrive='已送达'";
$result2= mysqli_query($dbc, $query2) ;
$data_row2=mysqli_num_rows($result2);

echo "<table align='center' style='margin-top: -20px;font-size: 1.3em;'>
<tr style='height: 120px'>
<td><i class='icon icon-credit-card'></i><br><span class='sp1'> 待付款订单: <span style='color: silver;font-size: 1.3em'>$data_row</span></span></td>
<td><i class='icon icon-truck'></i><br><span class='sp1'> 待送达订单:</span></span><span style='color: silver;font-size: 1.3em'> $data_row1</span></td>
</tr>
<tr>
<td><i class='icon icon-comment-alt'></i><br><span class='sp1'> 待评价订单:</span><span style='color: silver;font-size: 1.3em'> $data_row2</span></td>
<td><i class='icon icon-heart-empty'></i><br><span class='sp1'> 收藏的商品:</td>
</tr>
</table>";