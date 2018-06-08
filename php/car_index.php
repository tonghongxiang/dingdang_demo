
<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2017/12/6
 * Time: 下午3:21
 */

session_start();
$type6=$_SESSION["user_nick"];



echo "
<table style=\"border-collapse:collapse;\" id=\"table\">
<tr>
            <td style=\"width: 10%\">预览</td>
            <td style=\"width: 30%\">商品名称</td>
            <td style=\"width: 10%\">颜色</td>
            <td style=\"width: 15%\">单价</td>
            <td style=\"width: 15%\">数量</td>
            <td style=\"width: 10%\">小计</td>
            <td style=\"width: 10%\">操作</td>
        </tr>
";

if( empty($_SESSION["user_id"]) ){
    echo "请先登陆!<a href='log.html'>点击这里登陆</a>";
}else{
    echo "<div><a style='font-size: 1.3em;color: red'>$type6&nbsp&nbsp的购物车</a>";
    $type5=$_SESSION["user_id"];

    $dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
    or die("ERROR to connect mysqli");

    $query3="SELECT * FROM Car_List WHERE User_ID=$type5 AND state=0";
    $result3=mysqli_query($dbc,$query3);

    $data_row=mysqli_num_rows($result3);

    for ($i=0;$i<$data_row;$i++) {
        $a=0;
        $sql_arr = mysqli_fetch_assoc($result3);
        $order_id = $sql_arr['Car_ID'];
        $order_phone_name = $sql_arr['Produce_Name'];
        $order_phone_color=$sql_arr['Produce_Color'];
        $order_phone_count = $sql_arr['Produce_Count'];
        $order_phone_price = $sql_arr['Produce_Price'];
        $Produce_img=$sql_arr['Produce_IMG'];
        $a=$a+$order_phone_price;
        $all=$order_phone_count*$a;


        echo "<tr>
        <td><img class='img_show' src='../upload/$Produce_img' style='width:60px;height:40px'/></td>
        <td>$order_phone_name</td>
        <td>$order_phone_color</td>
        <td>$order_phone_price</td>
        <td><input type='number'  id='$order_id' class='update_car' value=\"$order_phone_count\" style='width: 50px;background: rgba(255, 255, 255, .3);-webkit-backdrop-filter: blur(10px);' /></td>
        <td ID='$all' class='price_td'>$all 元</td>
        <td><a href='car_index.html' id='$order_id' class='dt'><i class='glyphicon glyphicon-trash'></i></a></td>
    </tr>";
    };
    mysqli_close($dbc);
}

echo "<tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>合计金额</td>
            <td id='he_ji'></td>
            <td><a href=\"#\" id='submit'> 提交</a></td>
    </table>";
?>
<script type="text/javascript">
    var calcTotal=function(table,column){//合计，表格对象，对哪一列进行合计，第一列从0开始
        var trs=table.getElementsByTagName('tr');
        var start=1,//忽略第一行的表头
            end=trs.length-1;//忽略最后合计的一行
        var total=0;
        for(var i=start;i<end;i++){
            var td=trs[i].getElementsByTagName('td')[column];
            var t=parseFloat(td.innerHTML);
            if(t)total+=t;
        }
        trs[end].getElementsByTagName('td')[column].innerHTML=total;
    };
    calcTotal(document.getElementById('table'),5); //以上为计算总金额


</script>
