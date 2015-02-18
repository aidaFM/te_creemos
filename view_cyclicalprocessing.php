<?php

require_once('basic_files.php');

$id = $_GET['id'];

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
						<p class="lead">Indica las cargas de trabajo del proceso durante el año</p>
						<div class="row">
							<div class="col-md-12">	
								<form action="validate_cyclicalprocessing.php" method="post">
								<div class="form-group">
									<label for="id">Clave del proceso:</label>
									<input class="form-control" type="text" name="id" id="id" value="<?= $id ?>" maxlength="10" size="50" readonly/>	
								</div>
								<div class="form-group">
									<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th></th>
									        	<th>Ene</th>
									        	<th>Feb</th>
									        	<th>Mar</th>
									        	<th>Abr</th>
									        	<th>May</th>
									        	<th>Jun</th>
									        	<th>Jul</th>
									        	<th>Ago</th>
									        	<th>Sep</th>
									        	<th>Oct</th>
									        	<th>Nov</th>
									        	<th>Dic</th>
								        	</tr>
								      	</thead>
								    	<tbody>
								    		<tr>
								        		<th scope="row">Alto</th>
								          		<td><input type="radio" name="1" value="3"></td>
								          		<td><input type="radio" name="2" value="3"></td>
								          		<td><input type="radio" name="3" value="3"></td>
								          		<td><input type="radio" name="4" value="3"></td>
								          		<td><input type="radio" name="5" value="3"></td>
								          		<td><input type="radio" name="6" value="3"></td>
								          		<td><input type="radio" name="7" value="3"></td>
								          		<td><input type="radio" name="8" value="3"></td>
								          		<td><input type="radio" name="9" value="3"></td>
								          		<td><input type="radio" name="10" value="3"></td>
								          		<td><input type="radio" name="11" value="3"></td>
								          		<td><input type="radio" name="12" value="3"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row">Medio</th>
												<td><input type="radio" name="1" value="2"></td>
								          		<td><input type="radio" name="2" value="2"></td>
								          		<td><input type="radio" name="3" value="2"></td>
								          		<td><input type="radio" name="4" value="2"></td>
								          		<td><input type="radio" name="5" value="2"></td>
								          		<td><input type="radio" name="6" value="2"></td>
								          		<td><input type="radio" name="7" value="2"></td>
								          		<td><input type="radio" name="8" value="2"></td>
								          		<td><input type="radio" name="9" value="2"></td>
								          		<td><input type="radio" name="10" value="2"></td>
								          		<td><input type="radio" name="11" value="2"></td>
								          		<td><input type="radio" name="12" value="2"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row">Bajo</th>
								          		<td><input type="radio" name="1" value="1"></td>
								          		<td><input type="radio" name="2" value="1"></td>
								          		<td><input type="radio" name="3" value="1"></td>
								          		<td><input type="radio" name="4" value="1"></td>
								          		<td><input type="radio" name="5" value="1"></td>
								          		<td><input type="radio" name="6" value="1"></td>
								          		<td><input type="radio" name="7" value="1"></td>
								          		<td><input type="radio" name="8" value="1"></td>
								          		<td><input type="radio" name="9" value="1"></td>
								          		<td><input type="radio" name="10" value="1"></td>
								          		<td><input type="radio" name="11" value="1"></td>
								          		<td><input type="radio" name="12" value="1"></td>
								        	</tr>
								      	</tbody>
								    </table>
								    </div>
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