
<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/12
 * Time: 下午2:28
 */
session_start();
$type=$_SESSION["user_id"];

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$phone=$_POST["name"];


$query="SELECT * FROM User_List WHERE User_Id='$type'" or  die(mysqli_error($dbc));

$result=mysqli_query($dbc,$query);

    $sql_arr = mysqli_fetch_assoc($result);
    $user_nick = $sql_arr['Nick_Name'];
    $user_phone = $sql_arr['User_Tel'];
    $user_email = $sql_arr['User_Email'];
    $user_sex = $sql_arr['User_Sex'];
    $user_age= $sql_arr['User_Age'];
    $user_br=$sql_arr['User_Broth'];
    $user_address = $sql_arr['User_Address'];
    $user_addtime = $sql_arr['User_Addtime'];


    echo "<form method='post' action='php/user_update1.php' target='_blank'><table>
        <tr><td>用户昵称：</td><td><input id='nick' name='nick' value='$user_nick'></td></tr>
        <tr><td><br></td><td><br></td></tr>
        <tr><td>手机号：</td><td>$user_phone</td></tr>
        <tr><td><br></td><td><br></td></tr>
        <tr><td>邮箱：</td><td>$user_email</td></tr>
        <tr><td><br></td><td><br></td></tr>
        <tr><td>性别：</td><td><select name='sex' onchange='changeProvince()' class='select'>
            <option value='$user_sex'>$user_sex</option>
            <option value='男'>男</option>
            <option value='女'>女</option>
            
        </select></tr>
        <tr><td><br></td><td><br></td></tr>
        <tr><td>年龄：</td><td>$user_age</td></tr>
        <tr><td><br></td><td><br></td></tr>
        <tr><td>生日：</td><td><input id='dt' name='dt' data-provide='datepicker' value='$user_br'></td></tr>
        <tr><td><br></td><td><br></td></tr>
        <tr><td>收货地址：</td><td><input id='address' name='address' value='$user_address'></td></tr>
        <tr><td><br></td><td><br></td></tr>
        <tr><td>注册时间：</td><td>$user_addtime</td></tr>
        <tr><td><br></td><td><br></td></tr>
        </table><input id='submit2' type=\"submit\" name=\"submit\" value=\"提交\"></form>";

mysqli_close($dbc);
