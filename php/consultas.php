<?php
	
class Consultas {

      /**
      Retona la provincia seleccionada
      **/
      static function get_provincia_seleccion($id_localidad)
      {
          $sql = "SELECT 
                      p.id_tra_sal_provincia as id_provincia
                  FROM 
                      tra_sal_provincia p, tra_sal_localidad l
                  WHERE
                      p.id_tra_sal_provincia = l.id_provincia
                      and l.id_tra_sal_localidad = ".$id_localidad." ";


          $result = toba::db()->consultar($sql);    
          if (! empty($result)) {
              return $result[0]['id_provincia'];
          }
      }
	
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
            $sql = "
	select 'SIN DATOS' as situacion_revista, count(*) as cantidad
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
from tra_sal_localidad l, tra_sal_justicia_arg e, tra_sal_provincia j
where l.id_tra_sal_localidad = e.id_localidad
and l.id_provincia = j.id_tra_sal_provincia
group by j.descripcion";
	$rs = toba::db('saludytrabajo')->consultar($sql);
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
	SELECT

  psico_color as tipo,
  count(*) as cantidad

  FROM psicosocial

  GROUP BY   psico_color ";
	$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}	
	
		/**
	Retorna resultados para grafico get_psicosocial_trab_act_color
	**/
	static function get_psicosocial_trab_act_color()
	{	 
            $sql = "
	SELECT

  trab_act_color  as tipo,
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

  GROUP BY   inseg_lab_color ";
	$rs = toba::db('encsaltra')->consultar($sql);
		return $rs;
	}
	
				/**
	Retorna resultados para grafico get_psicosocial_ap_soc_color
	**/
	static function get_psicosocial_ap_soc_color()
	{	 
            $sql = "
	SELECT

  ap_soc_color  as tipo,
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
	SELECT

  trabajo_familiar_tar_dom_color  as tipo,
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
	SELECT

  rec_lab_color  as tipo,
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
              //return $result;
          }
      }
	
	/**
	Retorna consulta de distribucion por genero
	**/
	//2 es ns/nc (SIN DATOS)
	static function get_genero($usuario)
        {
			if($usuario == 'toba' or $usuario == 'administrador') {
				
			/*select COALESCE(sexo,2) as sexo, count(*) as cantidad
from tra_sal_justicia_arg
group by sexo ORDER BY sexo*/
            $sql = "
	select 'SIN DATOS' as genero, count(*) as cantidad
from tra_sal_justicia_arg where sexo =0 
union all
	select 'FEMENINO' as genero, count(*) as cantidad
from tra_sal_justicia_arg where sexo =1
union all
	select 'MASCULINO' as genero, count(*) as cantidad
from tra_sal_justicia_arg where sexo =2
union all
	select 'OTROS' as genero, count(*) as cantidad
from tra_sal_justicia_arg where sexo =3


	";
	
			}else{
				            $sql = "
	select 'SIN DATOS' as genero, count(*) as cantidad
from tra_sal_justicia_arg where sexo =0  and usuario like '".$usuario."'
union all
	select 'FEMENINO' as genero, count(*) as cantidad
from tra_sal_justicia_arg where sexo =1 and usuario like '".$usuario."'
union all
	select 'MASCULINO' as genero, count(*) as cantidad
from tra_sal_justicia_arg where sexo =2 and usuario like '".$usuario."'
union all
	select 'OTROS' as genero, count(*) as cantidad
from tra_sal_justicia_arg where sexo =3 and usuario like '".$usuario."'


	";
				
			}
	$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }

		static function get_genero_frecuencias($usuario)
        {
			
//$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
			
			
			/*select COALESCE(sexo,2) as sexo, count(*) as cantidad
from tra_sal_justicia_arg
group by sexo ORDER BY sexo*/
            $sql = "
			
			select (CASE WHEN (p.sexo = 0 ) THEN 'SIN DATOS'
				 WHEN (p.sexo = 1 ) THEN 'FEMENINO'
                 WHEN (p.sexo = 2 ) THEN 'MASCULINO'
				 WHEN (p.sexo = 3 ) THEN 'OTROS'
 END) AS genero,
			
 sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
 sum(p.ventilacion_si) as ventilacion_si ,
 sum(p.ventilacion_no) as ventilacion_no ,
 sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
 sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
 sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
 sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
 sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
 sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
 sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
 sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
 sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
 sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
 sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
 sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
 sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
 sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
 sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 
sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no , 
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select t.sexo as sexo,

(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,


(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

            (CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
            WHEN t.horas_trabajo = 1 THEN 0
            WHEN t.horas_trabajo = 2 THEN 0 
            WHEN t.horas_trabajo = 3 THEN 0 
            WHEN t.horas_trabajo = 4 THEN 0 
            WHEN t.horas_trabajo = 5 THEN 0 
            WHEN t.horas_trabajo = 6 THEN 0 
            WHEN t.horas_trabajo = 7 THEN 0 
            WHEN t.horas_trabajo = 8 THEN 0 
            WHEN t.horas_trabajo = 9 THEN 0 
            WHEN t.horas_trabajo = 10 THEN 0 
            WHEN t.horas_trabajo = 11 THEN 0 
            WHEN t.horas_trabajo = 12 THEN 0 
            WHEN t.horas_trabajo = 13 THEN 0 
            WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_sin_datos,
    (CASE WHEN t.horas_trabajo = 0 THEN 0
            WHEN t.horas_trabajo = 1 THEN count(*) 
            WHEN t.horas_trabajo = 2 THEN 0 
            WHEN t.horas_trabajo = 3 THEN 0 
            WHEN t.horas_trabajo = 4 THEN 0 
            WHEN t.horas_trabajo = 5 THEN 0 
            WHEN t.horas_trabajo = 6 THEN 0 
            WHEN t.horas_trabajo = 7 THEN 0 
            WHEN t.horas_trabajo = 8 THEN 0 
            WHEN t.horas_trabajo = 9 THEN 0 
            WHEN t.horas_trabajo = 10 THEN 0 
            WHEN t.horas_trabajo = 11 THEN 0 
            WHEN t.horas_trabajo = 12 THEN 0 
            WHEN t.horas_trabajo = 13 THEN 0 
            WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_1,
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0
    WHEN t.horas_trabajo = 2 THEN count(*)  
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_2,
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN count(*)  
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_3,
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN count(*)  
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_4,
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0  
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN count(*)  
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_5,            
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN count(*)  
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                    END) AS horas_trabajo_6,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0  
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN count(*)  
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_7,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN count(*)  
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_8,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN count(*)  
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_9,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN count(*) 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_10,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN count(*)  
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_11,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN count(*)  
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_12,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN count(*)  
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_13,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN count(*)  
                END) AS horas_trabajo_14, 
    
(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
			
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no




from tra_sal_justicia_arg t

group by sexo,
  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by p.sexo
	";
	
			}else{
				
				 $sql = "
			
                 select (CASE WHEN (p.sexo = 0 ) THEN 'SIN DATOS'
				 WHEN (p.sexo = 1 ) THEN 'FEMENINO'
                 WHEN (p.sexo = 2 ) THEN 'MASCULINO'
				 WHEN (p.sexo = 3 ) THEN 'OTROS'
 END) AS genero,
			
 sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
 sum(p.ventilacion_si) as ventilacion_si ,
 sum(p.ventilacion_no) as ventilacion_no ,
 sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
 sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
 sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
 sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
 sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
 sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
 sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
 sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
 sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
 sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
 sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
 sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
 sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
 sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
 sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 
sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no , 
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select t.sexo as sexo,

(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,


(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

            (CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
            WHEN t.horas_trabajo = 1 THEN 0
            WHEN t.horas_trabajo = 2 THEN 0 
            WHEN t.horas_trabajo = 3 THEN 0 
            WHEN t.horas_trabajo = 4 THEN 0 
            WHEN t.horas_trabajo = 5 THEN 0 
            WHEN t.horas_trabajo = 6 THEN 0 
            WHEN t.horas_trabajo = 7 THEN 0 
            WHEN t.horas_trabajo = 8 THEN 0 
            WHEN t.horas_trabajo = 9 THEN 0 
            WHEN t.horas_trabajo = 10 THEN 0 
            WHEN t.horas_trabajo = 11 THEN 0 
            WHEN t.horas_trabajo = 12 THEN 0 
            WHEN t.horas_trabajo = 13 THEN 0 
            WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_sin_datos,
    (CASE WHEN t.horas_trabajo = 0 THEN 0
            WHEN t.horas_trabajo = 1 THEN count(*) 
            WHEN t.horas_trabajo = 2 THEN 0 
            WHEN t.horas_trabajo = 3 THEN 0 
            WHEN t.horas_trabajo = 4 THEN 0 
            WHEN t.horas_trabajo = 5 THEN 0 
            WHEN t.horas_trabajo = 6 THEN 0 
            WHEN t.horas_trabajo = 7 THEN 0 
            WHEN t.horas_trabajo = 8 THEN 0 
            WHEN t.horas_trabajo = 9 THEN 0 
            WHEN t.horas_trabajo = 10 THEN 0 
            WHEN t.horas_trabajo = 11 THEN 0 
            WHEN t.horas_trabajo = 12 THEN 0 
            WHEN t.horas_trabajo = 13 THEN 0 
            WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_1,
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0
    WHEN t.horas_trabajo = 2 THEN count(*)  
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_2,
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN count(*)  
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_3,
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN count(*)  
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_4,
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0  
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN count(*)  
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_5,            
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN count(*)  
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                    END) AS horas_trabajo_6,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0  
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN count(*)  
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_7,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN count(*)  
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_8,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN count(*)  
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_9,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN count(*) 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_10,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN count(*)  
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_11,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN count(*)  
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_12,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN count(*)  
    WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_13,  
    (CASE WHEN t.horas_trabajo = 0 THEN 0
    WHEN t.horas_trabajo = 1 THEN 0 
    WHEN t.horas_trabajo = 2 THEN 0 
    WHEN t.horas_trabajo = 3 THEN 0 
    WHEN t.horas_trabajo = 4 THEN 0 
    WHEN t.horas_trabajo = 5 THEN 0 
    WHEN t.horas_trabajo = 6 THEN 0 
    WHEN t.horas_trabajo = 7 THEN 0 
    WHEN t.horas_trabajo = 8 THEN 0 
    WHEN t.horas_trabajo = 9 THEN 0 
    WHEN t.horas_trabajo = 10 THEN 0 
    WHEN t.horas_trabajo = 11 THEN 0 
    WHEN t.horas_trabajo = 12 THEN 0 
    WHEN t.horas_trabajo = 13 THEN 0 
    WHEN t.horas_trabajo = 14 THEN count(*)  
                END) AS horas_trabajo_14, 
    
(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
			
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no




from tra_sal_justicia_arg t
where usuario like '".$usuario."' 
group by sexo,
  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by p.sexo

	";
				
			}
	$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }

		static function get_edades_frecuencias($usuario)
        {
			
//$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "
			
			SELECT 
p.edades,

(case
when (p.sexo = 0) then 'SIN DATOS'
when (p.sexo = 1) then 'FEMENINO'
when (p.sexo = 2) then 'MASCULINO'
when (p.sexo = 3) then 'OTROS'
    END
) as sexo,

sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 

sexo,
(case
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) <= 25) then '0 a 25'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) between 26 and 35) then '26 a 35'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) between 36 and 45) then '36 a 45'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) between 46 and 55) then '46 a 55'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) > 55) then 'MAS DE 56'   
   END
) as edades,

