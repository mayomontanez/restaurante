<?php
    include('../productos/getinfo.php');
    //$count_noti = $mode_top->get_notificaciones_count();
    $notificaciones = $mode_top->get_notificaciones();
    echo "<li>entra</li>";
    foreach ($notificaciones as $value) {
      echo "<li><a href='close_notification.php?idnotificacion=".$value['IDNOTIFICACION']."&menuAdmin=".$value['IDALERTA']."&idmesa=".$value['IDMESA'].">Mesa ".$value['IDMESA']." - ".$value['ALERTA']."</a></li>";
    }
?>