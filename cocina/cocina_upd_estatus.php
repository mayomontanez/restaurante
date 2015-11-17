<?php
	include('../productos/getinfo.php');
	$idpedido = $_GET['idpedido'];
	$tipo = $_GET['tipo'];

	if($tipo == "atender")
	{
		$atender=$mode_top->cocina_upd_estatus_atender($idpedido);
	}
	else if ($tipo == "terminar") {
		# code...
		$terminar=$mode_top->cocina_upd_estatus_terminar($idpedido);
	}
	echo "<script> window.location.href = '../cocina/cocina.php'	</script>";