<?php
class dt_fatiga extends encsaltra_datos_tabla
{
	
		function get_descripciones()
	{
		$sql = "SELECT id, descripcion FROM fatiga";
		return toba::db('encsaltra')->consultar($sql);
	}
}
?>