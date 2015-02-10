<?php

require_once('basic_files.php');

@$id = $_POST['id'];
@$var = $_POST['frequency'];
@$var1 = $_POST['critical_period'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
	}else{
		show_header('Guardar leader');
		save_processfrequency($id,$var,$var1);
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