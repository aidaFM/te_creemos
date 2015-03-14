<?php

require_once('basic_files.php');

$id = $_GET['id'];

show_header('Proceso nuevo');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Sistema o sistemas que soportan el proceso</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">	
								<form action="validate_system.php" method="post">
								<div class="form-group">
									<label for="id">Clave del proceso:</label>
									<input class="form-control" type="text" name="id" id="id" value="<?= $id ?>" maxlength="10" size="50" readonly/>	
								</div>
								<div class="form-group">
									<label for="system_name">Sistema:</label>
									<input class="form-control" type="text" name="system_name" id="system_name" maxlength="100" size="50"/>						
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