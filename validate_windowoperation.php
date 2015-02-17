<?php

require_once('basic_files.php');

@$id = $_POST['id'];
@$var0 = $_POST['hora_0'];
@$var1 = $_POST['hora_1'];
@$var2 = $_POST['hora_2'];
@$var3 = $_POST['hora_3'];
@$var4 = $_POST['hora_4'];
@$var5 = $_POST['hora_5'];
@$var6 = $_POST['hora_6'];
@$var7 = $_POST['hora_7'];
@$var8 = $_POST['hora_8'];
@$var9 = $_POST['hora_9'];
@$var10 = $_POST['hora_10'];
@$var11 = $_POST['hora_11'];
@$var12 = $_POST['hora_12'];
@$var13 = $_POST['hora_13'];
@$var14 = $_POST['hora_14'];
@$var15 = $_POST['hora_15'];
@$var16 = $_POST['hora_16'];
@$var17 = $_POST['hora_17'];
@$var18 = $_POST['hora_18'];
@$var19 = $_POST['hora_19'];
@$var20 = $_POST['hora_20'];
@$var21 = $_POST['hora_21'];
@$var22 = $_POST['hora_22'];
@$var23 = $_POST['hora_23'];

try{
	if(!empty_fields($_POST)){
		throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
	}else{
		show_header('Guardar leader');
		save_processfrequency($id,$var,$var1);
		header("refresh:0; url=\"view_system.php?id=$id\"");
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