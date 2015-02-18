<?php

require_once('basic_files.php');

@$id = $_POST['id'];
@$var0 = $_POST['staff_type'];
@$var1 = $_POST['name'];
@$var2 = $_POST['employee_number'];
@$var3 = $_POST['extension'];
@$var4 = $_POST['workstation'];
// @$var5 = $_POST['contingency_role'];
@$var6 = $_POST['home_phone'];
@$var7 = $_POST['cell_phone'];
@$var8 = $_POST['address'];
@$var9 = $_POST['internal_email'];
@$var10 = $_POST['external_email'];
print_r($_POST);
@$button = $_POST['save'];

try{
	if($button == 'save'){
		if(!empty_fields($_POST)){
			throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
		}else{
			show_header('Guardar personal critico');
			save_staffdirectory($var1,$var2,$var3,$var4,$var6,$var7,$var8,$var9,$var10);
			$staff_id = getStaffId($var1);
			save_processstaff($id,$staff_id,$var0);
			header("refresh:0; url=\"view_criticalstaff.php?id=$id\"");
			show_footer();
		}
	}else{
		if(getNumberOfSystems($id) == FALSE){
			show_header('Guardar volumen transaccional');
			// header("refresh:0; url=\"view_alternateprocedure.php?id=$id\"");
			show_footer();			
		}else{
			show_header('Guardar volumen transaccional');
			// header("refresh:0; url=\"view_transactionalvolume.php?id=$id\"");
			show_footer();
		}
	}
}catch(Exception $e){
	show_header('Errores');
	echo '<div class="alert alert-danger">';
	echo $e->getMessage();
	echo '</div>';
	show_footer();
	exit;
}