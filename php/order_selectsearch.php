<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/5/18
 * Time: 下午9:31
 */


$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$tel=$_POST['name1'];

$query="SELECT * FROM Order_List WHERE User_Tel LIKE '%$tel%'";

$result=mysqli_query($dbc,$query);

$data_row=mysqli_num_rows($result);
if($data_row <=0){
    echo "查无符合的数据！";
    mysqli_close($dbc);
}
else
{
    echo "<table class='table_od1' >
				<thead>
					<tr style='color: black'>
			<th scope=\"col\" style='width: 45px'>订单编号</th>
            <th scope=\"col\" style='width: 45px'>用户编号</th>
            <th scope=\"col\" style='width: 45px'>用户</th>
            <th scope=\"col\">金额</th>
            <th scope=\"col\">手机号</th>
            <th scope=\"col\">地址</th>
            <th scope=\"col\">下单时间</th>
            <th scope=\"col\">状态</th>
            <th scope=\"col\" style='width: 45px'>操作</th>
			            </tr>
				</thead>
				<tbody >	";

    for ($i=0;$i<$data_row;$i++) {
        $a=0;
        $sql_arr = mysqli_fetch_assoc($result);
        $order_id = $sql_arr['Order_ID'];
        $User_Id=$sql_arr['User_Id'];
        $price=$sql_arr['Produce_Price'];
        $User_Tel = $sql_arr['User_Tel'];
        $Nick_Name=$sql_arr['Nick_Name'];
        $Order_Time=$sql_arr['Order_Time'];
        $pay=$sql_arr['Pay'];
        $arrive=$sql_arr['Arrive'];
        $User_Address=$sql_arr['User_Address'];

        echo "<tr>
        
        <td>$order_id</td>
        <td>$User_Id</td>
        <td>$Nick_Name</td>
        <td>$price</td>
        <td>$User_Tel</td>
        <td><input class='adress1' id='$order_id' type='tel' value='$User_Address' style='width: 80px;border:none;border-bottom:1px solid #000;background-color: transparent'></td>
        <td>$Order_Time</td>
        <td>$pay</td>
        <td><i id='$order_id' class='icon-trash' style='color: #00b4ef;cursor: pointer'></i></td>
    </tr>>";
    };

    echo " </tbody>
			</table>
			";
    mysqli_close($dbc);
}