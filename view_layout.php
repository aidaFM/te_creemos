<?php
function show_header($title)
{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<?php
}

function show_navbar()
{
?>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img alt="Brand" src="img/favicon.png"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Archivo<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="view_newprocess.php">Nuevo</a></li>
              <!--<li class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li class="divider"></li>
              <li><a href="#">One more separated link</a></li>-->
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Catálogos <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="view_area.php">Áreas</a></li>
              <li><a href="view_boss.php">Jefes inmediatos</a></li>
              <li><a href="view_leader.php">Lideres de proyecto</a></li>
              <li><a href="view_criticality.php">Criticidad</a></li>
              <li><a href="view_frequency.php">Frecuencias</a></li>
              <li><a href="view_criticalperiod.php">Periodos criticos</a></li>
              <li><a href="view_outofservice.php">Tiempos tolerables fuera de servicio</a></li>
              <li class="divider"></li>
              <li><a href="view_rto.php">Objetivos Tiempo de Recuperación</a></li>
              <li><a href="view_rpo.php">Objetivos Punto de Recuperación</a></li>
              <li class="divider"></li>
              <li><a href="view_backuptype.php">Tipos de respaldo</a></li>
              <li><a href="view_backupsource.php">Medios de respaldo</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
<?php
}

function show_footer(){
?>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}