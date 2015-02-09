<?php

require_once('basic_files.php');

$conn = home_connection();

$criticality_levels = "select * from cat_criticidad_procesos";
$result = $conn->query($criticality_levels);
$criticality_level= "";
while ($row = $result->fetch_assoc()) {
	$criticality_level .= "<option value='$row[clave_criticidad_proceso]'>$row[descripcion_criticidad_proceso]</option>";
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
									<label for="leader_name">Lider del proceso:</label>
									<input class="form-control" type="text" name="leader_name" id="leader_name" maxlength="100" size="50" />														
								</div>
								<div class="form-group">
									<label for="process_target">Objetivo del proceso:</label>
									<input class="form-control" type="text" name="process_target" id="process_target" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="process_description">Descripción del proceso</label>
									<textarea class="form-control" type="text" name="process_description" id="process_description" maxlength="250" rows="8" ></textarea>														
								</div>
								<div class="form-group">
									<label for="boss_name">Nombre y puesto del Jefe inmediato:</label>
									<input class="form-control" type="text" name="boss_name" id="boss_name" maxlength="100" />															
								</div>
								<div class="form-group">
									<label for="critycality">Nivel de criticidad:</label>
									<select class="form-control" name="criticality_level"><?php echo $criticality_level; ?></select>
								</div>
								<div class="form-group">
									<label for="out_of_service">Tiempo máximo tolerable fuera de servicio:</label>
									<input class="form-control" type="text" name="out_of_service" id="out_of_service" maxlength="100" size="50" />						
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