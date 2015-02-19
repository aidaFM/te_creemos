<?php

require_once('basic_files.php');

$id = $_GET['id'];

$conn = home_connection();

$areas = "select * from cat_areas";
$result = $conn->query($areas);
$area= "";
while ($row = $result->fetch_assoc()) {
	$area .= "<option value='$row[clave_area]'>$row[descripcion_area]</option>";
}

$dependency_levels = "select * from cat_nivel_dependencia";
$result = $conn->query($dependency_levels);
$dependency_level= "";
while ($row = $result->fetch_assoc()) {
	$dependency_level .= "<option value='$row[clave_nivel_dependencia]'>$row[descripcion_nivel_dependencia]</option>";
}

show_header('Dependencias tecnologicas');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Respaldos de información</h3>
					</div>
					<div class="panel-body">
						<p class="lead">Pueden ser realizados por sistemas o el usuario.</p>
						<div class="row">
							<div class="col-md-12">	
								<form id="new" action="validate_databackups.php" method="post">
								<div class="form-group">
									<label for="id">Clave del proceso:</label>
									<input class="form-control" type="text" name="id" id="id" value="<?= $id ?>" maxlength="10" size="50" readonly/>	
								</div>
								<div class="form-group">
									<label>Tipo de respaldo:</label>
									<select class="form-control" name="area"><?php echo $area; ?></select>
								</div>
								<div class="form-group">
									<label>Medio de almacenamiento:</label>
									<select class="form-control" name="area"><?php echo $area; ?></select>
								</div>
								<div class="form-group">
									<label for="service">Lugar donde se realizan los respaldos:</label>
									<input class="form-control" type="text" name="service" id="service" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="service">Lugar donde se almacenan los respaldos:</label>
									<input class="form-control" type="text" name="service" id="service" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="service">Persona que realiza los respaldos:</label>
									<input class="form-control" type="text" name="service" id="service" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="dependency_level">Nivel de dependencia:</label>
									<select class="form-control" name="dependency_level"><?php echo $dependency_level; ?></select>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary pull-right">Continuar</button>
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