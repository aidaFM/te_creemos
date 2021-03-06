<?php

require_once('basic_files.php');

@$id = $_POST['id'];
@$var0 = $_POST['staff_type'];
@$var1 = $_POST['name'];
@$var2 = $_POST['employee_number'];
@$var3 = $_POST['extension'];
@$var4 = $_POST['workstation'];
// @$var5 = $_POST['contingency_role'];
@$var6 = $_POST['home_phone'];
@$var7 = $_POST['cell_phone'];
@$var8 = $_POST['address'];
@$var9 = $_POST['internal_email'];
@$var10 = $_POST['external_email'];

@$button = $_POST['save'];

try {
    if ($button == 'save') {
        if (!empty_fields($_POST)) {
            throw new Exception('El formulario para crear el proceso cuenta con campos vacios.');
        } else {
            show_header('Guardar personal critico');
            $nextNumber = getConsecutiveNumber($id, 'proceso_personal_tipopersonal', 'clave_personal');
            save_staffdirectory($nextNumber, $var1, $var2, $var3, $var4, $var6, $var7, $var8, $var9, $var10);
            save_processstaff($id, $nextNumber, $var0);
            header("refresh:0; url=\"view_criticalstaff.php?id=$id\"");
            show_footer();
        }
    } else {
        show_header('Dependencias tecnologicas');
        header("refresh:0; url=\"view_technologicaldependencies.php?id=$id\"");
        show_footer();
    }
} catch (Exception $e) {
    show_header('Errores');
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-12">';
    echo '<p></p>';
    echo '<div class="alert alert-danger">';
    echo $e->getMessage();
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    show_footer();
    exit;
}