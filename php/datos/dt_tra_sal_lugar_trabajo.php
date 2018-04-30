<?php
class dt_tra_sal_lugar_trabajo extends saludytrabajo_datos_tabla
{
		
	function get_descripciones()
	{
		$sql = "SELECT id_tra_sal_lugar_trabajo, descripcion FROM tra_sal_lugar_trabajo ORDER BY descripcion";
		return toba::db('saludytrabajo')->consultar($sql);
	}

	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['descripcion'])) {
			$where[] = "descripcion ILIKE ".quote("%{$filtro['descripcion']}%");
		}
		$sql = "SELECT
			t_tslt.id_tra_sal_lugar_trabajo,
			t_tslt.descripcion
		FROM
			tra_sal_lugar_trabajo as t_tslt
		ORDER BY descripcion";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('saludytrabajo')->consultar($sql);
	}

}
?>