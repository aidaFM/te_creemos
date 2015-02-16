<?php

require_once('basic_files.php');

$conn = home_connection();

$time_affectation_options = "select * from cat_tiempo_afectacion";
$result = $conn->query($time_affectation_options);
$time_affectation= "";
while ($row = $result->fetch_assoc()) {
	$time_affectation .= "<option value='$row[clave_tiempo_afectacion]'>$row[descripcion_tiempo_afectacion]</option>";
}

show_header('Impacto financiero');
show_navbar();
?>
	<div class="container">
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
								<form action="validate_financialimpact.php" method="post">
								<div class="form-group">
									<label for="backup_type"><?= getTimeAffectation('1')?></label>
									<select id= class="form-control" name="boss_name" disabled><?php echo $time_affectation; ?></select>
								</div>
								<div class="form-group">
									<label for="backup_type"><?= getTimeAffectation('2')?></label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type"><?= getTimeAffectation('3')?></label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type"><?= getTimeAffectation('4')?></label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type"><?= getTimeAffectation('5')?></label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type"><?= getTimeAffectation('6')?></label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type"><?= getTimeAffectation('7')?></label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type"><?= getTimeAffectation('8')?></label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
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
	</div>
<?php
show_footer();
?>