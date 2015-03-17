<?php

$tables[0] = 'create table if not exists cat_areas('
        . 'clave_area int(10) auto_increment not null,'
        . 'descripcion_area varchar(100) not null,'
        . 'primary key(clave_area)'
        . ');';

$tables[1] = 'create table if not exists cat_procesos('
        . 'clave_proceso int(10) auto_increment not null,'
        . 'clave_area int(10),nombre_proceso varchar(150),'
        . 'objetivo_proceso varchar(200),'
        . 'descripcion_proceso text(10000),'
        . 'primary key(clave_proceso)'
        . ');';

$tables[2] = 'create table if not exists cat_nivel_carga('
        . 'clave_nivel_carga int(10) auto_increment not null,'
        . 'descripcion_nivel_carga varchar(100),'
        . 'primary key(clave_nivel_carga)'
        . ');';

$tables[3] = 'create table if not exists cat_criticidad_procesos('
        . 'clave_criticidad_proceso int(10) auto_increment not null,'
        . 'descripcion_criticidad_proceso varchar(250) not null,'
        . 'primary key(clave_criticidad_proceso));';

$tables[4] = 'create table if not exists cat_objetivo_tiempo_recuperacion('
        . 'clave_rto int(10) auto_increment not null,'
        . 'nombre_rto varchar(50) not null,'
        . 'descripcion_rto varchar(250) not null,'
        . 'primary key(clave_rto));';

$tables[5] = 'create table if not exists cat_objetivo_punto_recuperacion('
        . 'clave_rpo int(10) auto_increment not null,'
        . 'nombre_rpo varchar(50) not null,'
        . 'descripcion_rpo varchar(250) not null,'
        . 'primary key(clave_rpo)'
        . ');';

$tables[6] = 'create table if not exists cat_frecuencia_proceso('
        . 'clave_frecuencia_proceso int(10) auto_increment not null,'
        . 'descripcion_frecuencia_proceso varchar (250) not null,'
        . 'primary key(clave_frecuencia_proceso)'
        . ');';

$tables[7] = 'create table if not exists cat_periodos_criticos('
        . 'clave_periodos_criticos int(10) auto_increment not null,'
        . 'descripcion_periodos_criticos varchar(250) not null,'
        . 'primary key(clave_periodos_criticos)'
        . ');';

$tables[8] = 'create table if not exists cat_lider_proyecto('
        . 'clave_lider_proyecto int(10) auto_increment not null,'
        . 'nombre_lider_proyecto varchar(250) not null,'
        . 'primary key(clave_lider_proyecto)'
        . ');';

$tables[9] = 'create table if not exists proceso_sistemas('
        . 'clave_proceso int(10) not null,'
        . 'consecutivo_sistema int(10) not null,'
        . 'clave_sistema int(10) not null'
        . ');';

$tables[10] = 'create table if not exists cat_sistemas('
        . 'clave_sistema int(10) auto_increment not null,'
        . 'nombre_sistema varchar(250) not null,'
        . 'primary key(clave_sistema)'
        . ');';

$tables[11] = 'create table if not exists cat_directorio_personal_critico('
        . 'clave_personal int(10) auto_increment not null,'
        . 'nombre_personal varchar(150),'
        . 'numero_empleado varchar(100),'
        . 'extension int(10),puesto varchar(150),'
        . 'numero_telefono_casa varchar(100),'
        . 'numero_telefono_celular varchar(100),'
        . 'domicilio varchar(250),'
        . 'mail_interno varchar(150),'
        . 'mail_externo varchar(150),'
        . 'primary key(clave_personal)'
        . ');';

$tables[12] = 'create table if not exists proceso_personal_tipopersonal('
        . 'clave_proceso int(10),'
        . 'clave_personal int(10),'
        . 'clave_tipo_personal int(10)'
        . ');';

$tables[13] = 'create table if not exists cat_tipo_personal('
        . 'clave_tipo_personal int(10),'
        . 'descripcion_tipo_personal varchar(10)'
        . ');';

