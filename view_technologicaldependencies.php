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
						<h3>Dependencias tecnológicas del proceso</h3>
					</div>
					<div class="panel-body">
						<p class="lead">Identifica cualquier tipo de depoendencia tecnologica. como aplicativos, conexiones, certificados, etc.</p>
						<div class="row">
							<div class="col-md-12">	
								<form id="new" action="validate_technologicaldependencies.php" method="post">
								<div class="form-group">
									<label for="id">Clave del proceso:</label>
									<input class="form-control" type="text" name="id" id="id" value="<?= $id ?>" maxlength="10" size="50" readonly/>	
								</div>
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
								<div class="form-group">
									<button id="save" name="save" value="save" type="submit" class="btn btn-primary pull-left">Guardar</button>
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