
------------------------------------------------------------
-- apex_usuario_grupo_acc
------------------------------------------------------------
INSERT INTO apex_usuario_grupo_acc (proyecto, usuario_grupo_acc, nombre, nivel_acceso, descripcion, vencimiento, dias, hora_entrada, hora_salida, listar, permite_edicion) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	'Administrador', --nombre
	'0', --nivel_acceso
	'Accede a toda la funcionalidad', --descripcion
	NULL, --vencimiento
	NULL, --dias
	NULL, --hora_entrada
	NULL, --hora_salida
	NULL, --listar
	'1'  --permite_edicion
);

------------------------------------------------------------
-- apex_usuario_grupo_acc_item
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'2'  --item
);
--- FIN Grupo de desarrollo 0

--- INICIO Grupo de desarrollo 1
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000360'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000363'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000364'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000365'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000366'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000367'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000369'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000370'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000371'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000372'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000373'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000374'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000375'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encsaltra', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'1000376'  --item
);
--- FIN Grupo de desarrollo 1
