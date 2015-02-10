<?php

require_once('basic_files.php');

@$var = $_POST['critical_periods'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario cuenta con campos vacios.');
	}else{
		show_header('Guardar objetivos de recuperación');
		save_criticalperiod($var);
		header('Location:view_criticalperiod.php');
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