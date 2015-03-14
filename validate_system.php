<?php

require_once('basic_files.php');

@$id = $_POST['id'];
@$var = $_POST['system_name'];
@$button = $_POST['save'];
try{
	if($button == 'save'){
		if(!empty_fields($_POST)){
			throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
		}else{
			show_header('Guardar sistema');
			save_sytem($var);
			$system_id = getSystemId($var);
			$next_number = getConsecutiveNumber($id,'proceso_sistemas','consecutivo_sistema');
			save_systemprocess($id,$next_number,$system_id);
			header("refresh:0; url=\"view_system.php?id=$id\"");
			show_footer();
		}
	}else{
		if(getNumberOfSystems($id) == FALSE){
			show_header('Guardar volumen transaccional');
			header("refresh:0; url=\"view_alternateprocedure.php?id=$id\"");
			show_footer();			
		}else{
			show_header('Guardar volumen transaccional');
			header("refresh:0; url=\"view_transactionalvolume.php?id=$id\"");
			show_footer();
		}
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