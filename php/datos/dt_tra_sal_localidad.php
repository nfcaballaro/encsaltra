<?php
class dt_tra_sal_localidad extends saludytrabajo_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['descripcion'])) {
			$where[] = "descripcion ILIKE ".quote("%{$filtro['descripcion']}%");
		}
		if (isset($filtro['id_provincia'])) {
			$where[] = "id_provincia = ".quote($filtro['id_provincia']);
		}
		$sql = "SELECT
			t_tsl.id_tra_sal_localidad,
			t_tsl.descripcion,
			t_tsp.descripcion as id_provincia_nombre
		FROM
			tra_sal_localidad as t_tsl    LEFT OUTER JOIN tra_sal_provincia as t_tsp ON (t_tsl.id_provincia = t_tsp.id_tra_sal_provincia)
		ORDER BY descripcion";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('saludytrabajo')->consultar($sql);
	}

	function get_descripciones()
	{
		$sql = "SELECT id_tra_sal_localidad, descripcion FROM tra_sal_localidad ORDER BY descripcion";
		return toba::db('saludytrabajo')->consultar($sql);
	}
	
	function get_localidad($id_provincia)
	{
		$sql = "SELECT id_tra_sal_localidad, descripcion FROM tra_sal_localidad WHERE id_provincia =".$id_provincia." ORDER BY 2";
		return toba::db('saludytrabajo')->consultar($sql);
	}

}
?>