<?php
	include('model/modelolibro.php'); 
	$mode_top = new  Restaurante();
	$categorias = $mode_top->getCategorias();
	$idcategoria = isset($_GET['idcategoria']) ? $_GET['idcategoria'] : 0;
	$idproducto = isset($_GET['idproducto']) ? $_GET['idproducto'] : 0;
	$idmesa = isset($_GET['idmesa']) ? $_GET['idmesa'] : 0;
	$productos = $mode_top->getProductos($idcategoria); 
	$mesas = $mode_top->getMesas();
	$producto = null;
	$categoria = null;
	$tituloMenu = "Menú";
	if($idproducto > 0)
	{
		$producto = $mode_top->detallesProducto($idproducto);
	}
	if($idcategoria > 0)
	{
		$categoria = $mode_top->detallesCategoria($idcategoria);
		foreach ($categoria as $value) {
			# code...
			$tituloMenu = "Menú - ".$value["CATEGORIA"];
		}
	}
?>