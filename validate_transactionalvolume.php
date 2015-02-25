<?php

require_once('basic_files.php');

@$id = $_POST['id'];
@$var = $_POST['average'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
	}else{
		show_header('Guardar volumen transaccional');
		save_transactionalvolume($id,$var);
		header("refresh:0; url=\"view_windowoperation.php?id=$id\"");
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