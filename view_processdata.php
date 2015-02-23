<?php

require_once('basic_files.php');

$id = $_GET['id'];

$process = getProcessData($id);
$window_operation = getWindowOperationData($id);
$cyclical_processing = getCyclicalProcessing($id);
$financial_impacts=getFinancialImpacts($id);
$economic_impacts=getEconomicImpacts($id);

$conn = home_connection();

$areas = "select * from cat_areas";
$result = $conn->query($areas);
$area= "";
while ($row = $result->fetch_assoc()) {
	if($row['clave_area']==$process['clave_area']){
		$area .= "<option value='$row[clave_area]' selected>$row[descripcion_area]</option>";
	}
	else{
		$area .= "<option value='$row[clave_area]'>$row[descripcion_area]</option>";
	}
}

$criticality_levels = "select * from cat_criticidad_procesos";
$result = $conn->query($criticality_levels);
$criticality_level= "";
while ($row = $result->fetch_assoc()) {
	if($row['clave_criticidad_proceso']==$process['clave_criticidad_proceso']){
		$criticality_level .= "<option value='$row[clave_criticidad_proceso]' selected>$row[descripcion_criticidad_proceso]</option>";
	}else{
		$criticality_level .= "<option value='$row[clave_criticidad_proceso]'>$row[descripcion_criticidad_proceso]</option>";
	}
}

$leaders = "select * from cat_lider_proyecto";
$result = $conn->query($leaders);
$leader_name= "";
while ($row = $result->fetch_assoc()) {
	if($row['clave_lider_proyecto']==$process['clave_lider_proyecto']){
		$leader_name .= "<option value='$row[clave_lider_proyecto]' selected>$row[nombre_lider_proyecto]</option>";
	}else{
		$leader_name .= "<option value='$row[clave_lider_proyecto]'>$row[nombre_lider_proyecto]</option>";
	}
}

$bosses = "select * from cat_jefes_inmediatos";
$result = $conn->query($bosses);
$boss_name= "";
while ($row = $result->fetch_assoc()) {
	if($row['clave_jefes_inmediatos']==$process['clave_jefes_inmediatos']){
		$boss_name .= "<option value='$row[clave_jefes_inmediatos]' selected>$row[nombre_jefes_inmediatos], $row[puesto_jefes_inmediatos]</option>";
	}else{
		$boss_name .= "<option value='$row[clave_jefes_inmediatos]'>$row[nombre_jefes_inmediatos], $row[puesto_jefes_inmediatos]</option>";
	}
}

$times = "select * from cat_tiempo_maximo_fs";
$result = $conn->query($times);
$out_of_service= "";
while ($row = $result->fetch_assoc()) {
	if($row['clave_tiempo_maximo_fs']==$process['clave_tiempo_maximo_fs']){
		$out_of_service .= "<option value='$row[clave_tiempo_maximo_fs]'>$row[descripcion_tiempo_maximo_fs]</option>";
	}else{
		$out_of_service .= "<option value='$row[clave_tiempo_maximo_fs]'>$row[descripcion_tiempo_maximo_fs]</option>";
	}
}

$rto_options = "select * from cat_objetivo_tiempo_recuperacion";
$result = $conn->query($rto_options);
$rto_option= "";
while ($row = $result->fetch_assoc()) {
	if($row['clave_rto']==$process['clave_rto']){
		$rto_option .= "<option value='$row[clave_rto]' selected>$row[descripcion_rto]</option>";
	}else{
		$rto_option .= "<option value='$row[clave_rto]'>$row[descripcion_rto]</option>";
	}
}

$rpo_options = "select * from cat_objetivo_punto_recuperacion";
$result = $conn->query($rpo_options);
$rpo_option= "";
while ($row = $result->fetch_assoc()) {
	if($row['clave_rpo']==$process['clave_rpo']){
		$rpo_option .= "<option value='$row[clave_rpo]' selected>$row[descripcion_rpo]</option>";
	}else{
		$rpo_option .= "<option value='$row[clave_rpo]'>$row[descripcion_rpo]</option>";
	}
}

$frequencies = "select * from cat_frecuencia_proceso";
$result = $conn->query($frequencies);
$frequency= "";
while ($row = $result->fetch_assoc()) {
	if($row['clave_frecuencia_proceso']==$process['clave_frecuencia_proceso']){
		$frequency .= "<option value='$row[clave_frecuencia_proceso]'>$row[descripcion_frecuencia_proceso]</option>";
	}else{
	$frequency .= "<option value='$row[clave_frecuencia_proceso]'>$row[descripcion_frecuencia_proceso]</option>";
	}
}

$critical_periods = "select * from cat_periodos_criticos";
$result = $conn->query($critical_periods);
$critical_period= "";
while ($row = $result->fetch_assoc()) {
	if($row['clave_periodos_criticos']==$process['clave_periodos_criticos']){
		$critical_period .= "<option value='$row[clave_periodos_criticos]' selected>$row[descripcion_periodos_criticos]</option>";
	}else{
		$critical_period .= "<option value='$row[clave_periodos_criticos]'>$row[descripcion_periodos_criticos]</option>";
	}
}

$charge_levels = "select * from cat_nivel_carga";
$result = $conn->query($charge_levels);
$charge_level= "";
while ($row = $result->fetch_assoc()) {
	if($row['clave_nivel_carga']==$window_operation['hora_0']){
		$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
	}else{
		$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
	}
}

