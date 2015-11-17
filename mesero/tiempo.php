<?php
    include('../productos/getinfo.php');
    $count_noti = $mode_top->get_notificaciones_count();
    $notificaciones = $mode_top->get_notificaciones();

    echo "<i class='fa fa-globe'></i>
                            <b class='caret'></b>";
                            foreach ($count_noti as $value) {
                              if((int)$value['TOTALNOTIFICACIONES'] > 0){
                                echo "<span class='notification'>".$value['TOTALNOTIFICACIONES']."</span>";
                            }
                          }
                      /*echo "</a>
                      <ul class='dropdown-menu'>";
                      foreach ($notificaciones as $value) {
                        echo "<li><a href='close_notification.php?idnotificacion=".$value['IDNOTIFICACION']."&menuAdmin=".$value['IDALERTA']."&idmesa=".$value['IDMESA'].">Mesa ".$value['IDMESA']." - ".$value['ALERTA']."</a></li>";
                      }
                      echo "</ul>
                      </li>";*/
?>