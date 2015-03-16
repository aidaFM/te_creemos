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

$query = "SELECT * FROM cat_directorio_personal_critico JOIN proceso_personal_tipopersonal ON cat_directorio_personal_critico.clave_personal = proceso_personal_tipopersonal.clave_personal where proceso_personal_tipopersonal.clave_proceso = $id ORDER BY proceso_personal_tipopersonal.clave_personal ASC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
$res = mysql_query($query, $con);
while ($data = mysql_fetch_array($res)) {
    $staffId = getStaffId($data['nombre_personal']);
    $staffType = getStaffType($staffId);
    $conn = home_connection();

    $stafftypes = "select * from cat_tipo_personal";
    $result = $conn->query($stafftypes);
    $stafftype = "";
    while ($row = $result->fetch_assoc()) {
        if ($row['clave_tipo_personal'] == $staffType) {
            $stafftype .= "<option value='$row[clave_tipo_personal]' selected>$row[descripcion_tipo_personal]</option>";
        } else {
            $stafftype .= "<option value='$row[clave_tipo_personal]'>$row[descripcion_tipo_personal]</option>";
        }
    }
    ?>
    <div class="form-group">
        <label for="staff_type">Personal requerido:</label>
        <select class="form-control" name="staff_type"><?php echo $stafftype ?></select>
    </div>
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input class="form-control" type="text" name="name" id="name" value="<?= $data['nombre_personal'] ?>" maxlength="100" size="50" />                      
    </div>
    <div class="form-group">
        <label for="employee_number">Numero de empleado:</label>
        <input class="form-control" type="text" name="employee_number" id="employee_number" value="<?= $data['numero_empleado'] ?>" maxlength="100" size="50" />                                                                            
    </div>
    <div class="form-group">
        <label for="extension">Extension:</label>
        <input class="form-control" type="text" name="extension" id="extension" value="<?= $data['extension'] ?>" maxlength="100" size="50" />                        
    </div>
    <div class="form-group">
        <label for="workstation">Puesto</label>
        <input class="form-control" type="text" name="workstation" id="workstation" value="<?= $data['puesto'] ?>" maxlength="100" size="50" />                                                    
    </div>
    <div class="form-group">
        <label for="contingency_role">Rol en contingencia:</label>
        <input class="form-control" type="text" name="contingency_role" id="contingency_role" maxlength="100" size="50" />                                                      
    </div>
    <div class="form-group">
        <label for="home_phone">Tel. casa:</label>
        <input class="form-control" type="text" name="home_phone" id="home_phone" value="<?= $data['numero_telefono_casa'] ?>" maxlength="100" size="50" />
    </div>
    <div class="form-group">
        <label for="cell_phone">Tel. celular:</label>
        <input class="form-control" type="text" name="cell_phone" id="cell_phone" value="<?= $data['numero_telefono_celular'] ?>" maxlength="100" size="50" />                  
    </div>
    <div class="form-group">
        <label>Dirección</label>
        <input class="form-control" type="text" name="address" id="address" value="<?= $data['domicilio'] ?>" maxlength="100" size="50" />                        
    </div>
    <div class="form-group">
        <label for="internal_email">Correo electrónico interno:</label>
        <input class="form-control" type="text" name="internal_email" id="internal_email" value="<?= $data['mail_interno'] ?>" maxlength="100" size="50" />
    </div>
    <div class="form-group">
        <label for="external_email">Correo electrónico externo:</label>
        <input class="form-control" type="text" name="external_email" id="external_email" value="<?= $data['mail_externo'] ?>" maxlength="100" size="50" />                      
    </div>
    <?php
}

$NroRegistros = mysql_num_rows(mysql_query("SELECT * FROM cat_directorio_personal_critico JOIN proceso_personal_tipopersonal ON cat_directorio_personal_critico.clave_personal = proceso_personal_tipopersonal.clave_personal where proceso_personal_tipopersonal.clave_proceso = $id", $con));
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
echo "<a href=\"#\" onclick=\"Pagina('1')\"><span class=\"glyphicon glyphicon-step-backward\" aria-hidden=\"true\"></span></a> ";
if ($PagAct > 1)
    echo "<a href=\"#\" onclick=\"Pagina('$PagAnt')\"><span class=\"glyphicon glyphicon-backward\" aria-hidden=\"true\"></a> ";
echo "<strong>Registro " . $PagAct . "/" . $PagUlt . "</strong>";
if ($PagAct < $PagUlt)
    echo " <a href=\"#\" onclick=\"Pagina('$PagSig')\"><span class=\"glyphicon glyphicon-forward\" aria-hidden=\"true\"></a> ";
echo "<a href=\"#\" onclick=\"Pagina('$PagUlt')\"><span class=\"glyphicon glyphicon-step-forward\" aria-hidden=\"true\"></a>";
?>