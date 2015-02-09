<?php

require_once('connections.php');

function save_criticality($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_criticidad_procesos VALUES(null,'".$var."')");
}

function save_rto($var,$var1)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_objetivo_tiempo_recuperacion VALUES(null,'".$var."','".$var1."')");
}

function save_rpo($var,$var1)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_objetivo_punto_recuperacion VALUES(null,'".$var."','".$var1."')");
}

function save_process($var,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_procesos VALUES(null,1,'".$var."','".$var2."','".$var3."')");
	if(!$savedata){

	}else{
		$id = getProcessId($var);
		$savedata1 = $conn->query("INSERT INTO inventario_procesos VALUES('.$id.','".$var5."','".$var6."','".$var1."','".$var4."','".$var7."','".$var8."',null,null,null,null,null,null)");
	}
}