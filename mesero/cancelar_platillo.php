<?php
        include('../productos/getinfo.php');
        $idpedido = $_GET['idpedido'];
        $menu = $_GET['menuAdmin'];
        $pagina = "detallecuenta.php?menuAdmin=".$menu."&idmesa=".$idmesa;

        $cerrarcuenta = $mode_top->cancelar_platillo($idpedido);
        echo "<script> window.location.href = '../mesero/".$pagina."'	</script>";