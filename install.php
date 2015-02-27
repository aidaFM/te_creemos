<?php
function createDataBase($host,$user,$pass,$database){
	$conn = mysqli_connect($host,$user,$pass);
	$query = "create database if not exists $database;";
	$result = mysqli_query($conn,$query);
	if($result){
		return TRUE;
	}else{
		return mysql_errno()." ".mysql_error();
	}
}

function createTable($host,$user,$pass,$database,$table){
	$conn = mysqli_connect($host,$user,$pass,$database);
	$result = mysqli_query($conn,$table);
	if($result){
		return TRUE;
	}else{
		return mysql_errno()." ".mysql_error();
	}
}

function insertRecord($host,$user,$pass,$database,$insert){
	$conn = mysqli_connect($host,$user,$pass,$database);
	$result = mysqli_query($conn,$insert);
	if($result){
		return TRUE;
	}else{
		return mysql_errno()." ".mysql_error();
	}
}

function setCharacterCollate($host,$user,$pass,$database,$query){
	$conn = mysqli_connect($host,$user,$pass,$database);
	$result = mysqli_query($conn,$query);
	if($result){
		return TRUE;
	}else{
		return mysql_errno()." ".mysql_error();
	}
}

	createDataBase("localhost","root","","te_creemos");

    $query = "alter schema `te_creemos`  default character set utf8  default collate utf8_spanish_ci ;";

	setCharacterCollate("localhost","root","","te_creemos",$query);

	$table = 'create table if not exists cat_areas(
		clave_area int(10) auto_increment not null,
		descripcion_area varchar(100) not null,
		primary key(clave_area)
		);';

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_procesos(
		clave_proceso int(10) auto_increment not null,
		clave_area int(10),
		nombre_proceso varchar(150),
		objetivo_proceso varchar(200),
		descripcion_proceso text(10000),
		primary key(clave_proceso)
		);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_nivel_carga(
		clave_nivel_carga int(10) auto_increment not null,
		descripcion_nivel_carga varchar(100),
		primary key(clave_nivel_carga)
		);";
	
	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_criticidad_procesos(
	clave_criticidad_proceso int(10) auto_increment not null,
	descripcion_criticidad_proceso varchar(250) not null,
	primary key(clave_criticidad_proceso)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_objetivo_tiempo_recuperacion(
	clave_rto int(10) auto_increment not null,
	nombre_rto varchar(50) not null,
	descripcion_rto varchar(250) not null,
	primary key(clave_rto)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_objetivo_punto_recuperacion(
	clave_rpo int(10) auto_increment not null,
	nombre_rpo varchar(50) not null,
	descripcion_rpo varchar(250) not null,
	primary key(clave_rpo)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_frecuencia_proceso(
	clave_frecuencia_proceso int(10) auto_increment not null,
	descripcion_frecuencia_proceso varchar (250) not null,
	primary key(clave_frecuencia_proceso)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_periodos_criticos(
	clave_periodos_criticos int(10) auto_increment not null,
	descripcion_periodos_criticos varchar(250) not null,
	primary key(clave_periodos_criticos)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_lider_proyecto(
	clave_lider_proyecto int(10) auto_increment not null,
	nombre_lider_proyecto varchar(250) not null,
	primary key(clave_lider_proyecto)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists proceso_sistemas(
	clave_proceso int(10) not null,
	consecutivo_sistema int(10) not null,
	clave_sistema int(10) not null
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_sistemas(
	clave_sistema int(10) auto_increment not null,
	nombre_sistema varchar(250) not null,
	primary key(clave_sistema)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = $table = "create table if not exists cat_directorio_personal_critico(
	clave_personal int(10) auto_increment not null,
	nombre_personal varchar(150),
	numero_empleado varchar(100),
	extension int(10),
	puesto varchar(150),
	numero_telefono_casa varchar(100),
	numero_telefono_celular varchar(100),
	domicilio varchar(250),
	mail_interno varchar(150),
	mail_externo varchar(150),
	primary key(clave_personal)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = $table = "create table if not exists proceso_personal_tipopersonal(
	clave_proceso int(10),
	clave_personal int(10),
	clave_tipo_personal int(10)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = $table = "create table if not exists cat_tipo_personal(
	clave_tipo_personal int(10),
	descripcion_tipo_personal varchar(10)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = $table = "create table if not exists cat_tiempo_maximo_fs(
	clave_tiempo_maximo_fs int(10) auto_increment not null,
	descripcion_tiempo_maximo_fs varchar(250) not null,
	primary key(clave_tiempo_maximo_fs)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = $table = "create table if not exists cat_jefes_inmediatos(
	clave_jefes_inmediatos int(10) auto_increment not null,
	nombre_jefes_inmediatos varchar(250),
	puesto_jefes_inmediatos varchar(250),
	primary key(clave_jefes_inmediatos)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = $table = "create table if not exists operacion_proceso(
	clave_proceso int(10),
	hora_0 int(10),
	hora_1 int(10),
	hora_2 int(10),
	hora_3 int(10),
	hora_4 int(10),
	hora_5 int(10),
	hora_6 int(10),
	hora_7 int(10),
	hora_8 int(10),
	hora_9 int(10),
	hora_10 int(10),
	hora_11 int(10),
	hora_12 int(10),
	hora_13 int(10),
	hora_14 int(10),
	hora_15 int(10),
	hora_16 int(10),
	hora_17 int(10),
	hora_18 int(10),
	hora_19 int(10),
	hora_20 int(10),
	hora_21 int(10),
	hora_22 int(10),
	hora_23 int(10)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = $table = "create table if not exists impactos_financiero(
	clave_proceso int(10) not null,
	consecutivo_impacto_financiero int(10),
	clave_tiempo_afectacion int(10) not null,
	clave_impacto_financiero int(10) not null
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = $table = "create table if not exists impactos_no_financieros(
	clave_proceso int(10),
	clave_impacto_no_fin int(10),
	clave_nivel_imp_no_fin int(10)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = $table = "create table if not exists interdependencias_internas(
	clave_proceso int(10),
	clave_interdependencia_interna int(10),
	area_interdependencia_interna varchar(150),
	informacion_requerida_entrada_interna varchar(150),
	informacion_comprometida_salida_interna varchar(150)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = $table = "create table if not exists interdependencias_externas(
	clave_proceso int(10),
	clave_interdependencia_externa int(10),
	nombre_proveedor varchar(150),
	informacion_requerida_entrada_externa varchar(150),
	informacion_comprometida_salida_externa varchar(150)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = $table = "create table if not exists proceso_proveedor(
	clave_proceso int(10),
	consecutivo_proveedor int(10),
	clave_proveedor int(10)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = $table = "create table if not exists cat_directorio_proveedores(
	clave_provedor int(10) auto_increment not null,
	nombre_provedor varchar(150),
	empresa_provedor varchar(150),
	numero_telefono_oficina varchar(18),
	numero_telefono_celular varchar(18),
	mail_provedor varchar(18),
	domicilio_provedor varchar(250),
	primary key(clave_provedor)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = $table = "create table if not exists requerimientos_bcp(
	clave_proceso int(10),
	pc_on int(10),
	pc_oc int(10),
	telefono_on int(10),
	telefono_oc int(10),
	impresora_on int(10),
	impresora_oc int(10),
	laptop_on int(10),
	laptop_oc int(10),
	vpninternet_on int(10),
	vpninternet_oc int(10),
	escritorio_on int(10),
	escritorio_oc int(10),
	papeleria int(10),
	otros varchar(250)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists multas_penalizaciones(
	clave_proceso int(10),
	consecutivo_tiempo_afectacion_multa int(10) not null,
	clave_tiempo_afectacion_multa int(10),
	clave_impacto_financiero_multa int(10)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists procesa_ciclico(
	clave_proceso int(10),
	enero int(10),
	febrero int(10),
	marzo int(10),
	abril int(10),
	mayo int(10),
	junio int(10),
	julio int(10),
	agosto int(10),
	septiembre int(10),
	octubre int(10),
	noviembre int(10),
	diciembre int(10)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_impactos_no_financieros(
	clave_impacto_no_fin int(10),
	descripcion_impacto_no_fin varchar(250)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_nivel_impactos_no_financieros(
	clave_nivel_imp_no_fin int(10),
	descripcion_nivel_imp_no_fin varchar(250)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists dependencias_tecnologicas(
	clave_proceso int(10),
	num_dependencia_proceso int(10),
	area_dependencia varchar(250),
	servicio varchar(150),
	dependencia_interna char(3),
	dependencia_externa char(3),
	dependencia_entrada char(3),
	dependencia_salida char(3),
	clave_nivel_dependencia int(10)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists respaldos_proceso(
	clave_proceso int(10),
	clave_tipo_respaldo int(10),
	clave_medio_respaldo int(10),
	lugar_donde_respaldan varchar(150),
	lugar_almacenamiento_respaldo varchar(150),
	personal_realiza_respaldo varchar(150)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_tipo_respaldos(
	clave_tipo_respaldo int(10) auto_increment not null,
	descripcion_tipo_respaldo varchar(250) not null,
	primary key(clave_tipo_respaldo)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_medio_respaldo(
	clave_medio_respaldo int(10) auto_increment not null,
	descripcion_medio_respaldo varchar(250) not null,
	primary key(clave_medio_respaldo)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_tipos_impactos_financieros(
	clave_impacto_financiero int(10),
	descripcion_impacto_financiero varchar(250)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_tiempo_afectacion(
	clave_tiempo_afectacion int(10),
	descripcion_tiempo_afectacion varchar(250)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists cat_nivel_dependencia(
	clave_nivel_dependencia int(10),
	descripcion_nivel_dependencia varchar(250)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$table = "create table if not exists inventario_procesos(
	clave_proceso int(10) not null,
	clave_criticidad_proceso int(10),
	clave_tiempo_maximo_fs int(10),
	clave_lider_proyecto int(10),
	clave_jefes_inmediatos int(10),
	personal_operacion_normal int(10),
	personal_operacion_contingencia int(10),
	clave_rto int(10),
	clave_rpo int(10),
	clave_frecuencia_proceso int(10),
	clave_periodos_criticos int(10),
	promedio_transacciones_mensuales decimal(20,2),
	procedimiento_alterno varchar(250)
	);";

	createTable("localhost","root","","te_creemos",$table);

	$insert = "insert ignore into cat_criticidad_procesos set
	clave_criticidad_proceso=1,
	descripcion_criticidad_proceso='Media.';";
	
	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_criticidad_procesos set
	clave_criticidad_proceso=2,
	descripcion_criticidad_proceso='Alta.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_criticidad_procesos set
	clave_criticidad_proceso=3,
	descripcion_criticidad_proceso='Baja.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_frecuencia_proceso set
	clave_frecuencia_proceso=1,
	descripcion_frecuencia_proceso='Cada hora.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_frecuencia_proceso set
	clave_frecuencia_proceso=2,
	descripcion_frecuencia_proceso='Diario.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_frecuencia_proceso set
	clave_frecuencia_proceso=3,
	descripcion_frecuencia_proceso='Semanal.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_frecuencia_proceso set
	clave_frecuencia_proceso=4,
	descripcion_frecuencia_proceso='Quincenal.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_frecuencia_proceso set
	clave_frecuencia_proceso=5,
	descripcion_frecuencia_proceso='Mensual.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_frecuencia_proceso set
	clave_frecuencia_proceso=6,
	descripcion_frecuencia_proceso='Trimestral.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_frecuencia_proceso set
	clave_frecuencia_proceso=7,
	descripcion_frecuencia_proceso='Anual.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_impactos_no_financieros set
	clave_impacto_no_fin=1,
	descripcion_impacto_no_fin='Servicio al cliente';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_impactos_no_financieros set
	clave_impacto_no_fin=2,
	descripcion_impacto_no_fin='Pérdida de imagen';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_impactos_no_financieros set
	clave_impacto_no_fin=3,
	descripcion_impacto_no_fin='Operacional';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_impactos_no_financieros set
	clave_impacto_no_fin=4,
	descripcion_impacto_no_fin='Servicio a los empleados';";

	insertRecord("localhost","root","","te_creemos",$insert);
	//
	$insert = "insert ignore into cat_medio_respaldo set
	clave_medio_respaldo=1,
	descripcion_medio_respaldo='CD-DVD';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_medio_respaldo set
	clave_medio_respaldo=2,
	descripcion_medio_respaldo='Cinta magnetica';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_medio_respaldo set
	clave_medio_respaldo=3,
	descripcion_medio_respaldo='Disco duro externo';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_medio_respaldo set
	clave_medio_respaldo=4,
	descripcion_medio_respaldo='Disco duro interno';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_medio_respaldo set
	clave_medio_respaldo=5,
	descripcion_medio_respaldo='USB';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_medio_respaldo set
	clave_medio_respaldo=6,
	descripcion_medio_respaldo='En un servidor a través de la red';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_medio_respaldo set
	clave_medio_respaldo=7,
	descripcion_medio_respaldo='Red dedicada al almacenamiento';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_nivel_carga set
	clave_nivel_carga=1,
	descripcion_nivel_carga='Bajo.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_nivel_carga set
	clave_nivel_carga=2,
	descripcion_nivel_carga='Medio.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_nivel_carga set
	clave_nivel_carga=3,
	descripcion_nivel_carga='Alto.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore cat_nivel_dependencia set
	clave_nivel_dependencia=1,
	descripcion_nivel_dependencia='Bajo.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore cat_nivel_dependencia set
	clave_nivel_dependencia=2,
	descripcion_nivel_dependencia='Alto.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_nivel_impactos_no_financieros set
	clave_nivel_imp_no_fin=1,
	descripcion_nivel_imp_no_fin='Nulo';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_nivel_impactos_no_financieros set
	clave_nivel_imp_no_fin=2,
	descripcion_nivel_imp_no_fin='Bajo';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_nivel_impactos_no_financieros set
	clave_nivel_imp_no_fin=3,
	descripcion_nivel_imp_no_fin='Medio';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_nivel_impactos_no_financieros set
	clave_nivel_imp_no_fin=4,
	descripcion_nivel_imp_no_fin='Alto';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_objetivo_punto_recuperacion set
	clave_rpo=1,
	nombre_rpo='RPO-01',
	descripcion_rpo='Inicio de falla';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert = "insert ignore into cat_objetivo_punto_recuperacion set
	clave_rpo=2,
	nombre_rpo='RPO-02',
	descripcion_rpo='Mayor a Inicio de falla y menor ó igual a 3 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_objetivo_punto_recuperacion set
	clave_rpo=3,
	nombre_rpo='RPO-03',
	descripcion_rpo='Mayor a 3 hrs. y menor ó igual a 6 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_objetivo_punto_recuperacion set
	clave_rpo=4,
	nombre_rpo='RPO-04',
	descripcion_rpo='Mayor a 6 hrs. y menor ó igual a 12 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_objetivo_punto_recuperacion set
	clave_rpo=5,
	nombre_rpo='RPO-05',
	descripcion_rpo='Mayor a 12 hrs. y menor ó igual a 24 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_objetivo_punto_recuperacion set
	clave_rpo=6,
	nombre_rpo='RPO-06',
	descripcion_rpo='Mayor a 24 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_objetivo_tiempo_recuperacion set
	clave_rto=1,
	nombre_rto='RTO-01',
	descripcion_rto='Menor ó igual 3 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_objetivo_tiempo_recuperacion set
	clave_rto=2,
	nombre_rto='RTO-02',
	descripcion_rto='Mayor a 3 hrs. y menor ó igual a 6 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = $insert   = "insert ignore into cat_objetivo_tiempo_recuperacion set
	clave_rto=3,
	nombre_rto='RTO-03',
	descripcion_rto='Mayor a 6 hrs. y menor ó igual a 12 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_objetivo_tiempo_recuperacion set
	clave_rto=4,
	nombre_rto='RTO-04',
	descripcion_rto='Mayor a 12 hrs. y menor ó igual a 24 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_objetivo_tiempo_recuperacion set
	clave_rto=5,
	nombre_rto='RTO-05',
	descripcion_rto='Mayor a 24 hrs. y menor ó igual a 48 hrs.';";

	$insert   = "insert ignore into cat_objetivo_tiempo_recuperacion set
	clave_rto=6,
	nombre_rto='RTO-06',
	descripcion_rto='Mayor a 48 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_periodos_criticos set
	clave_periodos_criticos=1,
	descripcion_periodos_criticos='Diario.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_periodos_criticos set
	clave_periodos_criticos=2,
	descripcion_periodos_criticos='Semanal.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_periodos_criticos set
	clave_periodos_criticos=3,
	descripcion_periodos_criticos='Quincenal.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_periodos_criticos set
	clave_periodos_criticos=4,
	descripcion_periodos_criticos='Fin de mes.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_periodos_criticos set
	clave_periodos_criticos=5,
	descripcion_periodos_criticos='Fin trimestre.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_periodos_criticos set
	clave_periodos_criticos=6,
	descripcion_periodos_criticos='Fin año.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tiempo_afectacion set
	clave_tiempo_afectacion=1,
	descripcion_tiempo_afectacion='De 0 a 30 mins.';";

	insertRecord("localhost","root","","te_creemos",$insert);
		
	$insert   = "insert ignore into cat_tiempo_afectacion set
	clave_tiempo_afectacion=2,
	descripcion_tiempo_afectacion='De 30 mins. a 1 hr.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tiempo_afectacion set
	clave_tiempo_afectacion=3,
	descripcion_tiempo_afectacion='De 2 mins. a 3 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tiempo_afectacion set
	clave_tiempo_afectacion=4,
	descripcion_tiempo_afectacion='6 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tiempo_afectacion set
	clave_tiempo_afectacion=5,
	descripcion_tiempo_afectacion='12 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tiempo_afectacion set
	clave_tiempo_afectacion=6,
	descripcion_tiempo_afectacion='24 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tiempo_afectacion set
	clave_tiempo_afectacion=7,
	descripcion_tiempo_afectacion='48 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tiempo_afectacion set
	clave_tiempo_afectacion=8,
	descripcion_tiempo_afectacion='72 hrs.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipo_personal set
	clave_tipo_personal=1,
	descripcion_tipo_personal='Principal';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipo_personal set
	clave_tipo_personal=2,
	descripcion_tipo_personal='Alterno';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipo_respaldos set
	clave_tipo_respaldo=1,
	descripcion_tipo_respaldo='Diario';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipo_respaldos set
	clave_tipo_respaldo=2,
	descripcion_tipo_respaldo='Incremental';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipo_respaldos set
	clave_tipo_respaldo=3,
	descripcion_tipo_respaldo='Full semanal';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipo_respaldos set
	clave_tipo_respaldo=4,
	descripcion_tipo_respaldo='Mensual';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipo_respaldos set
	clave_tipo_respaldo=5,
	descripcion_tipo_respaldo='Otro';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipos_impactos_financieros set
	clave_impacto_financiero=1,
	descripcion_impacto_financiero='0 - 500';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipos_impactos_financieros set
	clave_impacto_financiero=2,
	descripcion_impacto_financiero='500 - 1,000';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipos_impactos_financieros set
	clave_impacto_financiero=3,
	descripcion_impacto_financiero='1,000 - 2,500';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipos_impactos_financieros set
	clave_impacto_financiero=4,
	descripcion_impacto_financiero='2,500 - 5,000';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipos_impactos_financieros set
	clave_impacto_financiero=5,
	descripcion_impacto_financiero='5,000 - 10,000.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipos_impactos_financieros set
	clave_impacto_financiero=6,
	descripcion_impacto_financiero='10,000 - 30,000.';";

	insertRecord("localhost","root","","te_creemos",$insert);

	$insert   = "insert ignore into cat_tipos_impactos_financieros set
	clave_impacto_financiero=7,
	descripcion_impacto_financiero='Mas de 30,0000.';";

	insertRecord("localhost","root","","te_creemos",$insert);

header("refresh:5; url=index.php");
?>