<?php
require_once('conn2.php');

@session_start();
$id = $_SESSION['id'];

$RegistrosAMostrar=1;

//estos valores los recibo por GET
if(isset($_GET['pag'])){
    $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
    $PagAct=$_GET['pag'];
    //caso contrario los iniciamos
}else{
    $RegistrosAEmpezar=0;
    $PagAct=1;
}


$query="SELECT * FROM interdependencias_externas where clave_proceso = $id ORDER BY clave_interdependencia_externa desc LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
$res =mysql_query($query, $con);
while($data=mysql_fetch_array($res)){
    ?>
    <div class="form-group">
        <label for="member">Nombre del proveedor / socio:</label>
        <input class="form-control" type="text" name="member" id="member" value="<?= $data['nombre_proveedor'] ?>" maxlength="100" size="50" />  
    </div>
    <div class="form-group">
        <label for="input_data">Información requerida (entrada):</label>
        <input class="form-control" type="text" name="input_data" id="input_data" value="<?= $data['informacion_requerida_entrada_externa'] ?>" maxlength="100" size="50" />
    </div>
    <div class="form-group">
        <label for="output_data">Información comprometida (salida):</label>
        <input class="form-control" type="text" name="output_data" id="output_data" value="<?= $data['informacion_comprometida_salida_externa'] ?>" maxlength="100" size="50" />
    </div>
    <?php
}

$NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM interdependencias_externas",$con));
$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;

//verificamos residuo para ver si llevará decimales
$Res=$NroRegistros%$RegistrosAMostrar;
// si hay residuo usamos funcion floor para que me
// devuelva la parte entera, SIN REDONDEAR, y le sumamos
// una unidad para obtener la ultima pagina
if($Res>0) $PagUlt=floor($PagUlt)+1;

//desplazamiento
echo "<a href=\"#\" onclick=\"Pagina4('1')\"><span class=\"glyphicon glyphicon-step-backward\" aria-hidden=\"true\"></span></a> ";
if($PagAct>1) echo "<a href=\"#\" onclick=\"Pagina4('$PagAnt')\"><span class=\"glyphicon glyphicon-backward\" aria-hidden=\"true\"></a> ";
echo "<strong>Registro ".$PagAct."/".$PagUlt."</strong>";
if($PagAct<$PagUlt)  echo " <a href=\"#\" onclick=\"Pagina4('$PagSig')\"><span class=\"glyphicon glyphicon-forward\" aria-hidden=\"true\"></a> ";
echo "<a href=\"#\" onclick=\"Pagina4('$PagUlt')\"><span class=\"glyphicon glyphicon-step-forward\" aria-hidden=\"true\"></a>";
?>