<?php
include('consultas.php');
class ci_cuadro extends encsaltra_ci
{
	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		$consulta = new Consultas();
		
		$cuadro->set_datos($consulta->get_edades());
	}
	
	function conf__grafico(toba_ei_grafico $grafico)
	{
		$consulta = new Consultas();    
		$grafico->conf()->canvas__set_titulo("Distribución por edades de los encuestados");
		$datos =  $consulta->get_edades_cantidad();
		
		$array = array();
		foreach($datos as $fila) {
			array_push ( $array , $fila['cantidad']);
		}
		$grafico->conf()
				->serie__agregar('1', $array )
				->serie__set_color(array('#FFC300'));
		
		// Manejando el canvas directamente
		$grafico->conf()->canvas()->ygrid->SetFill(true, '#EFEFEF@0.7', '#BBCCFF@0.3');
		$grafico->conf()->canvas()->xaxis->SetTickLabels(array('MENOS DE 20','20 a 25','26 a 30', '31 a 35', '36 a 40', '41 a 45', '46 a 50', '51 a 55', '56 a 60', 'MAS DE 60'));
		







	}
}
?>