(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t

group by t.fecha_nacimiento,
  t.sexo,
  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by edades, sexo
	";
	
	
			}
			else {
				
				$sql = "
			SELECT
                p.edades,
                
                (case
                when (p.sexo = 0) then 'SIN DATOS'
                when (p.sexo = 1) then 'FEMENINO'
                when (p.sexo = 2) then 'MASCULINO'
                when (p.sexo = 3) then 'OTROS'
                    END
                ) as sexo,
sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 
sexo, 
(case
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) <= 25) then '0 a 25'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) between 26 and 35) then '26 a 35'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) between 36 and 45) then '36 a 45'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) between 46 and 55) then '46 a 55'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) > 55) then 'MAS DE 56'   
   END
) as edades,

(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t
                where usuario like '".$usuario."' 
                group by t.fecha_nacimiento,
                  t.sexo,
                  t.ventilacion,
                  t.mala_iluminacion, 
                  t.humedad, 
                  t.temperaturas_elevadas, 
                  t.ausencia_sanitarios, 
                  t.hacinamiento, 
                  t.ruidos, 
                  t.posiciones_incomodas, 
                  t.horas_trabajo,
                  t.carga_trabajo, 
                  t.organizar_trabajo, 
                  t.ayuda_companieros, 
                  t.ayuda_superior, 
                  t.situaciones_tension, 
                  t.violencia_laboral, 
                  t.agotado_tensionado, 
                  t.sintoma_vision, 
                  t.sintoma_muscular, 
                  t.sintoma_insomio, 
                  t.sintoma_palpitaciones, 
                  t.sintoma_respirar, 
                  t.sintoma_tristeza_desgano, 
                  t.sintoma_angustia, 
                  t.sintoma_trastorno_digestivo, 
                  t.sintoma_vinculado_trabajo, 
                  t.licencia_enfermedad,
                  t.situaciones_tension_superior
                ) as p
                group by edades, sexo
	";
				
				
			}
	$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }
        
        
        static function get_solo_edades_frecuencias($usuario)
        {
			
//$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "
			
			SELECT 
p.edades,



sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 


(case
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) <= 25) then '0 a 25'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) between 26 and 35) then '26 a 35'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) between 36 and 45) then '36 a 45'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) between 46 and 55) then '46 a 55'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) > 55) then 'MAS DE 56'   
   END
) as edades,

(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t

group by t.fecha_nacimiento,

  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by edades
	";
	
	
			}
			else {
				
				$sql = "
			SELECT
                p.edades,
                
        
sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 

(case
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) <= 25) then '0 a 25'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) between 26 and 35) then '26 a 35'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) between 36 and 45) then '36 a 45'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) between 46 and 55) then '46 a 55'
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_nacimiento) ) ) > 55) then 'MAS DE 56'   
   END
) as edades,

