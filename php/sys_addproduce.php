<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/22
 * Time: 下午5:50
 */

$produce_dalei=$_POST['dalei'];
$produce_xinghao=$_POST['xinghao'];
$produce_id=$_POST['order_id'];
$produce_color=$_POST['color1'];
$produce_qiyejia=$_POST['qiyejia'];
$produce_jia=$_POST['vipjia'];
$produce_kucun=$_POST['kucun'];
$file=$_FILES['file'];
$name=$file['name'];
$type=strtolower(substr($name,strripos($name,'.')+1));
$allow_type=array('jpg','jpeg','gif','png');
$rest= substr($produce_color,0,9);
$rest1= substr($produce_color,9);


$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysql");

$query0="SELECT * FROM Produce_List WHERE Produce_Name='$produce_xinghao' AND Produce_Color='$rest'";
$result0=mysqli_query($dbc,$query0);
$data_row=mysqli_num_rows($result0);

if($data_row!=0){
    echo "此产品已存在";
}
else{

if (!in_array($type,$allow_type)){
    return;
}
else{
    if (!is_uploaded_file($file['tmp_name'])){
        return;
    }
    else{

        $upload_path="/Users/tonghongxiang/websites/upload/produce_img/";
        $rel_name=md5(time().$name) . '.' . $type;
        $filename = $upload_path.$rel_name;

        if(move_uploaded_file($file['tmp_name'],$filename)){
            echo "Successfully!";

            copy($file['tmp_name'],$filename);





            $query="INSERT INTO Produce_List(Produce_Name,Produce_Color,Produce_Price,Com_Price,Produce_RGB,Produce_img,Produce_Stye,Produce_Count)".
                "VALUES('$produce_xinghao','$rest','$produce_jia','$produce_qiyejia','$rest1','produce_img/$rel_name','$produce_dalei','$produce_kucun')";
            $result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

            mysqli_close($dbc);

        }
        else{
            echo "Failed!";
        }
    }
}
}