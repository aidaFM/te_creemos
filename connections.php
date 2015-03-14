<?php

function home_connection(){
	$conn = new mysqli('localhost', 'root', '', 'te_creemos');
	if (!$conn) {
		throw new Exception('No se puede establecer conexion con el servidor de base de datos');
		}
	else {
		return $conn;
		}
}
?>