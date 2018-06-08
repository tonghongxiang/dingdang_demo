<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/24
 * Time: 下午9:54
 */

session_start();
$user_id=$_SESSION['user_id'];
$user_name=$_SESSION["user_nick"];

$pro_id=$_COOKIE['pro_id'];
$ord_id=$_COOKIE['ord_id'];

$title=$_POST['title'];
$content=$_POST['content'];
$file=$_FILES['myfile'];
$file=array_filter($file);
$name=$file['name'];




$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysql");
    $query="SELECT * FROM Produce_List WHERE Produce_ID='$pro_id'";
    $result=mysqli_query($dbc,$query);
    $sql_arr = mysqli_fetch_assoc($result);
    $produce_type=$sql_arr['Produce_Stye'];
    $produce_name=$sql_arr['Produce_Name'];

    mysqli_query($dbc, "INSERT INTO comments(Order_ID,produce_id,produce_name,parent,title,content,user_nickname,pinglun_img,time,pro_style) VALUES('$ord_id','$pro_id','$produce_name','0','$title','$content','$user_name','',now(),'$produce_type')" )  or die(mysqli_error($dbc));
    $getID=mysqli_insert_id($dbc);
    mysqli_close($dbc);

    for($i=0;$i<4;$i++){

    $type=strtolower(substr($name[$i],strripos($name[$i],'.')+1));
    $allow_type=array('jpg','jpeg','gif','png');
    if (!in_array($type,$allow_type)){
        return;
    }
    else {

                $upload_path = "/Users/tonghongxiang/websites/upload/pinglun/";
                $rel_name=md5(time().$name[$i]) . '.' . $type;
                $filename = $upload_path.$rel_name;

        $dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
        or die("ERROR to connect mysql");
                mysqli_query($dbc,"UPDATE comments SET pinglun_img=CONCAT(pinglun_img,'$rel_name,') WHERE com_id=$getID");
        mysqli_close($dbc);
                if (move_uploaded_file($file['tmp_name'][$i], $filename)) {
                    $m=$i+1;
                    echo "第".$m."张图片上传成功!";

                    copy($file['tmp_name'][$i], $filename);


                } else {
                    echo "Failed!";
                }


}



}