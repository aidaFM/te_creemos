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

function getNameProcess($var)
{
	$conn = home_connection();
	$searchdata = $conn->query("SELECT nombre_proceso FROM cat_procesos WHERE clave_proceso = '".$var."'");
	if(!$searchdata){
		throw new Exception('Error en la consulta getNameProcess.');
	}else{
		while($data = $searchdata->fetch_array()){
			return $data['nombre_proceso'];
		}
	}
	$searchdata->free();
	$searchdata->close();
}

function getSystemId($var)
{
	$conn = home_connection();
	$searchdata = $conn->query("SELECT clave_sistema FROM cat_sistemas WHERE nombre_sistema = '".$var."'");
	if(!$searchdata){
		throw new Exception('Error en la consulta getSystemId.');
	}else{
		while($data = $searchdata->fetch_array()){
			return $data['clave_sistema'];
		}
	}
	$searchdata->free();
	$searchdata->close();
}

function getNumberOfSystems($var)
{
	$conn = home_connection();
	$searchdata = $conn->query("SELECT clave_sistemas FROM proceso_sistemas WHERE clave_proceso = '".$var."'");
	$find=FALSE;
	if(!$searchdata){
		throw new Exception('Error en la consulta getNumberOfSystems.');
	}else{
		$number_of_systems = $searchdata->num_rows;
		if($number_of_systems>0) {
			$find = TRUE;
		}else{
			$find = FALSE;
		}
		return $find;
	}
	$searchdata->free();
	$searchdata->close();
}

function getTimeAffectation($var)
{
	$conn = home_connection();
	$searchdata = $conn->query("SELECT descripcion_tiempo_afectacion FROM cat_tiempo_afectacion WHERE clave_tiempo_afectacion = '".$var."'");
	if(!$searchdata){
		throw new Exception('Error en la consulta getSystemId.');
	}else{
		while($data = $searchdata->fetch_array()){
			return $data['descripcion_tiempo_afectacion'];
		}
	}
	$searchdata->free();
	$searchdata->close();
}

function getTypeFinancialImpact($var)
{
	$conn = home_connection();
	$searchdata = $conn->query("SELECT descripcion_tiempo_afectacion FROM cat_tiempo_afectacion WHERE clave_tiempo_afectacion = '".$var."'");
	if(!$searchdata){
		throw new Exception('Error en la consulta getSystemId.');
	}else{
		while($data = $searchdata->fetch_array()){
			return $data['descripcion_tiempo_afectacion'];
		}
	}
	$searchdata->free();
	$searchdata->close();
}