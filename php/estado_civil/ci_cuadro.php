<?php
include('consultas.php');
class ci_cuadro extends encsaltra_ci
{
	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		$consulta = new Consultas();
		
		$cuadro->set_datos($consulta->get_estado_civil_frecuencia());

	}
	
	function conf__grafico(toba_ei_grafico $grafico)
	{
		$consulta = new Consultas();    
		$grafico->conf()->canvas__set_titulo("Distribución por Estado Civil de los encuestados");
		$datos =  $consulta->get_estado_civil_frecuencia();
		
		$array = array();
		$arrayLeyenda = array();
		foreach($datos as $fila) {
			array_push ( $array , $fila['cantidad']);
				array_push ( $arrayLeyenda , $fila['estado_civil']);
		}
		$grafico->conf()
				->serie__agregar('lineas_1', $array )
				->serie__set_color(array('#FFC300'))
				;

		$grafico->conf()->canvas()->Set90AndMargin(120,20,50,30);
		$grafico->conf()->canvas()->xaxis->SetTickLabels($arrayLeyenda);


	}
}
?>