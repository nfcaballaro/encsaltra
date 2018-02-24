<?php
	
class Consultas {
	
	/**
	Retorna resultados por nivel_educativo
	**/
	static function get_nivel_educacion_frecuencia()
	{	 	
        $sql = "
			select 'SIN DATOS' as nivel, count(*) as cantidad
			from encuesta
			where nivel_educacion = 0
			union all
			select 'PRIMARIA' as nivel, count(*) as cantidad
			from encuesta
			where nivel_educacion = 1
			union all
			select 'SECUNDARIA' as nivel, count(*) as cantidad
			from encuesta
			where nivel_educacion = 2
			union all
			select 'TERCIARIA' as nivel, count(*) as cantidad
			from encuesta
			where nivel_educacion = 3
			union all
			select 'UNIVERSITARIA' as nivel, count(*) as cantidad
			from encuesta
			where nivel_educacion = 4
			union all
			select 'POSTGRADO' as nivel, count(*) as cantidad
			from encuesta
			where nivel_educacion = 5
			";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}	
	
	/**
	Retorna resultados por situacion_revista
	**/
	static function get_situacion_revista_frecuencia()
	{	 
        $sql = "select 'SIN DATOS' as situacion_revista, count(*) as cantidad
			from encuesta
			where relacion_contractual = 0
			union all
			select 'PLANTA PERMANENTE' as situacion_revista, count(*) as cantidad
			from encuesta
			where relacion_contractual = 1
			union all
			select 'INTERINO' as situacion_revista, count(*) as cantidad
			from encuesta
			where relacion_contractual = 2
			union all
			select 'SUPLENTE' as situacion_revista, count(*) as cantidad
			from encuesta
			where relacion_contractual = 3
			union all
			select 'TEMPORARIO' as situacion_revista, count(*) as cantidad
			from encuesta
			where relacion_contractual = 4
			";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}	
	
	/**
	Retorna resultados por estado_civil
	**/
	static function get_estado_civil_frecuencia()
	{	 
        $sql = "
			select 'SIN DATOS' as estado_civil, count(*) as cantidad
			from encuesta
			where estado_civil = 0
			union all
			select 'SOLTERA/O' as estado_civil, count(*) as cantidad
			from encuesta
			where estado_civil = 1
			union all
			select 'CASADA/O' as estado_civil, count(*) as cantidad
			from encuesta
			where estado_civil = 2
			union all
			select 'DIVORCIADA/O' as estado_civil, count(*) as cantidad
			from encuesta
			where estado_civil = 3
			union all
			select 'SEPARADA/O' as estado_civil, count(*) as cantidad
			from encuesta
			where estado_civil = 4
			union all
			select 'VIUDA/O' as estado_civil, count(*) as cantidad
			from encuesta
			where estado_civil = 5
			union all
			select 'UNION CONVIVENCIAL' as estado_civil, count(*) as cantidad
			from encuesta
			where estado_civil = 6";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}	
	
	/**
	Retorna resultados por jurisdiccion
	**/
	static function get_jurisdiccion_frecuencia()
	{	 
        $sql = "
			select j.descripcion as jurisdiccion, count(*) as cantidad
			from jurisdiccion j, organismo o, encuesta e
			where j.id_jurisdiccion = o.id_jurisdiccion
			and e.organismo = o.id_organismo
			group by j.descripcion";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}	
	
	/**
	Retorna resultados para grafico seppo
	**/
	static function get_seppo()
	{	 
        $sql = "
			select estado, count(*) as cantidad
			from seppo
			group by estado";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}	
	
	/**
	Retorna resultados para grafico get_yoshitake
	**/
	static function get_yoshitake()
	{	 
        $sql = "
			select fatiga.descripcion, count(*) as cantidad
			from yoshitake, fatiga
			where fatiga.id = yoshitake.tipo_fatiga
			group by fatiga.descripcion";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}	
	
	/**
	Retorna resultados para grafico get_psicosocial_psico_color
	**/
	static function get_psicosocial_psico_color()
	{	 
        $sql = "
			SELECT psico_color as tipo,
			count(*) as cantidad 
			FROM psicosocial
			GROUP BY psico_color ";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}	
	
	/**
	Retorna resultados para grafico get_psicosocial_trab_act_color
	**/
	static function get_psicosocial_trab_act_color()
	{	 
		$sql = "
			SELECT trab_act_color  as tipo,
			count(*) as cantidad
			FROM psicosocial
			GROUP BY   trab_act_color ";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}
	
	/**
	Retorna resultados para grafico get_psicosocial_inseg_lab_color
	**/
	static function get_psicosocial_inseg_lab_color()
	{	 
        $sql = "
			SELECT
			inseg_lab_color  as tipo,
			count(*) as cantidad  
			FROM psicosocial
			GROUP BY inseg_lab_color ";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}
	
	/**
	Retorna resultados para grafico get_psicosocial_ap_soc_color
	**/
	static function get_psicosocial_ap_soc_color()
	{	 
        $sql = "
			SELECT ap_soc_color  as tipo,
			count(*) as cantidad
			FROM psicosocial
			GROUP BY   ap_soc_color ";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}
	
	/**
	Retorna resultados para grafico get_psicosocial_trabajo_familiar_tar_dom_color
	**/
	static function get_psicosocial_trabajo_familiar_tar_dom_color()
	{	 
        $sql = "
			SELECT trabajo_familiar_tar_dom_color  as tipo,
			count(*) as cantidad
			FROM psicosocial
			GROUP BY   trabajo_familiar_tar_dom_color ";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}
	
	/**
	Retorna resultados para grafico get_psicosocial_rec_lab_color
	**/
	static function get_psicosocial_rec_lab_color()
	{	 
        $sql = "
			SELECT rec_lab_color  as tipo,
			count(*) as cantidad
			FROM psicosocial
			GROUP BY   rec_lab_color ";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}
		
	/**
    Retona la jursidicciión seleccionada
    **/
    static function get_jurisdiccion_seleccion($id_organismo)
    {
        $sql = "SELECT 
                      jurisdiccion.id_jurisdiccion
                  FROM 
                      jurisdiccion, organismo
                  WHERE
                      jurisdiccion.id_jurisdiccion = organismo.id_jurisdiccion
                      and id_organismo = ".$id_organismo." ORDER BY organismo.id_organismo";
        $result = toba::db()->consultar($sql);    
        if (! empty($result)) {
            return $result[0]['id_jurisdiccion'];
        }
    }
	
	/**
	Retorna consulta de distribucion por genero
	**/
	static function get_genero()
    {
		$sql = "
			select 'SIN DATOS' as genero, count(*) as cantidad
			from encuesta where sexo =0
			union all
			select 'FEMENINO' as genero, count(*) as cantidad
			from encuesta where sexo =1
			union all
			select 'MASCULINO' as genero, count(*) as cantidad
			from encuesta where sexo =2 ";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
        }

	/**
	Retorna consulta de distribucion por antiguedad
	**/
	static function get_antiguedad()
    {
		$sql = "select '0 a 5' as antiguedad, 
			count(*) as cantidad, 
			ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
			(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 0 and 5) as porc_acum  
			from encuesta where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 0 and 5
			union all
			select '6 a 10' as antiguedad, 
			count(*) as cantidad, 
			ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
			(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 0 and 10) as porc_acum  
			from encuesta where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 6 and 10
			union all
			select '11 a 15' as antiguedad, 
			count(*) as cantidad, 
			ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
			(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 0 and 15) as porc_acum  
			from encuesta where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 11 and 15
			union all
			select '16 a 20' as antiguedad, 
			count(*) as cantidad, 
			ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
			(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 0 and 20) as porc_acum  
			from encuesta where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 16 and 20
			union all
			select '21 a 25' as antiguedad, 
			count(*) as cantidad, 
			ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
			(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 0 and 25) as porc_acum  
			from encuesta where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 21 and 25
			union all
			select '26 a 30' as antiguedad, 
			count(*) as cantidad, 
			ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
			(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 0 and 30) as porc_acum  
			from encuesta where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 26 and 30
			union all
			select '31 a 35' as antiguedad, 
			count(*) as cantidad, 
			ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
			(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 0 and 35) as porc_acum  
			from encuesta where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) between 31 and 35
			union all
			select 'MAS DE 35' as antiguedad, 
			count(*) as cantidad, 
			ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
			(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1  ) as porc_acum  
			from encuesta where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso_stj) ) ) > 35";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
    }

	/**
	Retorna consulta de cantidad por distribucion por edad
	**/
	static function get_edades_cantidad()
	{
		$sql = "select count(*) as cantidad from encuesta where edad < 20
			union all 
			select count(*) as cantidad from encuesta where edad between 20 and 25
			union all 
			select count(*) as cantidad from encuesta where edad between 26 and 30
			union all 
			select  count(*) as cantidad from encuesta where edad between 31 and 35
			union all 
			select count(*) as cantidad from encuesta where edad between 36 and 40
			union all 
			select  count(*) as cantidad from encuesta where edad between 41 and 45
			union all 
			select   count(*) as cantidad from encuesta where edad between 46 and 50
			union all 
			select count(*) as cantidad from encuesta where edad between 51 and 55
			union all 
			select   count(*) as cantidad from encuesta where edad between 56 and 60
			union all 
			select count(*) as cantidad from encuesta where edad > 60";
		$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}
		
	/**
	Retorna consulta de distribucion por edad
	**/	
	static function get_edades()
        {
            $sql = " select 'MENOS DE 20' as rangoedad, 
				count(*) as cantidad, 
				ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
				(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where e1.edad between 0 and 20) as porc_acum  
				from encuesta where edad <20
				union all
				select '20 a 25' as rangoedad, 
				count(*) as cantidad, 
				ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
				(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where e1.edad between 0 and 25) as porc_acum  
				from encuesta where edad between 20 and 25
				union all
				select '26 a 30' as rangoedad, 
				count(*) as cantidad, 
				ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
				(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where e1.edad between 0 and 30) as porc_acum  
				from encuesta where edad between 26 and 30
				union all
				select '31 a 35' as rangoedad, 
				count(*) as cantidad, 
				ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
				(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where e1.edad between 0 and 35) as porc_acum  
				from encuesta where edad between 31 and 35
				union all
				select '36 a 40' as rangoedad, 
				count(*) as cantidad, 
				ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
				(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where e1.edad between 0 and 40) as porc_acum  
				from encuesta where edad between 36 and 40
				union all
				select '41 a 45' as rangoedad, 
				count(*) as cantidad, 
				ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
				(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where e1.edad between 0 and 45) as porc_acum  
				from encuesta where edad between 41 and 45
				union all
				select '46 a 50' as rangoedad, 
				count(*) as cantidad, 
				ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
				(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where e1.edad between 0 and 50) as porc_acum  
				from encuesta where edad between 46 and 50
				union all
				select '51 a 55' as rangoedad, 
				count(*) as cantidad, 
				ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
				(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where e1.edad between 0 and 55) as porc_acum  
				from encuesta where edad between 51 and 55
				union all
				select '56 a 60' as rangoedad, 
				count(*) as cantidad, 
				ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
				(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 where e1.edad between 0 and 60) as porc_acum  
				from encuesta where edad between 56 and 60
				union all
				select 'MAS DE 60' as rangoedad, 
				count(*) as cantidad, 
				ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) as porcentaje, 
				(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from encuesta),2) from encuesta as e1 ) as porc_acum  
				from encuesta where edad >60";
		return toba::db('encsaltra')->consultar($sql);
	}
	
	/**
	Retorna una lista de sexos
	**/
	static function get_sexos()
	{
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';	
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'FEMENINO';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'MASCULINO';
		return $estados;
	}
		
	/**
	Retorna una lista de estado civil
	**/
	static function get_estados_civiles()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'SOLTERA/O';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'CASADA/O';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'DIVORCIADA/O';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'SEPARADA/O';
		$estados[5]['id'] = '5';
		$estados[5]['descripcion'] = 'VIUDA/O';		
		$estados[6]['id'] = '6';
		$estados[6]['descripcion'] = 'EN UNION CONVIVENCIAL';
		return $estados;
	}
	
	/**
	Retorna una lista de nivel de educacion
	**/
	static function get_nivel_educacion()
	{	 
	    $estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'PRIMARIA';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'SECUNDARIA';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'TERCIARIA';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'UNIVERSITARIA';
		$estados[5]['id'] = '5';
		$estados[5]['descripcion'] = 'POSTGRADO UNIVERSITARIO';
		return $estados;
	}
	
	/**
	Retorna una lista de relacion contractual
	**/
	static function get_relacion_contractual()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';	
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'PLANTA PERMANENTE';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'INTERINO';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'SUPLENTE';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'TEMPORARIO CON DERECHO A PERMANENCIA';
		return $estados;
	}
	
	/**
	Retorna una lista de TEMPERATURA, HUMEDAD Y VENTILACION
	**/
	static function get_caracteristicas_ambiente()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';	
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'MUY ALTA';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'ALTA';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'CONFORTABLE';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'BAJA';
		return $estados;
	}
	
	
	/**
	Retorna una lista de RUIDOS
	**/
	static function get_ruidos()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'LA ESCUCHA, SI ELLA HABLA NORMALMENTE';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'LA ESCUCHA, SOLO SI SUBE LA VOZ';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'NO PUEDO ESCUCHARLA';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'NO SABE / NO CONTESTA';
		return $estados;
	}
	
	/**
	Retorna una lista de CARACTERISTICAS ILUMINACION
	**/
	static function get_caracteristicas_iluminacion()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';	
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'BUENA';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'REGULAR';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'MALA';
		return $estados;
	}
	
