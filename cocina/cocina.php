<!doctype html>
<html lang="en">
<head>
    <?php 
        include('../productos/getinfo.php');
        $info_pedidos = $mode_top->get_info_pedidos();
       ?>
	<meta charset="utf-8" />
	<meta http-equiv="refresh" content="45">
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Cocina</title>

	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>
<body>

<div class="wrapper">
    <div class="fresh-table toolbar-color-azure full-screen-table">
    <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange                  
            Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
    -->
        
        <div class="toolbar">
            <!--<button id="alertBtn" class="btn btn-default">Alert</button>-->
            <div class="logo">
            </div>
        </div>
        
        <table id="fresh-table" class="table">
            <thead>
                <th data-field="platillo">Platillo</th>
            	<th data-field="cantidad" data-sortable="true">Cantidad</th>
            	<th data-field="mesa" data-sortable="true">Mesa</th>
            	<th data-field="estatus" data-sortable="true">Actualizar Estatus</th>
            	<!--<th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Actions</th>-->
            </thead>
            <tbody>
                 <?php
                      foreach ($info_pedidos as $value) {
                    ?>
                    <tr>
                        <td>
                          <?php
                            echo $value['PLATILLO'];
                          ?>
                        </td>
                        <td>
                            <?php
                              echo $value['CANTIDAD'];
                            ?>
                        </td>
                        <td>
                          <?php
                              echo $value['MESA'];
                          ?>
                        </td>
                        <td>
                          <?php
                            if($value['ATENDIDO'] == '0')
                            {
                          ?>
                            <form action="cocina_upd_estatus.php" method="GET">
                              <input class="btn btn-fill btn-info" type="submit" name="atender" value="Atender">
                              <input type="hidden" name="idpedido" value="<?php echo $value['IDPEDIDO'];?>">
                              <input type="hidden" name="tipo" value="atender">
                            </form>
                            <?php 
                            }
                              else if ($value['ATENDIDO'] == '1') {
                                if ($value['TERMINADO'] == '0')
                                {
                            ?>
                              <form action="cocina_upd_estatus.php" method="GET">
                                <input class="btn btn-fill btn-success" type="submit" name="atender" value="Terminar">
                                <input type="hidden" name="idpedido" value="<?php echo $value['IDPEDIDO'];?>">
                                <input type="hidden" name="tipo" value="terminar">
                              </form>
                                <?php
                              }
                            }
                          ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                <!--<tr>
                    <td>1</td>
                    <td>Dakota Rice</td>
                    <td>$36,738</td>
                    <td>Niger</td>
                    <td>Oud-Turnhout</td>
                    <td></td>
                </tr>-->
            </tbody>
        </table>
    </div>
    
</div>


</body>
    <script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-table.js"></script>
    <!--<script type="text/javascript" src="assets/js/ajax.js"></script>-->
        
    <script type="text/javascript">
        var $table = $('#fresh-table'),
            $alertBtn = $('#alertBtn'), 
            full_screen = false,
            window_height;
            
        $().ready(function(){
            
            window_height = $(window).height();
            table_height = window_height - 20;
            
            
            $table.bootstrapTable({
                toolbar: ".toolbar",

                //showRefresh: true,
                //search: true,
                //showToggle: true,
                showColumns: true,
                pagination: true,
                striped: true,
                sortable: true,
                height: table_height,
                pageSize: 25,
                pageList: [25,50,100],
                
                formatShowingRows: function(pageFrom, pageTo, totalRows){
                    //do nothing here, we don't want to show the text "showing x of y from..." 
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'fa fa-minus-circle'
                }
            });
            
            window.operateEvents = {
                'click .like': function (e, value, row, index) {
                    alert('You click like icon, row: ' + JSON.stringify(row));
                    console.log(value, row, index);
                },
                'click .edit': function (e, value, row, index) {
                    alert('You click edit icon, row: ' + JSON.stringify(row));
                    console.log(value, row, index);    
                },
                'click .remove': function (e, value, row, index) {
                    $table.bootstrapTable('remove', {
                        field: 'id',
                        values: [row.id]
                    });
            
                }
            };
            
            $alertBtn.click(function () {
                alert("You pressed on Alert");
            });
        
            
            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });    
        });
        

        function operateFormatter(value, row, index) {
            return [
                '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
                    '<i class="fa fa-heart"></i>',
                '</a>',
                '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
                    '<i class="fa fa-edit"></i>',
                '</a>',
                '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
                    '<i class="fa fa-remove"></i>',
                '</a>'
            ].join('');
        }
       
    </script>

</html>