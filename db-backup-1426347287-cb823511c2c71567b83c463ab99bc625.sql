DROP TABLE cat_areas;

CREATE TABLE `cat_areas` (
  `clave_area` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion_area` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`clave_area`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE cat_criticidad_procesos;

CREATE TABLE `cat_criticidad_procesos` (
  `clave_criticidad_proceso` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion_criticidad_proceso` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`clave_criticidad_proceso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_criticidad_procesos VALUES("1","Media.");
INSERT INTO cat_criticidad_procesos VALUES("2","Alta.");
INSERT INTO cat_criticidad_procesos VALUES("3","Baja.");



DROP TABLE cat_directorio_personal_critico;

CREATE TABLE `cat_directorio_personal_critico` (
  `clave_personal` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_personal` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_empleado` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extension` int(10) DEFAULT NULL,
  `puesto` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_telefono_casa` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_telefono_celular` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `domicilio` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mail_interno` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mail_externo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`clave_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE cat_directorio_proveedores;

CREATE TABLE `cat_directorio_proveedores` (
  `clave_provedor` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_provedor` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `empresa_provedor` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_telefono_oficina` varchar(18) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_telefono_celular` varchar(18) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mail_provedor` varchar(18) COLLATE utf8_spanish_ci DEFAULT NULL,
  `domicilio_provedor` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`clave_provedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE cat_frecuencia_proceso;

CREATE TABLE `cat_frecuencia_proceso` (
  `clave_frecuencia_proceso` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion_frecuencia_proceso` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`clave_frecuencia_proceso`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_frecuencia_proceso VALUES("1","Cada hora.");
INSERT INTO cat_frecuencia_proceso VALUES("2","Diario.");
INSERT INTO cat_frecuencia_proceso VALUES("3","Semanal.");
INSERT INTO cat_frecuencia_proceso VALUES("4","Quincenal.");
INSERT INTO cat_frecuencia_proceso VALUES("5","Mensual.");
INSERT INTO cat_frecuencia_proceso VALUES("6","Trimestral.");
INSERT INTO cat_frecuencia_proceso VALUES("7","Anual.");



DROP TABLE cat_impactos_no_financieros;

CREATE TABLE `cat_impactos_no_financieros` (
  `clave_impacto_no_fin` int(10) DEFAULT NULL,
  `descripcion_impacto_no_fin` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_impactos_no_financieros VALUES("1","Servicio al cliente");
INSERT INTO cat_impactos_no_financieros VALUES("2","Pérdida de imagen");
INSERT INTO cat_impactos_no_financieros VALUES("3","Operacional");
INSERT INTO cat_impactos_no_financieros VALUES("4","Servicio a los empleados");



DROP TABLE cat_jefes_inmediatos;

CREATE TABLE `cat_jefes_inmediatos` (
  `clave_jefes_inmediatos` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_jefes_inmediatos` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `puesto_jefes_inmediatos` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`clave_jefes_inmediatos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE cat_lider_proyecto;

CREATE TABLE `cat_lider_proyecto` (
  `clave_lider_proyecto` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_lider_proyecto` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`clave_lider_proyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE cat_medio_respaldo;

CREATE TABLE `cat_medio_respaldo` (
  `clave_medio_respaldo` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion_medio_respaldo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`clave_medio_respaldo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_medio_respaldo VALUES("1","CD-DVD");
INSERT INTO cat_medio_respaldo VALUES("2","Cinta magnetica");
INSERT INTO cat_medio_respaldo VALUES("3","Disco duro externo");
INSERT INTO cat_medio_respaldo VALUES("4","Disco duro interno");
INSERT INTO cat_medio_respaldo VALUES("5","USB");
INSERT INTO cat_medio_respaldo VALUES("6","En un servidor a través de la red");
INSERT INTO cat_medio_respaldo VALUES("7","Red dedicada al almacenamiento");



DROP TABLE cat_nivel_carga;

CREATE TABLE `cat_nivel_carga` (
  `clave_nivel_carga` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion_nivel_carga` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`clave_nivel_carga`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_nivel_carga VALUES("1","Bajo.");
INSERT INTO cat_nivel_carga VALUES("2","Medio.");
INSERT INTO cat_nivel_carga VALUES("3","Alto.");



DROP TABLE cat_nivel_dependencia;

CREATE TABLE `cat_nivel_dependencia` (
  `clave_nivel_dependencia` int(10) DEFAULT NULL,
  `descripcion_nivel_dependencia` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_nivel_dependencia VALUES("1","Bajo.");
INSERT INTO cat_nivel_dependencia VALUES("2","Alto.");



DROP TABLE cat_nivel_impactos_no_financieros;

CREATE TABLE `cat_nivel_impactos_no_financieros` (
  `clave_nivel_imp_no_fin` int(10) DEFAULT NULL,
  `descripcion_nivel_imp_no_fin` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_nivel_impactos_no_financieros VALUES("1","Nulo");
INSERT INTO cat_nivel_impactos_no_financieros VALUES("2","Bajo");
INSERT INTO cat_nivel_impactos_no_financieros VALUES("3","Medio");
INSERT INTO cat_nivel_impactos_no_financieros VALUES("4","Alto");



DROP TABLE cat_objetivo_punto_recuperacion;

CREATE TABLE `cat_objetivo_punto_recuperacion` (
  `clave_rpo` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_rpo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_rpo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`clave_rpo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_objetivo_punto_recuperacion VALUES("1","RPO-01","Inicio de falla");
INSERT INTO cat_objetivo_punto_recuperacion VALUES("2","RPO-02","Mayor a Inicio de falla y menor ó igual a 3 hrs.");
INSERT INTO cat_objetivo_punto_recuperacion VALUES("3","RPO-03","Mayor a 3 hrs. y menor ó igual a 6 hrs.");
INSERT INTO cat_objetivo_punto_recuperacion VALUES("4","RPO-04","Mayor a 6 hrs. y menor ó igual a 12 hrs.");
INSERT INTO cat_objetivo_punto_recuperacion VALUES("5","RPO-05","Mayor a 12 hrs. y menor ó igual a 24 hrs.");
INSERT INTO cat_objetivo_punto_recuperacion VALUES("6","RPO-06","Mayor a 24 hrs.");



DROP TABLE cat_objetivo_tiempo_recuperacion;

CREATE TABLE `cat_objetivo_tiempo_recuperacion` (
  `clave_rto` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_rto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_rto` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`clave_rto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_objetivo_tiempo_recuperacion VALUES("1","RTO-01","Menor ó igual 3 hrs.");
INSERT INTO cat_objetivo_tiempo_recuperacion VALUES("2","RTO-02","Mayor a 3 hrs. y menor ó igual a 6 hrs.");
INSERT INTO cat_objetivo_tiempo_recuperacion VALUES("3","RTO-03","Mayor a 6 hrs. y menor ó igual a 12 hrs.");
INSERT INTO cat_objetivo_tiempo_recuperacion VALUES("4","RTO-04","Mayor a 12 hrs. y menor ó igual a 24 hrs.");
INSERT INTO cat_objetivo_tiempo_recuperacion VALUES("6","RTO-06","Mayor a 48 hrs.");



DROP TABLE cat_periodos_criticos;

CREATE TABLE `cat_periodos_criticos` (
  `clave_periodos_criticos` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion_periodos_criticos` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`clave_periodos_criticos`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_periodos_criticos VALUES("1","Diario.");
INSERT INTO cat_periodos_criticos VALUES("2","Semanal.");
INSERT INTO cat_periodos_criticos VALUES("3","Quincenal.");
INSERT INTO cat_periodos_criticos VALUES("4","Fin de mes.");
INSERT INTO cat_periodos_criticos VALUES("5","Fin trimestre.");
INSERT INTO cat_periodos_criticos VALUES("6","Fin año.");



DROP TABLE cat_procesos;

CREATE TABLE `cat_procesos` (
  `clave_proceso` int(10) NOT NULL AUTO_INCREMENT,
  `clave_area` int(10) DEFAULT NULL,
  `nombre_proceso` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `objetivo_proceso` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion_proceso` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`clave_proceso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE cat_sistemas;

CREATE TABLE `cat_sistemas` (
  `clave_sistema` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_sistema` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`clave_sistema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE cat_tiempo_afectacion;

CREATE TABLE `cat_tiempo_afectacion` (
  `clave_tiempo_afectacion` int(10) DEFAULT NULL,
  `descripcion_tiempo_afectacion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_tiempo_afectacion VALUES("1","De 0 a 30 mins.");
INSERT INTO cat_tiempo_afectacion VALUES("2","De 30 mins. a 1 hr.");
INSERT INTO cat_tiempo_afectacion VALUES("3","De 2 mins. a 3 hrs.");
INSERT INTO cat_tiempo_afectacion VALUES("4","6 hrs.");
INSERT INTO cat_tiempo_afectacion VALUES("5","12 hrs.");
INSERT INTO cat_tiempo_afectacion VALUES("6","24 hrs.");
INSERT INTO cat_tiempo_afectacion VALUES("7","48 hrs.");
INSERT INTO cat_tiempo_afectacion VALUES("8","72 hrs.");



DROP TABLE cat_tiempo_maximo_fs;

CREATE TABLE `cat_tiempo_maximo_fs` (
  `clave_tiempo_maximo_fs` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion_tiempo_maximo_fs` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`clave_tiempo_maximo_fs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE cat_tipo_personal;

CREATE TABLE `cat_tipo_personal` (
  `clave_tipo_personal` int(10) DEFAULT NULL,
  `descripcion_tipo_personal` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_tipo_personal VALUES("1","Principal");
INSERT INTO cat_tipo_personal VALUES("2","Alterno");



DROP TABLE cat_tipo_respaldos;

CREATE TABLE `cat_tipo_respaldos` (
  `clave_tipo_respaldo` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion_tipo_respaldo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`clave_tipo_respaldo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_tipo_respaldos VALUES("1","Diario");
INSERT INTO cat_tipo_respaldos VALUES("2","Incremental");
INSERT INTO cat_tipo_respaldos VALUES("3","Full semanal");
INSERT INTO cat_tipo_respaldos VALUES("4","Mensual");
INSERT INTO cat_tipo_respaldos VALUES("5","Otro");



DROP TABLE cat_tipos_impactos_financieros;

CREATE TABLE `cat_tipos_impactos_financieros` (
  `clave_impacto_financiero` int(10) DEFAULT NULL,
  `descripcion_impacto_financiero` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO cat_tipos_impactos_financieros VALUES("1","0 - 500");
INSERT INTO cat_tipos_impactos_financieros VALUES("2","500 - 1,000");
INSERT INTO cat_tipos_impactos_financieros VALUES("3","1,000 - 2,500");
INSERT INTO cat_tipos_impactos_financieros VALUES("4","2,500 - 5,000");
INSERT INTO cat_tipos_impactos_financieros VALUES("5","5,000 - 10,000.");
INSERT INTO cat_tipos_impactos_financieros VALUES("6","10,000 - 30,000.");
INSERT INTO cat_tipos_impactos_financieros VALUES("7","Mas de 30,0000.");



DROP TABLE dependencias_tecnologicas;

CREATE TABLE `dependencias_tecnologicas` (
  `clave_proceso` int(10) DEFAULT NULL,
  `num_dependencia_proceso` int(10) DEFAULT NULL,
  `area_dependencia` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `servicio` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dependencia_interna` char(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dependencia_externa` char(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dependencia_entrada` char(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dependencia_salida` char(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave_nivel_dependencia` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE impactos_financiero;

CREATE TABLE `impactos_financiero` (
  `clave_proceso` int(10) NOT NULL,
  `consecutivo_impacto_financiero` int(10) DEFAULT NULL,
  `clave_tiempo_afectacion` int(10) NOT NULL,
  `clave_impacto_financiero` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE impactos_no_financieros;

CREATE TABLE `impactos_no_financieros` (
  `clave_proceso` int(10) DEFAULT NULL,
  `clave_impacto_no_fin` int(10) DEFAULT NULL,
  `clave_nivel_imp_no_fin` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE interdependencias_externas;

CREATE TABLE `interdependencias_externas` (
  `clave_proceso` int(10) DEFAULT NULL,
  `clave_interdependencia_externa` int(10) DEFAULT NULL,
  `nombre_proveedor` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `informacion_requerida_entrada_externa` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `informacion_comprometida_salida_externa` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE interdependencias_internas;

CREATE TABLE `interdependencias_internas` (
  `clave_proceso` int(10) DEFAULT NULL,
  `clave_interdependencia_interna` int(10) DEFAULT NULL,
  `area_interdependencia_interna` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `informacion_requerida_entrada_interna` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `informacion_comprometida_salida_interna` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE inventario_procesos;

CREATE TABLE `inventario_procesos` (
  `clave_proceso` int(10) NOT NULL,
  `clave_criticidad_proceso` int(10) DEFAULT NULL,
  `clave_tiempo_maximo_fs` int(10) DEFAULT NULL,
  `clave_lider_proyecto` int(10) DEFAULT NULL,
  `clave_jefes_inmediatos` int(10) DEFAULT NULL,
  `personal_operacion_normal` int(10) DEFAULT NULL,
  `personal_operacion_contingencia` int(10) DEFAULT NULL,
  `clave_rto` int(10) DEFAULT NULL,
  `clave_rpo` int(10) DEFAULT NULL,
  `clave_frecuencia_proceso` int(10) DEFAULT NULL,
  `clave_periodos_criticos` int(10) DEFAULT NULL,
  `promedio_transacciones_mensuales` decimal(20,2) DEFAULT NULL,
  `procedimiento_alterno` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE multas_penalizaciones;

CREATE TABLE `multas_penalizaciones` (
  `clave_proceso` int(10) DEFAULT NULL,
  `consecutivo_tiempo_afectacion_multa` int(10) NOT NULL,
  `clave_tiempo_afectacion_multa` int(10) DEFAULT NULL,
  `clave_impacto_financiero_multa` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE operacion_proceso;

CREATE TABLE `operacion_proceso` (
  `clave_proceso` int(10) DEFAULT NULL,
  `hora_0` int(10) DEFAULT NULL,
  `hora_1` int(10) DEFAULT NULL,
  `hora_2` int(10) DEFAULT NULL,
  `hora_3` int(10) DEFAULT NULL,
  `hora_4` int(10) DEFAULT NULL,
  `hora_5` int(10) DEFAULT NULL,
  `hora_6` int(10) DEFAULT NULL,
  `hora_7` int(10) DEFAULT NULL,
  `hora_8` int(10) DEFAULT NULL,
  `hora_9` int(10) DEFAULT NULL,
  `hora_10` int(10) DEFAULT NULL,
  `hora_11` int(10) DEFAULT NULL,
  `hora_12` int(10) DEFAULT NULL,
  `hora_13` int(10) DEFAULT NULL,
  `hora_14` int(10) DEFAULT NULL,
  `hora_15` int(10) DEFAULT NULL,
  `hora_16` int(10) DEFAULT NULL,
  `hora_17` int(10) DEFAULT NULL,
  `hora_18` int(10) DEFAULT NULL,
  `hora_19` int(10) DEFAULT NULL,
  `hora_20` int(10) DEFAULT NULL,
  `hora_21` int(10) DEFAULT NULL,
  `hora_22` int(10) DEFAULT NULL,
  `hora_23` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE procesa_ciclico;

CREATE TABLE `procesa_ciclico` (
  `clave_proceso` int(10) DEFAULT NULL,
  `enero` int(10) DEFAULT NULL,
  `febrero` int(10) DEFAULT NULL,
  `marzo` int(10) DEFAULT NULL,
  `abril` int(10) DEFAULT NULL,
  `mayo` int(10) DEFAULT NULL,
  `junio` int(10) DEFAULT NULL,
  `julio` int(10) DEFAULT NULL,
  `agosto` int(10) DEFAULT NULL,
  `septiembre` int(10) DEFAULT NULL,
  `octubre` int(10) DEFAULT NULL,
  `noviembre` int(10) DEFAULT NULL,
  `diciembre` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE proceso_personal_tipopersonal;

CREATE TABLE `proceso_personal_tipopersonal` (
  `clave_proceso` int(10) DEFAULT NULL,
  `clave_personal` int(10) DEFAULT NULL,
  `clave_tipo_personal` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE proceso_proveedor;

CREATE TABLE `proceso_proveedor` (
  `clave_proceso` int(10) DEFAULT NULL,
  `consecutivo_proveedor` int(10) DEFAULT NULL,
  `clave_provedor` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE proceso_sistemas;

CREATE TABLE `proceso_sistemas` (
  `clave_proceso` int(10) NOT NULL,
  `consecutivo_sistema` int(10) NOT NULL,
  `clave_sistema` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE requerimientos_bcp;

CREATE TABLE `requerimientos_bcp` (
  `clave_proceso` int(10) DEFAULT NULL,
  `pc_on` int(10) DEFAULT NULL,
  `pc_oc` int(10) DEFAULT NULL,
  `telefono_on` int(10) DEFAULT NULL,
  `telefono_oc` int(10) DEFAULT NULL,
  `impresora_on` int(10) DEFAULT NULL,
  `impresora_oc` int(10) DEFAULT NULL,
  `laptop_on` int(10) DEFAULT NULL,
  `laptop_oc` int(10) DEFAULT NULL,
  `vpninternet_on` int(10) DEFAULT NULL,
  `vpninternet_oc` int(10) DEFAULT NULL,
  `escritorio_on` int(10) DEFAULT NULL,
  `escritorio_oc` int(10) DEFAULT NULL,
  `papeleria` int(10) DEFAULT NULL,
  `otros` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




DROP TABLE respaldos_proceso;

CREATE TABLE `respaldos_proceso` (
  `clave_proceso` int(10) DEFAULT NULL,
  `clave_tipo_respaldo` int(10) DEFAULT NULL,
  `clave_medio_respaldo` int(10) DEFAULT NULL,
  `lugar_donde_respaldan` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lugar_almacenamiento_respaldo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `personal_realiza_respaldo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




