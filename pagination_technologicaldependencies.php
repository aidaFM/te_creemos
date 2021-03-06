<?php
require_once('conn2.php');

@session_start();
$id = $_SESSION['id'];

$RegistrosAMostrar = 1;

//estos valores los recibo por GET
if (isset($_GET['pag'])) {
    $RegistrosAEmpezar = ($_GET['pag'] - 1) * $RegistrosAMostrar;
    $PagAct = $_GET['pag'];
    //caso contrario los iniciamos
} else {
    $RegistrosAEmpezar = 0;
    $PagAct = 1;
}


$query = "SELECT * FROM dependencias_tecnologicas where clave_proceso = $id ORDER BY num_dependencia_proceso desc LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
$res = mysql_query($query, $con);
while ($data = mysql_fetch_array($res)) {
    $dependencyLevels = "select * from cat_nivel_dependencia";
    $result = $conn->query($dependencyLevels);
    $dependencyLevel = "";
    while ($row = $result->fetch_assoc()) {
        if ($row['clave_nivel_dependencia'] == $data['clave_nivel_dependencia']) {
            $dependencyLevel .= "<option value='$row[clave_nivel_dependencia]' selected>$row[descripcion_nivel_dependencia]</option>";
        } else {
            $dependencyLevel .= "<option value='$row[clave_nivel_dependencia]'>$row[descripcion_nivel_dependencia]</option>";
        }
    }
    if ($data['dependencia_interna'] == 'on') {
        $internal_dependency = '<input type="checkbox" name="internal_dependency" checked>';
    } else {
        $internal_dependency = '<input type="checkbox" name="internal_dependency">';
    }

    if ($data['dependencia_externa'] == 'on') {
        $external_dependency = '<input type="checkbox" name="external_dependency" checked>';
    } else {
        $external_dependency = '<input type="checkbox" name="external_dependency">';
    }

    if ($data['dependencia_entrada'] == 'on') {
        $input_dependency = '<input type="checkbox" name="input_dependency" checked>';
    } else {
        $input_dependency = '<input type="checkbox" name="input_dependency">';
    }

    if ($data['dependencia_salida'] == 'on') {
        $output_dependency = '<input type="checkbox" name="output_dependency" checked>';
    } else {
        $output_dependency = '<input type="checkbox" name="output_dependency">';
    }
    ?>
    <div class="form-group">
        <label for="area">Área que proporciona el servicio (considerar a proveedores):</label>
        <input class="form-control" type="text" name="area" id="area" value="<?= $data['area_dependencia'] ?>" maxlength="100" size="50" />
    </div>
    <div class="form-group">
        <label for="service">Servicio / Equipos / Otros:</label>
        <input class="form-control" type="text" name="service" id="service" value="<?= $data['servicio'] ?>" maxlength="100" size="50" />                         
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
                        <td><?php echo $internal_dependency ?></td>
                        <td><?php echo $external_dependency ?></td>
                        <td><?php echo $input_dependency ?></td>
                        <td><?php echo $output_dependency ?></td>
                    </tr>
                </tbody>
            </table>                                                                            
        </div>
    </div>
    <div class="form-group">
        <label for="dependency_level">Nivel de dependencia:</label>
        <select class="form-control" name="dependency_level"><?php echo $dependencyLevel; ?></select>
    </div>
    <?php
}

$NroRegistros = mysql_num_rows(mysql_query("SELECT * FROM dependencias_tecnologicas", $con));
$PagAnt = $PagAct - 1;
$PagSig = $PagAct + 1;
$PagUlt = $NroRegistros / $RegistrosAMostrar;

//verificamos residuo para ver si llevará decimales
$Res = $NroRegistros % $RegistrosAMostrar;
// si hay residuo usamos funcion floor para que me
// devuelva la parte entera, SIN REDONDEAR, y le sumamos
// una unidad para obtener la ultima pagina
if ($Res > 0)
    $PagUlt = floor($PagUlt) + 1;

//desplazamiento
echo "<a href=\"#\" onclick=\"Pagina2('1')\"><span class=\"glyphicon glyphicon-step-backward\" aria-hidden=\"true\"></span></a> ";
if ($PagAct > 1)
    echo "<a href=\"#\" onclick=\"Pagina2('$PagAnt')\"><span class=\"glyphicon glyphicon-backward\" aria-hidden=\"true\"></a> ";
echo "<strong>Registro " . $PagAct . "/" . $PagUlt . "</strong>";
if ($PagAct < $PagUlt)
    echo " <a href=\"#\" onclick=\"Pagina2('$PagSig')\"><span class=\"glyphicon glyphicon-forward\" aria-hidden=\"true\"></a> ";
echo "<a href=\"#\" onclick=\"Pagina2('$PagUlt')\"><span class=\"glyphicon glyphicon-step-forward\" aria-hidden=\"true\"></a>";
?>