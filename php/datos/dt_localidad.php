<?php
class dt_localidad extends encsaltra_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['descripcion'])) {
			$where[] = "descripcion ILIKE ".quote("%{$filtro['descripcion']}%");
		}
		$sql = "SELECT
			t_l.id_localidad,
			t_l.descripcion
		FROM
			localidad as t_l
		ORDER BY descripcion";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('encsaltra')->consultar($sql);
	}

	function get_descripciones()
	{
		$sql = "SELECT id_localidad, descripcion FROM localidad ORDER BY descripcion";
		return toba::db('encsaltra')->consultar($sql);
	}

}
?>