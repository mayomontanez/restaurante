<?php
    include('../productos/getinfo.php');
    $detalle_pedido_actual = $mode_top->get_info_pedidoActual($idmesa);
    $total_carrito = 0;
    echo "<table class='table table-hover table-striped'>
                                    <thead>
                                        <th>%</th>
                                        <th>Platillo</th>
                                        <th>Precio (Cantidad)</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>";
                                            $i=0;
                                            foreach ($detalle_pedido_actual as $value) {
                                                $i=$i+1;
                                                $total_carrito = $total_carrito + (int)$value['TOTAL'];
                                                $classbar = '';
                                                if($value['ENVIADO']=='1')
                                                {
                                                    $classbar = 'warning';
                                                }
                                                if($value['ATENDIDO']=='1')
                                                {
                                                    $classbar = 'info';
                                                }
                                                if($value['TERMINADO']=='1')
                                                {
                                                    $classbar = 'success';
                                                }
                                                echo "<tr>
                                                    <td>
                                                        <div class='progress'>
                                                          <div class='progress-bar progress-bar-".$classbar." progress-bar-striped active' role='progressbar' aria-valuenow='".$value['PROGRESO']."' aria-valuemin='0' aria-valuemax='100' style='width: ".$value['PROGRESO']."%'>
                                                            <span class='sr-only'>".$value['PROGRESO']."%</span>
                                                          </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        ".$value['PLATILLO']."
                                                    </td>
                                                    <td>$".$value['PRECIO']." (".$value['CANTIDAD'].")</td>
                                                    <td>$".$value['TOTAL']."</td>
                                                </tr>";
                                            }
                                    echo "</tbody>
                                </table>
                                <div class='row'>
                                    <div class='col-md-2 col-md-offset-5'>
                                        <strong><h3>Total: $".$total_carrito."</h3></strong>
                                    </div>
                                </div>";
?>