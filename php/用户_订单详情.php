<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户中心</title>
    <style type="text/css">
        #tb2{
            width: 100%;
            text-align: center;
        }
        #tb2 tr{

        }


        #tb2 tr td{
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
 * Date: 2018/4/22
 * Time: 下午3:01
 */
$order_id=$_POST['order_id'];



$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
    or die("ERROR to connect mysqli");

    $query3="SELECT * FROM Car_List WHERE Order_ID='$order_id'";
    $result3=mysqli_query($dbc,$query3);
    $data_row=mysqli_num_rows($result3);

    $query4="SELECT * FROM Order_List WHERE Order_ID='$order_id'";
    $result4=mysqli_query($dbc,$query4);
    $sql_arr4 = mysqli_fetch_assoc($result4);
    $order_pay=$sql_arr4['Pay'];
    $order_Arrive=$sql_arr4['Arrive'];



echo "
<table id=\"tb2\">
<tr style=' background: rgba(0, 0, 0, .1);
            -webkit-backdrop-filter: blur(10px);'>      
            <td style=\"width: 20%\">预览</td>
            <td style=\"width: 25%\">商品名称</td>
            <td style=\"width: 10%\">颜色</td>
            <td style=\"width: 10%\">单价</td>
            <td style=\"width: 20%\">数量</td>
            <td></td>
        </tr>
";


    for ($i=0;$i<$data_row;$i++) {
        $sql_arr = mysqli_fetch_assoc($result3);
        $order_id = $sql_arr['Order_ID'];
        $produce_id=$sql_arr['Produce_ID'];
        $order_phone_name = $sql_arr['Produce_Name'];
        $order_phone_color=$sql_arr['Produce_Color'];
        $order_phone_count = $sql_arr['Produce_Count'];
        $order_phone_price = $sql_arr['Produce_Price'];
        $Produce_img = $sql_arr['Produce_IMG'];

        $query5="SELECT * FROM comments WHERE Order_ID='$order_id' AND produce_id='$produce_id'";
        $result5=mysqli_query($dbc,$query5);
        $data_row5=mysqli_num_rows($result5);

        if($order_pay=="未支付"||$order_Arrive=="未送达" ){
            echo "<tr>
            
        <td><img class='img_show' src='../upload/$Produce_img'style='width:60px;height:40px'/></td>
        <td>$order_phone_name</td>
        <td>$order_phone_color</td>
        <td>$order_phone_price</td>
        <td>$order_phone_count</td>
        <td style='color: #2aabd2'>未完成，无法评价</td>
    </tr>";
        }else{
            if($data_row5==0){
                echo "<tr>
            
        <td><img class='img_show' src='../upload/$Produce_img'style='width:60px;height:40px'/></td>
        <td>$order_phone_name</td>
        <td>$order_phone_color</td>
        <td>$order_phone_price</td>
        <td>$order_phone_count</td>
        <td style='color: #2aabd2'><a id='go_pinglun' name='$produce_id' class='$order_id'>去评价</a></td>
    </tr>";
            }else{
                echo "<tr>
            
        <td><img class='img_show' src='../upload/$Produce_img'style='width:60px;height:40px'/></td>
        <td>$order_phone_name</td>
        <td>$order_phone_color</td>
        <td>$order_phone_price</td>
        <td>$order_phone_count</td>
        <td style='color: #2aabd2'><a href='./pinglun_show1.php'>已完成评价,查看</a></td>
    </tr>";
            }

        }

    };

mysqli_close($dbc);

?>
</body>
</html>
