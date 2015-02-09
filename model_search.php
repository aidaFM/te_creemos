<?php

require_once('connections.php');

function getProcessId($var)
{
	$conn = home_connection();
	$searchdata = $conn->query("SELECT clave_proceso FROM cat_procesos WHERE nombre_proceso = '".$var."'");
	if(!$searchdata){
		throw new Exception('Error en la consulta getProcessId.');
	}else{
		while($data = $searchdata->fetch_array()){
			return $data['clave_proceso'];
		}
	}
	$searchdata->free();
	$searchdata->close();
}