$tables[14] = 'create table if not exists cat_tiempo_maximo_fs('
        . 'clave_tiempo_maximo_fs int(10) auto_increment not null,'
        . 'descripcion_tiempo_maximo_fs varchar(250) not null,'
        . 'primary key(clave_tiempo_maximo_fs)'
        . ');';

$tables[15] = 'create table if not exists cat_jefes_inmediatos('
        . 'clave_jefes_inmediatos int(10) auto_increment not null,'
        . 'nombre_jefes_inmediatos varchar(250),'
        . 'puesto_jefes_inmediatos varchar(250),'
        . 'primary key(clave_jefes_inmediatos)'
        . ');';

$tables[16] = 'create table if not exists operacion_proceso('
        . 'clave_proceso int(10),'
        . 'hora_0 int(10),'
        . 'hora_1 int(10),'
        . 'hora_2 int(10),'
        . 'hora_3 int(10),'
        . 'hora_4 int(10),'
        . 'hora_5 int(10),'
        . 'hora_6 int(10),'
        . 'hora_7 int(10),'
        . 'hora_8 int(10),'
        . 'hora_9 int(10),'
        . 'hora_10 int(10),'
        . 'hora_11 int(10),'
        . 'hora_12 int(10),'
        . 'hora_13 int(10),'
        . 'hora_14 int(10),'
        . 'hora_15 int(10),'
        . 'hora_16 int(10),'
        . 'hora_17 int(10),'
        . 'hora_18 int(10),'
        . 'hora_19 int(10),'
        . 'hora_20 int(10),'
        . 'hora_21 int(10),'
        . 'hora_22 int(10),'
        . 'hora_23 int(10)'
        . ');';

$tables[17] = 'create table if not exists impactos_financiero('
        . 'clave_proceso int(10) not null,'
        . 'consecutivo_impacto_financiero int(10),'
        . 'clave_tiempo_afectacion int(10) not null,'
        . 'clave_impacto_financiero int(10) not null'
        . ');';

$tables[18] = 'create table if not exists impactos_no_financieros('
        . 'clave_proceso int(10),'
        . 'clave_impacto_no_fin int(10),'
        . 'clave_nivel_imp_no_fin int(10)'
        . ');';

$tables[19] = 'create table if not exists interdependencias_internas('
        . 'clave_proceso int(10),'
        . 'clave_interdependencia_interna int(10),'
        . 'area_interdependencia_interna varchar(150),'
        . 'informacion_requerida_entrada_interna varchar(150),'
        . 'informacion_comprometida_salida_interna varchar(150)'
        . ');';

$tables[20] = 'create table if not exists interdependencias_externas('
        . 'clave_proceso int(10),'
        . 'clave_interdependencia_externa int(10),'
        . 'nombre_proveedor varchar(150),'
        . 'informacion_requerida_entrada_externa varchar(150),'
        . 'informacion_comprometida_salida_externa varchar(150)'
        . ');';

$tables[21] = 'create table if not exists proceso_proveedor('
        . 'clave_proceso int(10),'
        . 'consecutivo_proveedor int(10),'
        . 'clave_provedor int(10)'
        . ');';

$tables[22] = 'create table if not exists cat_directorio_proveedores('
        . 'clave_provedor int(10) auto_increment not null,'
        . 'nombre_provedor varchar(150),'
        . 'empresa_provedor varchar(150),'
        . 'numero_telefono_oficina varchar(18),'
        . 'numero_telefono_celular varchar(18),'
        . 'mail_provedor varchar(18),'
        . 'domicilio_provedor varchar(250),'
        . 'primary key(clave_provedor)'
        . ');';

$tables[23] = 'create table if not exists requerimientos_bcp('
        . 'clave_proceso int(10),'
        . 'pc_on int(10),'
        . 'pc_oc int(10),'
        . 'telefono_on int(10)'
        . ',telefono_oc int(10),'
        . 'impresora_on int(10),'
        . 'impresora_oc int(10),'
        . 'laptop_on int(10),'
        . 'laptop_oc int(10),'
        . 'vpninternet_on int(10),'
        . 'vpninternet_oc int(10),'
        . 'escritorio_on int(10),'
        . 'escritorio_oc int(10),'
        . 'papeleria int(10),'
        . 'otros varchar(250)'
        . ');';

