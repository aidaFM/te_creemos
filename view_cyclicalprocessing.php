<?php

require_once('basic_files.php');

show_header('Procesamiento ciclico');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Procesamiento ciclico</h3>
					</div>
					<div class="panel-body">
						<p class="lead">Indica las cargas de tabajo del proceso durante el año</p>
						<div class="row">
							<div class="col-md-12">	
								<form action="validate_backuptype.php" method="post">
								<div class="form-group">
									<label for="backup_type">Enero:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">Febrero:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">Marzo:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">Abril:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">Mayo:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">Junio:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">Julio:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">Agosto:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">Septiembre:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">Octubre:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">Noviembre:</label>
									<input class="form-control" type="text" name="backup_type" id="backup_type" maxlength="100" size="50"/>	
								</div>
								<div class="form-group">
									<label for="backup_type">Diciembre:</label>
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