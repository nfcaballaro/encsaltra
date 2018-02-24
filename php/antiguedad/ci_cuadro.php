<?php
include('consultas.php');
class ci_cuadro extends encsaltra_ci
{
	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		$consulta = new Consultas();
		
		$cuadro->set_datos($consulta->get_antiguedad());

	}
	
	function conf__grafico(toba_ei_grafico $grafico)
	{
		$consulta = new Consultas();    
		$grafico->conf()->canvas__set_titulo("Distribución por Antiguedad de los encuestados");
		$datos =  $consulta->get_antiguedad();
		
		$array = array();
		foreach($datos as $fila) {
			array_push ( $array , $fila['cantidad']);
		}
		$grafico->conf()
				->serie__agregar('lineas_1', $array )
				->serie__set_color(array('#18E236'))
				;
		$grafico->conf()->canvas()->ygrid->SetFill(true, '#EFEFEF@0.7', '#BBCCFF@0.3');
		$grafico->conf()->canvas()->xaxis->SetTickLabels(array('0 a 5','6 a 10','11 a 15', '16 a 20', '21 a 25', '26 a 30', '31 a 35', 'MAS DE 35' ));
	
	}
}
?>