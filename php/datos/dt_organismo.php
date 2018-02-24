<?php
class dt_organismo extends toba_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['id_jurisdiccion'])) {
			$where[] = "t_o.id_jurisdiccion = ".quote($filtro['id_jurisdiccion']);
		}
		if (isset($filtro['descripcion'])) {
			$where[] = "t_o.descripcion ILIKE ".quote("%{$filtro['descripcion']}%");
		}
		$sql = "SELECT
			t_o.id_organismo,
			t_j.descripcion as id_jurisdiccion_nombre,
			t_o.descripcion
		FROM
			organismo as t_o    LEFT OUTER JOIN jurisdiccion as t_j ON (t_o.id_jurisdiccion = t_j.id_jurisdiccion)
		ORDER BY descripcion";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('encsaltra')->consultar($sql);
	}

	function get_organismos($id_jurisdiccion) 
	{
		
		$sql = "SELECT
			t_o.id_organismo,   
			t_o.descripcion
		FROM
			organismo as t_o 
		WHERE t_o.id_jurisdiccion = ".$id_jurisdiccion." ";
		
		return toba::db('encsaltra')->consultar($sql);
	}
}
?>