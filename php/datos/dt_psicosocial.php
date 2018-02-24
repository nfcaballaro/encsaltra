<?php
class dt_psicosocial extends toba_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['nro_encuesta'])) {
			$where[] = "t_e.nro_encuesta= ".quote($filtro['nro_encuesta']);
		}
		$sql = "SELECT
			t_p.id_psicosocial,
			t_p.id_encuesta,        
			t_p.psico,
			t_p.trab_act,
			t_p.inseg_lab,
			t_p.ap_soc,
			t_p.trabajo_familiar_tar_dom,
			t_p.rec_lab,
			t_p.psico_color,
			t_p.trab_act_color,
			t_p.inseg_lab_color,
			t_p.ap_soc_color,
			t_p.trabajo_familiar_tar_dom_color,
			t_p.rec_lab_color,
			t_e.nro_encuesta
		FROM
			psicosocial as t_p    LEFT OUTER JOIN encuesta as t_e ON (t_p.id_encuesta = t_e.id_encuesta)";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('encsaltra')->consultar($sql);
	}

}
?>