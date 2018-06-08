<?php
session_start();
if( empty($_SESSION['admin_name']))
{

}
else
{
    echo  $_SESSION["admin_nick"];

}
