<?php
class dt_tra_sal_ba extends saludytrabajo_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['id_tra_sal_justicia_arg'])) {
			$where[] = "id_tra_sal_justicia_arg = ".quote($filtro['id_tra_sal_justicia_arg']);
		}
		if (isset($filtro['id_tra_sal_ba'])) {
			$where[] = "id_tra_sal_ba = ".quote($filtro['id_tra_sal_ba']);
		}
		$sql = "SELECT
			t_tsb.id_tra_sal_justicia_arg,
			t_tsb.id_tra_sal_ba,
			t_tsb.a_olvidar_problemas,
			t_tsb.a_afecta_emocionalmente,
			t_tsb.a_decisiones_dificiles,
			t_tsb.a_mucha_concentracion,
			t_tsb.a_influencia_trabajo,
			t_tsb.a_exigencias,
			t_tsb.a_trabajo_casa,
			t_tsb.a_descanso,
			t_tsb.a_iniciativa,
			t_tsb.a_aprender,
			t_tsb.a_comprometido,
			t_tsb.a_satisfaccion,
			t_tsb.a_recursos_necesarios,
			t_tsb.a_exigencias_contradictorias,
			t_tsb.a_tareas_innecesarias,
			t_tsb.a_tareas_responsable,
			t_tsb.a_tareas_realizar_trabajo,
			t_tsb.a_parte_grupo,
			t_tsb.a_planifican_trabajo,
			t_tsb.a_comunicacion_dependientes,
			t_tsb.b_medicacion,
			t_tsb.b_calmantes,
			t_tsb.b_relajantes,
			t_tsb.b_psicofarmacos,
			t_tsb.b_aparato_digestivo,
			t_tsb.b_cardiaco,
			t_tsb.b_antialergico,
			t_tsb.b_otros,
			t_tsb.b_tratamiento_atencion,
			t_tsb.b_diagnostico,
			t_tsb.c_trabajo_familiar
		FROM
			tra_sal_ba as t_tsb
		ORDER BY b_otros";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('saludytrabajo')->consultar($sql);
	}

}

?>