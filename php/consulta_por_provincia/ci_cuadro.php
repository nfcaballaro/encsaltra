<?php
include('consultas.php');
class ci_cuadro extends saludytrabajo_ci
{
	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		$consulta = new Consultas();
		
		$cuadro->set_datos($consulta->get_jurisdiccion_frecuencia());

	}
	
	function conf__grafico(toba_ei_grafico $grafico)
	{
		$consulta = new Consultas();    
		$grafico->conf()->canvas__set_titulo("Distribución por Provincia de los encuestados");
		$datos =  $consulta->get_jurisdiccion_frecuencia();
		
		$array = array();
		$arrayLeyenda = array();
		foreach($datos as $fila) {
			array_push ( $array , $fila['cantidad']);
				array_push ( $arrayLeyenda , $fila['jurisdiccion']);
		}
		$grafico->conf()
				->serie__agregar('lineas_1', $array )
				->serie__set_color(array('#188AE2'))
				;
		// $grafico->conf()->canvas()->yaxis->SetLabelFormatCallback('number_format');        
		// Manejando el canvas directamente
		
		
		//$grafico->conf()->canvas()->SetScale("textlin",0,1);
		$grafico->conf()->canvas()->xaxis->SetTickLabels($arrayLeyenda);


	}
}
?>