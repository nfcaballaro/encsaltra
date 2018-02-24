<?php
include('consultas.php');
class ci_cuadro extends encsaltra_ci
{
	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		$consulta = new Consultas();
		
		$cuadro->set_datos($consulta->get_seppo());

	}
	
	function conf__grafico(toba_ei_grafico $grafico)
	{
		$consulta = new Consultas();    
		$grafico->conf()->canvas__set_titulo("Seppo de los encuestados");
		$datos =  $consulta->get_seppo();
		
		$array = array();
		$arrayLeyendas = array();
		foreach($datos as $fila) {
			array_push ( $array , $fila['cantidad']);
			array_push ( $arrayLeyendas , $fila['estado']);
		}
			
		$grafico->conf()
				->serie__agregar('nombre', $array)    // Automáticamente setea la serie actual
				->serie__set_leyendas($arrayLeyendas )
				->serie__set_tema('sand')
				->serie__set_centro(0.5)
			;
	}
}
?>