	/**
	Retorna una lista de TIPO DE LUZ
	**/
	static function get_tipo_luz()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';	
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'NATURAL';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'ARTIFICIAL';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'AMBAS';
		return $estados;
	}
	
	/**
	Retorna una lista de TIPOS TAREAS QUE REALIZA
	**/
	static function get_tipo_tareas()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'SIEMPRE';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'A VECES';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'NUNCA';		
		return $estados;
	}

	/**
	Retorna una lista de FACTORES DE ORGANIZACION DEL TRABAJO descendente
	**/
	static function get_factores_organizacion_desc()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '5';
		$estados[1]['descripcion'] = 'SIEMPRE';
		$estados[2]['id'] = '4';
		$estados[2]['descripcion'] = 'MUCHAS VECES';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'ALGUNAS VECES';
		$estados[4]['id'] = '2';
		$estados[4]['descripcion'] = 'SOLO ALGUNAS VECES';
		$estados[5]['id'] = '1';
		$estados[5]['descripcion'] = 'NUNCA';		
		return $estados;
	}
	
	/**
	Retorna una lista de FACTORES DE ORGANIZACION DEL TRABAJO ascendente
	**/
	static function get_factores_organizacion_asc()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'SIEMPRE';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'MUCHAS VECES';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'ALGUNAS VECES';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'SOLO ALGUNAS VECES';
		$estados[5]['id'] = '5';
		$estados[5]['descripcion'] = 'NUNCA';		
		return $estados;
	}
	
	/**
	Retorna una lista de PREOCUPACION
	**/
	static function get_preocupacion()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '5';
		$estados[1]['descripcion'] = 'MUY PREOCUPADO';
		$estados[2]['id'] = '4';
		$estados[2]['descripcion'] = 'BASTANTE PREOCUPADO';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'MAS O MENOS PREOCUPADO';
		$estados[4]['id'] = '2';
		$estados[4]['descripcion'] = 'POCO PREOCUPADO';
		$estados[5]['id'] = '1';
		$estados[5]['descripcion'] = 'NADA PREOCUPADO';		
		return $estados;
	}
	
	/**
	Retorna una lista de TRABAJO FAMILIAR
	**/
	static function get_trabajo_familiar()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '5';
		$estados[1]['descripcion'] = 'Soy la/el principal responsable y hago la mayor parte de las tareas familiares y domesticas';
		$estados[2]['id'] = '4';
		$estados[2]['descripcion'] = 'Hago aproximadamente la mitad de las tareas familiares y domesticas';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'Hago mas o menos una cuarta parte de las tareas familiares y domesticas';
		$estados[4]['id'] = '2';
		$estados[4]['descripcion'] = 'Solo hago tareas muy puntuales';
		$estados[5]['id'] = '1';
		$estados[5]['descripcion'] = 'No hago ninguna o casi ninguna de estas tareas';		
		return $estados;
	}
	
	/**
	Retorna una lista de TENSION
	**/
	static function get_tension()
	{	 
	    $estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'SIEMPRE';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'A VECES';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'NUNCA';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'NS/NC';		
		return $estados;
	}
	
	
	/**
	Retorna una lista de ESTADO DE ANIMO
	**/
	static function get_estado_animo()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'Agotado';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'Agresivo';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'Tensionado';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'Satisfecho';
		$estados[5]['id'] = '5';
		$estados[5]['descripcion'] = 'Nervioso';
		$estados[6]['id'] = '6';
		$estados[6]['descripcion'] = 'Contento o alegre';
		$estados[7]['id'] = '7';
		$estados[7]['descripcion'] = 'Tranquilo';
		$estados[8]['id'] = '8';
		$estados[8]['descripcion'] = 'Indiferente';
		$estados[9]['id'] = '9';
		$estados[9]['descripcion'] = 'Otro';
		return $estados;
	}	
	
	/**
	Retorna una lista de SINTOMAS
	**/
	static function get_sintomas()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'Raramente o Nunca';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'Algunas veces';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'Frecuentemente';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'Muy frecuentemente';		
		return $estados;
	}
	
	/**
	Retorna una lista de TRABAJO INFLUENCIA EN SALUD
	**/
	static function get_trabajo_influencia_salud()
	{	 
	    $estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'No, mi trabajo no ejerce influencia sobre mi salud';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'Si, mi trabajo es bueno para mi salud';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'Si, mi trabajo es malo para mi salud';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'NS/NC';		
		return $estados;
	}
	
	/**
	Retorna una lista de EVALUACION DE AREAS
	**/
	static function get_evaluacion_areas()
	{	 
	    $estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'MALO';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'REGULAR';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'BUENO';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'MUY BUENO';		
		return $estados;
	}
	
	/**
	Retorna una lista de FUMA ACTUALMENTE
	**/
	static function get_fuma_actualmente()
	{	 
	    $estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'SI, TODOS LOS DIAS';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'SI, ALGUNOS DIAS';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'NO, YA NO FUMO';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'NUNCA FUME';		
		return $estados;
	}
	
	/**
	Retorna una lista de ACTIVIDAD FISICA
	**/
	static function get_actividad_fisica()
	{	 
	    $estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'No hago nada de ejercicio, mantengo una actividad totalmente sedentaria (musica, cine)';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'Realizo actividad fisica o deportiva ocasional (caminar, bicicleta, gimnasia ligera, actividad fisica de no mucho esfuerzo)';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'Realizo actividad fisica de forma regular, varias veces al mes (gimnasia, correr, tenis juegos de equipos)';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'Realizo ejercicio fisico varias veces a la semana';		
		return $estados;
	}
	
	/**
	Retorna una lista de HORAS AL DIA DUERME
	**/
	static function get_horas_suenio()
	{	 
	    $estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'Menos de 4 horas';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'Entre 4 y 6 horas';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'Entre 6 y 8 horas';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'Mas de 8 horas';		
		return $estados;
	}
	
	/**
	Retorna una lista de EPOCA AÑO
	**/
	static function get_epoca_anio()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'VERANO';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'OTONO';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'INVIERNO';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = 'PRIMAVERA';		
		return $estados;
	}
	
	/**
	Retorna una lista de SI/NO/SIN DATOS
	**/
	static function get_booleanos()
	{	 
		$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'SI';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'NO';		
		return $estados;
	}	
}
?>
