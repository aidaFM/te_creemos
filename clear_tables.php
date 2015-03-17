<?php
require_once('basic_files.php');

//clear all the data in tables

function clearTable($host,$user,$pass,$database,$table){
	$conn = mysqli_connect($host,$user,$pass,$database);
	$result = mysqli_query($conn,$table);
	if($result){
		return TRUE;
	}else{
		return mysql_errno()." ".mysql_error();
	}
}

	$tables = 'truncate cat_procesos;';

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate inventario_procesos;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate cat_sistemas;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate proceso_sistemas;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate operacion_proceso;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate procesa_ciclico;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate impactos_financieros";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate multas_penalizaciones;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate impactos_no_financieros;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate cat_directorio_personal_critico;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate proceso_personal_tipopersonal;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate dependencia_tecnologicas;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate respaldos_proceso;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate interdependencias_internas;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate interdependencias_externas;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate cat_directorio_proveedores;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate proceso_proveedores;";

	clearTable("localhost","root","","te_creemos",$tables);

	$tables = "truncate requerimientos_bcp;";

	clearTable("localhost","root","","te_creemos",$tables);

	header("refresh:5; url=index.php");

	show_header('Borrando datos');
	echo '<div class="container">';
	echo '<div class="row">';
	echo '<div class="col-md-12">';
	echo '<p></p>';
	echo '<div class="alert alert-warning">';
	echo 'Por favor espere se estan limpiando las tablas';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	show_footer();
?>