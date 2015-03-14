<?php

require_once('basic_files.php');

$id = $_GET['id'];

show_header('Dependencias tecnologicas');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Requerimientos de recuperación</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">	
								<form id="new" action="validate_recoveryrequirements.php" method="post">
								<div class="form-group">
									<label for="id">Clave del proceso:</label>
									<input class="form-control" type="text" name="id" id="id" value="<?= $id ?>" maxlength="10" size="50" readonly/>	
								</div>
								<div class="form-group">
									<label>PC's:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Operación mormal</th>
										        	<th>Operación en contingencia</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input class="form-control" type="text" name="pc_on" id="pc_on" maxlength="100" size="50" /></td>
									          		<td><input class="form-control" type="text" name="pc_oc" id="pc_oc" maxlength="100" size="50" /></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>	
								</div>
								<div class="form-group">
									<label>Telefonía:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Operación mormal</th>
										        	<th>Operación en contingencia</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input class="form-control" type="text" name="phone_on" id="phone_on" maxlength="100" size="50" /></td>
									          		<td><input class="form-control" type="text" name="phone_oc" id="phone_oc" maxlength="100" size="50" /></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>	
								</div>
								<div class="form-group">
									<label>Multifuncional / Impresora / fax:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Operación mormal</th>
										        	<th>Operación en contingencia</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input class="form-control" type="text" name="printer_on" id="printer_on" maxlength="100" size="50" /></td>
									          		<td><input class="form-control" type="text" name="printer_oc" id="printer_oc" maxlength="100" size="50" /></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>	
								</div>
								<div class="form-group">
									<label>Laptop's:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Operación mormal</th>
										        	<th>Operación en contingencia</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input class="form-control" type="text" name="lap_on" id="lap_on" maxlength="100" size="50" /></td>
									          		<td><input class="form-control" type="text" name="lap_oc" id="lap_oc" maxlength="100" size="50" /></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>	
								</div>
								<div class="form-group">
									<label>Enlaces VPN:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Operación mormal</th>
										        	<th>Operación en contingencia</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input class="form-control" type="text" name="vpn_on" id="vpn_on" maxlength="100" size="50" /></td>
									          		<td><input class="form-control" type="text" name="vpn_oc" id="vpn_oc" maxlength="100" size="50" /></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>	
								</div>
								<div class="form-group">
									<label>Escritorios:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Operación mormal</th>
										        	<th>Operación en contingencia</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input class="form-control" type="text" name="desktop_on" id="desktop_on" maxlength="100" size="50" /></td>
									          		<td><input class="form-control" type="text" name="desktop_oc" id="desktop_oc" maxlength="100" size="50" /></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>	
								</div>
								<div class="form-group">
									<label for="formats">Papeleria / formatos:</label>
									<input class="form-control" type="text" name="formats" id="formats" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="others">Otros requerimientos:</label>
									<input class="form-control" type="text" name="others" id="others" maxlength="100" size="50" />					
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
<?php
show_footer();
?>