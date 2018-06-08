<?php
session_start();
if( empty($_SESSION["user_id"]) )
{
    echo '<li><a href="log.html">SIGN IN</a></li>';
}
else
{
    echo  '<sapn>'.$_SESSION["user_nick"].'</sapn>';

}

