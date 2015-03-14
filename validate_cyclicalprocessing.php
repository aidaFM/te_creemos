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
@$var8 = $_POST['9'];
@$var9 = $_POST['10'];
@$var10 = $_POST['11'];
@$var11 = $_POST['12'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
	}else{
		show_header('Guardar procesamiento ciclico');
		save_cyclicalprocessing($id,$var0,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11);
		header("refresh:0; url=\"view_financialimpact.php?id=$id\"");
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