(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t
                where usuario like '".$usuario."' 
                group by t.fecha_nacimiento,
                
                  t.ventilacion,
                  t.mala_iluminacion, 
                  t.humedad, 
                  t.temperaturas_elevadas, 
                  t.ausencia_sanitarios, 
                  t.hacinamiento, 
                  t.ruidos, 
                  t.posiciones_incomodas, 
                  t.horas_trabajo,
                  t.carga_trabajo, 
                  t.organizar_trabajo, 
                  t.ayuda_companieros, 
                  t.ayuda_superior, 
                  t.situaciones_tension, 
                  t.violencia_laboral, 
                  t.agotado_tensionado, 
                  t.sintoma_vision, 
                  t.sintoma_muscular, 
                  t.sintoma_insomio, 
                  t.sintoma_palpitaciones, 
                  t.sintoma_respirar, 
                  t.sintoma_tristeza_desgano, 
                  t.sintoma_angustia, 
                  t.sintoma_trastorno_digestivo, 
                  t.sintoma_vinculado_trabajo, 
                  t.licencia_enfermedad,
                  t.situaciones_tension_superior
                ) as p
                group by edades
	";
				
				
			}
	$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }
        static function get_estamento_frecuencias($usuario)
        {
			
//$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "
			
			SELECT 
p.estamento,
(case
when (p.sexo = 0) then 'SIN DATOS'
when (p.sexo = 1) then 'FEMENINO'
when (p.sexo = 2) then 'MASCULINO'
when (p.sexo = 3) then 'OTROS'
    END
) as sexo,
sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 

(case
when (t.estamento = 0) then 'SIN DATOS'
when (t.estamento = 1) then 'Empleado/a - Trabajador/a'
when (t.estamento = 2) then 'Funcionario/a'
   END
) as estamento,

sexo,


(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t

group by t.estamento,
  t.sexo,
  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by estamento, sexo
	";
	
	
			}
			else {
				
				$sql = "
			SELECT
                p.estamento,
                (case
                when (p.sexo = 0) then 'SIN DATOS'
                when (p.sexo = 1) then 'FEMENINO'
                when (p.sexo = 2) then 'MASCULINO'
                when (p.sexo = 3) then 'OTROS'
                    END
                ) as sexo,

sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 

(case
when (t.estamento = 0) then 'SIN DATOS'
when (t.estamento = 1) then 'Empleado/a - Trabajador/a'
when (t.estamento = 2) then 'Funcionario/a'
   END
) as estamento,

sexo, 

(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t
                where usuario like '".$usuario."' 
                group by t.estamento,
                  t.sexo,
                  t.ventilacion,
                  t.mala_iluminacion, 
                  t.humedad, 
                  t.temperaturas_elevadas, 
                  t.ausencia_sanitarios, 
                  t.hacinamiento, 
                  t.ruidos, 
                  t.posiciones_incomodas, 
                  t.horas_trabajo,
                  t.carga_trabajo, 
                  t.organizar_trabajo, 
                  t.ayuda_companieros, 
                  t.ayuda_superior, 
                  t.situaciones_tension, 
                  t.violencia_laboral, 
                  t.agotado_tensionado, 
                  t.sintoma_vision, 
                  t.sintoma_muscular, 
                  t.sintoma_insomio, 
                  t.sintoma_palpitaciones, 
                  t.sintoma_respirar, 
                  t.sintoma_tristeza_desgano, 
                  t.sintoma_angustia, 
                  t.sintoma_trastorno_digestivo, 
                  t.sintoma_vinculado_trabajo, 
                  t.licencia_enfermedad,
                  t.situaciones_tension_superior
                ) as p
                group by estamento, sexo
	";
				
				
			}
	$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }
        static function get_solo_estamento_frecuencias($usuario)
        {
			
//$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "
			
			SELECT 
p.estamento,

sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 

(case
when (t.estamento = 0) then 'SIN DATOS'
when (t.estamento = 1) then 'Empleado/a - Trabajador/a'
when (t.estamento = 2) then 'Funcionario/a'
   END
) as estamento,




(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t

group by t.estamento,

  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by estamento
	";
	
	
			}
			else {
				
				$sql = "
			SELECT
                p.estamento,



sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 

(case
when (t.estamento = 0) then 'SIN DATOS'
when (t.estamento = 1) then 'Empleado/a - Trabajador/a'
when (t.estamento = 2) then 'Funcionario/a'
   END
) as estamento,



(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t
                where usuario like '".$usuario."' 
                group by t.estamento,
    
                  t.ventilacion,
                  t.mala_iluminacion, 
                  t.humedad, 
                  t.temperaturas_elevadas, 
                  t.ausencia_sanitarios, 
                  t.hacinamiento, 
                  t.ruidos, 
                  t.posiciones_incomodas, 
                  t.horas_trabajo,
                  t.carga_trabajo, 
                  t.organizar_trabajo, 
                  t.ayuda_companieros, 
                  t.ayuda_superior, 
                  t.situaciones_tension, 
                  t.violencia_laboral, 
                  t.agotado_tensionado, 
                  t.sintoma_vision, 
                  t.sintoma_muscular, 
                  t.sintoma_insomio, 
                  t.sintoma_palpitaciones, 
                  t.sintoma_respirar, 
                  t.sintoma_tristeza_desgano, 
                  t.sintoma_angustia, 
                  t.sintoma_trastorno_digestivo, 
                  t.sintoma_vinculado_trabajo, 
                  t.licencia_enfermedad,
                  t.situaciones_tension_superior
                ) as p
                group by estamento
	";
				
				
			}
	$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }
        static function get_lugar_trabajo_frecuencias($usuario)
        {
			
//$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "
			
			SELECT 
p.id_lugar_trabajo,

(case
when (p.sexo = 0) then 'SIN DATOS'
when (p.sexo = 1) then 'FEMENINO'
when (p.sexo = 2) then 'MASCULINO'
when (p.sexo = 3) then 'OTROS'
    END
) as sexo,

sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 





(case
when (t.id_lugar_trabajo = 1) then 'JUZGADOS DE PRIMERA INSTANCIA'
when (t.id_lugar_trabajo = 2) then 'CAMARAS DE APELACION'
when (t.id_lugar_trabajo = 3) then 'TRIBUNAL SUPERIOR DE JUSTICIA / CORTE SUPREMA DE JUSTICIA'
when (t.id_lugar_trabajo = 4) then 'CONSEJO DE LA MAGISTRATURA'
when (t.id_lugar_trabajo = 5) then 'MINISTERIO PUBLICO DE LA DEFENSA'
when (t.id_lugar_trabajo = 6) then 'MINISTERIO PUBLICO FISCAL'
when (t.id_lugar_trabajo = 7) then 'MINISTERIO PUBLICO TUTELAR'
when (t.id_lugar_trabajo = 999) then 'SIN DATOS'
   END
) as id_lugar_trabajo,
sexo,


(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t

group by t.id_lugar_trabajo,
  t.sexo,
  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by id_lugar_trabajo, sexo
	";
	
	
			}
			else {
				
				$sql = "
			SELECT
                p.id_lugar_trabajo,
                (case
                when (p.sexo = 0) then 'SIN DATOS'
                when (p.sexo = 1) then 'FEMENINO'
                when (p.sexo = 2) then 'MASCULINO'
                when (p.sexo = 3) then 'OTROS'
                    END
                ) as sexo,
sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 


(case
when (t.id_lugar_trabajo = 1) then 'JUZGADOS DE PRIMERA INSTANCIA'
when (t.id_lugar_trabajo = 2) then 'CAMARAS DE APELACION'
when (t.id_lugar_trabajo = 3) then 'TRIBUNAL SUPERIOR DE JUSTICIA / CORTE SUPREMA DE JUSTICIA'
when (t.id_lugar_trabajo = 4) then 'CONSEJO DE LA MAGISTRATURA'
when (t.id_lugar_trabajo = 5) then 'MINISTERIO PUBLICO DE LA DEFENSA'
when (t.id_lugar_trabajo = 6) then 'MINISTERIO PUBLICO FISCAL'
when (t.id_lugar_trabajo = 7) then 'MINISTERIO PUBLICO TUTELAR'
when (t.id_lugar_trabajo = 999) then 'SIN DATOS'
 
   END
) as id_lugar_trabajo,

sexo,

(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t
                where usuario like '".$usuario."' 
                group by t.id_lugar_trabajo,
                  t.sexo,
                  t.ventilacion,
                  t.mala_iluminacion, 
                  t.humedad, 
                  t.temperaturas_elevadas, 
                  t.ausencia_sanitarios, 
                  t.hacinamiento, 
                  t.ruidos, 
                  t.posiciones_incomodas, 
                  t.horas_trabajo,
                  t.carga_trabajo, 
                  t.organizar_trabajo, 
                  t.ayuda_companieros, 
                  t.ayuda_superior, 
                  t.situaciones_tension, 
                  t.violencia_laboral, 
                  t.agotado_tensionado, 
                  t.sintoma_vision, 
                  t.sintoma_muscular, 
                  t.sintoma_insomio, 
                  t.sintoma_palpitaciones, 
                  t.sintoma_respirar, 
                  t.sintoma_tristeza_desgano, 
                  t.sintoma_angustia, 
                  t.sintoma_trastorno_digestivo, 
                  t.sintoma_vinculado_trabajo, 
                  t.licencia_enfermedad,
                  t.situaciones_tension_superior
                ) as p
                group by id_lugar_trabajo, sexo
                
                
	";
				
				
			}
	$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }

        static function get_solo_lugar_trabajo_frecuencias($usuario)
        {
			
//$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "
			
			SELECT 
p.id_lugar_trabajo,



sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 





(case
when (t.id_lugar_trabajo = 1) then 'JUZGADOS DE PRIMERA INSTANCIA'
when (t.id_lugar_trabajo = 2) then 'CAMARAS DE APELACION'
when (t.id_lugar_trabajo = 3) then 'TRIBUNAL SUPERIOR DE JUSTICIA / CORTE SUPREMA DE JUSTICIA'
when (t.id_lugar_trabajo = 4) then 'CONSEJO DE LA MAGISTRATURA'
when (t.id_lugar_trabajo = 5) then 'MINISTERIO PUBLICO DE LA DEFENSA'
when (t.id_lugar_trabajo = 6) then 'MINISTERIO PUBLICO FISCAL'
when (t.id_lugar_trabajo = 7) then 'MINISTERIO PUBLICO TUTELAR'
when (t.id_lugar_trabajo = 999) then 'SIN DATOS'
   END
) as id_lugar_trabajo,



(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t

group by t.id_lugar_trabajo,

  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by id_lugar_trabajo
	";
	
	
			}
			else {
				
				$sql = "
			SELECT
                p.id_lugar_trabajo,

sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 


(case
when (t.id_lugar_trabajo = 1) then 'JUZGADOS DE PRIMERA INSTANCIA'
when (t.id_lugar_trabajo = 2) then 'CAMARAS DE APELACION'
when (t.id_lugar_trabajo = 3) then 'TRIBUNAL SUPERIOR DE JUSTICIA / CORTE SUPREMA DE JUSTICIA'
when (t.id_lugar_trabajo = 4) then 'CONSEJO DE LA MAGISTRATURA'
when (t.id_lugar_trabajo = 5) then 'MINISTERIO PUBLICO DE LA DEFENSA'
when (t.id_lugar_trabajo = 6) then 'MINISTERIO PUBLICO FISCAL'
when (t.id_lugar_trabajo = 7) then 'MINISTERIO PUBLICO TUTELAR'
when (t.id_lugar_trabajo = 999) then 'SIN DATOS'
 
   END
) as id_lugar_trabajo,



(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t
                where usuario like '".$usuario."' 
                group by t.id_lugar_trabajo,

                  t.ventilacion,
                  t.mala_iluminacion, 
                  t.humedad, 
                  t.temperaturas_elevadas, 
                  t.ausencia_sanitarios, 
                  t.hacinamiento, 
                  t.ruidos, 
                  t.posiciones_incomodas, 
                  t.horas_trabajo,
                  t.carga_trabajo, 
                  t.organizar_trabajo, 
                  t.ayuda_companieros, 
                  t.ayuda_superior, 
                  t.situaciones_tension, 
                  t.violencia_laboral, 
                  t.agotado_tensionado, 
                  t.sintoma_vision, 
                  t.sintoma_muscular, 
                  t.sintoma_insomio, 
                  t.sintoma_palpitaciones, 
                  t.sintoma_respirar, 
                  t.sintoma_tristeza_desgano, 
                  t.sintoma_angustia, 
                  t.sintoma_trastorno_digestivo, 
                  t.sintoma_vinculado_trabajo, 
                  t.licencia_enfermedad,
                  t.situaciones_tension_superior
                ) as p
                group by id_lugar_trabajo
                
                
	";
				
				
			}
	$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }

        
        static function get_lugar_trabajo_especifico_frecuencias($usuario)
        {
			
//$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "
			
			SELECT 
p.lugar_trabajo_especifico,

(case
when (p.sexo = 0) then 'SIN DATOS'
when (p.sexo = 1) then 'FEMENINO'
when (p.sexo = 2) then 'MASCULINO'
when (p.sexo = 3) then 'OTROS'
    END
) as sexo,

sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 





(case
when (t.lugar_trabajo_especifico = 1) then 'FUERO CIVIL'
when (t.lugar_trabajo_especifico = 3) then 'FUERO COMERCIAL'
when (t.lugar_trabajo_especifico = 4) then 'FUERO PENAL'
when (t.lugar_trabajo_especifico = 5) then 'FUERO LABORAL'
when (t.lugar_trabajo_especifico = 6) then 'FUERO CONTENCIOSO ADMINISTRATIVO'
when (t.lugar_trabajo_especifico = 7) then 'FUERO DE FAMILIA'
when (t.lugar_trabajo_especifico = 14) then 'MULTIFUEROS'
when (t.lugar_trabajo_especifico = 17) then 'JUSTICIA DE PAZ'
when (t.lugar_trabajo_especifico = 18) then 'MANDAMIENTOS Y NOTIFICACIONES'
when (t.lugar_trabajo_especifico = 19) then 'MANTENIMIENTO'
when (t.lugar_trabajo_especifico = 20) then 'INFORMATICA'
when (t.lugar_trabajo_especifico = 21) then 'CUERPOS PERICIALES'
when (t.lugar_trabajo_especifico = 22) then 'POLICIA JUDICIAL / CUERPO DE INVESTIGACIONES JUDICIALES'
when (t.lugar_trabajo_especifico = 23) then 'EQUIPOS TECNICOS INTERDISCIPLINARIOS'
when (t.lugar_trabajo_especifico = 24) then 'DIRECCION AUTOMOTORES / CHOFERES'
when (t.lugar_trabajo_especifico = 25) then 'AREA ADMINISTRATIVA DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 26) then 'AREA TECNICA DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 27) then 'AREA JURISDICCIONAL DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 28) then 'OTROS'
when (t.lugar_trabajo_especifico = 999) then 'SIN DATOS'
   END
) as lugar_trabajo_especifico,

sexo,

(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t

group by t.lugar_trabajo_especifico,
  t.sexo,
  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by lugar_trabajo_especifico, sexo
	";
	
	
			}
			else {
				
				$sql = "
			SELECT
                p.lugar_trabajo_especifico,
                (case
                when (p.sexo = 0) then 'SIN DATOS'
                when (p.sexo = 1) then 'FEMENINO'
                when (p.sexo = 2) then 'MASCULINO'
                when (p.sexo = 3) then 'OTROS'
                    END
                ) as sexo,
sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 


(case
when (t.lugar_trabajo_especifico = 1) then 'FUERO CIVIL'
when (t.lugar_trabajo_especifico = 3) then 'FUERO COMERCIAL'
when (t.lugar_trabajo_especifico = 4) then 'FUERO PENAL'
when (t.lugar_trabajo_especifico = 5) then 'FUERO LABORAL'
when (t.lugar_trabajo_especifico = 6) then 'FUERO CONTENCIOSO ADMINISTRATIVO'
when (t.lugar_trabajo_especifico = 7) then 'FUERO DE FAMILIA'
when (t.lugar_trabajo_especifico = 14) then 'MULTIFUEROS'
when (t.lugar_trabajo_especifico = 17) then 'JUSTICIA DE PAZ'
when (t.lugar_trabajo_especifico = 18) then 'MANDAMIENTOS Y NOTIFICACIONES'
when (t.lugar_trabajo_especifico = 19) then 'MANTENIMIENTO'
when (t.lugar_trabajo_especifico = 20) then 'INFORMATICA'
when (t.lugar_trabajo_especifico = 21) then 'CUERPOS PERICIALES'
when (t.lugar_trabajo_especifico = 22) then 'POLICIA JUDICIAL / CUERPO DE INVESTIGACIONES JUDICIALES'
when (t.lugar_trabajo_especifico = 23) then 'EQUIPOS TECNICOS INTERDISCIPLINARIOS'
when (t.lugar_trabajo_especifico = 24) then 'DIRECCION AUTOMOTORES / CHOFERES'
when (t.lugar_trabajo_especifico = 25) then 'AREA ADMINISTRATIVA DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 26) then 'AREA TECNICA DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 27) then 'AREA JURISDICCIONAL DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 28) then 'OTROS'
when (t.lugar_trabajo_especifico = 999) then 'SIN DATOS'
 
   END
) as lugar_trabajo_especifico,

sexo, 

