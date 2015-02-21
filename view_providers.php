<?php

require_once('basic_files.php');

$id = $_GET['id'];

show_header('Información de proveedores');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Información de proveedores</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">	
								<form id="new" action="validate_providers.php" method="post">
								<div class="form-group">
									<label for="id">Clave del proceso:</label>
									<input class="form-control" type="text" name="id" id="id" value="<?= $id ?>" maxlength="10" size="50" readonly/>	
								</div>
								<div class="form-group">
									<label for="name">Nombre del proveedor:</label>
									<input class="form-control" type="text" name="name" id="name" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="name">Tipo de proveedor:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Interno</th>
										        	<th>Externo</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input type="radio" name="type" value="1"></td>
									          		<td><input type="radio" name="type" value="2"></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>					
								</div>
								<div class="form-group">
									<label for="area">Área, empresa a la que pertenece:</label>
									<input class="form-control" type="text" name="area" id="area" maxlength="100" size="50" />																			
								</div>
								<div class="form-group">
									<label for="home_phone">Tel. oficina:</label>
									<input class="form-control" type="text" name="home_phone" id="home_phone" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="cell_phone">Tel. celular</label>
									<input class="form-control" type="text" name="cell_phone" id="cell_phone" maxlength="100" size="50" />													
								</div>
								<div class="form-group">
									<label for="email">Correo electronico:</label>
									<input class="form-control" type="text" name="email" id="email" maxlength="100" size="50" />														
								</div>
								<div class="form-group">
									<label for="address">Domicilio:</label>
									<input class="form-control" type="text" name="address" id="address" maxlength="100" size="50" />
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