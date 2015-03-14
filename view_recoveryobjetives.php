<?php

require_once('basic_files.php');

$id = $_GET['id'];

$conn = home_connection();

$rto_options = "select * from cat_objetivo_tiempo_recuperacion";
$result = $conn->query($rto_options);
$rto_option= "";
while ($row = $result->fetch_assoc()) {
	$rto_option .= "<option value='$row[clave_rto]'>$row[descripcion_rto]</option>";
}

$rpo_options = "select * from cat_objetivo_punto_recuperacion";
$result = $conn->query($rpo_options);
$rpo_option= "";
while ($row = $result->fetch_assoc()) {
	$rpo_option .= "<option value='$row[clave_rpo]'>$row[descripcion_rpo]</option>";
}
	
show_header('Proceso nuevo');
show_navbar();
?>
	<div class="container">
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
								<form action="validate_recoveryobjetives.php" method="post">
								<div class="form-group">
									<label for="id">Clave del proceso:</label>
									<input class="form-control" type="text" name="id" id="id" value="<?= $id ?>" maxlength="10" size="50" readonly/>	
								</div>
								<div class="form-group">
									<label for="critycality">Objetivo tiempo de recuperación:</label>
									<select class="form-control" name="rto"><?php echo $rto_option; ?></select>
								</div>
								<div class="form-group">
									<label for="critycality">Objetivo punto de recuperación:</label>
									<select class="form-control" name="rpo"><?php echo $rpo_option; ?></select>							
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
<?php
show_footer();
?>