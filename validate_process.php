<?php

require_once('basic_files.php');

@$var = $_POST['process_name'];
@$var1 = $_POST['area'];
@$var2 = $_POST['leader_name'];
@$var3 = $_POST['process_target'];
@$var4 = $_POST['process_description'];
@$var5 = $_POST['boss_name'];
@$var6 = $_POST['criticality_level'];
@$var7 = $_POST['out_of_service'];
@$var8 = $_POST['normal_operators'];
@$var9 = $_POST['contingency_operators'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
	}else{
		show_header('Crear proceso');
		save_process($var,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9);
		$id = getProcessId($var);
		header("refresh:0; url=\"view_recoveryobjetives.php?id=$id\"");
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