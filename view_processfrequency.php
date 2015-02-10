<?php

require_once('basic_files.php');

$id = $_GET['id'];
$conn = home_connection();

$frequencies = "select * from cat_frecuencia_proceso";
$result = $conn->query($frequencies);
$frequency= "";
while ($row = $result->fetch_assoc()) {
	$frequency .= "<option value='$row[clave_frecuencia_proceso]'>$row[descripcion_frecuencia_proceso]</option>";
}

$critical_periods = "select * from cat_periodos_criticos";
$result = $conn->query($critical_periods);
$critical_period= "";
while ($row = $result->fetch_assoc()) {
	$critical_period .= "<option value='$row[clave_periodos_criticos]'>$row[descripcion_periodos_criticos]</option>";
}
	
show_header('Proceso nuevo');
show_navbar();
?>
	<div class="container">
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
								<form action="validate_processfrequency.php" method="post">
								<div class="form-group">
									<label for="id">Clave del proceso:</label>
									<input class="form-control" type="text" name="id" id="id" value="<?= $id ?>" maxlength="10" size="50"/>	
								</div>
								<div class="form-group">
									<label for="frequency">Frecuencia del proceso:</label>
									<select class="form-control" name="frequency"><?php echo $frequency; ?></select>							
								</div>
								<div class="form-group">
									<label for="critical_period">Periodos críticos:</label>
									<select class="form-control" name="critical_period"><?php echo $critical_period; ?></select>
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