<?php
require_once 'conn2.php';
require_once 'model_search.php';

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

$query = "SELECT * FROM cat_directorio_proveedores JOIN proceso_proveedor ON cat_directorio_proveedores.clave_provedor = proceso_proveedor.clave_provedor WHERE proceso_proveedor.clave_proceso=$id ORDER BY proceso_proveedor.clave_provedor ASC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
$res = mysql_query($query, $con);
while ($data = mysql_fetch_array($res)) {
    ?>
    <div class="form-group">
        <label for="name">Nombre del proveedor:</label>
        <input class="form-control" type="text" name="name" id="name" value="<?= $data['nombre_provedor'] ?>" maxlength="100" size="50" />
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
        <input class="form-control" type="text" name="area" id="area" value="<?= $data['empresa_provedor'] ?>" maxlength="100" size="50" />																			
    </div>
    <div class="form-group">
        <label for="home_phone">Tel. oficina:</label>
        <input class="form-control" type="text" name="home_phone" id="home_phone" value="<?= $data['numero_telefono_oficina'] ?>" maxlength="100" size="50" />						
    </div>
    <div class="form-group">
        <label for="cell_phone">Tel. celular</label>
        <input class="form-control" type="text" name="cell_phone" id="cell_phone" value="<?= $data['numero_telefono_celular'] ?>" maxlength="100" size="50" />													
    </div>
    <div class="form-group">
        <label for="email">Correo electronico:</label>
        <input class="form-control" type="text" name="email" id="email" value="<?= $data['mail_provedor'] ?>" maxlength="100" size="50" />														
    </div>
    <div class="form-group">
        <label for="address">Domicilio:</label>
        <input class="form-control" type="text" name="address" id="address" value="<?= $data['domicilio_provedor'] ?>" maxlength="100" size="50" />
    </div>
    <?php
}

$NroRegistros = mysql_num_rows(mysql_query("SELECT * FROM cat_directorio_proveedores JOIN proceso_proveedor ON cat_directorio_proveedores.clave_provedor = proceso_proveedor.clave_provedor WHERE proceso_proveedor.clave_proceso=$id", $con));
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
echo "<a href=\"#\" onclick=\"Pagina5('1')\"><span class=\"glyphicon glyphicon-step-backward\" aria-hidden=\"true\"></span></a> ";
if ($PagAct > 1)
    echo "<a href=\"#\" onclick=\"Pagina5('$PagAnt')\"><span class=\"glyphicon glyphicon-backward\" aria-hidden=\"true\"></a> ";
echo "<strong>Registro " . $PagAct . "/" . $PagUlt . "</strong>";
if ($PagAct < $PagUlt)
    echo " <a href=\"#\" onclick=\"Pagina5('$PagSig')\"><span class=\"glyphicon glyphicon-forward\" aria-hidden=\"true\"></a> ";
echo "<a href=\"#\" onclick=\"Pagina5('$PagUlt')\"><span class=\"glyphicon glyphicon-step-forward\" aria-hidden=\"true\"></a>";
?>