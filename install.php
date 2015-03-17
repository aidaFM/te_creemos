<?php
require_once 'basic_files.php';
require_once 'db_functions.php';
require_once 'db_tables.php';

function flush_buffers(){
    ob_end_flush();
    ob_flush();
    flush();
    ob_start();
}

function install($msg,$tables){
    echo $msg;
    @flush_buffers();
    sleep(1);
    foreach ($tables as $table) {
        createTable("localhost", "root", "", "te_creemos", $table);
    }
}

$msg = show_header('Creando la base de datos');
$msg .= '<div class="container">';
$msg .= '<div class="row">';
$msg .= '<div class="col-md-12">';
$msg .= '<p></p>';
$msg .= '<div class="alert alert-warning">';
$msg .= '<strong>Por favor espere</strong> se esta creando la Base de datos';
$msg .= '</div>';
$msg .= '</div>';
$msg .= '</div>';
$msg .= '</div>';

$success = '<div class="container">';
$success .= '<div class="row">';
$success .= '<div class="col-md-12">';
$success .= '<p></p>';
$success .= '<div class="alert alert-success">';
$success .= 'Base de datos <strong>creada correctamente</strong>';
$success .= '</div>';
$success .= '</div>';
$success .= '</div>';
$success .= '</div>';
$success .= show_footer();

$drop = 'drop database if exists te_creemos;';

dropDataBase("localhost", "root", "", $drop);

createDataBase("localhost", "root", "", "te_creemos");

$query = "alter schema te_creemos  default character set utf8  default collate utf8_spanish_ci;";

setCharacterCollate("localhost", "root", "", "te_creemos", $query);

install($msg, $tables);

echo $success;

