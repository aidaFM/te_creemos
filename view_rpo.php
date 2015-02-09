<?php

require_once('basic_files.php');

show_header('Catalogo');
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Catalogo</h3>
					</div>
					<div class="panel-body">
						<p class="lead">Ingresa los <strong>objetivos de punto de recuperación</strong>.</p>
						<div class="row">
							<div class="col-md-12">	
								<form action="validate_rpo.php" method="post">
								<div class="form-group">
									<label for="rpo_name">Nombre:</label>
									<input class="form-control" type="text" name="rpo_name" id="rpo_name" maxlength="100" size="50"/>						
								</div>
								<div class="form-group">
									<label for="rpo_description">Descripción:</label>
									<input class="form-control" type="text" name="rpo_description" id="rpo_description" maxlength="100" size="50"/>						
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