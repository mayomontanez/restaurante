<?php 
    include('../productos/getinfo.php');
    $menu=$_GET['menuAdmin'];
    $idnotificacion=$_GET['idnotificacion'];
    $cierra_notificacion = $mode_top->close_notification($idnotificacion);
    //echo "window.location.href = '../mesero/detallecuenta.php?menuAdmin=".$menu."&idmesa=".$idmesa."'";
    echo "<script> window.location.href = '../mesero/detallecuenta.php?menuAdmin=".$menu."&idmesa=".$idmesa."'	</script>";