<?php

require_once('basic_files.php');

$id = $_GET['id'];

show_header('Catalogo');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Procedimiento alterno</h3>
					</div>
					<div class="panel-body">
						<p class="lead">No se encontró ningun <strong>Sistema</strong> para el proceso <strong><?= $id.' - '.getNameProcess($id) ?></strong> por lo que debes capturar un procedimiento alterno.</p>
						<div class="row">
							<div class="col-md-12">	
								<form action="validate_alternateprocedure.php" method="post">
								<div class="form-group">
									<label for="id">Clave del proceso:</label>
									<input class="form-control" type="text" name="id" id="id" value="<?= $id ?>" maxlength="10" size="50" readonly/>	
								</div>
								<div class="form-group">
									<label for="procedure">Procedimiento:</label>
									<input class="form-control" type="text" name="procedure" id="procedure" maxlength="100" size="50"/>	
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