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
						<h3>Volumen transaccional</h3>
					</div>
					<div class="panel-body">
						<p class="lead">identifica los promedios mensuales de transacciones</p>
						<div class="row">
							<div class="col-md-12">	
								<form id="new" action="validate_transactionalvolume.php" method="post">
								<div class="form-group">
									<label for="id">Clave del proceso:</label>
									<input class="form-control" type="text" name="id" id="id" value="<?= $id ?>" maxlength="10" size="50"/>	
								</div>
								<div class="form-group">
									<label for="average">Promedio de transacciones:</label>
									<input class="form-control" type="text" name="average" id="average" maxlength="100" size="50"/>						
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
	</div>
<?php
show_footer();
?>