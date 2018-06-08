<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/20
 * Time: 下午1:10
 */
session_start();
$user_id=$_SESSION['user_id'];

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query= "SELECT * FROM User_List WHERE User_Id='$user_id'" or die(mysqli_error($dbc));
$result= mysqli_query($dbc, $query) ;
$row = mysqli_fetch_assoc($result);
$tel= $row['User_Tel'];
$email = $row['User_Email'];
$user_type = $row['User_Type'];


echo "<table align='center' style=';margin-top: 90px;'>
<tr>
<td><span style='color: #a94442;font-size: 1.9em;font-weight: 500'>$tel</span></td>
<td><span>会员类型：</span><span style='color: #00b4ef'>$user_type</span></td>
</tr>
<tr>
<td><span style='color: silver'>您好 ~</span></td>
<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp绑定手机：<span style='color: #00b4ef'>$tel</span></td>
</tr>
<tr>
<td style='color: red'><p onclick=\"window.open('person_update.html','_blank')\">修改个人信息></p></td>
<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp绑定邮箱：<span style='color: #00b4ef'>$email</span></td>
</tr>
</table>
";