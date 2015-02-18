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
		save_economicimpacts($id,$var0,$var1,$var2,$var3,$var4,$var5,$var6,$var7);
		header("refresh:0; url=\"view_nonfinancialimpacts.php?id=$id\"");
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