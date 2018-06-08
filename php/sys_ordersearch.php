<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/12
 * Time: 下午2:28
 */

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$phone=$_POST["name"];


$query="SELECT * FROM User_List WHERE User_Tel='$phone'" or  die(mysqli_error($dbc));

$result=mysqli_query($dbc,$query);

$data_row=mysqli_num_rows($result);

echo "<table class='table1'>";

for ($i=0;$i<$data_row;$i++) {
    $sql_arr = mysqli_fetch_assoc($result);
    $user_id = $sql_arr['User_Id'];
    $user_nick = $sql_arr['Nick_Name'];
    $user_phone = $sql_arr['User_Tel'];
    $user_email = $sql_arr['User_Email'];
    $user_sex = $sql_arr['User_Sex'];
    $user_addtime = $sql_arr['User_Addtime'];


    echo "<tr>
        <td>$user_id</td>
        <td>$user_nick</td>
        <td>$user_phone</td>
        <td>$user_email</td>
        <td>$user_sex</td>
        <td>$user_addtime</td>
    </tr>";
};

echo "</table>";
mysqli_close($dbc);