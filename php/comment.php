<?php
session_start();
$type6=$_SESSION["user_id"];
	
	$parent = $_GET['parent'];
	$belong = $_GET['belong'];
	$content = htmlentities($_GET['content']);
	$username = $_GET['username'];
	$email = $_GET['email'];

	$query = "insert into comments (parent,belong,content,time,username,email) value ($parent,$belong,'$content',NOW(),'$username','$email')";
	$result = _mysql($query,'insert');
	
	$query = "select * from comments where parent='$parent' and belong='$belong' and content='$content'";
	$result2 = _mysql($query,'search');

	$id = $result2[0]['id'];

	echo '{"result":"'.$result.'","id":"'.$id.'"}';
?>