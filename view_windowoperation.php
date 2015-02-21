<?php

require_once('basic_files.php');

$id = $_GET['id'];
$conn = home_connection();

$charge_levels = "select * from cat_nivel_carga";
$result = $conn->query($charge_levels);
$charge_level= "";
while ($row = $result->fetch_assoc()) {
	$charge_level .= "<option value='$row[clave_nivel_carga]'>$row[descripcion_nivel_carga]</option>";
}

show_header('Ventana de operaciones');
show_navbar();
?>
	<div class="container">
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
								<form action="validate_windowoperation.php" method="post">
								<div class="form-group">
									<label for="id">Clave del proceso:</label>
									<input class="form-control" type="text" name="id" id="id" value="<?= $id ?>" maxlength="10" size="50" readonly/>	
								</div>
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
												<td><select class="form-control" name="hora_0"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_1"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_2"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_3"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_4"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_5"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_6"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_7"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_8"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_9"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_10"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_11"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_12"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_13"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_14"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_15"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_16"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_17"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_18"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_19"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_20"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_21"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_22"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_23"><?php echo $charge_level; ?></select></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary pull-right">Guardar</button>
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