(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t
                where usuario like '".$usuario."' 
                group by t.lugar_trabajo_especifico,
                  t.sexo,
                  t.ventilacion,
                  t.mala_iluminacion, 
                  t.humedad, 
                  t.temperaturas_elevadas, 
                  t.ausencia_sanitarios, 
                  t.hacinamiento, 
                  t.ruidos, 
                  t.posiciones_incomodas, 
                  t.horas_trabajo,
                  t.carga_trabajo, 
                  t.organizar_trabajo, 
                  t.ayuda_companieros, 
                  t.ayuda_superior, 
                  t.situaciones_tension, 
                  t.violencia_laboral, 
                  t.agotado_tensionado, 
                  t.sintoma_vision, 
                  t.sintoma_muscular, 
                  t.sintoma_insomio, 
                  t.sintoma_palpitaciones, 
                  t.sintoma_respirar, 
                  t.sintoma_tristeza_desgano, 
                  t.sintoma_angustia, 
                  t.sintoma_trastorno_digestivo, 
                  t.sintoma_vinculado_trabajo, 
                  t.licencia_enfermedad,
                  t.situaciones_tension_superior
                ) as p
                group by lugar_trabajo_especifico, sexo
	";
				
				
			}
	$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }

        static function get_solo_lugar_trabajo_especifico_frecuencias($usuario)
        {
			
//$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "
			
			SELECT 
p.lugar_trabajo_especifico,



sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 





(case
when (t.lugar_trabajo_especifico = 1) then 'FUERO CIVIL'
when (t.lugar_trabajo_especifico = 3) then 'FUERO COMERCIAL'
when (t.lugar_trabajo_especifico = 4) then 'FUERO PENAL'
when (t.lugar_trabajo_especifico = 5) then 'FUERO LABORAL'
when (t.lugar_trabajo_especifico = 6) then 'FUERO CONTENCIOSO ADMINISTRATIVO'
when (t.lugar_trabajo_especifico = 7) then 'FUERO DE FAMILIA'
when (t.lugar_trabajo_especifico = 14) then 'MULTIFUEROS'
when (t.lugar_trabajo_especifico = 17) then 'JUSTICIA DE PAZ'
when (t.lugar_trabajo_especifico = 18) then 'MANDAMIENTOS Y NOTIFICACIONES'
when (t.lugar_trabajo_especifico = 19) then 'MANTENIMIENTO'
when (t.lugar_trabajo_especifico = 20) then 'INFORMATICA'
when (t.lugar_trabajo_especifico = 21) then 'CUERPOS PERICIALES'
when (t.lugar_trabajo_especifico = 22) then 'POLICIA JUDICIAL / CUERPO DE INVESTIGACIONES JUDICIALES'
when (t.lugar_trabajo_especifico = 23) then 'EQUIPOS TECNICOS INTERDISCIPLINARIOS'
when (t.lugar_trabajo_especifico = 24) then 'DIRECCION AUTOMOTORES / CHOFERES'
when (t.lugar_trabajo_especifico = 25) then 'AREA ADMINISTRATIVA DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 26) then 'AREA TECNICA DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 27) then 'AREA JURISDICCIONAL DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 28) then 'OTROS'
when (t.lugar_trabajo_especifico = 999) then 'SIN DATOS'
   END
) as lugar_trabajo_especifico,



(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t

group by t.lugar_trabajo_especifico,

  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by lugar_trabajo_especifico
	";
	
	
			}
			else {
				
				$sql = "
			SELECT
                p.lugar_trabajo_especifico,

sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 

sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no ,
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 


(case
when (t.lugar_trabajo_especifico = 1) then 'FUERO CIVIL'
when (t.lugar_trabajo_especifico = 3) then 'FUERO COMERCIAL'
when (t.lugar_trabajo_especifico = 4) then 'FUERO PENAL'
when (t.lugar_trabajo_especifico = 5) then 'FUERO LABORAL'
when (t.lugar_trabajo_especifico = 6) then 'FUERO CONTENCIOSO ADMINISTRATIVO'
when (t.lugar_trabajo_especifico = 7) then 'FUERO DE FAMILIA'
when (t.lugar_trabajo_especifico = 14) then 'MULTIFUEROS'
when (t.lugar_trabajo_especifico = 17) then 'JUSTICIA DE PAZ'
when (t.lugar_trabajo_especifico = 18) then 'MANDAMIENTOS Y NOTIFICACIONES'
when (t.lugar_trabajo_especifico = 19) then 'MANTENIMIENTO'
when (t.lugar_trabajo_especifico = 20) then 'INFORMATICA'
when (t.lugar_trabajo_especifico = 21) then 'CUERPOS PERICIALES'
when (t.lugar_trabajo_especifico = 22) then 'POLICIA JUDICIAL / CUERPO DE INVESTIGACIONES JUDICIALES'
when (t.lugar_trabajo_especifico = 23) then 'EQUIPOS TECNICOS INTERDISCIPLINARIOS'
when (t.lugar_trabajo_especifico = 24) then 'DIRECCION AUTOMOTORES / CHOFERES'
when (t.lugar_trabajo_especifico = 25) then 'AREA ADMINISTRATIVA DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 26) then 'AREA TECNICA DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 27) then 'AREA JURISDICCIONAL DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 28) then 'OTROS'
when (t.lugar_trabajo_especifico = 999) then 'SIN DATOS'
 
   END
) as lugar_trabajo_especifico,



(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  


(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
			
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
            
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t
                where usuario like '".$usuario."' 
                group by t.lugar_trabajo_especifico,
    
                  t.ventilacion,
                  t.mala_iluminacion, 
                  t.humedad, 
                  t.temperaturas_elevadas, 
                  t.ausencia_sanitarios, 
                  t.hacinamiento, 
                  t.ruidos, 
                  t.posiciones_incomodas, 
                  t.horas_trabajo,
                  t.carga_trabajo, 
                  t.organizar_trabajo, 
                  t.ayuda_companieros, 
                  t.ayuda_superior, 
                  t.situaciones_tension, 
                  t.violencia_laboral, 
                  t.agotado_tensionado, 
                  t.sintoma_vision, 
                  t.sintoma_muscular, 
                  t.sintoma_insomio, 
                  t.sintoma_palpitaciones, 
                  t.sintoma_respirar, 
                  t.sintoma_tristeza_desgano, 
                  t.sintoma_angustia, 
                  t.sintoma_trastorno_digestivo, 
                  t.sintoma_vinculado_trabajo, 
                  t.licencia_enfermedad,
                  t.situaciones_tension_superior
                ) as p
                group by lugar_trabajo_especifico
	";
				
				
			}
	$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }

	static function get_provincia_frecuencias()
        {
			
			
			/*select COALESCE(sexo,2) as sexo, count(*) as cantidad
from tra_sal_justicia_arg
group by sexo ORDER BY sexo*/
            $sql = "SELECT pr.descripcion as provincia ,
loc.descripcion as localidad,
sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,
sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 
sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no ,
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no , 
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select t.id_localidad as id_localidad,


(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,


(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14, 

(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,

(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
			
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t

group by id_localidad,
  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas,
  t.horas_trabajo, 
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p, tra_sal_provincia as pr, tra_sal_localidad as loc
where p.id_localidad = loc.id_tra_sal_localidad
and loc.id_provincia = pr.id_tra_sal_provincia
group by pr.descripcion, loc.descripcion
	";
	$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }	
		
        static function get_solo_provincia_frecuencias()
        {
			
			
			/*select COALESCE(sexo,2) as sexo, count(*) as cantidad
from tra_sal_justicia_arg
group by sexo ORDER BY sexo*/
            $sql = "SELECT pr.descripcion as provincia ,

sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,
sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 
sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no ,
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no , 
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select t.id_localidad as id_localidad,


(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,


(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14, 

(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,

(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
			
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t

group by id_localidad,
  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas,
  t.horas_trabajo, 
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p, tra_sal_provincia as pr, tra_sal_localidad as loc
where p.id_localidad = loc.id_tra_sal_localidad
and loc.id_provincia = pr.id_tra_sal_provincia
group by pr.descripcion
	";
	$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }	    
        
	/**
	Retorna consulta de distribucion por antiguedad
	**/
	static function get_antiguedad($usuario)
        {
			if($usuario == 'toba' or $usuario == 'administrador') {
           
            $sql = "
            select '0 a 10' as antiguedad, 
            count(*) as cantidad, 
            ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) as porcentaje, 
            (select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) <=10) as porc_acum  
            from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) <=10


union all

select '11 a 20' as antiguedad, 
count(*) as cantidad, 
ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) as porcentaje, 
(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) between -1 and 20) as porc_acum  
from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) between 11 and 20

union all

select '21 a 30' as antiguedad, 
count(*) as cantidad, 
ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) as porcentaje, 
(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) between -1 and 30) as porc_acum  
from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) between 21 and 30

union all

select 'MAS DE 31' as antiguedad, 
count(*) as cantidad, 
ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) as porcentaje, 
(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) from tra_sal_justicia_arg as e1  ) as porc_acum  
from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) > 30
";

			}else {
				
				$sql = "

select '0 a 10' as antiguedad, 
count(*) as cantidad, 
ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) as porcentaje, 
(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) 
from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) <=10 and usuario like '".$usuario."') as porc_acum  
from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) <=10 and usuario like '".$usuario."'

union all

select '11 a 20' as antiguedad, 
count(*) as cantidad, 
ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) as porcentaje, 
(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) 
from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) <=20 and usuario like '".$usuario."') as porc_acum  
from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) <= 20
and EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) > 10
and usuario like '".$usuario."'



union all

select '21 a 30' as antiguedad, 
count(*) as cantidad, 
ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) as porcentaje, 
(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) 
from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) <=30 and usuario like '".$usuario."') as porc_acum  
from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) )  <= 30
and EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) > 20 
and usuario like '".$usuario."'

and usuario like '".$usuario."'

union all

select 'MAS DE 31' as antiguedad, 
count(*) as cantidad, 
ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) as porcentaje, 
(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) 
from tra_sal_justicia_arg as e1  where usuario like '".$usuario."'  ) as porc_acum  
from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) ) > 30 and usuario like '".$usuario."'"

