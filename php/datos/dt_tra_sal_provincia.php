<?php
class dt_tra_sal_provincia extends saludytrabajo_datos_tabla
{

	function get_descripciones()
	{
		$sql = "SELECT id_tra_sal_provincia, descripcion FROM tra_sal_provincia ORDER BY descripcion";
		return toba::db('saludytrabajo')->consultar($sql);
	}

	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['descripcion'])) {
			$where[] = "descripcion ILIKE ".quote("%{$filtro['descripcion']}%");
		}
		$sql = "SELECT
			t_tsp.id_tra_sal_provincia,
			t_tsp.descripcion
		FROM
			tra_sal_provincia as t_tsp
		ORDER BY descripcion";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('saludytrabajo')->consultar($sql);
	}

}
?>