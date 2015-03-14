<?php

require_once('basic_files.php');

$id = $_GET['id'];

show_header('Impacto financiero');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Impactos Economicos asociados</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">	
								<form action="validate_economicimpacts.php" method="post">
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
										        	<th><?= getTypeFinancialImpact('1') ?></th>
										        	<th><?= getTypeFinancialImpact('2') ?></th>
										        	<th><?= getTypeFinancialImpact('3') ?></th>
										        	<th><?= getTypeFinancialImpact('4') ?></th>
										        	<th><?= getTypeFinancialImpact('5') ?></th>
										        	<th><?= getTypeFinancialImpact('6') ?></th>
										        	<th><?= getTypeFinancialImpact('7') ?></th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									        		<th scope="row"><?= getTimeAffectation('1') ?></th>
									          		<td><input type="radio" name="1" value="1"></td>
									          		<td><input type="radio" name="1" value="2"></td>
									          		<td><input type="radio" name="1" value="3"></td>
									          		<td><input type="radio" name="1" value="4"></td>
									          		<td><input type="radio" name="1" value="5"></td>
									          		<td><input type="radio" name="1" value="6"></td>
									          		<td><input type="radio" name="1" value="7"></td>
									        	</tr>
									        	<tr>
									        		<th scope="row"><?= getTimeAffectation('2') ?></th>
													<td><input type="radio" name="2" value="1"></td>
									          		<td><input type="radio" name="2" value="2"></td>
									          		<td><input type="radio" name="2" value="3"></td>
									          		<td><input type="radio" name="2" value="4"></td>
									          		<td><input type="radio" name="2" value="5"></td>
									          		<td><input type="radio" name="2" value="6"></td>
									          		<td><input type="radio" name="2" value="7"></td>
									        	</tr>
									        	<tr>
									        		<th scope="row"><?= getTimeAffectation('3') ?></th>
									          		<td><input type="radio" name="3" value="1"></td>
									          		<td><input type="radio" name="3" value="2"></td>
									          		<td><input type="radio" name="3" value="3"></td>
									          		<td><input type="radio" name="3" value="4"></td>
									          		<td><input type="radio" name="3" value="5"></td>
									          		<td><input type="radio" name="3" value="6"></td>
									          		<td><input type="radio" name="3" value="7"></td>
									        	</tr>
									        	<tr>
									        		<th scope="row"><?= getTimeAffectation('4') ?></th>
									          		<td><input type="radio" name="4" value="1"></td>
									          		<td><input type="radio" name="4" value="2"></td>
									          		<td><input type="radio" name="4" value="3"></td>
									          		<td><input type="radio" name="4" value="4"></td>
									          		<td><input type="radio" name="4" value="5"></td>
									          		<td><input type="radio" name="4" value="6"></td>
									          		<td><input type="radio" name="4" value="7"></td>
									        	</tr>
									        	<tr>
									        		<th scope="row"><?= getTimeAffectation('5') ?></th>
									          		<td><input type="radio" name="5" value="1"></td>
									          		<td><input type="radio" name="5" value="2"></td>
									          		<td><input type="radio" name="5" value="3"></td>
									          		<td><input type="radio" name="5" value="4"></td>
									          		<td><input type="radio" name="5" value="5"></td>
									          		<td><input type="radio" name="5" value="6"></td>
									          		<td><input type="radio" name="5" value="7"></td>
									        	</tr>
									        	<tr>
									        		<th scope="row"><?= getTimeAffectation('6') ?></th>
									          		<td><input type="radio" name="6" value="1"></td>
									          		<td><input type="radio" name="6" value="2"></td>
									          		<td><input type="radio" name="6" value="3"></td>
									          		<td><input type="radio" name="6" value="4"></td>
									          		<td><input type="radio" name="6" value="5"></td>
									          		<td><input type="radio" name="6" value="6"></td>
									          		<td><input type="radio" name="6" value="7"></td>
									        	</tr>
									        	<tr>
									        		<th scope="row"><?= getTimeAffectation('7') ?></th>
									          		<td><input type="radio" name="7" value="1"></td>
									          		<td><input type="radio" name="7" value="2"></td>
									          		<td><input type="radio" name="7" value="3"></td>
									          		<td><input type="radio" name="7" value="4"></td>
									          		<td><input type="radio" name="7" value="5"></td>
									          		<td><input type="radio" name="7" value="6"></td>
									          		<td><input type="radio" name="7" value="7"></td>
									        	</tr>
									        	<tr>
									        		<th scope="row"><?= getTimeAffectation('8') ?></th>
									          		<td><input type="radio" name="8" value="1"></td>
									          		<td><input type="radio" name="8" value="2"></td>
									          		<td><input type="radio" name="8" value="3"></td>
									          		<td><input type="radio" name="8" value="4"></td>
									          		<td><input type="radio" name="8" value="5"></td>
									          		<td><input type="radio" name="8" value="6"></td>
									          		<td><input type="radio" name="8" value="7"></td>
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