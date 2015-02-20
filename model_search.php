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
	$searchdata = $conn->query("SELECT descripcion_impacto_financiero FROM cat_tipos_impactos_financieros WHERE clave_impacto_financiero = '".$var."'");
	if(!$searchdata){
		throw new Exception('Error en la consulta getTypeFinancialImpact.');
	}else{
		while($data = $searchdata->fetch_array()){
			return $data['descripcion_impacto_financiero'];
		}
	}
	$searchdata->free();
	$searchdata->close();
}

function getNoneFinancialImpact($var)
{
	$conn = home_connection();
	$searchdata = $conn->query("SELECT descripcion_impacto_no_fin FROM cat_impactos_no_financieros WHERE clave_impacto_no_fin = '".$var."'");
	if(!$searchdata){
		throw new Exception('Error en la consulta getNoneFinancialImpact.');
	}else{
		while($data = $searchdata->fetch_array()){
			return $data['descripcion_impacto_no_fin'];
		}
	}
	$searchdata->free();
	$searchdata->close();
}

function getNoneFinancialImpactLevel($var)
{
	$conn = home_connection();
	$searchdata = $conn->query("SELECT descripcion_nivel_imp_no_fin FROM cat_nivel_impactos_no_financieros WHERE clave_nivel_imp_no_fin = '".$var."'");
	if(!$searchdata){
		throw new Exception('Error en la consulta getNoneFinancialImpactLevel.');
	}else{
		while($data = $searchdata->fetch_array()){
			return $data['descripcion_nivel_imp_no_fin'];
		}
	}
	$searchdata->free();
	$searchdata->close();
}

function getStaffId($var)
{
	$conn = home_connection();
	$searchdata = $conn->query("SELECT clave_personal FROM cat_directorio_personal_critico WHERE nombre_personal = '".$var."'");
	if(!$searchdata){
		throw new Exception('Error en la consulta getStaffId.');
	}else{
		while($data = $searchdata->fetch_array()){
			return $data['clave_personal'];
		}
	}
	$searchdata->free();
	$searchdata->close();
}

function getProviderId($var)
{
	$conn = home_connection();
	$searchdata = $conn->query("SELECT clave_provedor FROM cat_directorio_proveedores WHERE nombre_provedor = '".$var."'");
	if(!$searchdata){
		throw new Exception('Error en la consulta getProviderId.');
	}else{
		while($data = $searchdata->fetch_array()){
			return $data['clave_provedor'];
		}
	}
	$searchdata->free();
	$searchdata->close();
}

function getConsecutiveNumber($id,$table,$var0)
{
	$conn = home_connection();
	$searchdata = $conn->query("SELECT MAX($var0) as maximo FROM $table WHERE clave_proceso = $id");
	if(!$searchdata){
		throw new Exception('Error en la consulta getConsecutiveNumber.');
	}else{
		while($data = $searchdata->fetch_array()){
			return $data['maximo'] + 1;
		}
	}
	$searchdata->free();
	$searchdata->close();
}