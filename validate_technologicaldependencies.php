<?php

require_once('basic_files.php');

@$id = $_POST['id'];

@$var0 = $_POST['area'];
@$var1 = $_POST['service'];
@$var2 = $_POST['internal_dependency'];
@$var3 = $_POST['internal_dependency'];
@$var4 = $_POST['input_dependency'];
@$var5 = $_POST['output_dependency'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario cuenta con campos vacios.');
	}else{
		show_header('Guardar dependencias tecnológicas');
		save_financialimpact($id,$var0,$var1,$var2,$var3,$var4,$var5);
		header("refresh:0; url=\"view_economicimpacts.php?id=$id\"");
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