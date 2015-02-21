<?php

require_once('basic_files.php');

$id = $_GET['id'];

show_header('Impacto no financiero');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Impactos no financieros</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">	
								<form action="validate_nonfinancialimpacts.php" method="post">
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
									        	<th><?= getNoneFinancialImpactLevel('1') ?></th>
									        	<th><?= getNoneFinancialImpactLevel('2') ?></th>
									        	<th><?= getNoneFinancialImpactLevel('3') ?></th>
									        	<th><?= getNoneFinancialImpactLevel('4') ?></th>
								        	</tr>
								      	</thead>
								    	<tbody>
								    		<tr>
								        		<th scope="row"><?= getNoneFinancialImpact('1') ?></th>
								          		<td><input type="radio" name="1" value="1"></td>
								          		<td><input type="radio" name="1" value="2"></td>
								          		<td><input type="radio" name="1" value="3"></td>
								          		<td><input type="radio" name="1" value="4"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getNoneFinancialImpact('2') ?></th>
												<td><input type="radio" name="2" value="1"></td>
								          		<td><input type="radio" name="2" value="2"></td>
								          		<td><input type="radio" name="2" value="3"></td>
								          		<td><input type="radio" name="2" value="4"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getNoneFinancialImpact('3') ?></th>
								          		<td><input type="radio" name="3" value="1"></td>
								          		<td><input type="radio" name="3" value="2"></td>
								          		<td><input type="radio" name="3" value="3"></td>
								          		<td><input type="radio" name="3" value="4"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getNoneFinancialImpact('4') ?></th>
								          		<td><input type="radio" name="4" value="1"></td>
								          		<td><input type="radio" name="4" value="2"></td>
								          		<td><input type="radio" name="4" value="3"></td>
								          		<td><input type="radio" name="4" value="4"></td>
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
<?php
show_footer();
?>