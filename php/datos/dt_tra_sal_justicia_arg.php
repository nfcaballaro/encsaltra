<?php
class dt_tra_sal_justicia_arg extends saludytrabajo_datos_tabla
{
	function get_listado($filtro=array(), $usuario)
	{
		
			










/* SELECT
			t_tsja.id_tra_sal_justicia_arg,
			t_tsja.sexo,
			t_tsja.edad,
			t_tsja.fecha_ingreso,
			t_tsja.fecha_nacimiento,
			t_tsl.descripcion as id_localidad_nombre,
			t_tslt.descripcion as id_lugar_trabajo_nombre,
			t_tsja.mala_iluminacion,
			t_tsja.humedad,
			t_tsja.temperaturas_elevadas,
			t_tsja.ausencia_sanitarios,
			t_tsja.hacinamiento,
			t_tsja.ruidos,
			t_tsja.posiciones_incomodas,
			t_tsja.carga_trabajo,
			t_tsja.organizar_trabajo,
			t_tsja.ayuda_companieros,
			t_tsja.ayuda_superior,
			t_tsja.situaciones_tension,
			t_tsja.violencia_laboral,
			t_tsja.agotado_tensionado,
			t_tsja.sintoma_vision,
			t_tsja.sintoma_muscular,
			t_tsja.sintoma_insomio,
			t_tsja.sintoma_palpitaciones,
			t_tsja.sintoma_respirar,
			t_tsja.sintoma_tristeza_desgano,
			t_tsja.sintoma_angustia,
			t_tsja.sintoma_trastorno_digestivo,
			t_tsja.sintoma_vinculado_trabajo,
			t_tsja.licencia_enfermedad,
			t_tsja.observaciones,
			t_tsja.situaciones_tension_superior,
			t_tsja.lugar_trabajo_otros,
			t_tsja.estamento, 
			t_tsja.lugar_trabajo_especifico, 
			t_tsja.lugar_trabajo_especifico_otro, 
			t_tsja.ventilacion, 
			t_tsja.horas_trabajo
		FROM
			tra_sal_justicia_arg as t_tsja    LEFT OUTER JOIN tra_sal_localidad as t_tsl ON (t_tsja.id_localidad = t_tsl.id_tra_sal_localidad)
			LEFT OUTER JOIN tra_sal_lugar_trabajo as t_tslt ON (t_tsja.id_lugar_trabajo = t_tslt.id_tra_sal_lugar_trabajo)
		ORDER BY id_tra_sal_justicia_arg
			*/
		$where = array();
		if (isset($filtro['id_tra_sal_justicia_arg'])) {
			$where[] = "id_tra_sal_justicia_arg = ".quote($filtro['id_tra_sal_justicia_arg']);
		}
		if (isset($filtro['id_localidad'])) {
			$where[] = "id_localidad = ".quote($filtro['id_localidad']);
		}
		if (isset($filtro['id_lugar_trabajo'])) {
			$where[] = "id_lugar_trabajo = ".quote($filtro['id_lugar_trabajo']);
		}
		if($usuario == 'toba' || $usuario == 'administrador'){
			//muestra todo
		}else {
			$where[] = "t_tsja.usuario like '%".$usuario."%'";
			}
		/** SELECT ANTERIOR
			t_tsja.id_tra_sal_justicia_arg,
			
						(case
when (t_tsja.sexo = 0) then 'SIN DATOS'
when (t_tsja.sexo = 1) then 'FEMENINO'
when (t_tsja.sexo = 2) then 'MASCULINO'
when (t_tsja.sexo = 3) then 'OTROS'
	END
) as sexo,
			
			t_tsja.edad,
			t_tsja.fecha_ingreso,
			t_tsja.fecha_nacimiento,
			t_tsl.descripcion as id_localidad_nombre,
			t_tsat.descripcion as id_lugar_trabajo_nombre,
			t_tsja.mala_iluminacion,
			t_tsja.humedad,
			t_tsja.temperaturas_elevadas,
			t_tsja.ausencia_sanitarios,
			t_tsja.hacinamiento,
			t_tsja.ruidos,
			t_tsja.posiciones_incomodas,
			t_tsja.carga_trabajo,
			t_tsja.organizar_trabajo,
			t_tsja.ayuda_companieros,
			t_tsja.ayuda_superior,
			t_tsja.situaciones_tension,
			t_tsja.violencia_laboral,
			t_tsja.agotado_tensionado,
			t_tsja.sintoma_vision,
			t_tsja.sintoma_muscular,
			t_tsja.sintoma_insomio,
			t_tsja.sintoma_palpitaciones,
			t_tsja.sintoma_respirar,
			t_tsja.sintoma_tristeza_desgano,
			t_tsja.sintoma_angustia,
			t_tsja.sintoma_trastorno_digestivo,
			t_tsja.sintoma_vinculado_trabajo,
			t_tsja.licencia_enfermedad,
			t_tsja.observaciones,
			t_tsja.situaciones_tension_superior,
			t_tsja.lugar_trabajo_otros,
			
			(case
when (t_tsja.estamento = 0) then 'SIN DATOS'
when (t_tsja.estamento = 1) then 'Empleado/a - Trabajador/a'
when (t_tsja.estamento = 2) then 'Funcionario/a'
	END
) as estamento,
			
			t_tslt.descripcion as lugar_trabajo_especifico_nombre, 
			t_tsja.lugar_trabajo_especifico_otro, 
			t_tsja.ventilacion, 
			t_tsja.horas_trabajo*/
		$sql = "
			SELECT
			t_tsja.id_tra_sal_justicia_arg,            
			(case
			when (t_tsja.sexo = 0) then 'SIN DATOS'
			when (t_tsja.sexo = 1) then 'FEMENINO'
			when (t_tsja.sexo = 2) then 'MASCULINO'
			when (t_tsja.sexo = 3) then 'OTROS'
			END) as sexo,            
			t_tsja.edad,
			t_tsja.fecha_ingreso,
			t_tsja.fecha_nacimiento,
			t_tsl.descripcion as id_localidad_nombre,
			t_tsat.descripcion as id_lugar_trabajo_nombre,
			(case
			when (t_tsja.mala_iluminacion = 0) then 'SIN DATOS'
			when (t_tsja.mala_iluminacion = 1) then 'SI'
			when (t_tsja.mala_iluminacion = 2) then 'NO'            
			END) as mala_iluminacion,
			
			(case
			when (t_tsja.humedad = 0) then 'SIN DATOS'
			when (t_tsja.humedad = 1) then 'SI'
			when (t_tsja.humedad = 2) then 'NO'            
			END) as humedad,
			
			(case
			when (t_tsja.temperaturas_elevadas = 0) then 'SIN DATOS'
			when (t_tsja.temperaturas_elevadas = 1) then 'SI'
			when (t_tsja.temperaturas_elevadas = 2) then 'NO'            
			END) as temperaturas_elevadas,
			
			(case
			when (t_tsja.ausencia_sanitarios = 0) then 'SIN DATOS'
			when (t_tsja.ausencia_sanitarios = 1) then 'SI'
			when (t_tsja.ausencia_sanitarios = 2) then 'NO'            
			END) as ausencia_sanitarios,
			
			(case
			when (t_tsja.hacinamiento = 0) then 'SIN DATOS'
			when (t_tsja.hacinamiento = 1) then 'SI'
			when (t_tsja.hacinamiento = 2) then 'NO'            
			END) as hacinamiento,
			
			(case
			when (t_tsja.ruidos = 0) then 'SIN DATOS'
			when (t_tsja.ruidos = 1) then 'SI'
			when (t_tsja.ruidos = 2) then 'NO'            
			END) as ruidos,
			
			(case
			when (t_tsja.posiciones_incomodas = 0) then 'SIN DATOS'
			when (t_tsja.posiciones_incomodas = 1) then 'SI'
			when (t_tsja.posiciones_incomodas = 2) then 'NO'            
			END) as posiciones_incomodas,
			
			(case
			when (t_tsja.carga_trabajo = 0) then 'SIN DATOS'
			when (t_tsja.carga_trabajo = 1) then 'SI'
			when (t_tsja.carga_trabajo = 2) then 'NO'            
			END) as carga_trabajo,
			
			(case
			when (t_tsja.organizar_trabajo = 0) then 'SIN DATOS'
			when (t_tsja.organizar_trabajo = 1) then 'SI'
			when (t_tsja.organizar_trabajo = 2) then 'NO'            
			END) as organizar_trabajo,
			
				(case
			when (t_tsja.ayuda_companieros = 0) then 'SIN DATOS'
			when (t_tsja.ayuda_companieros = 1) then 'SI'
			when (t_tsja.ayuda_companieros = 2) then 'NO'            
			END) as ayuda_companieros,
			
			(case
			when (t_tsja.ayuda_superior = 0) then 'SIN DATOS'
			when (t_tsja.ayuda_superior = 1) then 'SI'
			when (t_tsja.ayuda_superior = 2) then 'NO'            
			END) as ayuda_superior,
			
			(case
			when (t_tsja.situaciones_tension = 0) then 'SIN DATOS'
			when (t_tsja.situaciones_tension = 1) then 'SI'
			when (t_tsja.situaciones_tension = 2) then 'NO'            
			END) as situaciones_tension,
			
			(case
			when (t_tsja.violencia_laboral = 0) then 'SIN DATOS'
			when (t_tsja.violencia_laboral = 1) then 'SI'
			when (t_tsja.violencia_laboral = 2) then 'NO'            
			END) as violencia_laboral,
			
			(case
			when (t_tsja.agotado_tensionado = 0) then 'SIN DATOS'
			when (t_tsja.agotado_tensionado = 1) then 'SI'
			when (t_tsja.agotado_tensionado = 2) then 'NO'            
			END) as agotado_tensionado,
			
			(case
			when (t_tsja.sintoma_vision = 0) then 'SIN DATOS'
			when (t_tsja.sintoma_vision = 1) then 'SI'
			when (t_tsja.sintoma_vision = 2) then 'NO'            
			END) as sintoma_vision,
			
			(case
			when (t_tsja.sintoma_muscular = 0) then 'SIN DATOS'
			when (t_tsja.sintoma_muscular = 1) then 'SI'
			when (t_tsja.sintoma_muscular = 2) then 'NO'            
			END) as sintoma_muscular,
			
			(case
			when (t_tsja.sintoma_insomio = 0) then 'SIN DATOS'
			when (t_tsja.sintoma_insomio = 1) then 'SI'
			when (t_tsja.sintoma_insomio = 2) then 'NO'            
			END) as sintoma_insomio,
			
			(case
			when (t_tsja.sintoma_palpitaciones = 0) then 'SIN DATOS'
			when (t_tsja.sintoma_palpitaciones = 1) then 'SI'
			when (t_tsja.sintoma_palpitaciones = 2) then 'NO'            
			END) as sintoma_palpitaciones,
			
			(case
			when (t_tsja.sintoma_respirar = 0) then 'SIN DATOS'
			when (t_tsja.sintoma_respirar = 1) then 'SI'
			when (t_tsja.sintoma_respirar = 2) then 'NO'            
			END) as sintoma_respirar ,
			
			(case
			when (t_tsja.sintoma_tristeza_desgano = 0) then 'SIN DATOS'
			when (t_tsja.sintoma_tristeza_desgano = 1) then 'SI'
			when (t_tsja.sintoma_tristeza_desgano = 2) then 'NO'            
			END) as sintoma_tristeza_desgano ,
			
			(case
			when (t_tsja.sintoma_angustia = 0) then 'SIN DATOS'
			when (t_tsja.sintoma_angustia = 1) then 'SI'
			when (t_tsja.sintoma_angustia  = 2) then 'NO'            
			END) as sintoma_angustia,
			
			(case
			when (t_tsja.sintoma_trastorno_digestivo = 0) then 'SIN DATOS'
			when (t_tsja.sintoma_trastorno_digestivo = 1) then 'SI'
			when (t_tsja.sintoma_trastorno_digestivo = 2) then 'NO'            
			END) as sintoma_trastorno_digestivo,
			
			(case
			when (t_tsja.sintoma_vinculado_trabajo = 0) then 'SIN DATOS'
			when (t_tsja.sintoma_vinculado_trabajo = 1) then 'SI'
			when (t_tsja.sintoma_vinculado_trabajo = 2) then 'NO'            
			END) as sintoma_vinculado_trabajo,
			
			(case
			when (t_tsja.licencia_enfermedad = 0) then 'SIN DATOS'
			when (t_tsja.licencia_enfermedad = 1) then 'SI'
			when (t_tsja.licencia_enfermedad = 2) then 'NO'            
			END) as licencia_enfermedad,
			
			(case
			when (t_tsja.situaciones_tension_superior = 0) then 'SIN DATOS'
			when (t_tsja.situaciones_tension_superior = 1) then 'SI'
			when (t_tsja.situaciones_tension_superior = 2) then 'NO'            
			END) as situaciones_tension_superior,

			t_tsja.observaciones,
			t_tsja.lugar_trabajo_otros,
			
			(case
			when (t_tsja.estamento = 0) then 'SIN DATOS'
			when (t_tsja.estamento = 1) then 'Empleado/a - Trabajador/a'
			when (t_tsja.estamento = 2) then 'Funcionario/a'
			END ) as estamento,
			
			t_tslt.descripcion as lugar_trabajo_especifico_nombre, 
			t_tsja.lugar_trabajo_especifico_otro, 
			(case
			when (t_tsja.ventilacion = 0) then 'SIN DATOS'
			when (t_tsja.ventilacion = 1) then 'SI'
			when (t_tsja.ventilacion = 2) then 'NO'            
			END) as ventilacion,

			t_tsja.horas_trabajo
		FROM
			tra_sal_justicia_arg as t_tsja    LEFT OUTER JOIN tra_sal_localidad as t_tsl ON (t_tsja.id_localidad = t_tsl.id_tra_sal_localidad)
			LEFT OUTER JOIN tra_sal_lugar_trabajo as t_tslt ON (t_tsja.lugar_trabajo_especifico = t_tslt.id_tra_sal_lugar_trabajo)
			LEFT OUTER JOIN tra_sal_area_trabajo as t_tsat ON (t_tsja.id_lugar_trabajo = t_tsat.id_tra_sal_area_trabajo)
		ORDER BY id_tra_sal_justicia_arg
			";
		if (count($where)>0) {
			$sql = sql_concatenar_where($sql, $where);
		}
		return toba::db('saludytrabajo')->consultar($sql);
	}

}
?>