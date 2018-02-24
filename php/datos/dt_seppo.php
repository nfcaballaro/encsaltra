<?php
class dt_seppo extends toba_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['valor'])) {
			$where[] = "valor = ".quote($filtro['valor']);
		}
		$sql = "SELECT
			t_s.id_seppo,
			t_s.valor,
			t_s.id_encuesta,
			t_s.estado,
			t_e.nro_encuesta
		FROM
			seppo as t_s    LEFT OUTER JOIN encuesta as t_e ON (t_s.id_encuesta = t_e.id_encuesta)
			ORDER BY t_s.id_encuesta";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('encsaltra')->consultar($sql);
	}

}
?>