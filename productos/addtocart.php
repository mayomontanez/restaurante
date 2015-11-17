<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <?php
        include('getinfo.php');
    ?>
</head>
<body> 

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">    
    
    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
    
    
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    RESTAURANTE <?php  
                        foreach ($mesa as $value) {
                            # code...
                            echo $value['MESA'];
                        }
                    ?>
                </a>
            </div>
                       
            <ul class="nav">
                <?php 
                    if($idcategoria == 0){
                ?>
                    <li id="0">
                <?php 
                }
                else{
                    ?>
                    <li id="0">
                <?php
                }
                ?>
                    <a href="productos.php?idmesa=<?php echo $idmesa;?>">
                        <i class="pe-7s-menu"></i> 
                        <p>TODOS LOS PLATILLOS</p>
                    </a>            
                </li>
                <?php 
                    if($idcategoria == 1){
                ?>
                    <li class="active" id="1">
                <?php 
                }
                else{
                    ?>
                    <li id="1">
                <?php
                }
                ?>
                    <a href="productos.php?idmesa=<?php echo $idmesa;?>&idcategoria=1">
                        <i class="pe-7s-play"></i> 
                        <p>ENTRADAS</p>
                    </a>
                </li> 
                <?php 
                    if($idcategoria == 3){
                ?>
                    <li class="active" id="3">
                <?php 
                }
                else{
                    ?>
                    <li id="3">
                <?php
                }
                ?>
                    <a href="productos.php?idmesa=<?php echo $idmesa;?>&idcategoria=3">
                        <i class="pe-7s-wine"></i> 
                        <p>BEBIDAS</p>
                    </a>        
                </li>
                <?php 
                    if($idcategoria == 2){
                ?>
                    <li class="active" id="2">
                <?php 
                }
                else{
                    ?>
                    <li id="2">
                <?php
                }
                ?>
                    <a href="productos.php?idmesa=<?php echo $idmesa;?>&idcategoria=2">
                        <i class="pe-7s-alarm"></i> 
                        <p>PLATOS FUERTES</p>
                    </a>        
                </li>
                <?php 
                    if($idcategoria == 4){
                ?>
                    <li class="active" id="4">
                <?php 
                }
                else{
                    ?>
                    <li id="4">
                <?php
                }
                ?>
                    <a href="productos.php?idmesa=<?php echo $idmesa;?>&idcategoria=4">
                        <i class="pe-7s-like"></i> 
                        <p>POSTRES</p>
                    </a>        
                </li>
                <li id="5">
                    <a href="pedido.php">
                        <i class="pe-7s-cart"></i> 
                        <p>PEDIDO ACTUAL</p>
                    </a>        
                </li>
                <li id="6">
                    <a href="">
                        <i class="pe-7s-news-paper"></i> 
                        <p>PEDIR CUENTA</p>
                    </a>        
                </li>
            </ul> 
    	</div>
    </div>
    
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">    
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"></a>
                </div>
                <div class="collapse navbar-collapse">       
                    <ul class="nav navbar-nav navbar-left">
                    </ul>
                </div>
            </div>
        </nav>
                     
                     
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Agregar orden</h4>
                            </div>
                            <div class="content">
                                <form action="addtocart_product.php" method="GET">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Cantidad</label>
                                                  <div class="center">
                                                    <p>
                                                      </p><div class="input-group">
                                                          <span class="input-group-btn">
                                                              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="cantidad">
                                                                  <span class="glyphicon glyphicon-minus"></span>
                                                              </button>
                                                          </span>
                                                          <input type="text" name="cantidad" class="form-control input-number" value="1" min="1" max="10">
                                                          <span class="input-group-btn">
                                                              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="cantidad">
                                                                  <span class="glyphicon glyphicon-plus"></span>
                                                              </button>
                                                          </span>
                                                      </div>
                                                    <p></p>
                                                </div>
                                            </div>        
                                        </div>
                                    </div>
                                    <input type="hidden" name="idproducto" value="<?php echo $idproducto;?>">
                                    <input type="hidden" name="idmesa" value="<?php echo $idmesa;?>">
                                    <a href="productos.php?idmesa=<?php echo $idmesa;?>" class="btn btn-danger btn-fill pull-right">Cancelar</a>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Confirmar</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                        foreach ($producto as $value) {
                    ?>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="<?php echo $value['IMG1'];?>" alt="..."/>
                                   
                                      <h4 class="title"><?php echo $value['PLATILLO'];?><br />
                                         <small><?php echo $value['CATEGORIA'];?></small>
                                      </h4> 
                                    </a>
                                </div>  
                                <p class="description text-center"><?php echo $value['RECETA'];?></p>
                            </div>
                            <hr>
                            <div class="text-center">
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
               
                </div>                    
            </div>
        </div>
    </div>   
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
	
	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>
	
	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
    <script type="text/javascript">
    $('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
    
</html>