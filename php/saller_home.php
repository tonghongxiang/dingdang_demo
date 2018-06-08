<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/27
 * Time: 下午5:30
 */

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query1="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-01%'";
$result1=mysqli_query($dbc,$query1);

$data_row1=mysqli_num_rows($result1);

for ($i=0;$i<$data_row1;$i++) {
    $sql_arr = mysqli_fetch_assoc($result1);
    $order_price = $sql_arr['Produce_Price'];
    $a1 = $a1 + $order_price;
}


$query2="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-02%'";
$result2=mysqli_query($dbc,$query2);

$data_row2=mysqli_num_rows($result2);

for ($i=0;$i<$data_row2;$i++) {
    $sql_arr = mysqli_fetch_assoc($result2);
    $order_price = $sql_arr['Produce_Price'];
    $a2 = $a2 + $order_price;
}


$query3="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-03%'";
$result3=mysqli_query($dbc,$query3);

$data_row3=mysqli_num_rows($result3);

for ($i=0;$i<$data_row3;$i++) {
    $sql_arr = mysqli_fetch_assoc($result3);
    $order_price = $sql_arr['Produce_Price'];
    $a3 = $a3 + $order_price;
}


$query4="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-04%'";
$result4=mysqli_query($dbc,$query4);

$data_row4=mysqli_num_rows($result4);

for ($i=0;$i<$data_row4;$i++) {
    $sql_arr = mysqli_fetch_assoc($result4);
    $order_price = $sql_arr['Produce_Price'];
    $a4 = $a4 + $order_price;
}


$query5="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-05%'";
$result5=mysqli_query($dbc,$query5);

$data_row5=mysqli_num_rows($result5);

for ($i=0;$i<$data_row5;$i++) {
    $sql_arr = mysqli_fetch_assoc($result5);
    $order_price = $sql_arr['Produce_Price'];
    $a5 = $a5 + $order_price;
}


$query6="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-06%'";
$result6=mysqli_query($dbc,$query6);

$data_row6=mysqli_num_rows($result6);

for ($i=0;$i<$data_row6;$i++) {
    $sql_arr = mysqli_fetch_assoc($result6);
    $order_price = $sql_arr['Produce_Price'];
    $a6 = $a6 + $order_price;
}


$query7="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-07%'";
$result7=mysqli_query($dbc,$query7);

$data_row7=mysqli_num_rows($result7);

for ($i=0;$i<$data_row7;$i++) {
    $sql_arr = mysqli_fetch_assoc($result7);
    $order_price = $sql_arr['Produce_Price'];
    $a7 = $a7 + $order_price;
}


$query8="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-08%'";
$result8=mysqli_query($dbc,$query8);

$data_row8=mysqli_num_rows($result8);

for ($i=0;$i<$data_row8;$i++) {
    $sql_arr = mysqli_fetch_assoc($result8);
    $order_price = $sql_arr['Produce_Price'];
    $a8 = $a8 + $order_price;
}


$query9="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-09%'";
$result9=mysqli_query($dbc,$query9);

$data_row9=mysqli_num_rows($result9);

for ($i=0;$i<$data_row9;$i++) {
    $sql_arr = mysqli_fetch_assoc($result9);
    $order_price = $sql_arr['Produce_Price'];
    $a9 = $a9 + $order_price;
}


$query10="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-10%'";
$result10=mysqli_query($dbc,$query10);

$data_row10=mysqli_num_rows($result10);

for ($i=0;$i<$data_row10;$i++) {
    $sql_arr = mysqli_fetch_assoc($result10);
    $order_price = $sql_arr['Produce_Price'];
    $a10 = $a10 + $order_price;
}


$query11="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-11%'";
$result11=mysqli_query($dbc,$query11);

$data_row11=mysqli_num_rows($result11);

for ($i=0;$i<$data_row11;$i++) {
    $sql_arr = mysqli_fetch_assoc($result11);
    $order_price = $sql_arr['Produce_Price'];
    $a11 = $a1 + $order_price;
}


$query12="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-12%'";
$result12=mysqli_query($dbc,$query12);

$data_row12=mysqli_num_rows($result12);

for ($i=0;$i<$data_row12;$i++) {
    $sql_arr = mysqli_fetch_assoc($result12);
    $order_price = $sql_arr['Produce_Price'];
    $a12 = $a12 + $order_price;
}

echo "$a1,$a2,$a3,$a4,0,0,0,0,0,0,0,0";