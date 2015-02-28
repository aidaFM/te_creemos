<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "te_creemos";

$item_per_page = 5;

@$home_connection = new mysqli($db_host, $db_username, $db_password,$db_name);

if($home_connection->connect_error){
	die("Errorcode: ".$home_connection->connect_errno." ".$home_connection->connect_error);
}
