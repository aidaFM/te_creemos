<?php

require_once('basic_files.php');

@$id = $_POST['id'];

@$var0 = $_POST['name'];
// @$var1 = $_POST['type'];
@$var2 = $_POST['area'];
@$var3 = $_POST['home_phone'];
@$var4 = $_POST['cell_phone'];
@$var5 = $_POST['email'];
@$var6 = $_POST['address'];

@$button = $_POST['save'];

try{
	if($button == 'save'){
		if(!empty_fields($_POST)){
			throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
		}else{
			show_header('Guardar provedor');
			save_provider($var0,$var2,$var3,$var4,$var5,$var6);
			$provider_id = getProviderId($var0);
			$next_number = getConsecutiveNumber($id,'proceso_proveedor','consecutivo_proveedor');
			save_providerprocess($id,$next_number,$provider_id);
			header("refresh:0; url=\"view_providers.php?id=$id\"");
			show_footer();
		}
	}else{
		show_header('');
		header("refresh:0; url=\"view_recoveryrequirements.php?id=$id\"");
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