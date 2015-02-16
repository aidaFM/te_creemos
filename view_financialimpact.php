<?php

require_once('basic_files.php');

show_header('Impacto financiero');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Impacto financiero</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">	
								<form action="validate_financialimpact.php" method="post">
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
								          		<td><input type="radio" name="timeaffectation_1" id="optionsRadios1"></td>
								          		<td><input type="radio" name="timeaffectation_1" id="optionsRadios2"></td>
								          		<td><input type="radio" name="timeaffectation_1" id="optionsRadios3"></td>
								          		<td><input type="radio" name="timeaffectation_1" id="optionsRadios4"></td>
								          		<td><input type="radio" name="timeaffectation_1" id="optionsRadios5"></td>
								          		<td><input type="radio" name="timeaffectation_1" id="optionsRadios6"></td>
								          		<td><input type="radio" name="timeaffectation_1" id="optionsRadios7"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('2') ?></th>
												<td><input type="radio" name="timeaffectation_2"></td>
								          		<td><input type="radio" name="timeaffectation_2"></td>
								          		<td><input type="radio" name="timeaffectation_2"></td>
								          		<td><input type="radio" name="timeaffectation_2"></td>
								          		<td><input type="radio" name="timeaffectation_2"></td>
								          		<td><input type="radio" name="timeaffectation_2"></td>
								          		<td><input type="radio" name="timeaffectation_2"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('3') ?></th>
								          		<td><input type="radio" name="timeaffectation_3"></td>
								          		<td><input type="radio" name="timeaffectation_3"></td>
								          		<td><input type="radio" name="timeaffectation_3"></td>
								          		<td><input type="radio" name="timeaffectation_3"></td>
								          		<td><input type="radio" name="timeaffectation_3"></td>
								          		<td><input type="radio" name="timeaffectation_3"></td>
								          		<td><input type="radio" name="timeaffectation_3"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('4') ?></th>
								          		<td><input type="radio" name="timeaffectation_4"></td>
								          		<td><input type="radio" name="timeaffectation_4"></td>
								          		<td><input type="radio" name="timeaffectation_4"></td>
								          		<td><input type="radio" name="timeaffectation_4"></td>
								          		<td><input type="radio" name="timeaffectation_4"></td>
								          		<td><input type="radio" name="timeaffectation_4"></td>
								          		<td><input type="radio" name="timeaffectation_4"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('5') ?></th>
								          		<td><input type="radio" name="timeaffectation_5"></td>
								          		<td><input type="radio" name="timeaffectation_5"></td>
								          		<td><input type="radio" name="timeaffectation_5"></td>
								          		<td><input type="radio" name="timeaffectation_5"></td>
								          		<td><input type="radio" name="timeaffectation_5"></td>
								          		<td><input type="radio" name="timeaffectation_5"></td>
								          		<td><input type="radio" name="timeaffectation_5"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('6') ?></th>
								          		<td><input type="radio" name="timeaffectation_6"></td>
								          		<td><input type="radio" name="timeaffectation_6"></td>
								          		<td><input type="radio" name="timeaffectation_6"></td>
								          		<td><input type="radio" name="timeaffectation_6"></td>
								          		<td><input type="radio" name="timeaffectation_6"></td>
								          		<td><input type="radio" name="timeaffectation_6"></td>
								          		<td><input type="radio" name="timeaffectation_6"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('7') ?></th>
								          		<td><input type="radio" name="timeaffectation_7"></td>
								          		<td><input type="radio" name="timeaffectation_7"></td>
								          		<td><input type="radio" name="timeaffectation_7"></td>
								          		<td><input type="radio" name="timeaffectation_7"></td>
								          		<td><input type="radio" name="timeaffectation_7"></td>
								          		<td><input type="radio" name="timeaffectation_7"></td>
								          		<td><input type="radio" name="timeaffectation_7"></td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('8') ?></th>
								          		<td><input type="radio" name="timeaffectation_8"></td>
								          		<td><input type="radio" name="timeaffectation_8"></td>
								          		<td><input type="radio" name="timeaffectation_8"></td>
								          		<td><input type="radio" name="timeaffectation_8"></td>
								          		<td><input type="radio" name="timeaffectation_8"></td>
								          		<td><input type="radio" name="timeaffectation_8"></td>
								          		<td><input type="radio" name="timeaffectation_8"></td>
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