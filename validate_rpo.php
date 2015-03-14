<?php

require_once('basic_files.php');

@$var = $_POST['rpo_name'];
@$var1 = $_POST['rpo_description'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario cuenta con campos vacios');
	}else{
		show_header('RPO');
		save_rpo($var,$var1);
		header('Location:view_rpo.php');
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