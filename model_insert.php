<?php

require_once('connections.php');

function save_area($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_areas VALUES(null,'".$var."')");
}

function save_leader($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_lider_proyecto VALUES(null,'".$var."')");
}

function save_boss($var,$var1)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_jefes_inmediatos VALUES(null,'".$var."','".$var1."')");
}


function save_criticality($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_criticidad_procesos VALUES(null,'".$var."')");
}

function save_outofservice($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_tiempo_maximo_fs VALUES(null,'".$var."')");
}


function save_frequency($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_frecuencia_proceso VALUES(null,'".$var."')");
}

function save_criticalperiod($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_periodos_criticos VALUES(null,'".$var."')");
}


function save_rto($var,$var1)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_objetivo_tiempo_recuperacion VALUES(null,'".$var."','".$var1."')");
}

function save_rpo($var,$var1)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_objetivo_punto_recuperacion VALUES(null,'".$var."','".$var1."')");
}

function save_backuptype($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_tipo_respaldos VALUES(null,'".$var."')");
}

function save_backupsource($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_medio_respaldos VALUES(null,'".$var."')");
}

function save_process($var,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_procesos VALUES(null,'".$var1."','".$var."','".$var3."','".$var4."')");
	if(!$savedata){

	}else{
		$id = getProcessId($var);
		$savedata1 = $conn->query("INSERT INTO inventario_procesos VALUES('.$id.','".$var6."','".$var7."','".$var2."','".$var5."','".$var8."','".$var9."',null,null,null,null,null,null)");
	}
}

function save_recoveryobjetives($id,$var,$var1)
{
	$conn = home_connection();
	$savedata = $conn->query("UPDATE inventario_procesos SET clave_rto='".$var."', clave_rpo='".$var1."' WHERE clave_proceso='".$id."'");
}

function save_processfrequency($id,$var,$var1)
{
	$conn = home_connection();
	$savedata = $conn->query("UPDATE inventario_procesos SET clave_frecuencia_proceso='".$var."', clave_periodos_criticos='".$var1."' WHERE clave_proceso='".$id."'");
}

function save_sytem($var)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_sistemas VALUES(null,'".$var."')");
}

function save_systemprocess($id,$next_number,$system_id)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO proceso_sistemas VALUES('".$id."','".$next_number."','".$system_id."')");
}

function save_alternateprocedure($id,$var)
{
	$conn = home_connection();
	$savedata = $conn->query("UPDATE inventario_procesos SET procedimiento_alterno='".$var."' WHERE clave_proceso='".$id."'");
}


function save_transactionalvolume($id,$var)
{
	$conn = home_connection();
	$savedata = $conn->query("UPDATE inventario_procesos SET promedio_transacciones_mensuales='".$var."' WHERE clave_proceso='".$id."'");
}

function save_windowoperation($id,$var0,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$var12,$var13,$var14,$var15,$var16,$var17,$var18,$var19,$var20,$var21,$var22,$var23)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO operacion_proceso VALUES('".$id."','".$var0."','".$var1."','".$var2."','".$var3."','".$var4."','".$var5."','".$var6."','".$var7."','".$var8."','".$var9."','".$var10."','".$var11."','".$var12."','".$var13."','".$var14."','".$var15."','".$var16."','".$var17."','".$var18."','".$var19."','".$var20."','".$var21."','".$var22."','".$var23."')");
}

function save_cyclicalprocessing($id,$var0,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO procesa_ciclico VALUES('".$id."','".$var0."','".$var1."','".$var2."','".$var3."','".$var4."','".$var5."','".$var6."','".$var7."','".$var8."','".$var9."','".$var10."','".$var11."')"); 
}

function save_financialimpact($id,$next_number,$var0,$var1,$var2,$var3,$var4,$var5,$var6,$var7)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO impactos_financiero VALUES('".$id."','".$next_number."',1,'".$var0."')");
	$next_number=$next_number+1;
	$savedata = $conn->query("INSERT INTO impactos_financiero VALUES('".$id."','".$next_number."',2,'".$var1."')");
	$next_number=$next_number+1;
	$savedata = $conn->query("INSERT INTO impactos_financiero VALUES('".$id."','".$next_number."',3,'".$var2."')");
	$next_number=$next_number+1;
	$savedata = $conn->query("INSERT INTO impactos_financiero VALUES('".$id."','".$next_number."',4,'".$var3."')");
	$next_number=$next_number+1;
	$savedata = $conn->query("INSERT INTO impactos_financiero VALUES('".$id."','".$next_number."',5,'".$var4."')");
	$next_number=$next_number+1;
	$savedata = $conn->query("INSERT INTO impactos_financiero VALUES('".$id."','".$next_number."',6,'".$var5."')");
	$next_number=$next_number+1;
	$savedata = $conn->query("INSERT INTO impactos_financiero VALUES('".$id."','".$next_number."',7,'".$var6."')");
	$next_number=$next_number+1;
	$savedata = $conn->query("INSERT INTO impactos_financiero VALUES('".$id."','".$next_number."',8,'".$var7."')");
}

