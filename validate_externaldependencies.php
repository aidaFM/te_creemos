<?php

require_once('basic_files.php');

@$id = $_POST['id'];

@$var0 = $_POST['member'];
@$var1 = $_POST['input_data'];
@$var2 = $_POST['output_data'];

@$button = $_POST['save'];

try{
	if($button == 'save'){
		if(!empty_fields($_POST)){
			throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
		}else{
			show_header('Guardar dependencias externas');
			$next_number= getConsecutiveNumber($id,'interdependencias_externas','clave_interdependencia_externa');
			save_externaldependencies($id,$next_number,$var0,$var1,$var2);
			header("refresh:0; url=\"view_externaldependencies.php?id=$id\"");
			show_footer();
		}
	}else{
		show_header('');
		header("refresh:0; url=\"view_providers.php?id=$id\"");
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