;
				
			}
		$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }

        static function get_solo_estamento($usuario)
        {
			if($usuario == 'toba' or $usuario == 'administrador') {
           
                $sql = "
                
select (case
when (e.estamento = 0) then 'SIN DATOS'
when (e.estamento = 1) then 'Empleado/a - Trabajador/a'
when (e.estamento = 2) then 'Funcionario/a'
   END
) as estamento, count(*) as cantidad
from tra_sal_justicia_arg e
group by e.estamento";

			}else {
				
				$sql = "
	
select (case
when (e.estamento = 0) then 'SIN DATOS'
when (e.estamento = 1) then 'Empleado/a - Trabajador/a'
when (e.estamento = 2) then 'Funcionario/a'
   END
) as estamento, count(*) as cantidad
from tra_sal_justicia_arg e
where e.usuario like '".$usuario."'
group by e.estamento"; 

				
			}
		$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }

        static function get_solo_lugar_trabajo($usuario)
        {
			if($usuario == 'toba' or $usuario == 'administrador') {
           
                $sql = "
                
                select
                (case
                when (t.id_lugar_trabajo = 1) then 'JUZGADOS DE PRIMERA INSTANCIA'
                when (t.id_lugar_trabajo = 2) then 'CAMARAS DE APELACION'
                when (t.id_lugar_trabajo = 3) then 'TRIBUNAL SUPERIOR DE JUSTICIA / CORTE SUPREMA DE JUSTICIA'
                when (t.id_lugar_trabajo = 4) then 'CONSEJO DE LA MAGISTRATURA'
                when (t.id_lugar_trabajo = 5) then 'MINISTERIO PUBLICO DE LA DEFENSA'
                when (t.id_lugar_trabajo = 6) then 'MINISTERIO PUBLICO FISCAL'
                when (t.id_lugar_trabajo = 7) then 'MINISTERIO PUBLICO TUTELAR'
                when (t.id_lugar_trabajo = 999) then 'SIN DATOS'
                 
                   END
                ) as lugar_trabajo,
                
                 count(*) as cantidad
                from tra_sal_justicia_arg t
               
                group by t.id_lugar_trabajo
                order by 1
                ";

			}else {
				
				$sql = "
	
                select
                (case
                when (t.id_lugar_trabajo = 1) then 'JUZGADOS DE PRIMERA INSTANCIA'
                when (t.id_lugar_trabajo = 2) then 'CAMARAS DE APELACION'
                when (t.id_lugar_trabajo = 3) then 'TRIBUNAL SUPERIOR DE JUSTICIA / CORTE SUPREMA DE JUSTICIA'
                when (t.id_lugar_trabajo = 4) then 'CONSEJO DE LA MAGISTRATURA'
                when (t.id_lugar_trabajo = 5) then 'MINISTERIO PUBLICO DE LA DEFENSA'
                when (t.id_lugar_trabajo = 6) then 'MINISTERIO PUBLICO FISCAL'
                when (t.id_lugar_trabajo = 7) then 'MINISTERIO PUBLICO TUTELAR'
                when (t.id_lugar_trabajo = 999) then 'SIN DATOS'
                 
                   END
                ) as lugar_trabajo,
                
                 count(*) as cantidad
                from tra_sal_justicia_arg t
                where t.usuario like '".$usuario."'
                group by t.id_lugar_trabajo
                order by 1
"; 

				
			}
		$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }

        static function get_solo_lugar_trabajo_especifico($usuario)
        {
			if($usuario == 'toba' or $usuario == 'administrador') {
           
                $sql = "
                
                select
                (case
when (t.lugar_trabajo_especifico = 1) then 'FUERO CIVIL'
when (t.lugar_trabajo_especifico = 3) then 'FUERO COMERCIAL'
when (t.lugar_trabajo_especifico = 4) then 'FUERO PENAL'
when (t.lugar_trabajo_especifico = 5) then 'FUERO LABORAL'
when (t.lugar_trabajo_especifico = 6) then 'FUERO CONTENCIOSO ADMINISTRATIVO'
when (t.lugar_trabajo_especifico = 7) then 'FUERO DE FAMILIA'
when (t.lugar_trabajo_especifico = 14) then 'MULTIFUEROS'
when (t.lugar_trabajo_especifico = 17) then 'JUSTICIA DE PAZ'
when (t.lugar_trabajo_especifico = 18) then 'MANDAMIENTOS Y NOTIFICACIONES'
when (t.lugar_trabajo_especifico = 19) then 'MANTENIMIENTO'
when (t.lugar_trabajo_especifico = 20) then 'INFORMATICA'
when (t.lugar_trabajo_especifico = 21) then 'CUERPOS PERICIALES'
when (t.lugar_trabajo_especifico = 22) then 'POLICIA JUDICIAL / CUERPO DE INVESTIGACIONES JUDICIALES'
when (t.lugar_trabajo_especifico = 23) then 'EQUIPOS TECNICOS INTERDISCIPLINARIOS'
when (t.lugar_trabajo_especifico = 24) then 'DIRECCION AUTOMOTORES / CHOFERES'
when (t.lugar_trabajo_especifico = 25) then 'AREA ADMINISTRATIVA DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 26) then 'AREA TECNICA DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 27) then 'AREA JURISDICCIONAL DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 28) then 'OTROS'
when (t.lugar_trabajo_especifico = 999) then 'SIN DATOS'
   END
) as lugar_trabajo_especifico,
                
                 count(*) as cantidad
                from tra_sal_justicia_arg t
               
                group by t.lugar_trabajo_especifico
                order by 1
                ";

			}else {
				
				$sql = "
	
                select
                (case
when (t.lugar_trabajo_especifico = 1) then 'FUERO CIVIL'
when (t.lugar_trabajo_especifico = 3) then 'FUERO COMERCIAL'
when (t.lugar_trabajo_especifico = 4) then 'FUERO PENAL'
when (t.lugar_trabajo_especifico = 5) then 'FUERO LABORAL'
when (t.lugar_trabajo_especifico = 6) then 'FUERO CONTENCIOSO ADMINISTRATIVO'
when (t.lugar_trabajo_especifico = 7) then 'FUERO DE FAMILIA'
when (t.lugar_trabajo_especifico = 14) then 'MULTIFUEROS'
when (t.lugar_trabajo_especifico = 17) then 'JUSTICIA DE PAZ'
when (t.lugar_trabajo_especifico = 18) then 'MANDAMIENTOS Y NOTIFICACIONES'
when (t.lugar_trabajo_especifico = 19) then 'MANTENIMIENTO'
when (t.lugar_trabajo_especifico = 20) then 'INFORMATICA'
when (t.lugar_trabajo_especifico = 21) then 'CUERPOS PERICIALES'
when (t.lugar_trabajo_especifico = 22) then 'POLICIA JUDICIAL / CUERPO DE INVESTIGACIONES JUDICIALES'
when (t.lugar_trabajo_especifico = 23) then 'EQUIPOS TECNICOS INTERDISCIPLINARIOS'
when (t.lugar_trabajo_especifico = 24) then 'DIRECCION AUTOMOTORES / CHOFERES'
when (t.lugar_trabajo_especifico = 25) then 'AREA ADMINISTRATIVA DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 26) then 'AREA TECNICA DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 27) then 'AREA JURISDICCIONAL DEL PODER JUDICIAL'
when (t.lugar_trabajo_especifico = 28) then 'OTROS'
when (t.lugar_trabajo_especifico = 999) then 'SIN DATOS'
   END
) as lugar_trabajo_especifico,
                
                 count(*) as cantidad
                from tra_sal_justicia_arg t
                where t.usuario like '".$usuario."'
                group by t.lugar_trabajo_especifico
                order by 1
"; 

				
			}
		$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }
	/**
	Retorna consulta de distribucion por antiguedad
	**/
	static function get_antiguedad_frecuencias($usuario)
        {
			
$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "SELECT 
p.antiguedad,
(case
when (p.sexo = 0) then 'SIN DATOS'
when (p.sexo = 1) then 'FEMENINO'
when (p.sexo = 2) then 'MASCULINO'
when (p.sexo = 3) then 'OTROS'
    END
) as sexo,
sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,
sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 
sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no , 
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 

(case
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) <= 10) then '0 a 10'
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) between 11 and 20) then '11 a 20'
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) between 21 and 30) then '21 a 30'
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) > 30) then 'MAS DE 31'   
   END
) as antiguedad,
sexo,
(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  

(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
            
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
			
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t

group by t.fecha_ingreso,
  t.sexo,
  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by antiguedad, sexo
order by 1";

			}else {
				
				 $sql = "SELECT 
p.antiguedad,
(case
when (p.sexo = 0) then 'SIN DATOS'
when (p.sexo = 1) then 'FEMENINO'
when (p.sexo = 2) then 'MASCULINO'
when (p.sexo = 3) then 'OTROS'
    END
) as sexo,
sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,
sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 


sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 
sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no , 
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 

(case
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) <= 10) then '0 a 10'
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) between 11 and 20) then '11 a 20'
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) between 21 and 30) then '21 a 30'
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) > 30) then 'MAS DE 31'  
   END
) as antiguedad,
sexo,
(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,   

(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
            
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
			
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t
where usuario like '".$usuario."'
group by t.fecha_ingreso,
  t.sexo,
  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by antiguedad, sexo
order by 1";
				
			}
		$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }	
    
        static function get_solo_antiguedad_frecuencias($usuario)
        {
			
$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "SELECT 
p.antiguedad,

sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,
sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 

sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 
sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no , 
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 

(case
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) <= 10) then '0 a 10'
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) between 11 and 20) then '11 a 20'
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) between 21 and 30) then '21 a 30'
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) > 30) then 'MAS DE 31'   
   END
) as antiguedad,