//$insert = "insert ignore into cat_criticidad_procesos set
//clave_criticidad_proceso=1,
//descripcion_criticidad_proceso='Media.';";
//	
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_criticidad_procesos set
//	clave_criticidad_proceso=2,
//	descripcion_criticidad_proceso='Alta.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_criticidad_procesos set
//	clave_criticidad_proceso=3,
//	descripcion_criticidad_proceso='Baja.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_frecuencia_proceso set
//	clave_frecuencia_proceso=1,
//	descripcion_frecuencia_proceso='Cada hora.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_frecuencia_proceso set
//	clave_frecuencia_proceso=2,
//	descripcion_frecuencia_proceso='Diario.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_frecuencia_proceso set
//	clave_frecuencia_proceso=3,
//	descripcion_frecuencia_proceso='Semanal.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_frecuencia_proceso set
//	clave_frecuencia_proceso=4,
//	descripcion_frecuencia_proceso='Quincenal.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_frecuencia_proceso set
//	clave_frecuencia_proceso=5,
//	descripcion_frecuencia_proceso='Mensual.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_frecuencia_proceso set
//	clave_frecuencia_proceso=6,
//	descripcion_frecuencia_proceso='Trimestral.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_frecuencia_proceso set
//	clave_frecuencia_proceso=7,
//	descripcion_frecuencia_proceso='Anual.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_impactos_no_financieros set
//	clave_impacto_no_fin=1,
//	descripcion_impacto_no_fin='Servicio al cliente';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_impactos_no_financieros set
//	clave_impacto_no_fin=2,
//	descripcion_impacto_no_fin='Pérdida de imagen';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_impactos_no_financieros set
//	clave_impacto_no_fin=3,
//	descripcion_impacto_no_fin='Operacional';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_impactos_no_financieros set
//	clave_impacto_no_fin=4,
//	descripcion_impacto_no_fin='Servicio a los empleados';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//	//
//	$insert = "insert ignore into cat_medio_respaldo set
//	clave_medio_respaldo=1,
//	descripcion_medio_respaldo='CD-DVD';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_medio_respaldo set
//	clave_medio_respaldo=2,
//	descripcion_medio_respaldo='Cinta magnetica';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_medio_respaldo set
//	clave_medio_respaldo=3,
//	descripcion_medio_respaldo='Disco duro externo';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_medio_respaldo set
//	clave_medio_respaldo=4,
//	descripcion_medio_respaldo='Disco duro interno';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_medio_respaldo set
//	clave_medio_respaldo=5,
//	descripcion_medio_respaldo='USB';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_medio_respaldo set
//	clave_medio_respaldo=6,
//	descripcion_medio_respaldo='En un servidor a través de la red';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_medio_respaldo set
//	clave_medio_respaldo=7,
//	descripcion_medio_respaldo='Red dedicada al almacenamiento';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_nivel_carga set
//	clave_nivel_carga=1,
//	descripcion_nivel_carga='Bajo.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_nivel_carga set
//	clave_nivel_carga=2,
//	descripcion_nivel_carga='Medio.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_nivel_carga set
//	clave_nivel_carga=3,
//	descripcion_nivel_carga='Alto.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore cat_nivel_dependencia set
//	clave_nivel_dependencia=1,
//	descripcion_nivel_dependencia='Bajo.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore cat_nivel_dependencia set
//	clave_nivel_dependencia=2,
//	descripcion_nivel_dependencia='Alto.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_nivel_impactos_no_financieros set
//	clave_nivel_imp_no_fin=1,
//	descripcion_nivel_imp_no_fin='Nulo';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_nivel_impactos_no_financieros set
//	clave_nivel_imp_no_fin=2,
//	descripcion_nivel_imp_no_fin='Bajo';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_nivel_impactos_no_financieros set
//	clave_nivel_imp_no_fin=3,
//	descripcion_nivel_imp_no_fin='Medio';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_nivel_impactos_no_financieros set
//	clave_nivel_imp_no_fin=4,
//	descripcion_nivel_imp_no_fin='Alto';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_objetivo_punto_recuperacion set
//	clave_rpo=1,
//	nombre_rpo='RPO-01',
//	descripcion_rpo='Inicio de falla';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_objetivo_punto_recuperacion set
//	clave_rpo=2,
//	nombre_rpo='RPO-02',
//	descripcion_rpo='Mayor a Inicio de falla y menor ó igual a 3 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_objetivo_punto_recuperacion set
//	clave_rpo=3,
//	nombre_rpo='RPO-03',
//	descripcion_rpo='Mayor a 3 hrs. y menor ó igual a 6 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_objetivo_punto_recuperacion set
//	clave_rpo=4,
//	nombre_rpo='RPO-04',
//	descripcion_rpo='Mayor a 6 hrs. y menor ó igual a 12 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_objetivo_punto_recuperacion set
//	clave_rpo=5,
//	nombre_rpo='RPO-05',
//	descripcion_rpo='Mayor a 12 hrs. y menor ó igual a 24 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_objetivo_punto_recuperacion set
//	clave_rpo=6,
//	nombre_rpo='RPO-06',
//	descripcion_rpo='Mayor a 24 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_objetivo_tiempo_recuperacion set
//	clave_rto=1,
//	nombre_rto='RTO-01',
//	descripcion_rto='Menor ó igual 3 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_objetivo_tiempo_recuperacion set
//	clave_rto=2,
//	nombre_rto='RTO-02',
//	descripcion_rto='Mayor a 3 hrs. y menor ó igual a 6 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = $insert   = "insert ignore into cat_objetivo_tiempo_recuperacion set
//	clave_rto=3,
//	nombre_rto='RTO-03',
//	descripcion_rto='Mayor a 6 hrs. y menor ó igual a 12 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_objetivo_tiempo_recuperacion set
//	clave_rto=4,
//	nombre_rto='RTO-04',
//	descripcion_rto='Mayor a 12 hrs. y menor ó igual a 24 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_objetivo_tiempo_recuperacion set
//	clave_rto=5,
//	nombre_rto='RTO-05',
//	descripcion_rto='Mayor a 24 hrs. y menor ó igual a 48 hrs.';";
//
//	$insert = "insert ignore into cat_objetivo_tiempo_recuperacion set
//	clave_rto=6,
//	nombre_rto='RTO-06',
//	descripcion_rto='Mayor a 48 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_periodos_criticos set
//	clave_periodos_criticos=1,
//	descripcion_periodos_criticos='Diario.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_periodos_criticos set
//	clave_periodos_criticos=2,
//	descripcion_periodos_criticos='Semanal.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_periodos_criticos set
//	clave_periodos_criticos=3,
//	descripcion_periodos_criticos='Quincenal.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_periodos_criticos set
//	clave_periodos_criticos=4,
//	descripcion_periodos_criticos='Fin de mes.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_periodos_criticos set
//	clave_periodos_criticos=5,
//	descripcion_periodos_criticos='Fin trimestre.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_periodos_criticos set
//	clave_periodos_criticos=6,
//	descripcion_periodos_criticos='Fin año.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tiempo_afectacion set
//	clave_tiempo_afectacion=1,
//	descripcion_tiempo_afectacion='De 0 a 30 mins.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//		
//	$insert = "insert ignore into cat_tiempo_afectacion set
//	clave_tiempo_afectacion=2,
//	descripcion_tiempo_afectacion='De 30 mins. a 1 hr.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tiempo_afectacion set
//	clave_tiempo_afectacion=3,
//	descripcion_tiempo_afectacion='De 2 mins. a 3 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tiempo_afectacion set
//	clave_tiempo_afectacion=4,
//	descripcion_tiempo_afectacion='6 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tiempo_afectacion set
//	clave_tiempo_afectacion=5,
//	descripcion_tiempo_afectacion='12 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tiempo_afectacion set
//	clave_tiempo_afectacion=6,
//	descripcion_tiempo_afectacion='24 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tiempo_afectacion set
//	clave_tiempo_afectacion=7,
//	descripcion_tiempo_afectacion='48 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tiempo_afectacion set
//	clave_tiempo_afectacion=8,
//	descripcion_tiempo_afectacion='72 hrs.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tipo_personal set
//	clave_tipo_personal=1,
//	descripcion_tipo_personal='Principal';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tipo_personal set
//	clave_tipo_personal=2,
//	descripcion_tipo_personal='Alterno';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tipo_respaldos set
//	clave_tipo_respaldo=1,
//	descripcion_tipo_respaldo='Diario';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tipo_respaldos set
//	clave_tipo_respaldo=2,
//	descripcion_tipo_respaldo='Incremental';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tipo_respaldos set
//	clave_tipo_respaldo=3,
//	descripcion_tipo_respaldo='Full semanal';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tipo_respaldos set
//	clave_tipo_respaldo=4,
//	descripcion_tipo_respaldo='Mensual';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tipo_respaldos set
//	clave_tipo_respaldo=5,
//	descripcion_tipo_respaldo='Otro';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tipos_impactos_financieros set
//	clave_impacto_financiero=1,
//	descripcion_impacto_financiero='0 - 500';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tipos_impactos_financieros set
//	clave_impacto_financiero=2,
//	descripcion_impacto_financiero='500 - 1,000';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tipos_impactos_financieros set
//	clave_impacto_financiero=3,
//	descripcion_impacto_financiero='1,000 - 2,500';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tipos_impactos_financieros set
//	clave_impacto_financiero=4,
//	descripcion_impacto_financiero='2,500 - 5,000';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//	$insert = "insert ignore into cat_tipos_impactos_financieros set
//	clave_impacto_financiero=5,
//	descripcion_impacto_financiero='5,000 - 10,000.';";
//
//	insertRecord("localhost","root","","te_creemos",$insert);
//
//$insert = "insert ignore into cat_tipos_impactos_financieros set clave_impacto_financiero=6,descripcion_impacto_financiero='10,000 - 30,000.';";
//
//insertRecord("localhost","root","","te_creemos",$insert);
//
//$insert = "insert ignore into cat_tipos_impactos_financieros set clave_impacto_financiero=7,descripcion_impacto_financiero='Mas de 30,0000.';";
//
//insertRecord("localhost","root","","te_creemos",$insert);
//
//header("refresh:5; url=index.php");