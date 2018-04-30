<?php
class dt_tra_sal_area_trabajo extends saludytrabajo_datos_tabla
{
		function get_descripciones()
	{
		$sql = "SELECT id_tra_sal_area_trabajo , descripcion FROM tra_sal_area_trabajo ORDER BY descripcion";
		return toba::db('saludytrabajo')->consultar($sql);
	}
}
?>