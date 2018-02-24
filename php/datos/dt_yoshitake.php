<?php
class dt_yoshitake extends toba_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['indice'])) {
			$where[] = "indice = ".quote($filtro['indice']);
		}
		if (isset($filtro['tipo_fatiga'])) {
			$where[] = "tipo_fatiga = ".quote($filtro['tipo_fatiga']);
		}
		
		$sql = "SELECT
			t_y.id_yoshitake,
			t_y.id_encuesta,
			e.nro_encuesta,
			t_y.indice,
			t_y.tipo_fatiga,
			f.descripcion as tipo_fatiga_nombre
		FROM
			yoshitake as t_y,
			fatiga as f,
			encuesta e
		WHERE t_y.tipo_fatiga = f.id
			AND t_y.id_encuesta = e.id_encuesta ORDER BY t_y.id_encuesta";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('encsaltra')->consultar($sql);
	}


}
?>