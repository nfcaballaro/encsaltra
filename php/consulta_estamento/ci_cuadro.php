<?php
include('consultas.php');
class ci_cuadro extends saludytrabajo_ci
{
	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		$consulta = new Consultas();
		$usuario = texto_plano(toba::usuario()->get_id());
		$cuadro->set_datos($consulta->get_solo_estamento_frecuencias($usuario));

	}
	
	function conf__grafico(toba_ei_grafico $grafico)
	{
		$consulta = new Consultas();    
		$grafico->conf()->canvas__set_titulo("Distribución por Género de los encuestados");
		$datos =  $consulta->get_genero();
		
		$array = array();
		$arrayLeyendas = array();
		foreach($datos as $fila) {
			array_push ( $array , $fila['cantidad']);
				array_push ( $arrayLeyendas , $fila['genero']);
		}
		//$grafico->conf()
		//        ->serie__agregar('1', $array )
		//        ->serie__set_color(array('#FFC300'));
		
		// Manejando el canvas directamente
		//$grafico->conf()->canvas()->ygrid->SetFill(true, '#EFEFEF@0.7', '#BBCCFF@0.3');
		//$grafico->conf()->canvas()->xaxis->SetTickLabels(array('FEMENINO', 'MASCULINO','SIN DATOS'));
		//$leyendas = array('FEMENINO', 'MASCULINO','SIN DATOS');
		
		$grafico->conf()
				->serie__agregar('nombre', $array)    // Automáticamente setea la serie actual
				->serie__set_leyendas($arrayLeyendas )
				//->serie__set_titulo('Distribución por Género de los encuestados')
				->serie__set_tema('sand')
				->serie__set_centro(0.5)
			;
			//   $grafico->conf()->canvas()->SetSliceColors(array('#1E90FF','#2E8B57','#ADFF2F'));


	}
}
?>