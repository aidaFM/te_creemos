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
									<table class="table table-bordered">
										<thead>
											<tr>
												<th></th>
									        	<th>First Name</th>
									        	<th>Last Name</th>
									        	<th>Username</th>
								        	</tr>
								      	</thead>
								    	<tbody>
								    		<tr>
								        		<th scope="row"><?= getTimeAffectation('1') ?></th>
								          		<td>Mark</td>
								          		<td>Otto</td>
								          		<td>@mdo</td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('2') ?></th>
								          		<td>Mark</td>
								          		<td>Otto</td>
								          		<td>@mdo</td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('3') ?></th>
								          		<td>Mark</td>
								          		<td>Otto</td>
								          		<td>@mdo</td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('4') ?></th>
								          		<td>Mark</td>
								          		<td>Otto</td>
								          		<td>@mdo</td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('5') ?></th>
								          		<td>Mark</td>
								          		<td>Otto</td>
								          		<td>@mdo</td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('6') ?></th>
								          		<td>Mark</td>
								          		<td>Otto</td>
								          		<td>@mdo</td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('7') ?></th>
								          		<td>Mark</td>
								          		<td>Otto</td>
								          		<td>@mdo</td>
								        	</tr>
								        	<tr>
								        		<th scope="row"><?= getTimeAffectation('8') ?></th>
								          		<td>Mark</td>
								          		<td>Otto</td>
								          		<td>@mdo</td>
								        	</tr>
								      	</tbody>
								    </table>
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