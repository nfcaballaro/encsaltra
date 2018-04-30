<?php
class ef_encuesta extends saludytrabajo_ei_formulario
{
	

function extender_objeto_js()   {

	
		echo "
		
			
			{$this->objeto_js}.evt__lugar_trabajo_especifico__procesar = function (es_inicial, fila)
			{

			if(this.ef('lugar_trabajo_especifico').get_estado()== 28){
				this.ef('lugar_trabajo_especifico_otro').mostrar();
				
			}
			else{
				this.ef('lugar_trabajo_especifico_otro').ocultar(false);
				
			}
			}
			

				
			";
	}

	
}
?>