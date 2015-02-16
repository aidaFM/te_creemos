<?php

require_once('basic_files.php');

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
								<form action="validate_backuptype.php" method="post">
								<div class="form-group">
									<label for="backup_type">00:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">1:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">2:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">3:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">4:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">5:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">6:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">7:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">8:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">9:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">10:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">11:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">12:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">13:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">14:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">15:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
									<div class="form-group">
									<label for="backup_type">16:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">17:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">18:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">19:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">20:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">21:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">22:00:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">23:00:</label>
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