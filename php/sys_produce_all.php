<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户中心</title>
    <style type="text/css">
        #tb1{
            width: 90%;
            height: auto;
            max-width: 1000px;
            min-width: 800px;
            text-align: center;
        }
        #tb1 tr{

        }


        #tb1 tr td{
            border: none;
            padding: 5px;
            color: black;
            font-weight: 300;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        .glyphicon:hover{
            color: #00b4ef;
        }

        .glyphicon{
            color:cadetblue;
            cursor: pointer
                   }

    </style>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/22
 * Time: 下午4:36
*/

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");


$query="SELECT * FROM Produce_List";

$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

$data_row=mysqli_num_rows($result);

echo "
<table id='tb1' id=\"table\">
<tr  style='background: rgba(0,0,0,0.2);
            -webkit-backdrop-filter: blur(10px)'>          
             <td style=\"width: 5%\">编号</td>
            <td style=\"width: 20%\">预览</td>
            <td style=\"width: 20%\">名称</td>
            <td style=\"width: 10%\">颜色</td>
            <td style=\"width: 10%\">市业价</td>
            <td style=\"width: 10%\">企业通道</td>
            <td style=\"width: 10%\">库存</td>
            <td style=\"width: 10%\">类型</td>
           <td style=\"width: 5%\">操作</td>
        </tr>
";


for ($i=0;$i<$data_row;$i++) {
    $sql_arr = mysqli_fetch_assoc($result);
    $Produce_ID = $sql_arr['Produce_ID'];
    $Produce_Name = $sql_arr['Produce_Name'];
    $Produce_Color=$sql_arr['Produce_Color'];
    $Produce_Price1 = $sql_arr['Produce_Price'];
    $Produce_Price2 = $sql_arr['Com_Price'];
    $Produce_img = $sql_arr['Produce_img'];
    $Produce_Stye = $sql_arr['Produce_Stye'];
    $Produce_Count = $sql_arr['Produce_Count'];



    echo "<tr>
        <td>$Produce_ID</td>
        <td><img src='../upload/$Produce_img'style='width:60px;height:40px'/></td>    
        <td>$Produce_Name</td>
        <td>$Produce_Color</td>
        <td>$Produce_Price1</td>
        <td>$Produce_Price2</td>
        <td>$Produce_Count</td>
        <td>$Produce_Stye</td>
        <td><i  name='$Produce_ID' class='glyphicon glyphicon-trash pro_dele'></i></td>
    </tr>";
};
mysqli_close($dbc);
?>
</body>
</html>
