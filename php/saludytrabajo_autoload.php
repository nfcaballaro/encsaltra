<?php
/**
 * Esta clase fue y será generada automáticamente. NO EDITAR A MANO.
 * @ignore
 */
class saludytrabajo_autoload 
{
	static function existe_clase($nombre)
	{
		return isset(self::$clases[$nombre]);
	}

	static function cargar($nombre)
	{
		if (self::existe_clase($nombre)) { 
			 require_once(dirname(__FILE__) .'/'. self::$clases[$nombre]); 
		}
	}

	static protected $clases = array(
		'saludytrabajo_ci' => 'extension_toba/componentes/saludytrabajo_ci.php',
		'saludytrabajo_cn' => 'extension_toba/componentes/saludytrabajo_cn.php',
		'saludytrabajo_datos_relacion' => 'extension_toba/componentes/saludytrabajo_datos_relacion.php',
		'saludytrabajo_datos_tabla' => 'extension_toba/componentes/saludytrabajo_datos_tabla.php',
		'saludytrabajo_ei_arbol' => 'extension_toba/componentes/saludytrabajo_ei_arbol.php',
		'saludytrabajo_ei_archivos' => 'extension_toba/componentes/saludytrabajo_ei_archivos.php',
		'saludytrabajo_ei_calendario' => 'extension_toba/componentes/saludytrabajo_ei_calendario.php',
		'saludytrabajo_ei_codigo' => 'extension_toba/componentes/saludytrabajo_ei_codigo.php',
		'saludytrabajo_ei_cuadro' => 'extension_toba/componentes/saludytrabajo_ei_cuadro.php',
		'saludytrabajo_ei_esquema' => 'extension_toba/componentes/saludytrabajo_ei_esquema.php',
		'saludytrabajo_ei_filtro' => 'extension_toba/componentes/saludytrabajo_ei_filtro.php',
		'saludytrabajo_ei_firma' => 'extension_toba/componentes/saludytrabajo_ei_firma.php',
		'saludytrabajo_ei_formulario' => 'extension_toba/componentes/saludytrabajo_ei_formulario.php',
		'saludytrabajo_ei_formulario_ml' => 'extension_toba/componentes/saludytrabajo_ei_formulario_ml.php',
		'saludytrabajo_ei_grafico' => 'extension_toba/componentes/saludytrabajo_ei_grafico.php',
		'saludytrabajo_ei_mapa' => 'extension_toba/componentes/saludytrabajo_ei_mapa.php',
		'saludytrabajo_servicio_web' => 'extension_toba/componentes/saludytrabajo_servicio_web.php',
		'saludytrabajo_comando' => 'extension_toba/saludytrabajo_comando.php',
		'saludytrabajo_modelo' => 'extension_toba/saludytrabajo_modelo.php',
	);
}
?>