function save_economicimpacts($id,$next_number,$var0,$var1,$var2,$var3,$var4,$var5,$var6,$var7)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO multas_penalizaciones VALUES('".$id."','".$next_number."',1,'".$var0."')");
	$next_number=$next_number+1;
	$savedata = $conn->query("INSERT INTO multas_penalizaciones VALUES('".$id."','".$next_number."',2,'".$var1."')");
	$next_number=$next_number+1;	
	$savedata = $conn->query("INSERT INTO multas_penalizaciones VALUES('".$id."','".$next_number."',3,'".$var2."')");
	$next_number=$next_number+1;
	$savedata = $conn->query("INSERT INTO multas_penalizaciones VALUES('".$id."','".$next_number."',4,'".$var3."')");
	$next_number=$next_number+1;
	$savedata = $conn->query("INSERT INTO multas_penalizaciones VALUES('".$id."','".$next_number."',5,'".$var4."')");
	$next_number=$next_number+1;
	$savedata = $conn->query("INSERT INTO multas_penalizaciones VALUES('".$id."','".$next_number."',6,'".$var5."')");
	$next_number=$next_number+1;
	$savedata = $conn->query("INSERT INTO multas_penalizaciones VALUES('".$id."','".$next_number."',7,'".$var6."')");
	$next_number=$next_number+1;
	$savedata = $conn->query("INSERT INTO multas_penalizaciones VALUES('".$id."','".$next_number."',8,'".$var7."')");

}

function save_nonfinancialimpacts($id,$var0,$var1,$var2,$var3)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO impactos_no_financieros VALUES('".$id."',1,'".$var0."')");
	$savedata = $conn->query("INSERT INTO impactos_no_financieros VALUES('".$id."',2,'".$var1."')");
	$savedata = $conn->query("INSERT INTO impactos_no_financieros VALUES('".$id."',3,'".$var2."')");
	$savedata = $conn->query("INSERT INTO impactos_no_financieros VALUES('".$id."',4,'".$var3."')");
}

function save_staffdirectory($nextNumber,$var1,$var2,$var3,$var4,$var6,$var7,$var8,$var9,$var10)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_directorio_personal_critico VALUES('".$nextNumber."','".$var1."','".$var2."','".$var3."','".$var4."','".$var6."','".$var7."','".$var8."','".$var9."','".$var10."')"); 
}

function save_processstaff($id,$staff_id,$var0)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO proceso_personal_tipopersonal VALUES('".$id."','".$staff_id."','".$var0."')");
}

function save_technologicaldependencies($id,$next_number,$var0,$var1,$var2,$var3,$var4,$var5,$var6)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO dependencias_tecnologicas VALUES('".$id."','".$next_number."','".$var0."','".$var1."','".$var2."','".$var3."','".$var4."','".$var5."','".$var6."')");
}

function save_databackups($id,$var0,$var1,$var2,$var3,$var4)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO respaldos_proceso VALUES('".$id."','".$var0."','".$var1."','".$var2."','".$var3."','".$var4."')");
}

function save_internaldependencies($id,$next_number,$var0,$var1,$var2)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO interdependencias_internas VALUES('".$id."','".$next_number."','".$var0."','".$var1."','".$var2."')");
}

function save_externaldependencies($id,$next_number,$var0,$var1,$var2)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO interdependencias_externas VALUES('".$id."','".$next_number."','".$var0."','".$var1."','".$var2."')");
}

function save_provider($var0,$var2,$var3,$var4,$var5,$var6)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO cat_directorio_proveedores VALUES(null,'".$var0."','".$var2."','".$var3."','".$var4."','".$var5."','".$var6."')");	
}

function save_providerprocess($id,$next_number,$provider_id)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO proceso_proveedor VALUES('".$id."','".$next_number."','".$provider_id."')");		
}

function save_recoveryrequirements($id,$var0,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8,$var9,$var10,$var11,$var12,$var13)
{
	$conn = home_connection();
	$savedata = $conn->query("INSERT INTO requerimientos_bcp VALUES('".$id."','".$var0."','".$var1."','".$var2."','".$var3."','".$var4."','".$var5."','".$var6."','".$var7."','".$var8."','".$var9."','".$var10."','".$var11."','".$var12."','".$var13."')");
}