show_header('Proceso nuevo');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Proceso en blanco</h3>
					</div>
					<div class="panel-body">
						<p class="lead">Ingresa la información del <strong>processo</strong>.</p>
						<div class="row">
							<div class="col-md-12">	
								<form id="new" action="validate_process.php" method="post">
								<div class="form-group">
									<label for="process_name">Nombre del proceso:</label>
									<input class="form-control" type="text" name="process_name" id="process_name" value="<?= $process['nombre_proceso'] ?>" maxlength="100" size="50" required/>						
								</div>
								<div class="form-group">
									<label for="area">Área del proceso:</label>
									<select class="form-control" name="area" value="<?= $process['clave_area'] ?>"><?php echo $area; ?></select>
								</div>
								<div class="form-group">
									<label for="leader_name">Lider del proyecto:</label>
									<select class="form-control" name="leader_name" value="<?= $process['lider_proyecto'] ?>"><?php echo $leader_name; ?></select>														
								</div>
								<div class="form-group">
									<label for="process_target">Objetivo del proceso:</label>
									<input class="form-control" type="text" name="process_target" id="process_target" value="<?= $process['objetivo_proceso'] ?>" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="process_description">Descripción del proceso</label>
									<textarea class="form-control" name="process_description" id="process_description" rows="8" ><?= $process['descripcion_proceso'] ?></textarea>														
								</div>
								<div class="form-group">
									<label for="boss_name">Nombre y puesto del Jefe inmediato:</label>
									<select class="form-control" name="boss_name" value="<?= $process['clave_jefes_inmediatos'] ?>"><?php echo $boss_name; ?></select>															
								</div>
								<div class="form-group">
									<label for="critycality_level">Nivel de criticidad:</label>
									<select class="form-control" name="criticality_level" value="<?= $process['clave_criticidad_proceso'] ?>"><?php echo $criticality_level; ?></select>
								</div>
								<div class="form-group">
									<label for="out_of_service">Tiempo máximo tolerable fuera de servicio:</label>
									<select class="form-control" name="out_of_service" value="<?= $process['clave_tiempo_maximo_fs'] ?>"><?php echo $out_of_service; ?></select>						
								</div>
								<div class="form-group">
									<label for="normal_operators">Numero de operadores en operación normal</label>
									<input class="form-control" type="text" name="normal_operators" id="normal_operators" value="<?= $process['personal_operacion_normal'] ?>" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="contingency_operators">Numero de operadores en contingencia</label>
									<input class="form-control" type="text" name="contingency_operators" id="contingency_operators" value="<?= $process['personal_operacion_contingencia'] ?>" maxlength="100" size="50"/>						
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Objetivos de recuperación</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">	
								<div class="form-group">
									<label for="critycality">Objetivo tiempo de recuperación:</label>
									<select class="form-control" name="rto" value="<?= $process['clave_rto'] ?>"><?php echo utf8_encode($rto_option); ?></select>
								</div>
								<div class="form-group">
									<label for="critycality">Objetivo punto de recuperación:</label>
									<select class="form-control" name="rpo" value="<?= $process['clave_rpo'] ?>"><?php echo utf8_encode($rpo_option); ?></select>							
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Frecuencia del proceso</h3>
					</div>
					<div class="panel-body">
						<p class="lead">Identifica la frecuencia con la que se lleva acabo el proceso de manera cotidiana.</p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="frequency">Frecuencia del proceso:</label>
									<select class="form-control" name="frequency" value="<?= $process['clave_frecuencia_proceso'] ?>"><?php echo $frequency; ?></select>							
								</div>
								<div class="form-group">
									<label for="critical_period">Periodos críticos:</label>
									<select class="form-control" name="critical_period"><?php echo utf8_encode($critical_period); ?></select>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Sistema o sistemas que soportan el proceso</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<?php
									$systems = $conn->query("SELECT * FROM cat_sistemas JOIN proceso_sistemas ON cat_sistemas.clave_sistema=proceso_sistemas.clave_sistema WHERE proceso_sistemas.clave_proceso = $id");
									if(!$systems){
										throw new Exception('Error en la consulta getConsecutiveNumber.');
									}else{
										while($data = $systems->fetch_array()){
								?>
									<div class="form-group">
										<label>Clave del sistema: <?= $data['clave_sistema'] ?></label>
										<input class="form-control" type="text" name="system_name" id="system_name" value="<?= $data['nombre_sistema'] ?>" maxlength="100" size="50"/>
									</div>
								<?php
										}
									}
								?>														
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Procedimiento alterno</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="procedure">Procedimiento:</label>
									<input class="form-control" type="text" name="procedure" id="procedure" value="<?= $process['procedimiento_alterno'] ?>" maxlength="100" size="50"/>	
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Volumen transaccional</h3>
					</div>
					<div class="panel-body">
						<p class="lead">identifica los promedios mensuales de transacciones</p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="average">Promedio de transacciones:</label>
									<input class="form-control" type="text" name="average" id="average" value="<?= $process['promedio_transacciones_mensuales'] ?>" maxlength="100" size="50"/>						
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Ventana de operaciones</h3>
					</div>
					<div class="panel-body">
						<p class="lead">Indica el horario de operacion y niveles de carga del mismo</p>
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Horas</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;00:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;01:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;02:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;03:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;04:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;05:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;06:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;07:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;08:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;09:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;13:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;14:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;15:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;19:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;21:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;22:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;23:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row"></th>
												<td><select class="form-control" name="hora_0">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_0']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?>
												</select></td>
												<td><select class="form-control" name="hora_1">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_1']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_2">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_2']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_3">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_3']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_4">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_4']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_5">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_5']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_6">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_6']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_7">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_7']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_8">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_8']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_9">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_9']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_10">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_10']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_11">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_11']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_12">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_12']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_13">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_13']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_14">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_14']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_15">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_15']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_16">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_16']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_17">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_17']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_18">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_18']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_19">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_19']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_20">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_20']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_21">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_21']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_22">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_22']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_23">
												<?php
												$charge_levels = "select * from cat_nivel_carga";
												$result = $conn->query($charge_levels);
												$charge_level= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_nivel_carga']==$window_operation['hora_23']){
														$charge_level .= "<option value='$row[clave_nivel_carga]' selected>$row[descripcion_nivel_carga]</option>";
													}else{
														$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
													}
												}
												echo $charge_level; ?></select></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Procesamiento ciclico</h3>
					</div>
					<div class="panel-body">
						<p class="lead">Indica las cargas de trabajo del proceso durante el año</p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th></th>
									        	<th>Ene</th>
									        	<th>Feb</th>
									        	<th>Mar</th>
									        	<th>Abr</th>
									        	<th>May</th>
									        	<th>Jun</th>
									        	<th>Jul</th>
									        	<th>Ago</th>
									        	<th>Sep</th>
									        	<th>Oct</th>
									        	<th>Nov</th>
									        	<th>Dic</th>
								        	</tr>
								      	</thead>
								    	<tbody>
								    		<tr>
								        		<th scope="row">Alto</th>
								        		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['enero']==3){
														$cyclical_charge .= '<input type="radio" name="1a" value="3" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="1a" value="3">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['febrero']==3){
														$cyclical_charge .= '<input type="radio" name="2a" value="3" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="2a" value="3">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['marzo']==3){
														$cyclical_charge .= '<input type="radio" name="3a" value="3" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="3a" value="3">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['abril']==3){
														$cyclical_charge .= '<input type="radio" name="4a" value="3" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="4a" value="3">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['mayo']==3){
														$cyclical_charge .= '<input type="radio" name="5a" value="3" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="5a" value="3">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['junio']==3){
														$cyclical_charge .= '<input type="radio" name="6a" value="3" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="6a" value="3">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['julio']==3){
														$cyclical_charge .= '<input type="radio" name="7a" value="3" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="7a" value="3">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['agosto']==3){
														$cyclical_charge .= '<input type="radio" name="8a" value="3" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="8a" value="3">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['septiembre']==3){
														$cyclical_charge .= '<input type="radio" name="9a" value="3" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="9a" value="3">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['octubre']==3){
														$cyclical_charge .= '<input type="radio" name="10a" value="3" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="10a" value="3">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['noviembre']==3){
														$cyclical_charge .= '<input type="radio" name="11a" value="3" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="11a" value="3">';
													}
												}
												echo $cyclical_charge; ?></td>
												<td>
								          		<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['diciembre']==3){
														$cyclical_charge .= '<input type="radio" name="12a" value="3" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="12a" value="3">';
													}
												}
												echo $cyclical_charge; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row">Medio</th>
								        		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['enero']==2){
														$cyclical_charge .= '<input type="radio" name="1a" value="2" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="1a" value="2">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['febrero']==2){
														$cyclical_charge .= '<input type="radio" name="2a" value="2" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="2a" value="2">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['marzo']==2){
														$cyclical_charge .= '<input type="radio" name="3a" value="2" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="3a" value="2">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['abril']==2){
														$cyclical_charge .= '<input type="radio" name="4a" value="2" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="4a" value="2">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['mayo']==2){
														$cyclical_charge .= '<input type="radio" name="5a" value="2" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="5a" value="2">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['junio']==2){
														$cyclical_charge .= '<input type="radio" name="6a" value="2" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="6a" value="2">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['julio']==2){
														$cyclical_charge .= '<input type="radio" name="7a" value="2" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="7a" value="2">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['agosto']==2){
														$cyclical_charge .= '<input type="radio" name="8a" value="2" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="8a" value="2">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['septiembre']==2){
														$cyclical_charge .= '<input type="radio" name="9a" value="2" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="9a" value="2">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['octubre']==2){
														$cyclical_charge .= '<input type="radio" name="10a" value="2" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="10a" value="2">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['noviembre']==2){
														$cyclical_charge .= '<input type="radio" name="11a" value="2" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="11a" value="2">';
													}
												}
												echo $cyclical_charge; ?></td>
												<td>
								          		<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['diciembre']==2){
														$cyclical_charge .= '<input type="radio" name="12a" value="2" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="12a" value="2">';
													}
												}
												echo $cyclical_charge; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row">Bajo</th>
								        		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['enero']==1){
														$cyclical_charge .= '<input type="radio" name="1a" value="1" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="1a" value="1">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['febrero']==1){
														$cyclical_charge .= '<input type="radio" name="2a" value="1" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="2a" value="1">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['marzo']==1){
														$cyclical_charge .= '<input type="radio" name="3a" value="1" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="3a" value="1">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['abril']==1){
														$cyclical_charge .= '<input type="radio" name="4a" value="1" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="4a" value="1">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['mayo']==1){
														$cyclical_charge .= '<input type="radio" name="5a" value="1" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="5a" value="1">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['junio']==1){
														$cyclical_charge .= '<input type="radio" name="6a" value="1" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="6a" value="1">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['julio']==1){
														$cyclical_charge .= '<input type="radio" name="7a" value="1" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="7a" value="1">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['agosto']==1){
														$cyclical_charge .= '<input type="radio" name="8a" value="1" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="8a" value="1">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['septiembre']==1){
														$cyclical_charge .= '<input type="radio" name="9a" value="1" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="9a" value="1">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['octubre']==1){
														$cyclical_charge .= '<input type="radio" name="10a" value="1" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="10a" value="1">';
													}
												}
												echo $cyclical_charge; ?></td>
								          		<td>
												<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['noviembre']==1){
														$cyclical_charge .= '<input type="radio" name="11a" value="1" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="11a" value="1">';
													}
												}
												echo $cyclical_charge; ?></td>
												<td>
								          		<?php
												$cyclical_charges = "select * from procesa_ciclico";
												$result = $conn->query($cyclical_charges);
												$cyclical_charge= "";
												while ($row = $result->fetch_assoc()) {
													if($row['diciembre']==1){
														$cyclical_charge .= '<input type="radio" name="12a" value="1" checked>';
													}else{
														$cyclical_charge .= '<input type="radio" name="12a" value="1">';
													}
												}
												echo $cyclical_charge; ?></td>
								        	</tr>
								      	</tbody>
								    </table>
								    </div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Impacto financiero</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th></th>
									        	<th><?= getTypeFinancialImpact('1') ?></th>
									        	<th><?= getTypeFinancialImpact('2') ?></th>
									        	<th><?= getTypeFinancialImpact('3') ?></th>
									        	<th><?= getTypeFinancialImpact('4') ?></th>
									        	<th><?= getTypeFinancialImpact('5') ?></th>
									        	<th><?= getTypeFinancialImpact('6') ?></th>
									        	<th><?= getTypeFinancialImpact('7') ?></th>
								        	</tr>
								      	</thead>
								    	<tbody>
								    		<tr>
								        		<th scope="row"><?= getTimeAffectation('1') ?></th>
								        		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=1";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==1 && $financial_impacts[0]['clave_tiempo_afectacion']==1 && $row['clave_impacto_financiero']==1 && $financial_impacts[0]['clave_impacto_financiero']==1){
														$financial .= '<input type="radio" name="1b" value="1" checked>';
													}else{
														$financial .= '<input type="radio" name="1b" value="1">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=1";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==1 && $financial_impacts[0]['clave_tiempo_afectacion']==1 && $row['clave_impacto_financiero']==2 && $financial_impacts[0]['clave_impacto_financiero']==2){
														$financial .= '<input type="radio" name="1b" value="2" checked>';
													}else{
														$financial .= '<input type="radio" name="1b" value="2">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=1";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==1 && $financial_impacts[0]['clave_tiempo_afectacion']==1 && $row['clave_impacto_financiero']==3 && $financial_impacts[0]['clave_impacto_financiero']==3){
														$financial .= '<input type="radio" name="1b" value="3" checked>';
													}else{
														$financial .= '<input type="radio" name="1b" value="3">';
													}
												}
												echo $financial; ?></td>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=1";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==1 && $financial_impacts[0]['clave_tiempo_afectacion']==1 && $row['clave_impacto_financiero']==4 && $financial_impacts[0]['clave_impacto_financiero']==4){
														$financial .= '<input type="radio" name="1b" value="4" checked>';
													}else{
														$financial .= '<input type="radio" name="1b" value="4">';
													}
												}
												echo $financial; ?></td>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=1";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==1 && $financial_impacts[0]['clave_tiempo_afectacion']==1 && $row['clave_impacto_financiero']==5 && $financial_impacts[0]['clave_impacto_financiero']==5){
														$financial .= '<input type="radio" name="1b" value="5" checked>';
													}else{
														$financial .= '<input type="radio" name="1b" value="5">';
													}
												}
												echo $financial; ?></td>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=1";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==1 && $financial_impacts[0]['clave_tiempo_afectacion']==1 && $row['clave_impacto_financiero']==6 && $financial_impacts[0]['clave_impacto_financiero']==6){
														$financial .= '<input type="radio" name="1b" value="6" checked>';
													}else{
														$financial .= '<input type="radio" name="1b" value="6">';
													}
												}
												echo $financial; ?></td>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=1";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==1 && $financial_impacts[0]['clave_tiempo_afectacion']==1 && $row['clave_impacto_financiero']==7 && $financial_impacts[0]['clave_impacto_financiero']==7){
														$financial .= '<input type="radio" name="1b" value="7" checked>';
													}else{
														$financial .= '<input type="radio" name="1b" value="7">';
													}
												}
												echo $financial; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('2') ?></th>
								        		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=2";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==2 && $financial_impacts[1]['clave_tiempo_afectacion']==2 && $row['clave_impacto_financiero']==1 && $financial_impacts[1]['clave_impacto_financiero']==1){
														$financial .= '<input type="radio" name="2b" value="1" checked>';
													}else{
														$financial .= '<input type="radio" name="2b" value="1">';
													}
												}
												echo $financial; ?></td>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=2";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==2 && $financial_impacts[1]['clave_tiempo_afectacion']==2 && $row['clave_impacto_financiero']==2 && $financial_impacts[1]['clave_impacto_financiero']==2){
														$financial .= '<input type="radio" name="2b" value="2" checked>';
													}else{
														$financial .= '<input type="radio" name="2b" value="2">';
													}
												}
												echo $financial; ?></td>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=2";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==2 && $financial_impacts[1]['clave_tiempo_afectacion']==2 && $row['clave_impacto_financiero']==3 && $financial_impacts[1]['clave_impacto_financiero']==3){
														$financial .= '<input type="radio" name="2b" value="3" checked>';
													}else{
														$financial .= '<input type="radio" name="2b" value="3">';
													}
												}
												echo $financial; ?></td>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=2";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==2 && $financial_impacts[1]['clave_tiempo_afectacion']==2 && $row['clave_impacto_financiero']==4 && $financial_impacts[1]['clave_impacto_financiero']==4){
														$financial .= '<input type="radio" name="2b" value="4" checked>';
													}else{
														$financial .= '<input type="radio" name="2b" value="4">';
													}
												}
												echo $financial; ?></td>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=2";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==2 && $financial_impacts[1]['clave_tiempo_afectacion']==2 && $row['clave_impacto_financiero']==5 && $financial_impacts[1]['clave_impacto_financiero']==5){
														$financial .= '<input type="radio" name="2b" value="5" checked>';
													}else{
														$financial .= '<input type="radio" name="2b" value="5">';
													}
												}
												echo $financial; ?></td>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=2";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==2 && $financial_impacts[1]['clave_tiempo_afectacion']==2 && $row['clave_impacto_financiero']==6 && $financial_impacts[1]['clave_impacto_financiero']==6){
														$financial .= '<input type="radio" name="2b" value="6" checked>';
													}else{
														$financial .= '<input type="radio" name="2b" value="6">';
													}
												}
												echo $financial; ?></td>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=2";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==2 && $financial_impacts[1]['clave_tiempo_afectacion']==2 && $row['clave_impacto_financiero']==7 && $financial_impacts[1]['clave_impacto_financiero']==7){
														$financial .= '<input type="radio" name="2b" value="7" checked>';
													}else{
														$financial .= '<input type="radio" name="2b" value="7">';
													}
												}
												echo $financial; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('3') ?></th>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=3";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==3 && $financial_impacts[2]['clave_tiempo_afectacion']==3 && $row['clave_impacto_financiero']==1 && $financial_impacts[2]['clave_impacto_financiero']==1){
														$financial .= '<input type="radio" name="3b" value="1" checked>';
													}else{
														$financial .= '<input type="radio" name="3b" value="1">';
													}
												}
												echo $financial; ?></td>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=3";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==3 && $financial_impacts[2]['clave_tiempo_afectacion']==3 && $row['clave_impacto_financiero']==2 && $financial_impacts[2]['clave_impacto_financiero']==2){
														$financial .= '<input type="radio" name="3b" value="2" checked>';
													}else{
														$financial .= '<input type="radio" name="3b" value="2">';
													}
												}
												echo $financial; ?></td>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=3";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==3 && $financial_impacts[2]['clave_tiempo_afectacion']==3 && $row['clave_impacto_financiero']==3 && $financial_impacts[2]['clave_impacto_financiero']==3){
														$financial .= '<input type="radio" name="3b" value="3" checked>';
													}else{
														$financial .= '<input type="radio" name="3b" value="3">';
													}
												}
												echo $financial; ?></td>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=3";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==3 && $financial_impacts[2]['clave_tiempo_afectacion']==3 && $row['clave_impacto_financiero']==4 && $financial_impacts[2]['clave_impacto_financiero']==4){
														$financial .= '<input type="radio" name="3b" value="4" checked>';
													}else{
														$financial .= '<input type="radio" name="3b" value="4">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=3";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==3 && $financial_impacts[2]['clave_tiempo_afectacion']==3 && $row['clave_impacto_financiero']==5 && $financial_impacts[2]['clave_impacto_financiero']==5){
														$financial .= '<input type="radio" name="3b" value="5" checked>';
													}else{
														$financial .= '<input type="radio" name="3b" value="5">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=3";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==3 && $financial_impacts[2]['clave_tiempo_afectacion']==3 && $row['clave_impacto_financiero']==6 && $financial_impacts[2]['clave_impacto_financiero']==6){
														$financial .= '<input type="radio" name="3b" value="6" checked>';
													}else{
														$financial .= '<input type="radio" name="3b" value="6">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=3";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==3 && $financial_impacts[2]['clave_tiempo_afectacion']==3 && $row['clave_impacto_financiero']==7 && $financial_impacts[2]['clave_impacto_financiero']==7){
														$financial .= '<input type="radio" name="3b" value="7" checked>';
													}else{
														$financial .= '<input type="radio" name="3b" value="7">';
													}
												}
												echo $financial; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('4') ?></th>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=4";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==4 && $financial_impacts[3]['clave_tiempo_afectacion']==4 && $row['clave_impacto_financiero']==1 && $financial_impacts[3]['clave_impacto_financiero']==1){
														$financial .= '<input type="radio" name="4b" value="1" checked>';
													}else{
														$financial .= '<input type="radio" name="4b" value="1">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=4";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==4 && $financial_impacts[3]['clave_tiempo_afectacion']==4 && $row['clave_impacto_financiero']==2 && $financial_impacts[3]['clave_impacto_financiero']==2){
														$financial .= '<input type="radio" name="4b" value="2" checked>';
													}else{
														$financial .= '<input type="radio" name="4b" value="2">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=4";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==4 && $financial_impacts[3]['clave_tiempo_afectacion']==4 && $row['clave_impacto_financiero']==3 && $financial_impacts[3]['clave_impacto_financiero']==3){
														$financial .= '<input type="radio" name="4b" value="3" checked>';
													}else{
														$financial .= '<input type="radio" name="4b" value="3">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=4";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==4 && $financial_impacts[3]['clave_tiempo_afectacion']==4 && $row['clave_impacto_financiero']==4 && $financial_impacts[3]['clave_impacto_financiero']==4){
														$financial .= '<input type="radio" name="4b" value="4" checked>';
													}else{
														$financial .= '<input type="radio" name="4b" value="4">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=4";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==4 && $financial_impacts[3]['clave_tiempo_afectacion']==4 && $row['clave_impacto_financiero']==5 && $financial_impacts[3]['clave_impacto_financiero']==5){
														$financial .= '<input type="radio" name="4b" value="5" checked>';
													}else{
														$financial .= '<input type="radio" name="4b" value="5">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=4";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==4 && $financial_impacts[3]['clave_tiempo_afectacion']==4 && $row['clave_impacto_financiero']==6 && $financial_impacts[3]['clave_impacto_financiero']==6){
														$financial .= '<input type="radio" name="4b" value="6" checked>';
													}else{
														$financial .= '<input type="radio" name="4b" value="6">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=4";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==4 && $financial_impacts[3]['clave_tiempo_afectacion']==4 && $row['clave_impacto_financiero']==7 && $financial_impacts[3]['clave_impacto_financiero']==7){
														$financial .= '<input type="radio" name="4b" value="7" checked>';
													}else{
														$financial .= '<input type="radio" name="4b" value="7">';
													}
												}
												echo $financial; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('5') ?></th>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=5";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==5 && $financial_impacts[4]['clave_tiempo_afectacion']==5 && $row['clave_impacto_financiero']==1 && $financial_impacts[4]['clave_impacto_financiero']==1){
														$financial .= '<input type="radio" name="5b" value="1" checked>';
													}else{
														$financial .= '<input type="radio" name="5b" value="1">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=5";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==5 && $financial_impacts[4]['clave_tiempo_afectacion']==5 && $row['clave_impacto_financiero']==2 && $financial_impacts[4]['clave_impacto_financiero']==2){
														$financial .= '<input type="radio" name="5b" value="2" checked>';
													}else{
														$financial .= '<input type="radio" name="5b" value="2">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=5";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==5 && $financial_impacts[4]['clave_tiempo_afectacion']==5 && $row['clave_impacto_financiero']==3 && $financial_impacts[4]['clave_impacto_financiero']==3){
														$financial .= '<input type="radio" name="5b" value="3" checked>';
													}else{
														$financial .= '<input type="radio" name="5b" value="3">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=5";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==5 && $financial_impacts[4]['clave_tiempo_afectacion']==5 && $row['clave_impacto_financiero']==4 && $financial_impacts[4]['clave_impacto_financiero']==4){
														$financial .= '<input type="radio" name="5b" value="4" checked>';
													}else{
														$financial .= '<input type="radio" name="5b" value="4">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=5";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==5 && $financial_impacts[4]['clave_tiempo_afectacion']==5 && $row['clave_impacto_financiero']==5 && $financial_impacts[4]['clave_impacto_financiero']==5){
														$financial .= '<input type="radio" name="5b" value="5" checked>';
													}else{
														$financial .= '<input type="radio" name="5b" value="5">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=5";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==5 && $financial_impacts[4]['clave_tiempo_afectacion']==5 && $row['clave_impacto_financiero']==6 && $financial_impacts[4]['clave_impacto_financiero']==6){
														$financial .= '<input type="radio" name="5b" value="6" checked>';
													}else{
														$financial .= '<input type="radio" name="5b" value="6">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=5";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==5 && $financial_impacts[4]['clave_tiempo_afectacion']==5 && $row['clave_impacto_financiero']==7 && $financial_impacts[4]['clave_impacto_financiero']==7){
														$financial .= '<input type="radio" name="5b" value="7" checked>';
													}else{
														$financial .= '<input type="radio" name="5b" value="7">';
													}
												}
												echo $financial; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('6') ?></th>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=6";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==6 && $financial_impacts[5]['clave_tiempo_afectacion']==6 && $row['clave_impacto_financiero']==1 && $financial_impacts[5]['clave_impacto_financiero']==1){
														$financial .= '<input type="radio" name="6b" value="1" checked>';
													}else{
														$financial .= '<input type="radio" name="6b" value="1">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=6";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==6 && $financial_impacts[5]['clave_tiempo_afectacion']==6 && $row['clave_impacto_financiero']==2 && $financial_impacts[5]['clave_impacto_financiero']==2){
														$financial .= '<input type="radio" name="6b" value="2" checked>';
													}else{
														$financial .= '<input type="radio" name="6b" value="2">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=6";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==6 && $financial_impacts[5]['clave_tiempo_afectacion']==6 && $row['clave_impacto_financiero']==3 && $financial_impacts[5]['clave_impacto_financiero']==3){
														$financial .= '<input type="radio" name="6b" value="3" checked>';
													}else{
														$financial .= '<input type="radio" name="6b" value="3">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=6";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==6 && $financial_impacts[5]['clave_tiempo_afectacion']==6 && $row['clave_impacto_financiero']==4 && $financial_impacts[5]['clave_impacto_financiero']==4){
														$financial .= '<input type="radio" name="6b" value="4" checked>';
													}else{
														$financial .= '<input type="radio" name="6b" value="4">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=6";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==6 && $financial_impacts[5]['clave_tiempo_afectacion']==6 && $row['clave_impacto_financiero']==5 && $financial_impacts[5]['clave_impacto_financiero']==5){
														$financial .= '<input type="radio" name="6b" value="5" checked>';
													}else{
														$financial .= '<input type="radio" name="6b" value="5">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=6";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==6 && $financial_impacts[5]['clave_tiempo_afectacion']==6 && $row['clave_impacto_financiero']==6 && $financial_impacts[5]['clave_impacto_financiero']==6){
														$financial .= '<input type="radio" name="6b" value="6" checked>';
													}else{
														$financial .= '<input type="radio" name="6b" value="6">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=6";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==6 && $financial_impacts[5]['clave_tiempo_afectacion']==6 && $row['clave_impacto_financiero']==7 && $financial_impacts[5]['clave_impacto_financiero']==7){
														$financial .= '<input type="radio" name="6b" value="7" checked>';
													}else{
														$financial .= '<input type="radio" name="6b" value="7">';
													}
												}
												echo $financial; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('7') ?></th>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=7";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==7 && $financial_impacts[6]['clave_tiempo_afectacion']==7 && $row['clave_impacto_financiero']==1 && $financial_impacts[6]['clave_impacto_financiero']==1){
														$financial .= '<input type="radio" name="7b" value="1" checked>';
													}else{
														$financial .= '<input type="radio" name="7b" value="1">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=7";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==7 && $financial_impacts[6]['clave_tiempo_afectacion']==7 && $row['clave_impacto_financiero']==2 && $financial_impacts[6]['clave_impacto_financiero']==2){
														$financial .= '<input type="radio" name="7b" value="2" checked>';
													}else{
														$financial .= '<input type="radio" name="7b" value="2">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=7";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==7 && $financial_impacts[6]['clave_tiempo_afectacion']==7 && $row['clave_impacto_financiero']==3 && $financial_impacts[6]['clave_impacto_financiero']==3){
														$financial .= '<input type="radio" name="7b" value="3" checked>';
													}else{
														$financial .= '<input type="radio" name="7b" value="3">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=7";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==7 && $financial_impacts[6]['clave_tiempo_afectacion']==7 && $row['clave_impacto_financiero']==4 && $financial_impacts[6]['clave_impacto_financiero']==4){
														$financial .= '<input type="radio" name="7b" value="4" checked>';
													}else{
														$financial .= '<input type="radio" name="7b" value="4">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=7";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==7 && $financial_impacts[6]['clave_tiempo_afectacion']==7 && $row['clave_impacto_financiero']==5 && $financial_impacts[6]['clave_impacto_financiero']==5){
														$financial .= '<input type="radio" name="7b" value="5" checked>';
													}else{
														$financial .= '<input type="radio" name="7b" value="5">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=7";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==7 && $financial_impacts[6]['clave_tiempo_afectacion']==7 && $row['clave_impacto_financiero']==6 && $financial_impacts[6]['clave_impacto_financiero']==6){
														$financial .= '<input type="radio" name="7b" value="6" checked>';
													}else{
														$financial .= '<input type="radio" name="7b" value="6">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=7";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==7 && $financial_impacts[6]['clave_tiempo_afectacion']==7 && $row['clave_impacto_financiero']==7 && $financial_impacts[6]['clave_impacto_financiero']==7){
														$financial .= '<input type="radio" name="7b" value="7" checked>';
													}else{
														$financial .= '<input type="radio" name="7b" value="7">';
													}
												}
												echo $financial; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('8') ?></th>
								          		<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=8";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==8 && $financial_impacts[7]['clave_tiempo_afectacion']==8 && $row['clave_impacto_financiero']==1 && $financial_impacts[7]['clave_impacto_financiero']==1){
														$financial .= '<input type="radio" name="8b" value="1" checked>';
													}else{
														$financial .= '<input type="radio" name="8b" value="1">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=8";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==8 && $financial_impacts[7]['clave_tiempo_afectacion']==8 && $row['clave_impacto_financiero']==2 && $financial_impacts[7]['clave_impacto_financiero']==2){
														$financial .= '<input type="radio" name="8b" value="2" checked>';
													}else{
														$financial .= '<input type="radio" name="8b" value="2">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=8";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==8 && $financial_impacts[7]['clave_tiempo_afectacion']==8 && $row['clave_impacto_financiero']==3 && $financial_impacts[7]['clave_impacto_financiero']==3){
														$financial .= '<input type="radio" name="8b" value="3" checked>';
													}else{
														$financial .= '<input type="radio" name="8b" value="3">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=8";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==8 && $financial_impacts[7]['clave_tiempo_afectacion']==8 && $row['clave_impacto_financiero']==4 && $financial_impacts[7]['clave_impacto_financiero']==4){
														$financial .= '<input type="radio" name="8b" value="4" checked>';
													}else{
														$financial .= '<input type="radio" name="8b" value="4">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=8";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==8 && $financial_impacts[7]['clave_tiempo_afectacion']==8 && $row['clave_impacto_financiero']==5 && $financial_impacts[7]['clave_impacto_financiero']==5){
														$financial .= '<input type="radio" name="8b" value="5" checked>';
													}else{
														$financial .= '<input type="radio" name="8b" value="5">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=8";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==8 && $financial_impacts[7]['clave_tiempo_afectacion']==8 && $row['clave_impacto_financiero']==6 && $financial_impacts[7]['clave_impacto_financiero']==6){
														$financial .= '<input type="radio" name="8b" value="6" checked>';
													}else{
														$financial .= '<input type="radio" name="8b" value="6">';
													}
												}
												echo $financial; ?></td>
												<td>
								          		<?php
												$financial_data = "select * from impactos_financiero where consecutivo_impacto_financiero=8";
												$result = $conn->query($financial_data);
												$financial= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion']==8 && $financial_impacts[7]['clave_tiempo_afectacion']==8 && $row['clave_impacto_financiero']==7 && $financial_impacts[7]['clave_impacto_financiero']==7){
														$financial .= '<input type="radio" name="8b" value="7" checked>';
													}else{
														$financial .= '<input type="radio" name="8b" value="7">';
													}
												}
												echo $financial; ?></td>
								        	</tr>
								      	</tbody>
								    </table>
								    </div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Impactos Economicos asociados</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th></th>
										        	<th><?= getTypeFinancialImpact('1') ?></th>
										        	<th><?= getTypeFinancialImpact('2') ?></th>
										        	<th><?= getTypeFinancialImpact('3') ?></th>
										        	<th><?= getTypeFinancialImpact('4') ?></th>
										        	<th><?= getTypeFinancialImpact('5') ?></th>
										        	<th><?= getTypeFinancialImpact('6') ?></th>
										        	<th><?= getTypeFinancialImpact('7') ?></th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
								        		<th scope="row"><?= getTimeAffectation('1') ?></th>
								        		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=1";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==1 && $economic_impacts[0]['clave_tiempo_afectacion_multa']==1 && $row['clave_impacto_financiero_multa']==1 && $economic_impacts[0]['clave_impacto_financiero_multa']==1){
														$ecomomic .= '<input type="radio" name="1" value="1" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="1" value="1">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=1";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==1 && $economic_impacts[0]['clave_tiempo_afectacion_multa']==1 && $row['clave_impacto_financiero_multa']==2 && $economic_impacts[0]['clave_impacto_financiero_multa']==2){
														$ecomomic .= '<input type="radio" name="1" value="2" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="1" value="2">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=1";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==1 && $economic_impacts[0]['clave_tiempo_afectacion_multa']==1 && $row['clave_impacto_financiero_multa']==3 && $economic_impacts[0]['clave_impacto_financiero_multa']==3){
														$ecomomic .= '<input type="radio" name="1" value="3" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="1" value="3">';
													}
												}
												echo $ecomomic; ?></td>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=1";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==1 && $economic_impacts[0]['clave_tiempo_afectacion_multa']==1 && $row['clave_impacto_financiero_multa']==4 && $economic_impacts[0]['clave_impacto_financiero_multa']==4){
														$ecomomic .= '<input type="radio" name="1" value="4" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="1" value="4">';
													}
												}
												echo $ecomomic; ?></td>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=1";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==1 && $economic_impacts[0]['clave_tiempo_afectacion_multa']==1 && $row['clave_impacto_financiero_multa']==5 && $economic_impacts[0]['clave_impacto_financiero_multa']==5){
														$ecomomic .= '<input type="radio" name="1" value="5" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="1" value="5">';
													}
												}
												echo $ecomomic; ?></td>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=1";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==1 && $economic_impacts[0]['clave_tiempo_afectacion_multa']==1 && $row['clave_impacto_financiero_multa']==6 && $economic_impacts[0]['clave_impacto_financiero_multa']==6){
														$ecomomic .= '<input type="radio" name="1" value="6" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="1" value="6">';
													}
												}
												echo $ecomomic; ?></td>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=1";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==1 && $economic_impacts[0]['clave_tiempo_afectacion_multa']==1 && $row['clave_impacto_financiero_multa']==7 && $economic_impacts[0]['clave_impacto_financiero_multa']==7){
														$ecomomic .= '<input type="radio" name="1" value="7" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="1" value="7">';
													}
												}
												echo $ecomomic; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('2') ?></th>
								        		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=2";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==2 && $economic_impacts[1]['clave_tiempo_afectacion_multa']==2 && $row['clave_impacto_financiero_multa']==1 && $economic_impacts[1]['clave_impacto_financiero_multa']==1){
														$ecomomic .= '<input type="radio" name="2" value="1" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="2" value="1">';
													}
												}
												echo $ecomomic; ?></td>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=2";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==2 && $economic_impacts[1]['clave_tiempo_afectacion_multa']==2 && $row['clave_impacto_financiero_multa']==2 && $economic_impacts[1]['clave_impacto_financiero_multa']==2){
														$ecomomic .= '<input type="radio" name="2" value="2" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="2" value="2">';
													}
												}
												echo $ecomomic; ?></td>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=2";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==2 && $economic_impacts[1]['clave_tiempo_afectacion_multa']==2 && $row['clave_impacto_financiero_multa']==3 && $economic_impacts[1]['clave_impacto_financiero_multa']==3){
														$ecomomic .= '<input type="radio" name="2" value="3" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="2" value="3">';
													}
												}
												echo $ecomomic; ?></td>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=2";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==2 && $economic_impacts[1]['clave_tiempo_afectacion_multa']==2 && $row['clave_impacto_financiero_multa']==4 && $economic_impacts[1]['clave_impacto_financiero_multa']==4){
														$ecomomic .= '<input type="radio" name="2" value="4" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="2" value="4">';
													}
												}
												echo $ecomomic; ?></td>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=2";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==2 && $economic_impacts[1]['clave_tiempo_afectacion_multa']==2 && $row['clave_impacto_financiero_multa']==5 && $economic_impacts[1]['clave_impacto_financiero_multa']==5){
														$ecomomic .= '<input type="radio" name="2" value="5" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="2" value="5">';
													}
												}
												echo $ecomomic; ?></td>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=2";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==2 && $economic_impacts[1]['clave_tiempo_afectacion_multa']==2 && $row['clave_impacto_financiero_multa']==6 && $economic_impacts[1]['clave_impacto_financiero_multa']==6){
														$ecomomic .= '<input type="radio" name="2" value="6" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="2" value="6">';
													}
												}
												echo $ecomomic; ?></td>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=2";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==2 && $economic_impacts[1]['clave_tiempo_afectacion_multa']==2 && $row['clave_impacto_financiero_multa']==7 && $economic_impacts[1]['clave_impacto_financiero_multa']==7){
														$ecomomic .= '<input type="radio" name="2" value="7" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="2" value="7">';
													}
												}
												echo $ecomomic; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('3') ?></th>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=3";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==3 && $economic_impacts[2]['clave_tiempo_afectacion_multa']==3 && $row['clave_impacto_financiero_multa']==1 && $economic_impacts[2]['clave_impacto_financiero_multa']==1){
														$ecomomic .= '<input type="radio" name="3" value="1" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="3" value="1">';
													}
												}
												echo $ecomomic; ?></td>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=3";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==3 && $economic_impacts[2]['clave_tiempo_afectacion_multa']==3 && $row['clave_impacto_financiero_multa']==2 && $economic_impacts[2]['clave_impacto_financiero_multa']==2){
														$ecomomic .= '<input type="radio" name="3" value="2" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="3" value="2">';
													}
												}
												echo $ecomomic; ?></td>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=3";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==3 && $economic_impacts[2]['clave_tiempo_afectacion_multa']==3 && $row['clave_impacto_financiero_multa']==3 && $economic_impacts[2]['clave_impacto_financiero_multa']==3){
														$ecomomic .= '<input type="radio" name="3" value="3" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="3" value="3">';
													}
												}
												echo $ecomomic; ?></td>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=3";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==3 && $economic_impacts[2]['clave_tiempo_afectacion_multa']==3 && $row['clave_impacto_financiero_multa']==4 && $economic_impacts[2]['clave_impacto_financiero_multa']==4){
														$ecomomic .= '<input type="radio" name="3" value="4" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="3" value="4">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=3";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==3 && $economic_impacts[2]['clave_tiempo_afectacion_multa']==3 && $row['clave_impacto_financiero_multa']==5 && $economic_impacts[2]['clave_impacto_financiero_multa']==5){
														$ecomomic .= '<input type="radio" name="3" value="5" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="3" value="5">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=3";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==3 && $economic_impacts[2]['clave_tiempo_afectacion_multa']==3 && $row['clave_impacto_financiero_multa']==6 && $economic_impacts[2]['clave_impacto_financiero_multa']==6){
														$ecomomic .= '<input type="radio" name="3" value="6" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="3" value="6">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=3";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==3 && $economic_impacts[2]['clave_tiempo_afectacion_multa']==3 && $row['clave_impacto_financiero_multa']==7 && $economic_impacts[2]['clave_impacto_financiero_multa']==7){
														$ecomomic .= '<input type="radio" name="3" value="7" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="3" value="7">';
													}
												}
												echo $ecomomic; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('4') ?></th>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=4";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==4 && $economic_impacts[3]['clave_tiempo_afectacion_multa']==4 && $row['clave_impacto_financiero_multa']==1 && $economic_impacts[3]['clave_impacto_financiero_multa']==1){
														$ecomomic .= '<input type="radio" name="4" value="1" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="4" value="1">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=4";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==4 && $economic_impacts[3]['clave_tiempo_afectacion_multa']==4 && $row['clave_impacto_financiero_multa']==2 && $economic_impacts[3]['clave_impacto_financiero_multa']==2){
														$ecomomic .= '<input type="radio" name="4" value="2" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="4" value="2">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=4";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==4 && $economic_impacts[3]['clave_tiempo_afectacion_multa']==4 && $row['clave_impacto_financiero_multa']==3 && $economic_impacts[3]['clave_impacto_financiero_multa']==3){
														$ecomomic .= '<input type="radio" name="4" value="3" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="4" value="3">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=4";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==4 && $economic_impacts[3]['clave_tiempo_afectacion_multa']==4 && $row['clave_impacto_financiero_multa']==4 && $economic_impacts[3]['clave_impacto_financiero_multa']==4){
														$ecomomic .= '<input type="radio" name="4" value="4" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="4" value="4">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=4";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==4 && $economic_impacts[3]['clave_tiempo_afectacion_multa']==4 && $row['clave_impacto_financiero_multa']==5 && $economic_impacts[3]['clave_impacto_financiero_multa']==5){
														$ecomomic .= '<input type="radio" name="4" value="5" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="4" value="5">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=4";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==4 && $economic_impacts[3]['clave_tiempo_afectacion_multa']==4 && $row['clave_impacto_financiero_multa']==6 && $economic_impacts[3]['clave_impacto_financiero_multa']==6){
														$ecomomic .= '<input type="radio" name="4" value="6" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="4" value="6">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=4";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==4 && $economic_impacts[3]['clave_tiempo_afectacion_multa']==4 && $row['clave_impacto_financiero_multa']==7 && $economic_impacts[3]['clave_impacto_financiero_multa']==7){
														$ecomomic .= '<input type="radio" name="4" value="7" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="4" value="7">';
													}
												}
												echo $ecomomic; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('5') ?></th>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=5";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==5 && $economic_impacts[4]['clave_tiempo_afectacion_multa']==5 && $row['clave_impacto_financiero_multa']==1 && $economic_impacts[4]['clave_impacto_financiero_multa']==1){
														$ecomomic .= '<input type="radio" name="5" value="1" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="5" value="1">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=5";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==5 && $economic_impacts[4]['clave_tiempo_afectacion_multa']==5 && $row['clave_impacto_financiero_multa']==2 && $economic_impacts[4]['clave_impacto_financiero_multa']==2){
														$ecomomic .= '<input type="radio" name="5" value="2" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="5" value="2">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=5";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==5 && $economic_impacts[4]['clave_tiempo_afectacion_multa']==5 && $row['clave_impacto_financiero_multa']==3 && $economic_impacts[4]['clave_impacto_financiero_multa']==3){
														$ecomomic .= '<input type="radio" name="5" value="3" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="5" value="3">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=5";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==5 && $economic_impacts[4]['clave_tiempo_afectacion_multa']==5 && $row['clave_impacto_financiero_multa']==4 && $economic_impacts[4]['clave_impacto_financiero_multa']==4){
														$ecomomic .= '<input type="radio" name="5" value="4" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="5" value="4">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=5";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==5 && $economic_impacts[4]['clave_tiempo_afectacion_multa']==5 && $row['clave_impacto_financiero_multa']==5 && $economic_impacts[4]['clave_impacto_financiero_multa']==5){
														$ecomomic .= '<input type="radio" name="5" value="5" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="5" value="5">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=5";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==5 && $economic_impacts[4]['clave_tiempo_afectacion_multa']==5 && $row['clave_impacto_financiero_multa']==6 && $economic_impacts[4]['clave_impacto_financiero_multa']==6){
														$ecomomic .= '<input type="radio" name="5" value="6" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="5" value="6">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=5";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==5 && $economic_impacts[4]['clave_tiempo_afectacion_multa']==5 && $row['clave_impacto_financiero_multa']==7 && $economic_impacts[4]['clave_impacto_financiero_multa']==7){
														$ecomomic .= '<input type="radio" name="5" value="7" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="5" value="7">';
													}
												}
												echo $ecomomic; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('6') ?></th>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=6";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==6 && $economic_impacts[5]['clave_tiempo_afectacion_multa']==6 && $row['clave_impacto_financiero_multa']==1 && $economic_impacts[5]['clave_impacto_financiero_multa']==1){
														$ecomomic .= '<input type="radio" name="6" value="1" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="6" value="1">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=6";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==6 && $economic_impacts[5]['clave_tiempo_afectacion_multa']==6 && $row['clave_impacto_financiero_multa']==2 && $economic_impacts[5]['clave_impacto_financiero_multa']==2){
														$ecomomic .= '<input type="radio" name="6" value="2" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="6" value="2">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=6";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==6 && $economic_impacts[5]['clave_tiempo_afectacion_multa']==6 && $row['clave_impacto_financiero_multa']==3 && $economic_impacts[5]['clave_impacto_financiero_multa']==3){
														$ecomomic .= '<input type="radio" name="6" value="3" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="6" value="3">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=6";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==6 && $economic_impacts[5]['clave_tiempo_afectacion_multa']==6 && $row['clave_impacto_financiero_multa']==4 && $economic_impacts[5]['clave_impacto_financiero_multa']==4){
														$ecomomic .= '<input type="radio" name="6" value="4" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="6" value="4">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=6";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==6 && $economic_impacts[5]['clave_tiempo_afectacion_multa']==6 && $row['clave_impacto_financiero_multa']==5 && $economic_impacts[5]['clave_impacto_financiero_multa']==5){
														$ecomomic .= '<input type="radio" name="6" value="5" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="6" value="5">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=6";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==6 && $economic_impacts[5]['clave_tiempo_afectacion_multa']==6 && $row['clave_impacto_financiero_multa']==6 && $economic_impacts[5]['clave_impacto_financiero_multa']==6){
														$ecomomic .= '<input type="radio" name="6" value="6" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="6" value="6">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=6";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==6 && $economic_impacts[5]['clave_tiempo_afectacion_multa']==6 && $row['clave_impacto_financiero_multa']==7 && $economic_impacts[5]['clave_impacto_financiero_multa']==7){
														$ecomomic .= '<input type="radio" name="6" value="7" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="6" value="7">';
													}
												}
												echo $ecomomic; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('7') ?></th>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=7";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==7 && $economic_impacts[6]['clave_tiempo_afectacion_multa']==7 && $row['clave_impacto_financiero_multa']==1 && $economic_impacts[6]['clave_impacto_financiero_multa']==1){
														$ecomomic .= '<input type="radio" name="7" value="1" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="7" value="1">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=7";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==7 && $economic_impacts[6]['clave_tiempo_afectacion_multa']==7 && $row['clave_impacto_financiero_multa']==2 && $economic_impacts[6]['clave_impacto_financiero_multa']==2){
														$ecomomic .= '<input type="radio" name="7" value="2" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="7" value="2">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=7";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==7 && $economic_impacts[6]['clave_tiempo_afectacion_multa']==7 && $row['clave_impacto_financiero_multa']==3 && $economic_impacts[6]['clave_impacto_financiero_multa']==3){
														$ecomomic .= '<input type="radio" name="7" value="3" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="7" value="3">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=7";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==7 && $economic_impacts[6]['clave_tiempo_afectacion_multa']==7 && $row['clave_impacto_financiero_multa']==4 && $economic_impacts[6]['clave_impacto_financiero_multa']==4){
														$ecomomic .= '<input type="radio" name="7" value="4" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="7" value="4">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=7";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==7 && $economic_impacts[6]['clave_tiempo_afectacion_multa']==7 && $row['clave_impacto_financiero_multa']==5 && $economic_impacts[6]['clave_impacto_financiero_multa']==5){
														$ecomomic .= '<input type="radio" name="7" value="5" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="7" value="5">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=7";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==7 && $economic_impacts[6]['clave_tiempo_afectacion_multa']==7 && $row['clave_impacto_financiero_multa']==6 && $economic_impacts[6]['clave_impacto_financiero_multa']==6){
														$ecomomic .= '<input type="radio" name="7" value="6" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="7" value="6">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=7";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==7 && $economic_impacts[6]['clave_tiempo_afectacion_multa']==7 && $row['clave_impacto_financiero_multa']==7 && $economic_impacts[6]['clave_impacto_financiero_multa']==7){
														$ecomomic .= '<input type="radio" name="7" value="7" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="7" value="7">';
													}
												}
												echo $ecomomic; ?></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('8') ?></th>
								          		<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=8";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==8 && $economic_impacts[7]['clave_tiempo_afectacion_multa']==8 && $row['clave_impacto_financiero_multa']==1 && $economic_impacts[7]['clave_impacto_financiero_multa']==1){
														$ecomomic .= '<input type="radio" name="8" value="1" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="8" value="1">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=8";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==8 && $economic_impacts[7]['clave_tiempo_afectacion_multa']==8 && $row['clave_impacto_financiero_multa']==2 && $economic_impacts[7]['clave_impacto_financiero_multa']==2){
														$ecomomic .= '<input type="radio" name="8" value="2" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="8" value="2">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=8";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==8 && $economic_impacts[7]['clave_tiempo_afectacion_multa']==8 && $row['clave_impacto_financiero_multa']==3 && $economic_impacts[7]['clave_impacto_financiero_multa']==3){
														$ecomomic .= '<input type="radio" name="8" value="3" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="8" value="3">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=8";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==8 && $economic_impacts[7]['clave_tiempo_afectacion_multa']==8 && $row['clave_impacto_financiero_multa']==4 && $economic_impacts[7]['clave_impacto_financiero_multa']==4){
														$ecomomic .= '<input type="radio" name="8" value="4" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="8" value="4">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=8";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==8 && $economic_impacts[7]['clave_tiempo_afectacion_multa']==8 && $row['clave_impacto_financiero_multa']==5 && $economic_impacts[7]['clave_impacto_financiero_multa']==5){
														$ecomomic .= '<input type="radio" name="8" value="5" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="8" value="5">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=8";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==8 && $economic_impacts[7]['clave_tiempo_afectacion_multa']==8 && $row['clave_impacto_financiero_multa']==6 && $economic_impacts[7]['clave_impacto_financiero_multa']==6){
														$ecomomic .= '<input type="radio" name="8" value="6" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="8" value="6">';
													}
												}
												echo $ecomomic; ?></td>
												<td>
								          		<?php
												$economic_data = "select * from multas_penalizaciones where consecutivo_tiempo_afectacion_multa=8";
												$result = $conn->query($economic_data);
												$ecomomic= "";
												while ($row = $result->fetch_assoc()) {
													if($row['clave_tiempo_afectacion_multa']==8 && $economic_impacts[7]['clave_tiempo_afectacion_multa']==8 && $row['clave_impacto_financiero_multa']==7 && $economic_impacts[7]['clave_impacto_financiero_multa']==7){
														$ecomomic .= '<input type="radio" name="8" value="7" checked>';
													}else{
														$ecomomic .= '<input type="radio" name="8" value="7">';
													}
												}
												echo $ecomomic; ?></td>
								        	</tr>
									      	</tbody>
									    </table>
								    </div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Impactos no financieros</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th></th>
									        	<th><?= getNoneFinancialImpactLevel('1') ?></th>
									        	<th><?= getNoneFinancialImpactLevel('2') ?></th>
									        	<th><?= getNoneFinancialImpactLevel('3') ?></th>
									        	<th><?= getNoneFinancialImpactLevel('4') ?></th>
								        	</tr>
								      	</thead>
								    	<tbody>
								    		<tr>
								        		<th scope="row"><?= getNoneFinancialImpact('1') ?></th>
								          		<td><input type="radio" name="1" value="1"></td>
								          		<td><input type="radio" name="1" value="2"></td>
								          		<td><input type="radio" name="1" value="3"></td>
								          		<td><input type="radio" name="1" value="4"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getNoneFinancialImpact('2') ?></th>
												<td><input type="radio" name="2" value="1"></td>
								          		<td><input type="radio" name="2" value="2"></td>
								          		<td><input type="radio" name="2" value="3"></td>
								          		<td><input type="radio" name="2" value="4"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getNoneFinancialImpact('3') ?></th>
								          		<td><input type="radio" name="3" value="1"></td>
								          		<td><input type="radio" name="3" value="2"></td>
								          		<td><input type="radio" name="3" value="3"></td>
								          		<td><input type="radio" name="3" value="4"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getNoneFinancialImpact('4') ?></th>
								          		<td><input type="radio" name="4" value="1"></td>
								          		<td><input type="radio" name="4" value="2"></td>
								          		<td><input type="radio" name="4" value="3"></td>
								          		<td><input type="radio" name="4" value="4"></td>
								        	</tr>								        	
								      	</tbody>
								    </table>
								    </div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Personal critico</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="staff_type">Personal requerido:</label>
									<select class="form-control" name="staff_type"><?php echo $stafftype; ?></select>
								</div>
								<div class="form-group">
									<label for="name">Nombre:</label>
									<input class="form-control" type="text" name="name" id="name" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="employee_number">Numero de empleado:</label>
									<input class="form-control" type="text" name="employee_number" id="employee_number" maxlength="100" size="50" />																			
								</div>
								<div class="form-group">
									<label for="extension">Extension:</label>
									<input class="form-control" type="text" name="extension" id="extension" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="workstation">Puesto</label>
									<input class="form-control" type="text" name="workstation" id="workstation" maxlength="100" size="50" />													
								</div>
								<div class="form-group">
									<label for="contingency_role">Rol en contingencia:</label>
									<input class="form-control" type="text" name="contingency_role" id="contingency_role" maxlength="100" size="50" />														
								</div>
								<div class="form-group">
									<label for="home_phone">Tel. casa:</label>
									<input class="form-control" type="text" name="home_phone" id="home_phone" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="cell_phone">Tel. celular:</label>
									<input class="form-control" type="text" name="cell_phone" id="cell_phone" maxlength="100" size="50" />					
								</div>
								<div class="form-group">
									<label>Dirección</label>
									<input class="form-control" type="text" name="address" id="address" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="internal_email">Correo electrónico interno:</label>
									<input class="form-control" type="text" name="internal_email" id="internal_email" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="external_email">Correo electrónico externo:</label>
									<input class="form-control" type="text" name="external_email" id="external_email" maxlength="100" size="50" />						
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Dependencias tecnológicas del proceso</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="area">Área que proporciona el servicio (considerar a proveedores):</label>
									<input class="form-control" type="text" name="area" id="area" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="service">Servicio / Equipos / Otros:</label>
									<input class="form-control" type="text" name="service" id="service" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="employee_number">Tipo de dependencia:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Interna</th>
										        	<th>Externa</th>
										        	<th>Entrada</th>
										        	<th>Salida</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input type="checkbox" name="internal_dependency"></td>
									          		<td><input type="checkbox" name="external_dependency"></td>
									          		<td><input type="checkbox" name="input_dependency"></td>
									          		<td><input type="checkbox" name="output_dependency"></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>
								</div>
								<div class="form-group">
									<label for="dependency_level">Nivel de dependencia:</label>
									<select class="form-control" name="dependency_level"><?php echo $dependency_level; ?></select>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Respaldos de información</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Tipo de respaldo:</label>
									<select class="form-control" name="backup_type"><?php echo $backup_type; ?></select>
								</div>
								<div class="form-group">
									<label for="backup_storage">Medio de almacenamiento:</label>
									<select class="form-control" name="backup_storage"><?php echo $backup_storage; ?></select>
								</div>
								<div class="form-group">
									<label for="place">Lugar donde se realizan los respaldos:</label>
									<input class="form-control" type="text" name="place" id="place" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="zone">Lugar donde se almacenan los respaldos:</label>
									<input class="form-control" type="text" name="zone" id="zone" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="name">Persona que realiza los respaldos:</label>
									<input class="form-control" type="text" name="name" id="name" maxlength="100" size="50" />						
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Dependencias internas</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="area">Nombre del área:</label>
									<input class="form-control" type="text" name="area" id="area" maxlength="100" size="50" />	
								</div>
								<div class="form-group">
									<label for="input_data">Información requerida (entrada):</label>
									<input class="form-control" type="text" name="input_data" id="input_data" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="output_data">Información comprometida (salida):</label>
									<input class="form-control" type="text" name="output_data" id="output_data" maxlength="100" size="50" />
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Dependencias externas</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="member">Nombre del proveedor / socio:</label>
									<input class="form-control" type="text" name="member" id="member" maxlength="100" size="50" />	
								</div>
								<div class="form-group">
									<label for="input_data">Información requerida (entrada):</label>
									<input class="form-control" type="text" name="input_data" id="input_data" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="output_data">Información comprometida (salida):</label>
									<input class="form-control" type="text" name="output_data" id="output_data" maxlength="100" size="50" />
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Información de proveedores</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="name">Nombre del proveedor:</label>
									<input class="form-control" type="text" name="name" id="name" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="name">Tipo de proveedor:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Interno</th>
										        	<th>Externo</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input type="radio" name="type" value="1"></td>
									          		<td><input type="radio" name="type" value="2"></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>					
								</div>
								<div class="form-group">
									<label for="area">Área, empresa a la que pertenece:</label>
									<input class="form-control" type="text" name="area" id="area" maxlength="100" size="50" />																			
								</div>
								<div class="form-group">
									<label for="home_phone">Tel. oficina:</label>
									<input class="form-control" type="text" name="home_phone" id="home_phone" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="cell_phone">Tel. celular</label>
									<input class="form-control" type="text" name="cell_phone" id="cell_phone" maxlength="100" size="50" />													
								</div>
								<div class="form-group">
									<label for="email">Correo electronico:</label>
									<input class="form-control" type="text" name="email" id="email" maxlength="100" size="50" />														
								</div>
								<div class="form-group">
									<label for="address">Domicilio:</label>
									<input class="form-control" type="text" name="address" id="address" maxlength="100" size="50" />
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Requerimientos de recuperación</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>PC's:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Operación mormal</th>
										        	<th>Operación en contingencia</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input class="form-control" type="text" name="pc_on" id="pc_on" maxlength="100" size="50" /></td>
									          		<td><input class="form-control" type="text" name="pc_oc" id="pc_oc" maxlength="100" size="50" /></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>	
								</div>
								<div class="form-group">
									<label>Telefonía:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Operación mormal</th>
										        	<th>Operación en contingencia</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input class="form-control" type="text" name="phone_on" id="phone_on" maxlength="100" size="50" /></td>
									          		<td><input class="form-control" type="text" name="phone_oc" id="phone_oc" maxlength="100" size="50" /></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>	
								</div>
								<div class="form-group">
									<label>Multifuncional / Impresora / fax:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Operación mormal</th>
										        	<th>Operación en contingencia</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input class="form-control" type="text" name="printer_on" id="printer_on" maxlength="100" size="50" /></td>
									          		<td><input class="form-control" type="text" name="printer_oc" id="printer_oc" maxlength="100" size="50" /></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>	
								</div>
								<div class="form-group">
									<label>Laptop's:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Operación mormal</th>
										        	<th>Operación en contingencia</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input class="form-control" type="text" name="lap_on" id="lap_on" maxlength="100" size="50" /></td>
									          		<td><input class="form-control" type="text" name="lap_oc" id="lap_oc" maxlength="100" size="50" /></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>	
								</div>
								<div class="form-group">
									<label>Enlaces VPN:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Operación mormal</th>
										        	<th>Operación en contingencia</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input class="form-control" type="text" name="vpn_on" id="vpn_on" maxlength="100" size="50" /></td>
									          		<td><input class="form-control" type="text" name="vpn_oc" id="vpn_oc" maxlength="100" size="50" /></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>	
								</div>
								<div class="form-group">
									<label>Escritorios:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Operación mormal</th>
										        	<th>Operación en contingencia</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input class="form-control" type="text" name="desktop_on" id="desktop_on" maxlength="100" size="50" /></td>
									          		<td><input class="form-control" type="text" name="desktop_oc" id="desktop_oc" maxlength="100" size="50" /></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>	
								</div>
								<div class="form-group">
									<label for="formats">Papeleria / formatos:</label>
									<input class="form-control" type="text" name="formats" id="formats" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="others">Otros requerimientos:</label>
									<input class="form-control" type="text" name="others" id="others" maxlength="100" size="50" />					
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<button type="submit" class="btn btn-primary pull-right">Continuar</button>
				</div>
				</form>
			</div>
		</div>
	</div>
<?php
show_footer();
?>