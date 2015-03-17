
<?php
require_once 'basic_files.php';

$alert_type = array();
$alert_message = array();

function openAlertContainer(){
	$open_container = '';
	$open_container .= '<div class="container">';
	$open_container .= '<div class="row">';
	$open_container .= '<div class="col-md-12">';
	
	echo $open_container;
}

function alertType($type){
	$alert_type['success'] = '<div class="alert alert-success">';
	$alert_type['info'] = '<div class="alert alert-info">';
	$alert_type['warning'] = '<div class="alert alert-warning">';
	$alert_type['danger'] = '<div class="alert alert-danger">';

	echo $alert_type[$type];
}

function closeAlertContainer(){
	$close_container = '';
	$close_container .= '</div>';
	$close_container .= '</div>';
	$close_container .= '</div>';
	$close_container .= '</div>';
	
	echo $close_container;
}

function alertMessage($messageId){
	$alert_message[0] = '<strong>Por favor espere</strong> se esta creando la Base de datos';
	$alert_message[1] = 'Base de datos <strong>creada correctamente</strong>';
	$alert_message[2] = '<strong>Insertando registros</strong> a las tablas creadas';
	$alert_message[3] = 'Registros <strong>insertados correctamente</strong> en sus tablas';
	$alert_message[4] = '<strong>Por favor espere</strong> se redireccionara a <strong>la pagina principal</strong>';

	echo $alert_message[$messageId];
}

show_header('Creando la base de datos');


