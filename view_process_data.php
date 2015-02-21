<?php

require_once('basic_files.php');

show_header('Proceso nuevo');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Proceso en blanco</h3>
					</div>
					<div class="panel-body">
						<p class="lead">Ingresa la información del <strong>processo</strong>.</p>
						<div class="row">
							<div class="col-md-12">	
								<form id="new" action="validate_process.php" method="post">
								<div class="form-group">
									<label for="process_name">Nombre del proceso:</label>
									<input class="form-control" type="text" name="process_name" id="process_name" maxlength="100" size="50" required/>						
								</div>
								<div class="form-group">
									<label for="area">Área del proceso:</label>
									<select class="form-control" name="area"><?php echo $area; ?></select>
								</div>
								<div class="form-group">
									<label for="leader_name">Lider del proyecto:</label>
									<select class="form-control" name="leader_name"><?php echo $leader_name; ?></select>														
								</div>
								<div class="form-group">
									<label for="process_target">Objetivo del proceso:</label>
									<input class="form-control" type="text" name="process_target" id="process_target" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="process_description">Descripción del proceso</label>
									<textarea class="form-control" name="process_description" id="process_description" rows="8" ></textarea>														
								</div>
								<div class="form-group">
									<label for="boss_name">Nombre y puesto del Jefe inmediato:</label>
									<select class="form-control" name="boss_name"><?php echo $boss_name; ?></select>															
								</div>
								<div class="form-group">
									<label for="critycality_level">Nivel de criticidad:</label>
									<select class="form-control" name="criticality_level"><?php echo $criticality_level; ?></select>
								</div>
								<div class="form-group">
									<label for="out_of_service">Tiempo máximo tolerable fuera de servicio:</label>
									<select class="form-control" name="out_of_service"><?php echo $out_of_service; ?></select>						
								</div>
								<div class="form-group">
									<label for="normal_operators">Numero de operadores en operación normal</label>
									<input class="form-control" type="text" name="normal_operators" id="normal_operators" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="contingency_operators">Numero de operadores en contingencia</label>
									<input class="form-control" type="text" name="contingency_operators" id="contingency_operators" maxlength="100" size="50"/>						
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Objetivos de recuperación</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">	
								<div class="form-group">
									<label for="critycality">Objetivo tiempo de recuperación:</label>
									<select class="form-control" name="rto"><?php echo $rto_option; ?></select>
								</div>
								<div class="form-group">
									<label for="critycality">Objetivo punto de recuperación:</label>
									<select class="form-control" name="rpo"><?php echo $rpo_option; ?></select>							
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Frecuencia del proceso</h3>
					</div>
					<div class="panel-body">
						<p class="lead">Identifica la frecuencia con la que se lleva acabo el proceso de manera cotidiana.</p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="frequency">Frecuencia del proceso:</label>
									<select class="form-control" name="frequency"><?php echo $frequency; ?></select>							
								</div>
								<div class="form-group">
									<label for="critical_period">Periodos críticos:</label>
									<select class="form-control" name="critical_period"><?php echo $critical_period; ?></select>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Sistema o sistemas que soportan el proceso</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="system_name">Sistema:</label>
									<input class="form-control" type="text" name="system_name" id="system_name" maxlength="100" size="50"/>						
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Procedimiento alterno</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="procedure">Procedimiento:</label>
									<input class="form-control" type="text" name="procedure" id="procedure" maxlength="100" size="50"/>	
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
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
								<div class="form-group">
									<label for="average">Promedio de transacciones:</label>
									<input class="form-control" type="text" name="average" id="average" maxlength="100" size="50"/>						
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Ventana de operaciones</h3>
					</div>
					<div class="panel-body">
						<p class="lead">Indica el horario de operacion y niveles de carga del mismo</p>
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Horas</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;00:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;01:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;02:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;03:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;04:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;05:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;06:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;07:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;08:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;09:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;13:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;14:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;15:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;19:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;21:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;22:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;23:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row"></th>
												<td><select class="form-control" name="hora_0"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_1"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_2"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_3"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_4"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_5"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_6"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_7"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_8"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_9"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_10"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_11"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_12"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_13"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_14"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_15"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_16"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_17"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_18"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_19"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_20"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_21"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_22"><?php echo $charge_level; ?></select></td>
												<td><select class="form-control" name="hora_23"><?php echo $charge_level; ?></select></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
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
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
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
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
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
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
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
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Personal critico</h3>
					</div>
					<div class="panel-body">
						<p class="lead">.</p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="staff_type">Personal requerido:</label>
									<select class="form-control" name="staff_type"><?php echo $stafftype; ?></select>
								</div>
								<div class="form-group">
									<label for="name">Nombre:</label>
									<input class="form-control" type="text" name="name" id="name" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="employee_number">Numero de empleado:</label>
									<input class="form-control" type="text" name="employee_number" id="employee_number" maxlength="100" size="50" />																			
								</div>
								<div class="form-group">
									<label for="extension">Extension:</label>
									<input class="form-control" type="text" name="extension" id="extension" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="workstation">Puesto</label>
									<input class="form-control" type="text" name="workstation" id="workstation" maxlength="100" size="50" />													
								</div>
								<div class="form-group">
									<label for="contingency_role">Rol en contingencia:</label>
									<input class="form-control" type="text" name="contingency_role" id="contingency_role" maxlength="100" size="50" />														
								</div>
								<div class="form-group">
									<label for="home_phone">Tel. casa:</label>
									<input class="form-control" type="text" name="home_phone" id="home_phone" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="cell_phone">Tel. celular:</label>
									<input class="form-control" type="text" name="cell_phone" id="cell_phone" maxlength="100" size="50" />					
								</div>
								<div class="form-group">
									<label>Dirección</label>
									<input class="form-control" type="text" name="address" id="address" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="internal_email">Correo electrónico interno:</label>
									<input class="form-control" type="text" name="internal_email" id="internal_email" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="external_email">Correo electrónico externo:</label>
									<input class="form-control" type="text" name="external_email" id="external_email" maxlength="100" size="50" />						
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Dependencias tecnológicas del proceso</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="area">Área que proporciona el servicio (considerar a proveedores):</label>
									<input class="form-control" type="text" name="area" id="area" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="service">Servicio / Equipos / Otros:</label>
									<input class="form-control" type="text" name="service" id="service" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="employee_number">Tipo de dependencia:</label>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
										        	<th>Interna</th>
										        	<th>Externa</th>
										        	<th>Entrada</th>
										        	<th>Salida</th>
									        	</tr>
									      	</thead>
									    	<tbody>
									    		<tr>
									          		<td><input type="checkbox" name="internal_dependency"></td>
									          		<td><input type="checkbox" name="external_dependency"></td>
									          		<td><input type="checkbox" name="input_dependency"></td>
									          		<td><input type="checkbox" name="output_dependency"></td>
									        	</tr>
									      	</tbody>
									    </table>																			
									</div>
								</div>
								<div class="form-group">
									<label for="dependency_level">Nivel de dependencia:</label>
									<select class="form-control" name="dependency_level"><?php echo $dependency_level; ?></select>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Respaldos de información</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Tipo de respaldo:</label>
									<select class="form-control" name="backup_type"><?php echo $backup_type; ?></select>
								</div>
								<div class="form-group">
									<label for="backup_storage">Medio de almacenamiento:</label>
									<select class="form-control" name="backup_storage"><?php echo $backup_storage; ?></select>
								</div>
								<div class="form-group">
									<label for="place">Lugar donde se realizan los respaldos:</label>
									<input class="form-control" type="text" name="place" id="place" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="zone">Lugar donde se almacenan los respaldos:</label>
									<input class="form-control" type="text" name="zone" id="zone" maxlength="100" size="50" />						
								</div>
								<div class="form-group">
									<label for="name">Persona que realiza los respaldos:</label>
									<input class="form-control" type="text" name="name" id="name" maxlength="100" size="50" />						
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Dependencias internas</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="area">Nombre del área:</label>
									<input class="form-control" type="text" name="area" id="area" maxlength="100" size="50" />	
								</div>
								<div class="form-group">
									<label for="input_data">Información requerida (entrada):</label>
									<input class="form-control" type="text" name="input_data" id="input_data" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="output_data">Información comprometida (salida):</label>
									<input class="form-control" type="text" name="output_data" id="output_data" maxlength="100" size="50" />
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Dependencias externas</h3>
					</div>
					<div class="panel-body">
						<p class="lead"></p>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="member">Nombre del proveedor / socio:</label>
									<input class="form-control" type="text" name="member" id="member" maxlength="100" size="50" />	
								</div>
								<div class="form-group">
									<label for="input_data">Información requerida (entrada):</label>
									<input class="form-control" type="text" name="input_data" id="input_data" maxlength="100" size="50" />
								</div>
								<div class="form-group">
									<label for="output_data">Información comprometida (salida):</label>
									<input class="form-control" type="text" name="output_data" id="output_data" maxlength="100" size="50" />
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
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
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
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
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<button type="submit" class="btn btn-primary pull-right">Continuar</button>
				</div>
				</form>
			</div>
		</div>
	</div>
<?php
show_footer();
?>