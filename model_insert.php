<?php

require_once('connections.php');

function save_area($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_areas VALUES(null,'".$var."')");
}

function save_leader($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_lider_proyecto VALUES(null,'".$var."')");
}

function save_boss($var,$var1)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_jefes_inmediatos VALUES(null,'".$var."','".$var1."')");
}


function save_criticality($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_criticidad_procesos VALUES(null,'".$var."')");
}

function save_outofservice($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_tiempo_maximo_fs VALUES(null,'".$var."')");
}


function save_frequency($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_frecuencia_proceso VALUES(null,'".$var."')");
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

function save_process($var,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_procesos VALUES(null,'".$var1."','".$var."','".$var2."','".$var3."')");
	if(!$savedata){

	}else{
		$id = getProcessId($var);
		$savedata1 = $conn->query("INSERT INTO inventario_procesos VALUES('.$id.','".$var6."','".$var7."','".$var2."','".$var5."','".$var8."','".$var9."',null,null,null,null,null,null)");
	}
}

function save_recoveryobjetives($id,$var,$var1)
{
	$conn = home_connection();
	$savedata = $conn->query("UPDATE inventario_procesos SET clave_rto='".$var."', clave_rpo='".$var1."' WHERE clave_proceso='".$id."'");
}
