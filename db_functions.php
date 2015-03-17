<?php

function dropDataBase($host,$user,$pass,$drop){
	$conn = mysqli_connect($host,$user,$pass);
	$result = mysqli_query($conn,$drop);
	if($result){
		return TRUE;
	}else{
		return mysql_errno()." ".mysql_error();
	}
	set_time_limit(0);
}

function createDataBase($host,$user,$pass,$database){
	$conn = mysqli_connect($host,$user,$pass);
	$query = "create database if not exists $database;";
	$result = mysqli_query($conn,$query);
	if($result){
		return TRUE;
	}else{
		return mysql_errno()." ".mysql_error();
	}
	set_time_limit(0);
}

function createTable($host,$user,$pass,$database,$table){
	$conn = mysqli_connect($host,$user,$pass,$database);
	$result = mysqli_query($conn,$table);
	if($result){
		return TRUE;
	}else{
		return mysql_errno()." ".mysql_error();
	}
	set_time_limit(0);
}

function insertRecord($host,$user,$pass,$database,$insert){
	$conn = mysqli_connect($host,$user,$pass,$database);
	$result = mysqli_query($conn,$insert);
	if($result){
		return TRUE;
	}else{
		return mysql_errno()." ".mysql_error();
	}
	set_time_limit(0);
}

function setCharacterCollate($host,$user,$pass,$database,$query){
    $conn = mysqli_connect($host,$user,$pass,$database);
    $result = mysqli_query($conn,$query);
    if($result){
        return TRUE;
    }else{
        return mysql_errno()." ".mysql_error();
    }
    set_time_limit(0);
}
