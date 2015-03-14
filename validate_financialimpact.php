<?php

require_once('basic_files.php');

@$id = $_POST['id'];

@$var0 = $_POST['1'];
@$var1 = $_POST['2'];
@$var2 = $_POST['3'];
@$var3 = $_POST['4'];
@$var4 = $_POST['5'];
@$var5 = $_POST['6'];
@$var6 = $_POST['7'];
@$var7 = $_POST['8'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario cuenta con campos vacios.');
	}else{
		show_header('Guardar objetivos de recuperación');
		$next_number= getConsecutiveNumber($id,'impactos_financiero','consecutivo_impacto_financiero');
		save_financialimpact($id,$next_number,$var0,$var1,$var2,$var3,$var4,$var5,$var6,$var7);
		header("refresh:0; url=\"view_economicimpacts.php?id=$id\"");
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