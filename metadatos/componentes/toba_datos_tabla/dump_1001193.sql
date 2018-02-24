------------------------------------------------------------
--[1001193]--  jurisdiccion 
------------------------------------------------------------

------------------------------------------------------------
-- apex_objeto
------------------------------------------------------------

--- INICIO Grupo de desarrollo 1
INSERT INTO apex_objeto (proyecto, objeto, anterior, identificador, reflexivo, clase_proyecto, clase, punto_montaje, subclase, subclase_archivo, objeto_categoria_proyecto, objeto_categoria, nombre, titulo, colapsable, descripcion, fuente_datos_proyecto, fuente_datos, solicitud_registrar, solicitud_obj_obs_tipo, solicitud_obj_observacion, parametro_a, parametro_b, parametro_c, parametro_d, parametro_e, parametro_f, usuario, creacion, posicion_botonera) VALUES (
	'encsaltra', --proyecto
	'1001193', --objeto
	NULL, --anterior
	NULL, --identificador
	NULL, --reflexivo
	'toba', --clase_proyecto
	'toba_datos_tabla', --clase
	'1000006', --punto_montaje
	'dt_jurisdiccion', --subclase
	'datos/dt_jurisdiccion.php', --subclase_archivo
	NULL, --objeto_categoria_proyecto
	NULL, --objeto_categoria
	'jurisdiccion', --nombre
	NULL, --titulo
	NULL, --colapsable
	NULL, --descripcion
	'encsaltra', --fuente_datos_proyecto
	'encsaltra', --fuente_datos
	NULL, --solicitud_registrar
	NULL, --solicitud_obj_obs_tipo
	NULL, --solicitud_obj_observacion
	NULL, --parametro_a
	NULL, --parametro_b
	NULL, --parametro_c
	NULL, --parametro_d
	NULL, --parametro_e
	NULL, --parametro_f
	NULL, --usuario
	'2017-03-06 22:25:06', --creacion
	NULL  --posicion_botonera
);
--- FIN Grupo de desarrollo 1

------------------------------------------------------------
-- apex_objeto_db_registros
------------------------------------------------------------
INSERT INTO apex_objeto_db_registros (objeto_proyecto, objeto, max_registros, min_registros, punto_montaje, ap, ap_clase, ap_archivo, tabla, tabla_ext, alias, modificar_claves, fuente_datos_proyecto, fuente_datos, permite_actualizacion_automatica, esquema, esquema_ext) VALUES (
	'encsaltra', --objeto_proyecto
	'1001193', --objeto
	NULL, --max_registros
	NULL, --min_registros
	'1000006', --punto_montaje
	'1', --ap
	NULL, --ap_clase
	NULL, --ap_archivo
	'jurisdiccion', --tabla
	NULL, --tabla_ext
	NULL, --alias
	NULL, --modificar_claves
	'encsaltra', --fuente_datos_proyecto
	'encsaltra', --fuente_datos
	'1', --permite_actualizacion_automatica
	'public', --esquema
	NULL  --esquema_ext
);

------------------------------------------------------------
-- apex_objeto_db_registros_col
------------------------------------------------------------

--- INICIO Grupo de desarrollo 1
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encsaltra', --objeto_proyecto
	'1001193', --objeto
	'1001804', --col_id
	'id_jurisdiccion', --columna
	'E', --tipo
	'1', --pk
	'jurisdiccion_id_jurisdiccion_seq', --secuencia
	NULL, --largo
	NULL, --no_nulo
	'1', --no_nulo_db
	NULL, --externa
	NULL  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encsaltra', --objeto_proyecto
	'1001193', --objeto
	'1001805', --col_id
	'descripcion', --columna
	'C', --tipo
	'0', --pk
	NULL, --secuencia
	'200', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	NULL  --tabla
);
--- FIN Grupo de desarrollo 1
