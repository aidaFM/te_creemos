<?php

require_once('basic_files.php');

@$id = $_POST['id'];

@$var0 = $_POST['pc_on'];
@$var1 = $_POST['pc_oc'];
@$var2 = $_POST['phone_on'];
@$var3 = $_POST['phone_oc'];
@$var4 = $_POST['printer_on'];
@$var5 = $_POST['printer_oc'];
@$var6 = $_POST['lap_on'];
@$var7 = $_POST['lap_oc'];
@$var8 = $_POST['vpn_on'];
@$var9 = $_POST['vpn_oc'];
@$var10 = $_POST['desktop_on'];
@$var11 = $_POST['desktop_oc'];
@$var12 = $_POST['formats'];
@$var13 = $_POST['others'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario cuenta con campos vacios.');
	}else{
		show_header('Guardar requerimientos de recuperación');
		save_recoveryrequirements($id,$var0,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$var12,$var13);
		header("refresh:0; url=index.php");
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