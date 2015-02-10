<?php

require_once('basic_files.php');

@$var = $_POST['backup_type'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
	}else{
		show_header('Guardar leader');
		save_backuptype($var);
		show_footer();
	}
}catch(Exception $e){
	show_header('Errores');
	echo '<div class="alert alert-danger">';
	echo $e->getMessage();
	echo '</div>';
	show_footer();
	exit;
}