(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,  

(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
            
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
			
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t

group by t.fecha_ingreso,

  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by antiguedad
order by 1";

			}else {
				
				 $sql = "SELECT 
p.antiguedad,

sum(p.ventilacion_sin_datos) as ventilacion_sin_datos ,
sum(p.ventilacion_si) as ventilacion_si ,
sum(p.ventilacion_no) as ventilacion_no ,
sum(p.horas_trabajo_sin_datos) as  horas_trabajo_sin_datos , 
sum(p.horas_trabajo_1) as  horas_trabajo_1 , 
sum(p.horas_trabajo_2) as  horas_trabajo_2 , 
sum(p.horas_trabajo_3) as  horas_trabajo_3 , 
sum(p.horas_trabajo_4) as  horas_trabajo_4 , 
sum(p.horas_trabajo_5) as  horas_trabajo_5 , 
sum(p.horas_trabajo_6) as  horas_trabajo_6 , 
sum(p.horas_trabajo_7) as  horas_trabajo_7 , 
sum(p.horas_trabajo_8) as  horas_trabajo_8 , 
sum(p.horas_trabajo_9) as  horas_trabajo_9 , 
sum(p.horas_trabajo_10) as  horas_trabajo_10 , 
sum(p.horas_trabajo_11) as  horas_trabajo_11 , 
sum(p.horas_trabajo_12) as  horas_trabajo_12 , 
sum(p.horas_trabajo_13) as  horas_trabajo_13 , 
sum(p.horas_trabajo_14) as  horas_trabajo_14 , 


sum(p.mala_iluminacion_sin_datos) as  mala_iluminacion_sin_datos , 
sum(p.mala_iluminacion_si) as  mala_iluminacion_si , 
sum(p.mala_iluminacion_no) as  mala_iluminacion_no , 
sum(p.humedad_sin_datos) as humedad_sin_datos  , 
sum(p.humedad_si) as humedad_si  ,
sum(p.humedad_no) as humedad_no  ,
sum(p.temperaturas_elevadas_sin_datos) as temperaturas_elevadas_sin_datos  , 
sum(p.temperaturas_elevadas_si) as temperaturas_elevadas_si  , 
sum(p.temperaturas_elevadas_no) as temperaturas_elevadas_no  , 
sum(p.ausencia_sanitarios_sin_datos) as  ausencia_sanitarios_sin_datos , 
sum(p.ausencia_sanitarios_si) as  ausencia_sanitarios_si , 
sum(p.ausencia_sanitarios_no) as  ausencia_sanitarios_no , 
sum(p.hacinamiento_sin_datos) as  hacinamiento_sin_datos , 
sum(p.hacinamiento_si) as  hacinamiento_si , 
sum(p.hacinamiento_no) as  hacinamiento_no , 
sum(p.ruidos_sin_datos) as  ruidos_sin_datos , 
sum(p.ruidos_si) as  ruidos_si , 
sum(p.ruidos_no) as  ruidos_no , 
sum(p.posiciones_incomodas_sin_datos) as  posiciones_incomodas_sin_datos , 
sum(p.posiciones_incomodas_si) as  posiciones_incomodas_si , 
sum(p.posiciones_incomodas_no) as  posiciones_incomodas_no , 
sum(p.carga_trabajo_sin_datos) as  carga_trabajo_sin_datos , 
sum(p.carga_trabajo_si) as  carga_trabajo_si , 
sum(p.carga_trabajo_no) as  carga_trabajo_no , 
sum(p.organizar_trabajo_sin_datos) as organizar_trabajo_sin_datos  , 
sum(p.organizar_trabajo_si) as organizar_trabajo_si , 
sum(p.organizar_trabajo_no) as organizar_trabajo_no  , 
sum(p.ayuda_companieros_sin_datos) as  ayuda_companieros_sin_datos , 
sum(p.ayuda_companieros_si) as  ayuda_companieros_si , 
sum(p.ayuda_companieros_no) as  ayuda_companieros_no , 
sum(p.ayuda_superior_sin_datos) as  ayuda_superior_sin_datos , 
sum(p.ayuda_superior_si) as  ayuda_superior_si , 
sum(p.ayuda_superior_no) as  ayuda_superior_no , 
sum(p.situaciones_tension_sin_datos) as  situaciones_tension_sin_datos , 
sum(p.situaciones_tension_si) as  situaciones_tension_si , 
sum(p.situaciones_tension_no) as  situaciones_tension_no , 
sum(p.situaciones_tension_superior_sin_datos) as  situaciones_tension_superior_sin_datos , 
sum(p.situaciones_tension_superior_si) as  situaciones_tension_superior_si , 
sum(p.situaciones_tension_superior_no) as  situaciones_tension_superior_no , 
sum(p.violencia_laboral_sin_datos) as violencia_laboral_sin_datos  , 
sum(p.violencia_laboral_si) as violencia_laboral_si  , 
sum(p.violencia_laboral_no) as violencia_laboral_no  , 
sum(p.agotado_tensionado_sin_datos) as  agotado_tensionado_sin_datos , 
sum(p.agotado_tensionado_si) as  agotado_tensionado_si , 
sum(p.agotado_tensionado_no) as  agotado_tensionado_no , 
sum(p.sintoma_vision_sin_datos) as  sintoma_vision_sin_datos , 
sum(p.sintoma_vision_si) as  sintoma_vision_si , 
sum(p.sintoma_vision_no) as  sintoma_vision_no , 
sum(p.sintoma_muscular_sin_datos) as sintoma_muscular_sin_datos  , 
sum(p.sintoma_muscular_si) as sintoma_muscular_si  , 
sum(p.sintoma_muscular_no) as sintoma_muscular_no  , 
sum(p.sintoma_insomio_sin_datos) as sintoma_insomio_sin_datos  , 
sum(p.sintoma_insomio_si) as sintoma_insomio_si  , 
sum(p.sintoma_insomio_no) as sintoma_insomio_no  , 
sum(p.sintoma_palpitaciones_sin_datos) as  sintoma_palpitaciones_sin_datos , 
sum(p.sintoma_palpitaciones_si) as  sintoma_palpitaciones_si , 
sum(p.sintoma_palpitaciones_no) as  sintoma_palpitaciones_no , 
sum(p.sintoma_respirar_sin_datos) as sintoma_respirar_sin_datos , 
sum(p.sintoma_respirar_si) as sintoma_respirar_si  , 
sum(p.sintoma_respirar_no) as sintoma_respirar_no  , 
sum(p.sintoma_tristeza_desgano_sin_datos) as sintoma_tristeza_desgano_sin_datos  , 
sum(p.sintoma_tristeza_desgano_si) as sintoma_tristeza_desgano_si  , 
sum(p.sintoma_tristeza_desgano_no) as sintoma_tristeza_desgano_no  , 
sum(p.sintoma_angustia_sin_datos) as  sintoma_angustia_sin_datos , 
sum(p.sintoma_angustia_si) as  sintoma_angustia_si , 
sum(p.sintoma_angustia_no) as  sintoma_angustia_no , 
sum(p.sintoma_trastorno_digestivo_sin_datos) as sintoma_trastorno_digestivo_sin_datos  , 
sum(p.sintoma_trastorno_digestivo_si) as sintoma_trastorno_digestivo_si  , 
sum(p.sintoma_trastorno_digestivo_no) as sintoma_trastorno_digestivo_no  , 
sum(p.sintoma_vinculado_trabajo_sin_datos) as sintoma_vinculado_trabajo_sin_datos  , 
sum(p.sintoma_vinculado_trabajo_si) as sintoma_vinculado_trabajo_si  , 
sum(p.sintoma_vinculado_trabajo_no) as sintoma_vinculado_trabajo_no  , 
sum(p.licencia_enfermedad_sin_datos) as licencia_enfermedad_sin_datos,
sum(p.licencia_enfermedad_si) as licencia_enfermedad_si,
sum(p.licencia_enfermedad_no) as licencia_enfermedad_no
from
(select 

(case
when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) <= 10) then '0 a 10'
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) between 11 and 20) then '11 a 20'
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) between 21 and 30) then '21 a 30'
   when (EXTRACT(YEAR FROM age(timestamp 'now()',date(t.fecha_ingreso) ) ) > 30) then 'MAS DE 31'  
   END
) as antiguedad,

(CASE WHEN t.ventilacion = 0 THEN count(*) 
	    WHEN t.ventilacion = 1 THEN 0
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_sin_datos,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN count(*) 
            WHEN t.ventilacion = 2 THEN 0 
            END) AS ventilacion_si,
(CASE WHEN t.ventilacion = 0 THEN 0
	    WHEN t.ventilacion = 1 THEN 0 
            WHEN t.ventilacion = 2 THEN count(*) 
            END) AS ventilacion_no,

(CASE WHEN t.mala_iluminacion = 0 THEN count(*) 
	    WHEN t.mala_iluminacion = 1 THEN 0
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_sin_datos,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN count(*) 
            WHEN t.mala_iluminacion = 2 THEN 0 
            END) AS mala_iluminacion_si,
(CASE WHEN t.mala_iluminacion = 0 THEN 0
	    WHEN t.mala_iluminacion = 1 THEN 0 
            WHEN t.mala_iluminacion = 2 THEN count(*) 
            END) AS mala_iluminacion_no,
            
(CASE WHEN t.humedad = 0 THEN count(*) 
	    WHEN t.humedad = 1 THEN 0
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_sin_datos,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN count(*) 
            WHEN t.humedad = 2 THEN 0 
            END) AS humedad_si,
(CASE WHEN t.humedad = 0 THEN 0
	    WHEN t.humedad = 1 THEN 0 
            WHEN t.humedad = 2 THEN count(*) 
            END) AS humedad_no,
            
(CASE WHEN t.temperaturas_elevadas = 0 THEN count(*) 
	    WHEN t.temperaturas_elevadas = 1 THEN 0
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_sin_datos,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN count(*) 
            WHEN t.temperaturas_elevadas = 2 THEN 0 
            END) AS temperaturas_elevadas_si,
(CASE WHEN t.temperaturas_elevadas = 0 THEN 0
	    WHEN t.temperaturas_elevadas = 1 THEN 0 
            WHEN t.temperaturas_elevadas = 2 THEN count(*) 
            END) AS temperaturas_elevadas_no,
            
(CASE WHEN t.ausencia_sanitarios = 0 THEN count(*) 
	    WHEN t.ausencia_sanitarios = 1 THEN 0
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_sin_datos,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN count(*) 
            WHEN t.ausencia_sanitarios = 2 THEN 0 
            END) AS ausencia_sanitarios_si,
(CASE WHEN t.ausencia_sanitarios = 0 THEN 0
	    WHEN t.ausencia_sanitarios = 1 THEN 0 
            WHEN t.ausencia_sanitarios = 2 THEN count(*) 
            END) AS ausencia_sanitarios_no,
            
(CASE WHEN t.hacinamiento = 0 THEN count(*) 
	    WHEN t.hacinamiento = 1 THEN 0
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_sin_datos,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN count(*) 
            WHEN t.hacinamiento = 2 THEN 0 
            END) AS hacinamiento_si,
(CASE WHEN t.hacinamiento = 0 THEN 0
	    WHEN t.hacinamiento = 1 THEN 0 
            WHEN t.hacinamiento = 2 THEN count(*) 
            END) AS hacinamiento_no,
            
(CASE WHEN t.ruidos = 0 THEN count(*) 
	    WHEN t.ruidos = 1 THEN 0
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_sin_datos,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN count(*) 
            WHEN t.ruidos = 2 THEN 0 
            END) AS ruidos_si,
(CASE WHEN t.ruidos = 0 THEN 0
	    WHEN t.ruidos = 1 THEN 0 
            WHEN t.ruidos = 2 THEN count(*) 
            END) AS ruidos_no,
            
(CASE WHEN t.posiciones_incomodas = 0 THEN count(*) 
	    WHEN t.posiciones_incomodas = 1 THEN 0
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_sin_datos,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN count(*) 
            WHEN t.posiciones_incomodas = 2 THEN 0 
            END) AS posiciones_incomodas_si,
(CASE WHEN t.posiciones_incomodas = 0 THEN 0
	    WHEN t.posiciones_incomodas = 1 THEN 0 
            WHEN t.posiciones_incomodas = 2 THEN count(*) 
            END) AS posiciones_incomodas_no,

