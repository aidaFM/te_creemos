<?php

require_once('basic_files.php');

@$id = $_POST['id'];

@$var0 = $_POST['backup_type'];
@$var1 = $_POST['backup_storage'];
@$var2 = $_POST['place'];
@$var3 = $_POST['zone'];
@$var4 = $_POST['name'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
	}else{
		show_header('Guardar respaldos de información');
		save_databackups($id,$var0,$var1,$var2,$var3,$var4);
		header("refresh:0; url=\"view_internaldependencies.php?id=$id\"");
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