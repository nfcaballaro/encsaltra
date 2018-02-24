<?php
include('consultas.php');
class ci_cuadro extends encsaltra_ci
{	
	function conf__grafico_psico_color(toba_ei_grafico $grafico)
	{
		$consulta = new Consultas();    
		$grafico->conf()->canvas__set_titulo("Distribución psico_color de los encuestados");
		$datos =  $consulta->get_psicosocial_psico_color();
		
		$array = array();
		$arrayLeyendas = array();
		foreach($datos as $fila) {
			array_push ( $array , $fila['cantidad']);
				array_push ( $arrayLeyendas , $fila['tipo']);
		}
		

		$grafico->conf()
				->serie__agregar('nombre', $array )    // Automáticamente setea la serie actual
				->serie__set_leyendas( $arrayLeyendas)           
				->serie__set_tema('sand')
				->serie__set_centro(0.5)
			;
		
		}
		function conf__grafico_trab_act_color(toba_ei_grafico $grafico)
	{
		$consulta = new Consultas();    
		$grafico->conf()->canvas__set_titulo("Distribución trab_act_color de los encuestados");
		$datos =  $consulta->get_psicosocial_trab_act_color();
		
		$array1 = array();
		$arrayLeyendas = array();
		foreach($datos as $fila) {
			array_push ( $array1 , $fila['cantidad']);
				array_push ( $arrayLeyendas , $fila['tipo']);
		}
		
		
		$grafico->conf()
				->serie__agregar('nombre', $array1)    // Automáticamente setea la serie actual
				->serie__set_leyendas($arrayLeyendas )           
				->serie__set_tema('earth')
				->serie__set_centro(0.5)
			;
		
		}    
		function conf__grafico_inseg_lab_color(toba_ei_grafico $grafico)
	{
		$consulta = new Consultas();    
		$grafico->conf()->canvas__set_titulo("Distribución inseg_lab_color de los encuestados");
		$datos =  $consulta->get_psicosocial_inseg_lab_color();
		
		$array2 = array();
		$arrayLeyendas = array();
		foreach($datos as $fila) {
			array_push ( $array2 , $fila['cantidad']);
				array_push ( $arrayLeyendas , $fila['tipo']);;
		}
		
		
		$grafico->conf()
				->serie__agregar('nombre', $array2)    // Automáticamente setea la serie actual
				->serie__set_leyendas($arrayLeyendas )           
				->serie__set_tema('pastel')
				->serie__set_centro(0.5)
			;
		
		}   
	
			function conf__grafico_ap_soc_color(toba_ei_grafico $grafico)
	{
		$consulta = new Consultas();    
		$grafico->conf()->canvas__set_titulo("Distribución ap_soc_color de los encuestados");
		$datos =  $consulta->get_psicosocial_ap_soc_color();
		
		$array3 = array();
		$arrayLeyendas = array();
		foreach($datos as $fila) {
			array_push ( $array3 , $fila['cantidad']);
				array_push ( $arrayLeyendas , $fila['tipo']);
		}
		
		
		$grafico->conf()
				->serie__agregar('nombre', $array3)    // Automáticamente setea la serie actual
				->serie__set_leyendas($arrayLeyendas )           
				->serie__set_tema('water')
				->serie__set_centro(0.5)
			;
		
		}
				
			function conf__grafico_trabajo_familiar_tar_dom_color(toba_ei_grafico $grafico)
	{
		$consulta = new Consultas();    
		$grafico->conf()->canvas__set_titulo("Distribución trabajo_familiar_tar_dom_color de los encuestados");
		$datos =  $consulta->get_psicosocial_trabajo_familiar_tar_dom_color();
		
		$array4 = array();
		$arrayLeyendas = array();
		foreach($datos as $fila) {
			array_push ( $array4 , $fila['cantidad']);
				array_push ( $arrayLeyendas , $fila['tipo']);
		}
		
		
		$grafico->conf()
				->serie__agregar('nombre', $array4)    // Automáticamente setea la serie actual
				->serie__set_leyendas($arrayLeyendas )           
				->serie__set_tema('sand')
				->serie__set_centro(0.5)
			;
		
		}        
	
	function conf__grafico_rec_lab_color(toba_ei_grafico $grafico)
	{
		$consulta = new Consultas();    
		$grafico->conf()->canvas__set_titulo("Distribución rec_lab_color de los encuestados");
		$datos =  $consulta->get_psicosocial_rec_lab_color();
		
		$array5 = array();
		$arrayLeyendas = array();
		foreach($datos as $fila) {
			array_push ( $array5 , $fila['cantidad']);
				array_push ( $arrayLeyendas , $fila['tipo']);
		}
		
		
		$grafico->conf()
				->serie__agregar('nombre', $array5)    // Automáticamente setea la serie actual
				->serie__set_leyendas($arrayLeyendas )           
				->serie__set_tema('earth')
				->serie__set_centro(0.5)
			;
		
		}    
}
?>