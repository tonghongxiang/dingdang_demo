<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/12
 * Time: 下午2:28
 */

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$phone=$_POST["name1"];
$name=$_POST["name2"];
$email=$_POST["name3"];


$query="SELECT * FROM User_List WHERE User_Tel LIKE '%$phone%' AND Nick_Name LIKE '%$name%' AND User_Email LIKE '%$email%'" or  die(mysqli_error($dbc));

$result=mysqli_query($dbc,$query);

$data_row=mysqli_num_rows($result);
if($data_row <=0){
    echo "未搜索到用户";
    mysqli_close($dbc);
}
else
    {
echo "<table class='table1'>
        <tr>
        <td>编号</td>
        <td>昵称</td>
        <td>手机号</td>
        <td>邮箱</td>
        <td>性别</td>
        <td>类型</td>
        <td>注册时间</td>
        <td>操作</td>
        <td>更多</td>";

for ($i=0;$i<$data_row;$i++) {
    $sql_arr = mysqli_fetch_assoc($result);
    $user_id = $sql_arr['User_Id'];
    $user_nick = $sql_arr['Nick_Name'];
    $user_phone = $sql_arr['User_Tel'];
    $user_email = $sql_arr['User_Email'];
    $user_type=$sql_arr['User_Type'];
    $user_sex = $sql_arr['User_Sex'];
    $user_addtime = $sql_arr['User_Addtime'];


    echo "<tr>
        <td>$user_id</td>
        <td>$user_nick</td>
        <td>$user_phone</td>
        <td><input type='email' class='user_mail1' id='$user_id'  value='$user_email' style='width: 170px;border:none;border-bottom:1px solid rgba(0,0,0,0.25);background-color: transparent'></td>
        <td>$user_sex</td>
        <td>$user_type</td>
        <td>$user_addtime</td>
        <td><i id='dele_user' name='$user_id' class='icon-trash'></i></td>
        <td ><i class='icon-list-ul'></i></td> 
    </tr>";
};

echo "</table>";
mysqli_close($dbc);
}