$tables[24] = 'create table if not exists multas_penalizaciones('
        . 'clave_proceso int(10),'
        . 'consecutivo_tiempo_afectacion_multa int(10) not null,'
        . 'clave_tiempo_afectacion_multa int(10),'
        . 'clave_impacto_financiero_multa int(10)'
        . ');';

$tables[25] = 'create table if not exists procesa_ciclico('
        . 'clave_proceso int(10),'
        . 'enero int(10),'
        . 'febrero int(10),'
        . 'marzo int(10),'
        . 'abril int(10),'
        . 'mayo int(10),'
        . 'junio int(10),'
        . 'julio int(10),'
        . 'agosto int(10),'
        . 'septiembre int(10),'
        . 'octubre int(10),'
        . 'noviembre int(10),'
        . 'diciembre int(10)'
        . ');';

$tables[26] = 'create table if not exists cat_impactos_no_financieros('
        . 'clave_impacto_no_fin int(10),'
        . 'descripcion_impacto_no_fin varchar(250)'
        . ');';

$tables[27] = 'create table if not exists cat_nivel_impactos_no_financieros('
        . 'clave_nivel_imp_no_fin int(10),'
        . 'descripcion_nivel_imp_no_fin varchar(250)'
        . ');';

$tables[28] = 'create table if not exists dependencias_tecnologicas('
        . 'clave_proceso int(10),'
        . 'num_dependencia_proceso int(10),'
        . 'area_dependencia varchar(250),'
        . 'servicio varchar(150),'
        . 'dependencia_interna char(3),'
        . 'dependencia_externa char(3),'
        . 'dependencia_entrada char(3),'
        . 'dependencia_salida char(3),'
        . 'clave_nivel_dependencia int(10));';

$tables[29] = 'create table if not exists respaldos_proceso('
        . 'clave_proceso int(10),'
        . 'clave_tipo_respaldo int(10),'
        . 'clave_medio_respaldo int(10),'
        . 'lugar_donde_respaldan varchar(150),'
        . 'lugar_almacenamiento_respaldo varchar(150),'
        . 'personal_realiza_respaldo varchar(150)'
        . ');';

$tables[30] = 'create table if not exists cat_tipo_respaldos('
        . 'clave_tipo_respaldo int(10) auto_increment not null,'
        . 'descripcion_tipo_respaldo varchar(250) not null,'
        . 'primary key(clave_tipo_respaldo)'
        . ');';

$tables[31] = 'create table if not exists cat_medio_respaldo('
        . 'clave_medio_respaldo int(10) auto_increment not null,'
        . 'descripcion_medio_respaldo varchar(250) not null,'
        . 'primary key(clave_medio_respaldo)'
        . ');';

$tables[32] = 'create table if not exists cat_tipos_impactos_financieros('
        . 'clave_impacto_financiero int(10),'
        . 'descripcion_impacto_financiero varchar(250)'
        . ');';

$tables[33] = 'create table if not exists cat_tiempo_afectacion('
        . 'clave_tiempo_afectacion int(10),'
        . 'descripcion_tiempo_afectacion varchar(250)'
        . ');';

$tables[34] = 'create table if not exists cat_nivel_dependencia('
        . 'clave_nivel_dependencia int(10),'
        . 'descripcion_nivel_dependencia varchar(250)'
        . ');';

$tables[35] = 'create table if not exists inventario_procesos('
        . 'clave_proceso int(10) not null,'
        . 'clave_criticidad_proceso int(10),'
        . 'clave_tiempo_maximo_fs int(10),'
        . 'clave_lider_proyecto int(10),'
        . 'clave_jefes_inmediatos int(10),'
        . 'personal_operacion_normal int(10),'
        . 'personal_operacion_contingencia int(10),'
        . 'clave_rto int(10),'
        . 'clave_rpo int(10),'
        . 'clave_frecuencia_proceso int(10),'
        . 'clave_periodos_criticos int(10),'
        . 'promedio_transacciones_mensuales decimal(20,2),'
        . 'procedimiento_alterno varchar(250)'
        . ');';

