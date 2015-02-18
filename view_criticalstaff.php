<?php

require_once('basic_files.php');

$id = $_GET['id'];

$conn = home_connection();

$stafftypes = "select * from cat_tipo_personal";
$result = $conn->query($stafftypes);
$stafftype= "";
while ($row = $result->fetch_assoc()) {
	$stafftype .= "<option value='$row[clave_tipo_personal]'>$row[descripcion_tipo_personal]</option>";
}

show_header('Personal critico');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Personal critico</h3>
					</div>
					<div class="panel-body">
						<p class="lead">Identifica el personal que soportaria el proceso en caso de contingencia, <strong>se requiere al menos 1 persona, principal y alterno por cada rol</strong>.</p>
						<div class="row">
							<div class="col-md-12">	
								<form id="new" action="validate_criticalstaff.php" method="post">
								<div class="form-group">
									<label for="id">Clave del proceso:</label>
									<input class="form-control" type="text" name="id" id="id" value="<?= $id ?>" maxlength="10" size="50" readonly/>	
								</div>
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
	</div>
<?php
show_footer();
?>