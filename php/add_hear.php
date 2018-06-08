
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
$type3=$_SESSION['user_id'];

$query0 = "SELECT * FROM User_List WHERE User_Id='$type3'";
$result0= mysqli_query($dbc, $query0);
$row0 = mysqli_fetch_assoc($result0);
$user_type=$row0['User_Type'];

$query1 = "SELECT * FROM Produce_List WHERE Produce_Name='$type1'";
$result1 = mysqli_query($dbc, $query1);
$arr1 = mysqli_num_rows($result1);
$row = mysqli_fetch_assoc($result1);
$prc = $row['Produce_Price'];
$com_price=$row['Com_Price'];
$col = $row['Produce_Color'];
$id = $row['Produce_ID'];
$Produce_img=$row['Produce_img'];
$Produce_Type=$row['Produce_Stye'];

$query3="SELECT * FROM Car_List WHERE Produce_Name='$type1' AND state=0";
$result3=mysqli_query($dbc, $query3);
$arr3=mysqli_num_rows($result3);


if( !empty($type3) ) {

        if ($arr1 >= 1) {
            if($user_type=="普通会员"){
                if ($arr3 !=0) {
                    $row1_0 = mysqli_fetch_assoc($result1);
                    $query1_0 = "UPDATE  Car_List SET Produce_Count=Produce_Count+1 WHERE Produce_ID='$id' AND state=0";
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
                    $query1_1 = "INSERT INTO Car_List(User_ID,Produce_ID,Produce_Name,Produce_Price,Produce_Count,Produce_IMG,state,Produce_Type)" .

                        "VALUES ('$type3','$id','$type1','$prc','1','$Produce_img','0','$Produce_Type')";
                    $result1_1 = mysqli_query($dbc, $query1_1) or die(mysqli_error($dbc));
                    echo "<h1 style='margin-top: 40px;font-size: 1.3em'>恭喜您已成功添加以下商品进购物车</h1>
            <table align='left' style='width:100%;height:auto;margin-top: 30px;color: white'>
                <tr style='height:60px'>
                    <td width='40%;'>型号</td>
           
                    <td width='30%;'>价格</td>
                </tr>
                <tr style='height:60px'>
                    <td>$type1</td>
                   
                    <td style='color: red;font-size: 1.3em;font-weight: 500'>$prc</td>
                </tr>
                </table>";
                }

            }else{
                if ($arr3 !=0) {
                    $row1_0 = mysqli_fetch_assoc($result1);
                    $query1_0 = "UPDATE  Car_List SET Produce_Count=Produce_Count+1 WHERE Produce_ID='$id' AND state=0";
                    $result1_0 = mysqli_query($dbc, $query1_0) or die(mysqli_error($dbc));
                    echo "<h1 style='margin-top: 40px;font-size: 1.3em'>恭喜您已成功添加以下商品进购物车</h1>
            <table align='left' style='width:100%;height:auto;margin-top: 30px;color: white'>
                <tr style='height:60px'>
                    <td width='40%;'>型号</td>
                    <td width='30%;'>市场价</td>
                    <td width='30%;'>企业价格</td>
                </tr>
                <tr style='height:60px'>
                    <td>$type1</td>
                    <td>$prc</td>
                    <td style='color: red;font-size: 1.3em;font-weight: 500'>$com_price</td>
                </tr>
                </table>";


                }
                else {
                    $query1_1 = "INSERT INTO Car_List(User_ID,Produce_ID,Produce_Name,Produce_Price,Produce_Count,Produce_IMG,state,Produce_Type)" .

                        "VALUES ('$type3','$id','$type1','$com_price','1','$Produce_img','0','$Produce_Type')";
                    $result1_1 = mysqli_query($dbc, $query1_1) or die(mysqli_error($dbc));
                    echo "<h1 style='margin-top: 40px;font-size: 1.3em'>恭喜您已成功添加以下商品进购物车</h1>
            <table align='left' style='width:100%;height:auto;margin-top: 30px;color: white'>
                <tr style='height:60px'>
                    <td width='40%;'>型号</td>
                       <td width='30%;>市场价</td>
                    <td width='30%;'>企业价格</td>
                </tr>
                <tr style='height:60px'>
                    <td>$type1</td>
                   <td>$prc</td>
                    <td style='color: red;font-size: 1.3em;font-weight: 500'>$com_price</td>
                </tr>
                </table>";
                }

            }

        }
        else {
            echo "<div class='no1'>暂时无货</div>";
        }


}
else{
    echo "请先去<a href='./log.html'>登陆</a>!";
}