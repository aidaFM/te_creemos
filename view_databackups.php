<?php

require_once('basic_files.php');

$id = $_GET['id'];

$conn = home_connection();

$backup_types = "select * from cat_tipo_respaldos";
$result = $conn->query($backup_types);
$backup_type= "";
while ($row = $result->fetch_assoc()) {
	$backup_type .= "<option value='$row[clave_tipo_respaldo]'>$row[descripcion_tipo_respaldo]</option>";
}

$backup_storages = "select * from cat_medio_respaldo";
$result = $conn->query($backup_storages);
$backup_storage= "";
while ($row = $result->fetch_assoc()) {
	$backup_storage .= "<option value='$row[clave_medio_respaldo]'>$row[descripcion_medio_respaldo]</option>";
}

show_header('Respaldos de información');
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
<?php
show_footer();
?>