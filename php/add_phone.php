
<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/3/29
 * Time: 下午3:29
 */

session_start();

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$type1=$_POST['name1'];
$type2=$_POST['name2'];
$type3=$_SESSION['user_id'];



$query1 = "SELECT * FROM Produce_List WHERE Produce_Name='$type1' AND Produce_RGB='$type2'";
$result1 = mysqli_query($dbc, $query1);
$arr1 = mysqli_num_rows($result1);
$row = mysqli_fetch_assoc($result1);
$prc = $row['Produce_Price'];
$col = $row['Produce_Color'];
$id = $row['Produce_ID'];
$Produce_img=$row['Produce_img'];
$Produce_Type=$row['Produce_Stye'];

$query3="SELECT * FROM Car_List WHERE Produce_Name='$type1' AND Produce_Color='$col' AND state=0";
$result3=mysqli_query($dbc, $query3);
$arr3=mysqli_num_rows($result3);

$query4="SELECT * FROM Car_List WHERE Produce_Name='$type1' AND Produce_Color='皓雪白' AND state=0";
$result4=mysqli_query($dbc, $query4);
$arr4=mysqli_num_rows($result4);


if( !empty($type3) ) {
    if ($type2 != "") {

        if ($arr1 >= 1) {

            if ($arr3 !=0) {
                $row1_0 = mysqli_fetch_assoc($result1);
                $query1_0 = "UPDATE  Car_List SET Produce_Count=Produce_Count+1 WHERE Produce_ID='$id' AND state=0 AND Produce_Color='$col'";
                $result1_0 = mysqli_query($dbc, $query1_0) or die(mysqli_error($dbc));
                echo "<h1 style='margin-top: 40px;font-size: 1.3em'>恭喜您已成功添加以下商品进购物车</h1>
            <table align='left' style='width:100%;height:auto;margin-top: 30px;color: white'>
                <tr style='height:60px'>
                    <td width='40%;'>型号</td>
                    <td width='30%;'>颜色</td>
                    <td width='30%;'>价格</td>
                </tr>
                <tr style='height:60px'>
                    <td>$type1</td>
                    <td>$col</td>
                    <td style='color: red;font-size: 1.3em;font-weight: 500'>$prc</td>
                </tr>
                </table>";
            }
            else {
                $query1_1 = "INSERT INTO Car_List(User_ID,Produce_ID,Produce_Name,Produce_Color,Produce_Price,Produce_Count,Produce_IMG,state,Produce_Type)" .

                    "VALUES ('$type3','$id','$type1','$col','$prc','1','$Produce_img','0','$Produce_Type')";
                $result1_1 = mysqli_query($dbc, $query1_1) or die(mysqli_error($dbc));
                echo "<h1 style='margin-top: 40px;font-size: 1.3em'>恭喜您已成功添加以下商品进购物车</h1>
            <table align='left' style='width:100%;height:auto;margin-top: 30px;color: white'>
                <tr style='height:60px'>
                    <td width='40%;'>型号</td>
                    <td width='30%;'>颜色</td>
                    <td width='30%;'>价格</td>
                </tr>
                <tr style='height:60px'>
                    <td>$type1</td>
                    <td>$col</td>
                    <td style='color: red;font-size: 1.3em;font-weight: 500'>$prc</td>
                </tr>
                </table>";
            }


        }
        else {
            echo "<div class='no1'>您选的颜色暂时无货</div>";
        }
    }
    else {
        $query2 = "SELECT * FROM Produce_List WHERE Produce_Name='$type1' AND Produce_RGB='rgb(240, 255, 240)'";
        $result2 = mysqli_query($dbc, $query2);

        if (mysqli_num_rows($result2) >= 1) {
            $row2 = mysqli_fetch_assoc($result2);
            $prc2 = $row2['Produce_Price'];
            $col2 = $row2['Produce_Color'];
            $id = $row2['Produce_ID'];


            if ($arr4 !=0){
                $row1_0 = mysqli_fetch_assoc($result1);
                $query1_0 = "UPDATE  Car_List SET Produce_Count=Produce_Count+1 WHERE Produce_ID=$id AND state=0 AND Produce_Color='皓雪白'";
                $result1_0 = mysqli_query($dbc, $query1_0) or die(mysqli_error($dbc));
                echo "<h1 style='margin-top: 40px;font-size: 1.3em'>恭喜您已成功添加以下商品进购物车</h1>
            <table align='left' style='width:100%;height:auto;margin-top: 30px;color: white'>
                <tr style='height:60px'>
                    <td width='40%;'>型号</td>
                    <td width='30%;'>颜色</td>
                    <td width='30%;'>价格</td>
                </tr>
                <tr style='height:60px'>
                    <td>$type1</td>
                    <td>皓雪白</td>
                    <td style='color: red;font-size: 1.3em;font-weight: 500'>$prc</td>
                </tr>
                </table>";
            }
            else {
                $query2_1 = "INSERT INTO Car_List(User_ID,Produce_ID,Produce_Name,Produce_Color,Produce_Price,Produce_Count,state,Order_ID,Produce_Type)" .

                    "VALUES ('$type3','$id','$type1','$col2','$prc2','1','0','0','$Produce_Type')";
                $result2_1 = mysqli_query($dbc, $query2_1) or die(mysqli_error($dbc));
                echo "<h1 style='margin-top: 40px;font-size: 1.3em'>恭喜您已成功添加以下商品进购物车</h1>
            <table align='left' style='width:100%;height:auto;margin-top: 30px;color: white'>
                <tr style='height:60px'>
                    <td width='40%;'>型号</td>
                    <td width='30%;'>颜色（默认）</td>
                    <td width='30%;'>价格</td>
                </tr>
                <tr style='height:60px'>
                    <td>$type1</td>
                    <td>皓雪白</td>
                    <td style='color: red;font-size: 1.3em;font-weight: 500'>$prc2</td>
                </tr>
                </table>
         ";
            }
        }
        else {
            echo "<div class='no1'>白色暂时无货，您可以选择其他颜色。</div>";
        }
    }
}
else{
    echo "请先登陆!";
}