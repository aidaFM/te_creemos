<?php

require_once('basic_files.php');

$conn = home_connection();

$areas = "select * from cat_areas";
$result = $conn->query($areas);
$area= "";
while ($row = $result->fetch_assoc()) {
	$area .= "<option value='$row[clave_area]'>$row[descripcion_area]</option>";
}

$criticality_levels = "select * from cat_criticidad_procesos";
$result = $conn->query($criticality_levels);
$criticality_level= "";
while ($row = $result->fetch_assoc()) {
	$criticality_level .= "<option value='$row[clave_criticidad_proceso]'>$row[descripcion_criticidad_proceso]</option>";
}

$leaders = "select * from cat_lider_proyecto";
$result = $conn->query($leaders);
$leader_name= "";
while ($row = $result->fetch_assoc()) {
	$leader_name .= "<option value='$row[clave_lider_proyecto]'>$row[nombre_lider_proyecto]</option>";
}

$bosses = "select * from cat_jefes_inmediatos";
$result = $conn->query($bosses);
$boss_name= "";
while ($row = $result->fetch_assoc()) {
	$boss_name .= "<option value='$row[clave_jefes_inmediatos]'>$row[nombre_jefes_inmediatos], $row[puesto_jefes_inmediatos]</option>";
}

$times = "select * from cat_tiempo_maximo_fs";
$result = $conn->query($times);
$out_of_service= "";
while ($row = $result->fetch_assoc()) {
	$out_of_service .= "<option value='$row[clave_tiempo_maximo_fs]'>$row[descripcion_tiempo_maximo_fs]</option>";
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
								<form action="validate_process.php" method="post">
								<div class="form-group">
									<label for="process_name">Nombre del proceso:</label>
									<input class="form-control" type="text" name="process_name" id="process_name" maxlength="100" size="50"/>						
								</div>
								<div class="form-group">
									<label for="area">Área del proceso:</label>
									<select class="form-control" name="area"><?php echo $area; ?></select>						
								</div>
								<div class="form-group">
									<label for="leader_name">Lider del proyecto:</label>
									<select class="form-control" name="leader_name"><?php echo $leader_name; ?></select>														
								</div>
								<div class="form-group">
									<label for="process_target">Objetivo del proceso:</label>
									<input class="form-control" type="text" name="process_target" id="process_target" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="process_description">Descripción del proceso</label>
									<textarea class="form-control" name="process_description" id="process_description" rows="8" ></textarea>														
								</div>
								<div class="form-group">
									<label for="boss_name">Nombre y puesto del Jefe inmediato:</label>
									<select class="form-control" name="boss_name"><?php echo $boss_name; ?></select>															
								</div>
								<div class="form-group">
									<label for="critycality_level">Nivel de criticidad:</label>
									<select class="form-control" name="criticality_level"><?php echo $criticality_level; ?></select>
								</div>
								<div class="form-group">
									<label for="out_of_service">Tiempo máximo tolerable fuera de servicio:</label>
									<select class="form-control" name="out_of_service"><?php echo $out_of_service; ?></select>						
								</div>
								<div class="form-group">
									<label for="normal_operators">Numero de operadores en operación normal</label>
									<input class="form-control" type="text" name="normal_operators" id="normal_operators" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="contingency_operators">Numero de operadores en contingencia</label>
									<input class="form-control" type="text" name="contingency_operators" id="contingency_operators" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary pull-right">Crear proceso</button>
								</div>
								</form>
							</div>
						</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
<?php
show_footer();
?>