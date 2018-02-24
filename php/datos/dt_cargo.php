<?php
class dt_cargo extends toba_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['descripcion'])) {
			$where[] = "descripcion ILIKE ".quote("%{$filtro['descripcion']}%");
		}
		$sql = "SELECT
			t_c.id_cargo,
			t_c.descripcion
		FROM
			cargo as t_c
		ORDER BY id_cargo";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('encsaltra')->consultar($sql);
	}

	function get_descripciones()
	{
		$sql = "SELECT id_cargo, descripcion FROM cargo ORDER BY id_cargo";
		return toba::db('encsaltra')->consultar($sql);
	}

}
?>