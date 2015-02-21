<?php

require_once('basic_files.php');

@$id = $_POST['id'];

@$var0 = $_POST['area'];
@$var1 = $_POST['service'];
@$var2 = $_POST['internal_dependency'];
@$var3 = $_POST['external_dependency'];
@$var4 = $_POST['input_dependency'];
@$var5 = $_POST['output_dependency'];
@$var6 = $_POST['dependency_level'];

@$button = $_POST['save'];

try{
	if($button == 'save'){
		if(!empty_fields($_POST)){
			throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
		}else{
			show_header('Guardar personal critico');
			$next_number= getConsecutiveNumber($id,'dependencias_tecnologicas','num_dependencia_proceso');
			save_technologicaldependencies($id,$next_number,$var0,$var1,$var2,$var3,$var4,$var5,$var6);
			header("refresh:0; url=\"view_technologicaldependencies.php?id=$id\"");
			show_footer();
		}
	}else{
		show_header('Guardar volumen transaccional');
		header("refresh:0; url=\"view_databackups.php?id=$id\"");
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