<?php

require_once('basic_files.php');

@$var = $_POST['backup_source'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario cuenta con campos vacios.');
	}else{
		show_header('Guardar medio de respaldo');
		save_backupsource($var);
		header('Location:view_backupsource.php');
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