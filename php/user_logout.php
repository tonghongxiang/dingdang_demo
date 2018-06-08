<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2017/12/3
 * Time: 下午4:15
 */
session_start();
if(isset($_SESSION["user_id"])){
    session_unset();//free all session variable
    session_destroy();//销毁一个会话中的全部数据
    setcookie(session_name(),'',time()-3600);
    header('location:../index.html');
};
