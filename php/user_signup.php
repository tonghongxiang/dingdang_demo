<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2017/11/22
 * Time: 下午2:40
 */

$nickname=$_POST['inputnickname'];
$mi_ma=$_POST['inputPassword2'];
$queren_mima=$_POST['inputPassword3'];
$phone_num=$_POST['inputphone2'];
$email=$_POST['inputEmail2'];
$sex=$_POST['Sex'];
$reg = '/^[\d]{6,20}$/ ';

include 'db_config.php';

$query0="SELECT * FROM User_List WHERE User_Tel='$phone_num'";
$result0=mysqli_query($dbc,$query0);

$date_rows=mysqli_num_rows($result0);

if($mi_ma==$queren_mima){
    if($date_rows<=0){

        if(preg_match($reg,$mi_ma,$match)){
            $query="INSERT INTO User_List(User_Tel,User_Password,User_Email,User_Sex,User_Addtime,Nick_Name)".

                "VALUES ('$phone_num','$mi_ma','$email','$sex',now(),'$nickname')" or  die(mysqli_error());

            $result=mysqli_query($dbc,$query)
            or  die(mysqli_error());

            mysqli_close($dbc);

            echo "恭喜你注册成功，登录账号：$phone_num 密码：$mi_ma<br><a href='../log.html'>点击前去登录</a>";
        }else{
            echo "密码最低六位数，最高20位数，请检查！";
        }
    }else{
        echo "手机号已存在，返回重试。";
    }

}
else{
    echo "<script>alert('俩次输入密码不一致！')</script>";
}