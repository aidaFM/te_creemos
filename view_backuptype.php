<?php

require_once('basic_files.php');

show_header('Catalogo');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Catalogo</h3>
					</div>
					<div class="panel-body">
						<p class="lead">Ingresa los <strong>Tipos de respaldo</strong>.</p>
						<div class="row">
							<div class="col-md-12">	
								<form action="validate_backuptype.php" method="post">
								<div class="form-group">
									<label for="backup_type">Tipo:</label>
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