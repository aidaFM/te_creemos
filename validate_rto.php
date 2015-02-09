<?php

require_once('basic_files.php');

@$var = $_POST['rto_name'];
@$var1 = $_POST['rto_description'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario cuenta con campos vacios');
	}else{
		show_header('RTO');
		save_rto($var,$var1);
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