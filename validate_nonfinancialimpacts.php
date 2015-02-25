<?php

require_once('basic_files.php');

@$id = $_POST['id'];

@$var0 = $_POST['1'];
@$var1 = $_POST['2'];
@$var2 = $_POST['3'];
@$var3 = $_POST['4'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario cuenta con campos vacios.');
	}else{
		show_header('Guardar impactos no financieros');
		save_nonfinancialimpacts($id,$var0,$var1,$var2,$var3);
		header("refresh:0; url=\"view_criticalstaff.php?id=$id\"");
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