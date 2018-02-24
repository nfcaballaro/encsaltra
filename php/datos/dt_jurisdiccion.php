<?php
class dt_jurisdiccion extends toba_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['descripcion'])) {
			$where[] = "descripcion ILIKE ".quote("%{$filtro['descripcion']}%");
		}
		$sql = "SELECT
			t_j.id_jurisdiccion,
			t_j.descripcion
		FROM
			jurisdiccion as t_j
		ORDER BY id_jurisdiccion";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('encsaltra')->consultar($sql);
	}

	function get_descripciones()
	{
		$sql = "SELECT id_jurisdiccion, descripcion FROM jurisdiccion ORDER BY id_jurisdiccion";
		return toba::db('encsaltra')->consultar($sql);
	}

}
?>