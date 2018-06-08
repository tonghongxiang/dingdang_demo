<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/5/1
 * Time: 下午5:14
 */

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query0= "SELECT * FROM Company_Authentication";
$result0= mysqli_query($dbc, $query0);
$data_row=mysqli_num_rows($result0);


echo "
<table style='width: 90%;max-width: 1000px;min-width: 700px'>
<tr  style='background: rgba(0, 0, 0, .1);
            -webkit-backdrop-filter: blur(10px)'>                      
            <td style=\"width: 10%\">企业名称</td>
            <td style=\"width: 10%\">企业电话</td>
            <td style=\"width: 20%\">企业邮箱</td>
            <td style=\"width: 20%\">企业营业执照</td>
            <td style=\"width: 10%\">申请时间</td>
            <td style=\"width: 10%\">审核状态</td>
           <td style=\"width: 20%\">操作</td>
           <td></td>
        </tr>
";

for ($i=0;$i<$data_row;$i++) {
    $a = 0;
    $sql_arr = mysqli_fetch_assoc($result0);
    $user_id=$sql_arr['User_ID'];
    $id = $sql_arr['Company_ID'];
    $Company_Name = $sql_arr['Company_Name'];
    $Company_Tel = $sql_arr['Company_Tel'];
    $Company_Email = $sql_arr['Company_Email'];
    $Company_Licence = $sql_arr['Company_Licence'];
    $Add_Time = $sql_arr['Add_Time'];
    $sate = $sql_arr['sate'];
    echo "<tr>
        <td>$Company_Name</td>
        <td>$Company_Tel</td>
        <td>$Company_Email</td>
        <td><img class='img_show' src='../upload/$Company_Licence' style='height: 40px'></td>
        <td>$Add_Time</td>
        <td>$sate</td>
        <td><button id='$id' class='pass' name='$user_id' style='color: #00b4ef;cursor: pointer'>通过</button> <button id='$id' name='$user_id' class='un_pass' style='color: #00b4ef;cursor: pointer'>不通过</button></td>
    </tr>";
}