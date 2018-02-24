<?php
class dt_encuestas extends toba_datos_tabla
{
	function get_listado($filtro=array())
	{
		$where = array();
		if (isset($filtro['nro_encuesta'])) {
			$where[] = "nro_encuesta = ".quote($filtro['nro_encuesta']);
		}
		if (isset($filtro['nombre_apellido'])) {
			$where[] = "nombre_apellido ILIKE ".quote("%{$filtro['nombre_apellido']}%");
		}
		if (isset($filtro['edad'])) {
			$where[] = "edad = ".quote($filtro['edad']);
		}
		if (isset($filtro['sexo'])) {
			$where[] = "sexo = ".quote($filtro['sexo']);
		}
		if (isset($filtro['estado_civil'])) {
			$where[] = "estado_civil = ".quote($filtro['estado_civil']);
		}
		if (isset($filtro['nivel_educacion'])) {
			$where[] = "nivel_educacion = ".quote($filtro['nivel_educacion']);
		}
		if (isset($filtro['relacion_contractual'])) {
			$where[] = "relacion_contractual = ".quote($filtro['relacion_contractual']);
		}
		if (isset($filtro['organismo'])) {
			$where[] = "organismo ILIKE ".quote("%{$filtro['organismo']}%");
		}
		if (isset($filtro['cargo'])) {
			$where[] = "cargo ILIKE ".quote("%{$filtro['cargo']}%");
		}
		if (isset($filtro['ciudad_laboral'])) {
			$where[] = "ciudad_laboral ILIKE ".quote("%{$filtro['ciudad_laboral']}%");
		}
		$sql = "SELECT
			t_e.id_encuesta,
			t_e.nro_encuesta,
			t_e.nombre_apellido,
			t_e.edad,
			t_e.fecha_nacimiento,
			t_e.sexo,
			t_e.estado_civil,
			t_e.nivel_educacion,
			t_e.nivel_educacion_disc,
			t_e.relacion_contractual,
			t_e.organismo,
			t_e.cargo,
			t_e.fecha_ingreso_stj,
			t_e.fecha_ingreso_organismo,
			t_e.ciudad_laboral,
			t_e.temperatura_laboral,
			t_e.temperatura_laboral_epoca,
			t_e.humedad_laboral,
			t_e.ventilacion_laboral,
			t_e.ruidos,
			t_e.caracteristicas_iluminacion,
			t_e.tipo_iluminacion,
			t_e.variacion_iluminacion,
			t_e.tarea_de_pie,
			t_e.tarea_hablar_mucho,
			t_e.tarea_sentado_incomodo,
			t_e.tarea_esfuerzos_fisicos,
			t_e.tarea_postura_incomoda,
			t_e.trabajo_excesivo,
			t_e.lug_trab_comodo,
			t_e.lug_trab_buena_iluminacion,
			t_e.lug_trab_utiles_suficientes,
			t_e.lug_trab_utiles_buen_estado,
			t_e.lug_trab_oficina_esc_comodo,
			t_e.lug_trab_oficina_silla_ergo,
			t_e.lug_trab_sanitarios,
			t_e.lug_trab_vista_exterior,
			t_e.lug_trab_hacinamiento,
			t_e.lug_trab_trabaja_computadora,
			t_e.lug_trab_pantalla_proteccion,
			t_e.lug_trab_reflejos_pantalla,
			t_e.lug_trab_adecuada_ubi_comp,
			t_e.lug_trab_atril_material_copia,
			t_e.lug_trab_mesa_adecuada,
			t_e.lug_trab_anteojos,
			t_e.psico_trabajo_rapido,
			t_e.psico_dist_tareas_irregular,
			t_e.psico_tiempo_trabajo_al_dia,
			t_e.psico_olvidar_problemas,
			t_e.psico_desgastador_emocionalmente,
			t_e.psico_trabajo_esconder_emociones,
			t_e.trab_act_influ_cantidad_trabajo,
			t_e.trab_act_opi_en_asignacion_tareas,
			t_e.trab_act_influ_orden_tareas,
			t_e.trab_act_decidir_descanso,
			t_e.trab_act_permiso_especial,
			t_e.trab_act_iniciativa,
			t_e.trab_act_aprendizaje,
			t_e.trab_act_comprometido_profesion,
			t_e.trab_act_sentido_tareas,
			t_e.trab_act_entusiasmo_trabajo,
			t_e.inseg_lab_encontrar_otro_trabajo,
			t_e.inseg_lab_cambio_tareas,
			t_e.inseg_lab_varian_salario,
			t_e.inseg_lab_cambio_horario,
			t_e.ap_soc_autonomia_trabajo,
			t_e.ap_soc_tareas_responsable,
			t_e.ap_soc_antelacion_cambios,
			t_e.ap_soc_informacion_trabajo,
			t_e.ap_soc_recibe_ayuda_companieros,
			t_e.ap_soc_recibe_ayuda_superior,
			t_e.ap_soc_puesto_aislado,
			t_e.ap_soc_parte_grupo,
			t_e.ap_soc_planifican_trabajo,
			t_e.ap_soc_comunican_trabajadores,
			t_e.trabajo_familiar,
			t_e.trabajo_familiar_empleada,
			t_e.tar_dom_tareas_sin_hacer,
			t_e.tar_dom_piensa_tareas_familiares,
			t_e.tar_dom_lug_trab_casa,
			t_e.rec_lab_superiores,
			t_e.rec_lab_apoyo_necesario,
			t_e.rec_lab_trato_injusto,
			t_e.rec_lab_adecuado,
			t_e.tension_superiores_jerarquicos,
			t_e.tension_companieros,
			t_e.tension_personal_cargo,
			t_e.val_soc_importante_sociedad,
			t_e.val_soc_considerado_importante,
			t_e.val_soc_cuestionamiento_social,
			t_e.val_soc_capacitacion,
			t_e.val_soc_capacitacion_meses,
			t_e.estado_animo_siente,
			t_e.estado_animo_siente_otro,
			t_e.sintomas_dificultades_vision,
			t_e.sintomas_dolores_sentado,
			t_e.sintomas_dolores_actividades,
			t_e.sintomas_piernas,
			t_e.sintomas_insomnio_concentrarse,
			t_e.sintomas_abdominal_nauseas_diarrea,
			t_e.sintomas_palpitacion,
			t_e.sintomas_dificultad_respirar,
			t_e.sintomas_ronquera_garganta,
			t_e.sintomas_tos,
			t_e.sintomas_aumento_peso,
			t_e.sintomas_perdida_peso,
			t_e.sintomas_hormigueo_dolor_manos_pies,
			t_e.prob_sal_hipertension,
			t_e.prob_sal_depresion,
			t_e.prob_sal_alergias,
			t_e.prob_sal_diabetes,
			t_e.prob_sal_obesidad,
			t_e.prob_sal_respiratorias,
			t_e.prob_sal_cardiaca,
			t_e.prob_sal_asma,
			t_e.prob_sal_bronquitis_resfrios,
			t_e.prob_sal_cancer,
			t_e.prob_sal_dolor_espalda_cuello,
			t_e.prob_sal_ulcera_colon_gastritis,
			t_e.prob_sal_hpv,
			t_e.prob_sal_colesterol,
			t_e.prob_sal_no_apto_actividad_fisica,
			t_e.prob_sal_otro,
			t_e.presion_arterial_ejercicios,
			t_e.presion_arterial_control_peso,
			t_e.presion_arterial_disminuir_sal,
			t_e.presion_arterial_medicamentos,
			t_e.presion_arterial_otro,
			t_e.controles_presion_arterial,
			t_e.controles_colesterol,
			t_e.controles_glucemia,
			t_e.controles_peso,
			t_e.controles_mamografia,
			t_e.controles_colonoscopia,
			t_e.controles_cuello_uterino,
			t_e.controles_sangre_prostata,
			t_e.enf_fam_cancer,
			t_e.enf_fam_depresion,
			t_e.enf_fam_diabetes,
			t_e.enf_fam_cardiacas,
			t_e.enf_fam_hipertension,
			t_e.enf_fam_obesidad,
			t_e.peso_kg,
			t_e.peso_dificultades,
			t_e.talla_cm,
			t_e.sint_act_pesadez_cabeza,
			t_e.sint_act_cansancio_cuerpo,
			t_e.sint_act_cansancio_piernas,
			t_e.sint_act_bostezos,
			t_e.sint_act_confuso,
			t_e.sint_act_vista_cansada,
			t_e.sint_act_rigidez,
			t_e.sint_act_sonoliento,
			t_e.sint_act_pie_inquieta,
			t_e.sint_act_deseos_acostarse,
			t_e.sint_act_dificultad_pensar,
			t_e.sint_act_cansa_hablar,
			t_e.sint_act_nervioso,
			t_e.sint_act_incapaz_fijar_atencion,
			t_e.sint_act_incapaz_poner_atencion,
			t_e.sint_act_olvido_cosas,
			t_e.sint_act_perdida_confianza,
			t_e.sint_act_siente_ansioso,
			t_e.sint_act_posiciones_incorrectas_cuerpo,
			t_e.sint_act_pierde_paciencia,
			t_e.sint_act_dolor_cabeza,
			t_e.sint_act_entimecimiento_hombros,
			t_e.sint_act_dolor_espalda,
			t_e.sint_act_dificultad_respirar,
			t_e.sint_act_tiene_sed,
			t_e.sint_act_atontado,
			t_e.sint_act_voz_ronca,
			t_e.sint_act_tiemblan_parpados,
			t_e.sint_act_tiemblan_piernas_brazos,
			t_e.sint_act_enfermo,
			t_e.sint_ult_anio_acidez,
			t_e.sint_ult_anio_perdida_apetito,
			t_e.sint_ult_anio_deseos_vomitos,
			t_e.sint_ult_anio_dolores_abdominales,
			t_e.sint_ult_anio_diarreas_orinar,
			t_e.sint_ult_anio_dificultades_dormido,
			t_e.sint_ult_anio_pesadillas,
			t_e.sint_ult_anio_dolor_cabeza,
			t_e.sint_ult_anio_deseo_sexual,
			t_e.sint_ult_anio_mareos,
			t_e.sint_ult_anio_palpitaciones_latidos,
			t_e.sint_ult_anio_temblor_sudoracion_manos,
			t_e.sint_ult_anio_sudoracion_sin_esfuerzo,
			t_e.sint_ult_anio_falta_aire_sin_esfuerzo,
			t_e.sint_ult_anio_falta_energia_depresion,
			t_e.sint_ult_anio_fatiga_debilidad,
			t_e.sint_ult_anio_nerviosismo_ansiedad,
			t_e.sint_ult_anio_irritabilidad,
			t_e.trabajo_influencia_salud,
			t_e.areas_estado_salud,
			t_e.areas_calidad_suenio,
			t_e.areas_tipo_alimentacion,
			t_e.areas_actividad_fisica,
			t_e.areas_estado_animo,
			t_e.hijos,
			t_e.hijos_cantidad,
			t_e.hijos_edades,
			t_e.hijos_viven_usted,
			t_e.regimen_comidas,
			t_e.regimen_comidas_medico,
			t_e.fumo,
			t_e.fuma_actualmente,
			t_e.fuma_actualmente_cantidad,
			t_e.actividad_fisica,
			t_e.horas_suenio
		FROM
			encuesta as t_e
		ORDER BY id_encuesta";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('encsaltra')->consultar($sql);
	}

	function get_descripciones()
	{
		$sql = "SELECT id_encuesta, nombre_apellido FROM encuesta ORDER BY nombre_apellido";
		return toba::db('encsaltra')->consultar($sql);
	}
}
?>