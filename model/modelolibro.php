<?php 
include('medoo.min.php');


class Restaurante{
	var $base_datos; //Variable para hacer la conexion a la base de datos
	var $resultado; //Variable para traer resultados de una consulta a la BD

	function Restaurante() { //Constructor de la clase del modelo
		$this->base_datos = new medoo();
	}
//Conseguir todos los libros
	function consulta(){
		$result = $this->base_datos->query("");
		return $result;
	}

	function getCategorias(){
		$result = $this->base_datos->query("SELECT IDCATEGORIA, CATEGORIA, IMAGEN, ACTIVO FROM CATEGORIA WHERE ACTIVO = 1");
		return $result;
	}

	function getProductos($idcategoria)
	{
		$result = null;
		if(isset($idcategoria))
		{
			if($idcategoria == 0)
			{
				$result = $this->productosTodos();
			}
			else
			{
				$result = $this->productosByCategoria($idcategoria);
			}
		}
		else
		{
			$result = $this->productosTodos();
		}	
		
		return $result;
	}

	function productosTodos(){
		$result = $this->base_datos->query("
			SELECT P.IDPLATILLO, LEFT(P.PLATILLO, 20) AS PLATILLO, P.PLATILLO AS PLATILLOC, C.IDCATEGORIA, C.CATEGORIA, P.PRECIO, P.IMG1, P.IMG2, P.IMG3, P.RECETA, P.ACTIVO
			FROM PLATILLO P, CATEGORIA C
			WHERE P.IDCATEGORIA = C.IDCATEGORIA AND C.ACTIVO = 1 AND P.ACTIVO = 1
			ORDER BY C.IDCATEGORIA, P.IDPLATILLO
		");
		return $result;
	}

	function productosByCategoria($idcategoria){
		$result = $this->base_datos->query("
			SELECT P.IDPLATILLO, LEFT(P.PLATILLO, 20) AS PLATILLO, P.PLATILLO AS PLATILLOC, C.IDCATEGORIA, C.CATEGORIA, P.PRECIO, P.IMG1, P.IMG2, P.IMG3, P.RECETA, P.ACTIVO
			FROM PLATILLO P, CATEGORIA C
			WHERE P.IDCATEGORIA = C.IDCATEGORIA AND C.ACTIVO = 1 AND P.ACTIVO = 1 AND C.IDCATEGORIA = ".$idcategoria."
			ORDER BY C.IDCATEGORIA, P.IDPLATILLO
		");
		return $result;
	}

	function detallesProducto($idproducto){
		$result = $this->base_datos->query("
			SELECT P.IDPLATILLO, P.PLATILLO, C.IDCATEGORIA, C.CATEGORIA, P.PRECIO, P.IMG1, P.IMG2, P.IMG3, P.RECETA, P.ACTIVO
			FROM PLATILLO P, CATEGORIA C
			WHERE P.IDCATEGORIA = C.IDCATEGORIA AND C.ACTIVO = 1 AND P.ACTIVO = 1 AND P.IDPLATILLO = ".$idproducto."
			ORDER BY C.IDCATEGORIA, P.IDPLATILLO
		");
		return $result;
	}

	function detallesCategoria($idcategoria){
		$result = null;
		if(isset($idcategoria))
		{
			$result = $this->categoriaById($idcategoria);
		}
		else
		{
			$result = $this->getCategorias();
		}
		return $result;
	}

	function categoriaById($idcategoria)
	{
		$result = $this->base_datos->query("SELECT IDCATEGORIA, CATEGORIA, IMAGEN, ACTIVO 
			FROM CATEGORIA 
			WHERE ACTIVO = 1 AND IDCATEGORIA = ".$idcategoria."");
		return $result;
	}

	function getMesas()
	{
		$result = $this->base_datos->query("SELECT * FROM MESA WHERE DISPONIBLE = 1");
		return $result;
	}


}	
?>