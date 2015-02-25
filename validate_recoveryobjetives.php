<?php

require_once('basic_files.php');

@$id = $_POST['id'];
@$var = $_POST['rto'];
@$var1 = $_POST['rpo'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario cuenta con campos vacios.');
	}else{
		show_header('Guardar objetivos de recuperación');
		save_recoveryobjetives($id,$var,$var1);
		header("refresh:0; url=\"view_processfrequency.php?id=$id\"");
		show_footer();
	}
}catch(Exception $e){
	show_header('Errores');
	echo '<div class="container">';
	echo '<div class="row">';
	echo '<div class="col-md-12">';
	echo '<p></p>';
	echo '<div class="alert alert-danger">';
	echo $e->getMessage();
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	show_footer();
	exit;
}