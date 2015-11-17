<?php
    include('../productos/getinfo.php');
    $info_pedidos = $mode_top->get_info_pedidos();
        echo "<thead>
                <th data-field='platillo'>Platillo</th>
                <th data-field='cantidad' data-sortable='true'>Cantidad</th>
                <th data-field='mesa' data-sortable='true'>Mesa</th>
                <th data-field='estatus' data-sortable='true'>Actualizar Estatus</th>
            </thead>
            <tbody>";
      foreach ($info_pedidos as $value) {
        echo "<tr><td>";
                echo $value['PLATILLO'];
            echo "</td><td>";
                  echo $value['CANTIDAD'];
            echo "</td>;
            <td>";
                echo $value['MESA'];
              
            echo "</td>
            <td>";              
                if($value['ATENDIDO'] == '0')
                {
              
                echo "<form action='cocina_upd_estatus.php' method='GET'>
                  <input class='btn btn-fill btn-info' type='submit' name='atender' value='Atender'>
                  <input type='hidden' name='idpedido' value='".$value['IDPEDIDO']."'>
                  <input type='hidden' name='tipo' value='atender'>
                </form>";
                }
                else if ($value['ATENDIDO'] == '1') {
                  if ($value['TERMINADO'] == '0'){
                      echo "<form action='cocina_upd_estatus.php' method='GET'>
                        <input class='btn btn-fill btn-success' type='submit' name='atender' value='Terminar'>
                        <input type='hidden' name='idpedido' value='".$value['IDPEDIDO']."'>
                        <input type='hidden' name='tipo' value='terminar'>
                      </form>";
                  }
                }
            echo "</td>
        </tr>";        
        }
        echo "</tbody>";
        
?>