(CASE   WHEN t.horas_trabajo = 0 THEN count(*) 
	    WHEN t.horas_trabajo = 1 THEN 0
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_sin_datos,
(CASE WHEN t.horas_trabajo = 0 THEN 0
        WHEN t.horas_trabajo = 1 THEN count(*) 
        WHEN t.horas_trabajo = 2 THEN 0 
        WHEN t.horas_trabajo = 3 THEN 0 
        WHEN t.horas_trabajo = 4 THEN 0 
        WHEN t.horas_trabajo = 5 THEN 0 
        WHEN t.horas_trabajo = 6 THEN 0 
        WHEN t.horas_trabajo = 7 THEN 0 
        WHEN t.horas_trabajo = 8 THEN 0 
        WHEN t.horas_trabajo = 9 THEN 0 
        WHEN t.horas_trabajo = 10 THEN 0 
        WHEN t.horas_trabajo = 11 THEN 0 
        WHEN t.horas_trabajo = 12 THEN 0 
        WHEN t.horas_trabajo = 13 THEN 0 
        WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_1,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN count(*)  
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_2,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN count(*)  
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_3,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN count(*)  
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_4,
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN count(*)  
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_5,            
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN count(*)  
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
                END) AS horas_trabajo_6,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0  
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN count(*)  
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_7,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN count(*)  
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_8,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN count(*)  
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_9,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN count(*) 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_10,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN count(*)  
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_11,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN count(*)  
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_12,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN count(*)  
WHEN t.horas_trabajo = 14 THEN 0 
            END) AS horas_trabajo_13,  
(CASE WHEN t.horas_trabajo = 0 THEN 0
WHEN t.horas_trabajo = 1 THEN 0 
WHEN t.horas_trabajo = 2 THEN 0 
WHEN t.horas_trabajo = 3 THEN 0 
WHEN t.horas_trabajo = 4 THEN 0 
WHEN t.horas_trabajo = 5 THEN 0 
WHEN t.horas_trabajo = 6 THEN 0 
WHEN t.horas_trabajo = 7 THEN 0 
WHEN t.horas_trabajo = 8 THEN 0 
WHEN t.horas_trabajo = 9 THEN 0 
WHEN t.horas_trabajo = 10 THEN 0 
WHEN t.horas_trabajo = 11 THEN 0 
WHEN t.horas_trabajo = 12 THEN 0 
WHEN t.horas_trabajo = 13 THEN 0 
WHEN t.horas_trabajo = 14 THEN count(*)  
            END) AS horas_trabajo_14,   

(CASE WHEN t.carga_trabajo = 0 THEN count(*) 
	    WHEN t.carga_trabajo = 1 THEN 0
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_sin_datos,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN count(*) 
            WHEN t.carga_trabajo = 2 THEN 0 
            END) AS carga_trabajo_si,
(CASE WHEN t.carga_trabajo = 0 THEN 0
	    WHEN t.carga_trabajo = 1 THEN 0 
            WHEN t.carga_trabajo = 2 THEN count(*) 
            END) AS carga_trabajo_no,
            
(CASE WHEN t.organizar_trabajo = 0 THEN count(*) 
	    WHEN t.organizar_trabajo = 1 THEN 0
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_sin_datos,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN count(*) 
            WHEN t.organizar_trabajo = 2 THEN 0 
            END) AS organizar_trabajo_si,
(CASE WHEN t.organizar_trabajo = 0 THEN 0
	    WHEN t.organizar_trabajo = 1 THEN 0 
            WHEN t.organizar_trabajo = 2 THEN count(*) 
            END) AS organizar_trabajo_no,
            
(CASE WHEN t.ayuda_companieros = 0 THEN count(*) 
	    WHEN t.ayuda_companieros = 1 THEN 0
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_sin_datos,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN count(*) 
            WHEN t.ayuda_companieros = 2 THEN 0 
            END) AS ayuda_companieros_si,
(CASE WHEN t.ayuda_companieros = 0 THEN 0
	    WHEN t.ayuda_companieros = 1 THEN 0 
            WHEN t.ayuda_companieros = 2 THEN count(*) 
            END) AS ayuda_companieros_no,
            
(CASE WHEN t.ayuda_superior = 0 THEN count(*) 
	    WHEN t.ayuda_superior = 1 THEN 0
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_sin_datos,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN count(*) 
            WHEN t.ayuda_superior = 2 THEN 0 
            END) AS ayuda_superior_si,
(CASE WHEN t.ayuda_superior = 0 THEN 0
	    WHEN t.ayuda_superior = 1 THEN 0 
            WHEN t.ayuda_superior = 2 THEN count(*) 
            END) AS ayuda_superior_no,
            
(CASE WHEN t.situaciones_tension = 0 THEN count(*) 
	    WHEN t.situaciones_tension = 1 THEN 0
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_sin_datos,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN count(*) 
            WHEN t.situaciones_tension = 2 THEN 0 
            END) AS situaciones_tension_si,
(CASE WHEN t.situaciones_tension = 0 THEN 0
	    WHEN t.situaciones_tension = 1 THEN 0 
            WHEN t.situaciones_tension = 2 THEN count(*) 
            END) AS situaciones_tension_no,
            
(CASE WHEN t.situaciones_tension_superior = 0 THEN count(*) 
	    WHEN t.situaciones_tension_superior = 1 THEN 0
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_sin_datos,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN count(*) 
            WHEN t.situaciones_tension_superior = 2 THEN 0 
            END) AS situaciones_tension_superior_si,
(CASE WHEN t.situaciones_tension_superior = 0 THEN 0
	    WHEN t.situaciones_tension_superior = 1 THEN 0 
            WHEN t.situaciones_tension_superior = 2 THEN count(*) 
            END) AS situaciones_tension_superior_no,
			
(CASE WHEN t.violencia_laboral = 0 THEN count(*) 
	    WHEN t.violencia_laboral = 1 THEN 0
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_sin_datos,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN count(*) 
            WHEN t.violencia_laboral = 2 THEN 0 
            END) AS violencia_laboral_si,
(CASE WHEN t.violencia_laboral = 0 THEN 0
	    WHEN t.violencia_laboral = 1 THEN 0 
            WHEN t.violencia_laboral = 2 THEN count(*) 
            END) AS violencia_laboral_no,
            
(CASE WHEN t.agotado_tensionado = 0 THEN count(*) 
	    WHEN t.agotado_tensionado = 1 THEN 0
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_sin_datos,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN count(*) 
            WHEN t.agotado_tensionado = 2 THEN 0 
            END) AS agotado_tensionado_si,
(CASE WHEN t.agotado_tensionado = 0 THEN 0
	    WHEN t.agotado_tensionado = 1 THEN 0 
            WHEN t.agotado_tensionado = 2 THEN count(*) 
            END) AS agotado_tensionado_no,
            
(CASE WHEN t.sintoma_vision = 0 THEN count(*) 
	    WHEN t.sintoma_vision = 1 THEN 0
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_sin_datos,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN count(*) 
            WHEN t.sintoma_vision = 2 THEN 0 
            END) AS sintoma_vision_si,
(CASE WHEN t.sintoma_vision = 0 THEN 0
	    WHEN t.sintoma_vision = 1 THEN 0 
            WHEN t.sintoma_vision = 2 THEN count(*) 
            END) AS sintoma_vision_no,
            
(CASE WHEN t.sintoma_muscular = 0 THEN count(*) 
	    WHEN t.sintoma_muscular = 1 THEN 0
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_sin_datos,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN count(*) 
            WHEN t.sintoma_muscular = 2 THEN 0 
            END) AS sintoma_muscular_si,
(CASE WHEN t.sintoma_muscular = 0 THEN 0
	    WHEN t.sintoma_muscular = 1 THEN 0 
            WHEN t.sintoma_muscular = 2 THEN count(*) 
            END) AS sintoma_muscular_no,
            
(CASE WHEN t.sintoma_insomio = 0 THEN count(*) 
	    WHEN t.sintoma_insomio = 1 THEN 0
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_sin_datos,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN count(*) 
            WHEN t.sintoma_insomio = 2 THEN 0 
            END) AS sintoma_insomio_si,
(CASE WHEN t.sintoma_insomio = 0 THEN 0
	    WHEN t.sintoma_insomio = 1 THEN 0 
            WHEN t.sintoma_insomio = 2 THEN count(*) 
            END) AS sintoma_insomio_no,
            
(CASE WHEN t.sintoma_palpitaciones = 0 THEN count(*) 
	    WHEN t.sintoma_palpitaciones = 1 THEN 0
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_sin_datos,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN count(*) 
            WHEN t.sintoma_palpitaciones = 2 THEN 0 
            END) AS sintoma_palpitaciones_si,
(CASE WHEN t.sintoma_palpitaciones = 0 THEN 0
	    WHEN t.sintoma_palpitaciones = 1 THEN 0 
            WHEN t.sintoma_palpitaciones = 2 THEN count(*) 
            END) AS sintoma_palpitaciones_no,
            
(CASE WHEN t.sintoma_respirar = 0 THEN count(*) 
	    WHEN t.sintoma_respirar = 1 THEN 0
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_sin_datos,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN count(*) 
            WHEN t.sintoma_respirar = 2 THEN 0 
            END) AS sintoma_respirar_si,
(CASE WHEN t.sintoma_respirar = 0 THEN 0
	    WHEN t.sintoma_respirar = 1 THEN 0 
            WHEN t.sintoma_respirar = 2 THEN count(*) 
            END) AS sintoma_respirar_no,
            
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN count(*) 
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_sin_datos,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN count(*) 
            WHEN t.sintoma_tristeza_desgano = 2 THEN 0 
            END) AS sintoma_tristeza_desgano_si,
(CASE WHEN t.sintoma_tristeza_desgano = 0 THEN 0
	    WHEN t.sintoma_tristeza_desgano = 1 THEN 0 
            WHEN t.sintoma_tristeza_desgano = 2 THEN count(*) 
            END) AS sintoma_tristeza_desgano_no,
            
(CASE WHEN t.sintoma_angustia = 0 THEN count(*) 
	    WHEN t.sintoma_angustia = 1 THEN 0
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_sin_datos,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN count(*) 
            WHEN t.sintoma_angustia = 2 THEN 0 
            END) AS sintoma_angustia_si,
(CASE WHEN t.sintoma_angustia = 0 THEN 0
	    WHEN t.sintoma_angustia = 1 THEN 0 
            WHEN t.sintoma_angustia = 2 THEN count(*) 
            END) AS sintoma_angustia_no,
            
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN count(*) 
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_sin_datos,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN count(*) 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN 0 
            END) AS sintoma_trastorno_digestivo_si,
