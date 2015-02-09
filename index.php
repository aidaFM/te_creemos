<?php

require_once('basic_files.php');

show_header('Home');
show_navbar();
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Inicio</h3>
					</div>
					<div class="panel-body">
						<h1>Bienvenido/a.</h1>
						<p class="lead">Desde aqui podras seleccionar entre crear un nuevo proceso o trabajar sobre uno existente.</p>
						<a href="view_newprocess.php"><button type="button" class="btn btn-default btn-lg">
							<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
						</button></a>
						<a href="view_newprocess.php">Crear un <strong>nuevo</strong> proceso.</a>
						<br><br>
						<button type="button" class="btn btn-default btn-lg">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</button>
							<a href="#">Trabajar sobre un proceso <strong>existente</strong></a>
					</div>
				</div>	
			</div>
		</div>
	</div>
<?php
show_footer();