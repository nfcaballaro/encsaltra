<?php
/**
 * Esta clase fue y será generada automáticamente. NO EDITAR A MANO.
 * @ignore
 */
class encsaltra_autoload 
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
		'encsaltra_ci' => 'extension_toba/componentes/encsaltra_ci.php',
		'encsaltra_cn' => 'extension_toba/componentes/encsaltra_cn.php',
		'encsaltra_datos_relacion' => 'extension_toba/componentes/encsaltra_datos_relacion.php',
		'encsaltra_datos_tabla' => 'extension_toba/componentes/encsaltra_datos_tabla.php',
		'encsaltra_ei_arbol' => 'extension_toba/componentes/encsaltra_ei_arbol.php',
		'encsaltra_ei_archivos' => 'extension_toba/componentes/encsaltra_ei_archivos.php',
		'encsaltra_ei_calendario' => 'extension_toba/componentes/encsaltra_ei_calendario.php',
		'encsaltra_ei_codigo' => 'extension_toba/componentes/encsaltra_ei_codigo.php',
		'encsaltra_ei_cuadro' => 'extension_toba/componentes/encsaltra_ei_cuadro.php',
		'encsaltra_ei_esquema' => 'extension_toba/componentes/encsaltra_ei_esquema.php',
		'encsaltra_ei_filtro' => 'extension_toba/componentes/encsaltra_ei_filtro.php',
		'encsaltra_ei_firma' => 'extension_toba/componentes/encsaltra_ei_firma.php',
		'encsaltra_ei_formulario' => 'extension_toba/componentes/encsaltra_ei_formulario.php',
		'encsaltra_ei_formulario_ml' => 'extension_toba/componentes/encsaltra_ei_formulario_ml.php',
		'encsaltra_ei_grafico' => 'extension_toba/componentes/encsaltra_ei_grafico.php',
		'encsaltra_ei_mapa' => 'extension_toba/componentes/encsaltra_ei_mapa.php',
		'encsaltra_servicio_web' => 'extension_toba/componentes/encsaltra_servicio_web.php',
		'encsaltra_comando' => 'extension_toba/encsaltra_comando.php',
		'encsaltra_modelo' => 'extension_toba/encsaltra_modelo.php',
	);
}
?>