<?php
include("consultas.php");
ini_set('memory_limit', '-1');
class ci_encuesta extends saludytrabajo_ci
{
	protected $s__datos_filtro;
	protected $s__nro_encuesta;

	//---- Filtro -----------------------------------------------------------------------

	function conf__filtro(toba_ei_formulario $filtro)
	{
		if (isset($this->s__datos_filtro)) {
			$filtro->set_datos($this->s__datos_filtro);
		}
	}

	function evt__filtro__filtrar($datos)
	{
		$this->s__datos_filtro = $datos;
	}

	function evt__filtro__cancelar()
	{
		unset($this->s__datos_filtro);
	}

	//---- Cuadro -----------------------------------------------------------------------

	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		$usuario = texto_plano(toba::usuario()->get_id());
		if (isset($this->s__datos_filtro)) {
			$cuadro->set_datos($this->dep('datos')->tabla('tra_sal_justicia_arg')->get_listado($this->s__datos_filtro, $usuario));
		} else {
			$cuadro->set_datos($this->dep('datos')->tabla('tra_sal_justicia_arg')->get_listado(null,$usuario));
		}
	}

	function evt__cuadro__seleccion($datos)
	{
		$this->dep('datos')->cargar($datos);
		$this->set_pantalla('pant_edicion');
	}

	//---- Formulario -------------------------------------------------------------------

	function conf__formulario(toba_ei_formulario $form)
	{
		$usuario = texto_plano(toba::usuario()->get_id());
		$valores["usuario"] = $usuario;
		if ($this->dep('datos')->esta_cargada()) {      
			
			
			$encuesta = $this->dep('datos')->tabla('tra_sal_justicia_arg')->get();  
			//actualizo campos no pertenecientes a la relacion toba
			$provincia = consultas::get_provincia_seleccion($encuesta ["id_localidad"]);
			$valores['id_provincia'] = $provincia;
			
			$form->set_datos($this->dep('datos')->tabla('tra_sal_justicia_arg')->get());
			$form->set_datos($valores);
		} else {
			$this->pantalla()->eliminar_evento('eliminar');
		}
	}

	function evt__formulario__modificacion($datos)
	{
		$usuario = texto_plano(toba::usuario()->get_id());
		$datos['usuario'] = $usuario;
		$this->dep('datos')->tabla('tra_sal_justicia_arg')->set($datos);
	}

	function resetear()
	{
		$this->dep('datos')->resetear();        
		$this->set_pantalla('pant_final');
	}

	//---- EVENTOS CI -------------------------------------------------------------------

	function evt__agregar()
	{
		$this->set_pantalla('pant_edicion');
	}

	function evt__volver()
	{
		$this->resetear();
		$this->set_pantalla('pant_seleccion');
	}

	function evt__eliminar()
	{
		$this->dep('datos')->eliminar_todo();
		$this->resetear();
	}

	function evt__guardar()
	{
		$this->dep('datos')->sincronizar();
		$this->resetear();
	}

}
?>