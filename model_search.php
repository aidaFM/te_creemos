<?php

require_once('connections.php');

function getProcessId($var) {
    $conn = home_connection();
    $searchdata = $conn->query("SELECT clave_proceso FROM cat_procesos WHERE nombre_proceso = '" . $var . "'");
    if (!$searchdata) {
        throw new Exception('Error en la consulta getProcessId.');
    } else {
        while ($data = $searchdata->fetch_array()) {
            return $data['clave_proceso'];
        }
    }
    $searchdata->free();
    $searchdata->close();
}

function getNameProcess($var) {
    $conn = home_connection();
    $searchdata = $conn->query("SELECT nombre_proceso FROM cat_procesos WHERE clave_proceso = '" . $var . "'");
    if (!$searchdata) {
        throw new Exception('Error en la consulta getNameProcess.');
    } else {
        while ($data = $searchdata->fetch_array()) {
            return $data['nombre_proceso'];
        }
    }
    $searchdata->free();
    $searchdata->close();
}

function getSystemId($var) {
    $conn = home_connection();
    $searchdata = $conn->query("SELECT clave_sistema FROM cat_sistemas WHERE nombre_sistema = '" . $var . "'");
    if (!$searchdata) {
        throw new Exception('Error en la consulta getSystemId.');
    } else {
        while ($data = $searchdata->fetch_array()) {
            return $data['clave_sistema'];
        }
    }
    $searchdata->free();
    $searchdata->close();
}

function getNumberOfSystems($var) {
    $conn = home_connection();
    $searchdata = $conn->query("SELECT clave_sistema FROM proceso_sistemas WHERE clave_proceso = '" . $var . "'");
    $find = FALSE;
    if (!$searchdata) {
        throw new Exception('Error en la consulta getNumberOfSystems.');
    } else {
        $number_of_systems = $searchdata->num_rows;
        if ($number_of_systems > 0) {
            $find = TRUE;
        } else {
            $find = FALSE;
        }
        return $find;
    }
    $searchdata->free();
    $searchdata->close();
}

function getTimeAffectation($var) {
    $conn = home_connection();
    $searchdata = $conn->query("SELECT descripcion_tiempo_afectacion FROM cat_tiempo_afectacion WHERE clave_tiempo_afectacion = '" . $var . "'");
    if (!$searchdata) {
        throw new Exception('Error en la consulta getSystemId.');
    } else {
        while ($data = $searchdata->fetch_array()) {
            return $data['descripcion_tiempo_afectacion'];
        }
    }
    $searchdata->free();
    $searchdata->close();
}

function getTypeFinancialImpact($var) {
    $conn = home_connection();
    $searchdata = $conn->query("SELECT descripcion_impacto_financiero FROM cat_tipos_impactos_financieros WHERE clave_impacto_financiero = '" . $var . "'");
    if (!$searchdata) {
        throw new Exception('Error en la consulta getTypeFinancialImpact.');
    } else {
        while ($data = $searchdata->fetch_array()) {
            return $data['descripcion_impacto_financiero'];
        }
    }
    $searchdata->free();
    $searchdata->close();
}

function getNoneFinancialImpact($var) {
    $conn = home_connection();
    $searchdata = $conn->query("SELECT descripcion_impacto_no_fin FROM cat_impactos_no_financieros WHERE clave_impacto_no_fin = '" . $var . "'");
    if (!$searchdata) {
        throw new Exception('Error en la consulta getNoneFinancialImpact.');
    } else {
        while ($data = $searchdata->fetch_array()) {
            return $data['descripcion_impacto_no_fin'];
        }
    }
    $searchdata->free();
    $searchdata->close();
}

function getNoneFinancialImpactLevel($var) {
    $conn = home_connection();
    $searchdata = $conn->query("SELECT descripcion_nivel_imp_no_fin FROM cat_nivel_impactos_no_financieros WHERE clave_nivel_imp_no_fin = '" . $var . "'");
    if (!$searchdata) {
        throw new Exception('Error en la consulta getNoneFinancialImpactLevel.');
    } else {
        while ($data = $searchdata->fetch_array()) {
            return $data['descripcion_nivel_imp_no_fin'];
        }
    }
    $searchdata->free();
    $searchdata->close();
}

function getStaffId($name) {
    $conn = home_connection();
    $searchdata = $conn->query("SELECT clave_personal FROM cat_directorio_personal_critico WHERE nombre_personal = '" . $name . "'");
    if (!$searchdata) {
        throw new Exception('Error en la consulta getStaffId.');
    } else {
        while ($data = $searchdata->fetch_array()) {
            return $data['clave_personal'];
        }
    }
    $searchdata->free();
    $searchdata->close();
}

