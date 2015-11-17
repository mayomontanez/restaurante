<?php
        include('getinfo.php');
        $cantidad = $_GET['cantidad'];
        /*echo $idmesa;
        echo "<br>".$idproducto;
        echo "<br>".$cantidad;*/

        $regpedido = $mode_top->reg_pedido($idmesa, $idproducto, $cantidad);

        echo "<script> window.location.href = '../productos/productos.php?idmesa=".$idmesa."'	</script>";