(CASE WHEN t.sintoma_trastorno_digestivo = 0 THEN 0
	    WHEN t.sintoma_trastorno_digestivo = 1 THEN 0 
            WHEN t.sintoma_trastorno_digestivo = 2 THEN count(*) 
            END) AS sintoma_trastorno_digestivo_no,
            
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN count(*) 
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_sin_datos,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN count(*) 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN 0 
            END) AS sintoma_vinculado_trabajo_si,
(CASE WHEN t.sintoma_vinculado_trabajo = 0 THEN 0
	    WHEN t.sintoma_vinculado_trabajo = 1 THEN 0 
            WHEN t.sintoma_vinculado_trabajo = 2 THEN count(*) 
            END) AS sintoma_vinculado_trabajo_no,
            
(CASE WHEN t.licencia_enfermedad = 0 THEN count(*) 
	    WHEN t.licencia_enfermedad = 1 THEN 0
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_sin_datos,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN count(*) 
            WHEN t.licencia_enfermedad = 2 THEN 0 
            END) AS licencia_enfermedad_si,
(CASE WHEN t.licencia_enfermedad = 0 THEN 0
	    WHEN t.licencia_enfermedad = 1 THEN 0 
            WHEN t.licencia_enfermedad = 2 THEN count(*) 
            END) AS licencia_enfermedad_no



from tra_sal_justicia_arg t
where usuario like '".$usuario."'
group by t.fecha_ingreso,

  t.ventilacion,
  t.mala_iluminacion, 
  t.humedad, 
  t.temperaturas_elevadas, 
  t.ausencia_sanitarios, 
  t.hacinamiento, 
  t.ruidos, 
  t.posiciones_incomodas, 
  t.horas_trabajo,
  t.carga_trabajo, 
  t.organizar_trabajo, 
  t.ayuda_companieros, 
  t.ayuda_superior, 
  t.situaciones_tension, 
  t.violencia_laboral, 
  t.agotado_tensionado, 
  t.sintoma_vision, 
  t.sintoma_muscular, 
  t.sintoma_insomio, 
  t.sintoma_palpitaciones, 
  t.sintoma_respirar, 
  t.sintoma_tristeza_desgano, 
  t.sintoma_angustia, 
  t.sintoma_trastorno_digestivo, 
  t.sintoma_vinculado_trabajo, 
  t.licencia_enfermedad,
  t.situaciones_tension_superior
) as p
group by antiguedad
order by 1";
				
			}
		$rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }	
	/**
	Retorna consulta de cantidad por distribucion por edad
	**/
	static function get_edades_cantidad($usuario)
        {

 

			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "
	
select count(*) as cantidad from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) <= 25
union all 
select count(*) as cantidad from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) between 26 and 35
union all 
select count(*) as cantidad from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) between 36 and 45
union all
select count(*) as cantidad from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) between 46 and 55
union all 
select count(*) as cantidad from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) > 55";
			}else {

                $sql = "
	
                select count(*) as cantidad from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) <= 25 and usuario like '".$usuario."'
                union all 
                select count(*) as cantidad from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) between 26 and 35 and usuario like '".$usuario."'
                union all 
                select count(*) as cantidad from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) between 36 and 45 and usuario like '".$usuario."'
		        union all 
                select count(*) as cantidad from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) between 46 and 55 and usuario like '".$usuario."'
                union all 
                select count(*) as cantidad from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) > 55 and usuario like '".$usuario."'";
				
			 
				
			}
  $rs = toba::db('saludytrabajo')->consultar($sql);
		return $rs;
        }
		
		/**
	Retorna consulta de cantidad por distribucion por edad
	**/
	static function get_edades_total()
        {
			$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "select count(*) as cantidad
from tra_sal_justicia_arg where fecha_nacimiento is not null";
			}else {
				
			            $sql = "
	select count(*) as cantidad
from tra_sal_justicia_arg where fecha_nacimiento is not null and usuario like '".$usuario."'";	
				
			}
  $rs =  toba::db('saludytrabajo')->consultar($sql);
  $rs = (int) $rs[0]['cantidad'];
		return $rs;
        }
		
			/**
	Retorna consulta de cantidad por distribucion por edad
	**/
	static function get_antiguedad_total()
        {
			$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "select count(*) as cantidad
from tra_sal_justicia_arg where fecha_ingreso  is not null";
			}else {
				
			            $sql = "
	select count(*) as cantidad
from tra_sal_justicia_arg where fecha_ingreso  is not null and usuario like '".$usuario."'";	
				
			}
  $rs =  toba::db('saludytrabajo')->consultar($sql);
  $rs = (int) $rs[0]['cantidad'];
		return $rs;
        }
	
			/**
	Retorna consulta de cantidad por distribucion por edad
	**/
	static function get_antiguedad_promedio()
        {
			$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "select avg(EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) )) as cantidad
from tra_sal_justicia_arg";
			}else {
				
			            $sql = "
	select avg(EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_ingreso) ) )) as cantidad 
from tra_sal_justicia_arg where usuario like '".$usuario."'";	
				
			}
  $rs =  toba::db('saludytrabajo')->consultar($sql);
  $rs = (int) $rs[0]['cantidad'];
		return $rs;
        }

		/**
	Retorna consulta de cantidad por distribucion por edad
	**/
	static function get_edad_promedio()
        {
			$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "select avg(EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) )) as cantidad
from tra_sal_justicia_arg";
			}else {
				
			            $sql = "
	select avg(EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) )) as cantidad 
from tra_sal_justicia_arg where usuario like '".$usuario."'";	
				
			}
  $rs =  toba::db('saludytrabajo')->consultar($sql);
  $rs = (int) $rs[0]['cantidad'];
		return $rs;
        }
		
		/**
	Retorna consulta de cantidad por distribucion por edad
	**/
	static function get_genero_total()
        {
			$usuario = texto_plano(toba::usuario()->get_id());
			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "select count(*) as cantidad
from tra_sal_justicia_arg where sexo is not null";
			}else {
				
			            $sql = "
	select count(*) as cantidad
from tra_sal_justicia_arg where sexo is not null and usuario like '".$usuario."'";	
				
			}
  $rs =  toba::db('saludytrabajo')->consultar($sql);
  $rs = (int) $rs[0]['cantidad'];
		return $rs;
        }
		
	/**
	Retorna consulta de distribucion por edad
	**/	
	static function get_edades($usuario)
        {




			if($usuario == 'toba' or $usuario == 'administrador') {
            $sql = "

select '0 a 25' as rangoedad, 
count(*) as cantidad, 
ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) as porcentaje, 
(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) 
from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) <= 25) as porc_acum  
from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) <= 25



union all

select '26 a 35' as rangoedad, 
count(*) as cantidad, 
ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) as porcentaje, 
(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) 
from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) between 0 and 35) as porc_acum  
from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) between 26 and 35

union all

select '36 a 45' as rangoedad, 
count(*) as cantidad, 
ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) as porcentaje, 
(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) 
from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) between 0 and 45) as porc_acum  
from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) between 36 and 45

union all

select '46 a 55' as rangoedad, 
count(*) as cantidad, 
ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) as porcentaje, 
(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) 
from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) between 0 and 55) as porc_acum  
from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) between 46 and 55

union all


select 'MAS DE 56' as rangoedad, 
count(*) as cantidad, 
ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) as porcentaje, 
(select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg),2) 
from tra_sal_justicia_arg as e1  ) as porc_acum  
from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) > 55";

}else
{

    $sql = "

        select '0 a 25' as rangoedad, 
    count(*) as cantidad, 
    ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) as porcentaje, 
    (select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) 
    from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) <= 25 and usuario like '".$usuario."') as porc_acum  
    from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) <= 25 and usuario like '".$usuario."'      
    
    union all
    
    select '26 a 35' as rangoedad, 
    count(*) as cantidad, 
    ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) as porcentaje, 
    (select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) 
    from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) <= 35 and usuario like '".$usuario."') as porc_acum  
    from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) <= 35
    and EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) > 25 and usuario like '".$usuario."'
    
    union all
    
    select '36 a 45' as rangoedad, 
    count(*) as cantidad, 
    ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) as porcentaje, 
    (select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) 
    from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) <= 45 and usuario like '".$usuario."') as porc_acum  
    from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) <= 45
    and EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) > 35 and usuario like '".$usuario."'
	
    union all
    
    select '46 a 55' as rangoedad, 
    count(*) as cantidad, 
    ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) as porcentaje, 
    (select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) 
    from tra_sal_justicia_arg as e1 where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) <= 55 and usuario like '".$usuario."') as porc_acum  
    from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) <= 55
    and EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento) ) ) > 45 and usuario like '".$usuario."'
    
    union all    
    
    select 'MAS DE 56' as rangoedad, 
    count(*) as cantidad, 
    ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) as porcentaje, 
    (select ROUND(cast(100*count(*) as numeric(10,2))/ (select count(*) from tra_sal_justicia_arg where usuario like '".$usuario."'),2) 
    from tra_sal_justicia_arg as e1 where usuario like '".$usuario."' ) as porc_acum  
    from tra_sal_justicia_arg where EXTRACT(YEAR FROM age(timestamp 'now()',date(fecha_nacimiento))) > 55 and usuario like '".$usuario."'";

}
            return toba::db('saludytrabajo')->consultar($sql);
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
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = 'OTROS';

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
	Retorna una lista de ESTAMENTO
	**/
	static function get_estamento()
	{	 
	    $estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = 'Empleado/a - Trabajador/a';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = 'Funcionario/a';

		
		return $estados;
	}

      /**
	Retorna una lista de horas
	**/
	static function get_horas()
	{	 
	    	$estados[0]['id'] = '0';
		$estados[0]['descripcion'] = 'SIN DATOS';
		$estados[1]['id'] = '1';
		$estados[1]['descripcion'] = '1';
		$estados[2]['id'] = '2';
		$estados[2]['descripcion'] = '2';
		$estados[3]['id'] = '3';
		$estados[3]['descripcion'] = '3';
		$estados[4]['id'] = '4';
		$estados[4]['descripcion'] = '4';
		$estados[5]['id'] = '5';
		$estados[5]['descripcion'] = '5';
		$estados[6]['id'] = '6';
		$estados[6]['descripcion'] = '6';
		$estados[7]['id'] = '7';
		$estados[7]['descripcion'] = '7';
		$estados[8]['id'] = '8';
		$estados[8]['descripcion'] = '8';
		$estados[9]['id'] = '9';
		$estados[9]['descripcion'] = '9';
		$estados[10]['id'] = '10';
		$estados[10]['descripcion'] = '10';
		$estados[11]['id'] = '11';
		$estados[11]['descripcion'] = '11';
		$estados[12]['id'] = '12';
		$estados[12]['descripcion'] = '12';
		$estados[13]['id'] = '13';
		$estados[13]['descripcion'] = '13';
		$estados[14]['id'] = '14';
		$estados[14]['descripcion'] = '14';

		
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
