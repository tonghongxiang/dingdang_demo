<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/21
 * Time: 下午1:43
 */

session_start();
$user_id=$_SESSION['user_id'];

$da_lei=$_POST['com_name'];
$xiao_lei=$_POST['com_tel'];
$shu_ming=$_POST['com_email'];
$file=$_FILES['file'];
$name=$file['name'];
$type=strtolower(substr($name,strripos($name,'.')+1));
$allow_type=array('jpg','jpeg','gif','png');


if (!in_array($type,$allow_type)){
    return;
}
else{
    if (!is_uploaded_file($file['tmp_name'])){
        return;
    }
    else{
        $upload_path="/Users/tonghongxiang/websites/upload/license/";
        $rel_name=md5(time().$name) . '.' . $type;
        $filename = $upload_path.$rel_name;

        if(move_uploaded_file($file['tmp_name'],$filename)){
            echo "Successfully!";

            copy($file['tmp_name'],$filename);


            $dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
            or die("ERROR to connect mysql");

            $query="INSERT INTO Company_Authentication(Company_Name,User_ID,Company_Tel,Company_Email,Company_Licence,Add_Time)".
                "VALUES('$da_lei','$user_id','$xiao_lei','$shu_ming','license/$rel_name',now())";

            if (!$result=mysqli_query($dbc,$query)){
                echo ("错误描述".mysqli_error($dbc));
            }

            mysqli_close($dbc);

        }
        else{
            echo "Failed!";
        }
    }
}

