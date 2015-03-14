<?php
require_once('basic_files.php');

function dropDataBase($host,$user,$pass,$drop){
	$conn = mysqli_connect($host,$user,$pass);
	$result = mysqli_query($conn,$drop);
	if($result){
		return TRUE;
	}else{
		return mysql_errno()." ".mysql_error();
	}
}