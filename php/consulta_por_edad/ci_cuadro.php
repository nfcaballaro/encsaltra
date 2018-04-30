<?php
include('consultas.php');
class ci_cuadro extends saludytrabajo_ci
{
	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		$consulta = new Consultas();
		$usuario = texto_plano(toba::usuario()->get_id());
		
		$cuadro->set_datos($consulta->get_edades($usuario));
	}
	
	function conf__grafico(toba_ei_grafico $grafico)
	{
		$consulta = new Consultas();    
		$grafico->conf()->canvas__set_titulo("Distribución por edades de los encuestados");
		$usuario = texto_plano(toba::usuario()->get_id());
		
		$datos =  $consulta->get_edades_cantidad($usuario);
		
		$array = array();
		foreach($datos as $fila) {
			array_push ( $array , $fila['cantidad']);
		}
		$grafico->conf()
				->serie__agregar('1', $array )
				->serie__set_color(array('#FFC300'));
		
		// Manejando el canvas directamente
		$grafico->conf()->canvas()->ygrid->SetFill(true, '#EFEFEF@0.7', '#BBCCFF@0.3');
		$grafico->conf()->canvas()->xaxis->SetTickLabels(array('MENOS DE 25','26 a 35','36 a 45','46 a 55', 'MAS DE 56'));
		







	}
}
?>