function getStaffType($staffId) {
    $conn = home_connection();
    $searchdata = $conn->query("SELECT clave_tipo_personal FROM cat_directorio_personal_critico JOIN proceso_personal_tipopersonal ON cat_directorio_personal_critico.clave_personal=proceso_personal_tipopersonal.clave_personal WHERE cat_directorio_personal_critico.clave_personal = $staffId");
    if (!$searchdata) {
        throw new Exception('Error en la consulta getStaffType');
    } else {
        while ($data = $searchdata->fetch_array()) {
            return $data['clave_tipo_personal'];
        }
    }
}

function getProviderId($var) {
    $conn = home_connection();
    $searchdata = $conn->query("SELECT clave_provedor FROM cat_directorio_proveedores WHERE nombre_provedor = '" . $var . "'");
    if (!$searchdata) {
        throw new Exception('Error en la consulta getProviderId.');
    } else {
        while ($data = $searchdata->fetch_array()) {
            return $data['clave_provedor'];
        }
    }
    $searchdata->free();
    $searchdata->close();
}

function getConsecutiveNumber($id, $table, $var0) {
    $conn = home_connection();
    $searchdata = $conn->query("SELECT MAX($var0) as maximo FROM $table WHERE clave_proceso = $id");
    if (!$searchdata) {
        throw new Exception('Error en la consulta getConsecutiveNumber.');
    } else {
        while ($data = $searchdata->fetch_array()) {
            return $data['maximo'] + 1;
        }
    }
    $searchdata->free();
    $searchdata->close();
}

function getProcessData($id) {
    $conn = home_connection();
    $getdata = $conn->query("SELECT * FROM cat_procesos JOIN inventario_procesos ON cat_procesos.clave_proceso=inventario_procesos.clave_proceso WHERE cat_procesos.clave_proceso = $id");
    if (!$getdata) {
        throw new Exception('Error en la consulta getProcessData.');
    } else {
        while ($data = $getdata->fetch_array()) {
            return $data;
        }
    }
    $getdata->free();
    $getdata->close();
}

function getWindowOperationData($id) {
    $conn = home_connection();
    $getdata = $conn->query("SELECT * FROM operacion_proceso WHERE clave_proceso = $id");
    if (!$getdata) {
        throw new Exception('Error en la consulta getWindowOperationData.');
    } else {
        while ($data = $getdata->fetch_array()) {
            return $data;
        }
    }
    $getdata->free();
    $getdata->close();
}

function getCyclicalProcessing($id) {
    $conn = home_connection();
    $getdata = $conn->query("SELECT * FROM procesa_ciclico WHERE clave_proceso = $id");
    if (!$getdata) {
        throw new Exception('Error en la consulta getWindowOperationData.');
    } else {
        while ($data = $getdata->fetch_array()) {
            return $data;
        }
    }
    $getdata->free();
    $getdata->close();
}

function getFinancialImpacts($id) {
    $conn = home_connection();
    $i = 0;
    $getdata = $conn->query("SELECT * FROM impactos_financiero WHERE clave_proceso = $id");
    if (!$getdata) {
        throw new Exception('Error en la consulta getFinancialImpacts.');
    } else {
        while ($data = $getdata->fetch_array()) {
            $data_temp[$i] = $data;
            $i++;
        }
        return $data_temp;
    }
    $getdata->free();
    $getdata->close();
}

function getEconomicImpacts($id) {
    $conn = home_connection();
    $i = 0;
    $getdata = $conn->query("SELECT * FROM multas_penalizaciones WHERE clave_proceso = $id");
    if (!$getdata) {
        throw new Exception('Error en la consulta getFinancialImpacts.');
    } else {
        while ($data = $getdata->fetch_array()) {
            $data_temp[$i] = $data;
            $i++;
        }
        return $data_temp;
    }
    $getdata->free();
    $getdata->close();
}

function getBackupData($id) {
    $conn = home_connection();
    $getdata = $conn->query("SELECT * FROM respaldos_proceso WHERE clave_proceso = $id");
    if (!$getdata) {
        throw new Exception('Error en la consulta getBackupData.');
    } else {
        while ($data = $getdata->fetch_array()) {
            return $data;
        }
    }
    $getdata->free();
    $getdata->close();
}

function getProviderData($id) {
    $conn = home_connection();
    $getdata = $conn->query("SELECT * FROM cat_directorio_proveedores JOIN proceso_proveedor ON cat_directorio_proveedores.clave_provedor=proceso_proveedor.clave_provedor WHERE clave_proceso =$id");
    if (!$getdata) {
        throw new Exception('Error en la consulta getProviderData.');
    } else {
        while ($data = $getdata->fetch_array()) {
            return $data;
        }
    }
    $getdata->free();
    $getdata->close();
}

function getRecoveryRequeriments($id) {
    $conn = home_connection();
    $getdata = $conn->query("SELECT * FROM requerimientos_bcp WHERE clave_proceso =$id");
    if (!$getdata) {
        throw new Exception('Error en la consulta getRecoveryRequeriments.');
    } else {
        while ($data = $getdata->fetch_array()) {
            return $data;
        }
    }
    $getdata->free();
    $getdata->close();
}
