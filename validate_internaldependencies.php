<?php

require_once('basic_files.php');

@$id = $_POST['id'];

@$var0 = $_POST['area'];
@$var1 = $_POST['input_data'];
@$var2 = $_POST['output_data'];

@$button = $_POST['save'];

try{
	if($button == 'save'){
		if(!empty_fields($_POST)){
			throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
		}else{
			show_header('Guardar dependencias internas');
			$next_number= getConsecutiveNumber($id,'interdependencias_internas','clave_interdependencia_interna');
			save_internaldependencies($id,$next_number,$var0,$var1,$var2);
			header("refresh:0; url=\"view_internaldependencies.php?id=$id\"");
			show_footer();
		}
	}else{
		show_header('');
		header("refresh:0; url=\"view_externaldependencies.php?id=$id\"");
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