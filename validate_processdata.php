<?php

require_once('basic_files.php');

@$id = $_POST['id'];

print_r($_POST);

@$button = $_POST['save'];

// try{
// 	if($button == 'save'){
// 		if(!empty_fields($_POST)){
// 			throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
// 		}else{
// 			show_header('Guardar personal critico');
// 			$next_number= getConsecutiveNumber($id,'dependencias_tecnologicas','num_dependencia_proceso');
// 			save_technologicaldependencies($id,$next_number,$var0,$var1,$var2,$var3,$var4,$var5,$var6);
// 			header("refresh:0; url=\"view_technologicaldependencies.php?id=$id\"");
// 			show_footer();
// 		}
// 	}else{
// 		show_header('Guardar volumen transaccional');
// 		header("refresh:0; url=\"view_databackups.php?id=$id\"");
// 		show_footer();
// 	}
// }catch(Exception $e){
// 	show_header('Errores');
// 	echo '<div class="container">';
// 	echo '<div class="row">';
// 	echo '<div class="col-md-12">';
// 	echo '<p></p>';
// 	echo '<div class="alert alert-danger">';
// 	echo $e->getMessage();
// 	echo '</div>';
// 	echo '</div>';
// 	echo '</div>';
// 	echo '</div>';
// 	show_footer();
// 	exit;
// }