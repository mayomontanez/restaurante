<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <?php
        include('getinfo.php');
    ?>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Productos</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    
    <link href="assets/css/rotating-card.css" rel="stylesheet" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    
    
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
</head>
<body> 

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">    
    
    <!--   
        
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" 
        Tip 2: you can also add an image using data-image tag
        
    -->
    
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
                    <li class="active" id="0">
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
                    <a href="pedido.php?idmesa=<?php echo $idmesa;?>">
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
                <li id="7">
                    <a href="">
                        <i class="pe-7s-help1"></i>
                        <p>AYUDA</p>
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
                    <a class="navbar-brand" href=""><?php echo $tituloMenu;?></a>
                </div>
                <div class="collapse navbar-collapse">       
                    <ul class="nav navbar-nav navbar-left">
                    </ul>
                </div>
            </div>
        </nav>
        <?php
            foreach ($productos as $value) {
        ?>
        <div class="col-md-4 col-sm-6">
             <div class="card-container manual-flip">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="<?php echo $value['IMG1'];?>"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name"><?php echo $value['PLATILLO'];?></h3>
                                <p class="profession"><?php echo $value['CATEGORIA'];?></p>
                                <h5>$<?php echo $value['PRECIO'];?></h5>
                            </div>
                            <div class="footer">
                                <button class="btn btn-simple" onclick="rotateCard(this)">
                                    <i class="fa fa-mail-forward"></i> Detalles
                                </button>
                                <a class="btn btn-simple" href="addtocart.php?idproducto=<?php echo $value['IDPLATILLO'];?>&idmesa=<?php echo $idmesa;?>">
                                    <i class="fa fa-plus-square-o"></i> Añadir
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="back">
                        <div class="header">
                            <h5 class="motto"><?php echo $value['PLATILLOC'];?></h5>
                        </div> 
                        <div class="content">
                            <div class="main">
                                <h4 class="name">Receta</h4>
                                <p><?php echo $value['RECETA'];?></p>
                            </div>
                        </div>
                        <div>
                           <button class="btn btn-simple" rel="tooltip" title="Ver imagen" onclick="rotateCard(this)">
                                <i class="fa fa-reply"></i> Regresar
                            </button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
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
    
    <!--<script type="text/javascript">
        $(document).ready(function(){
            
            demo.initChartist();
            
            $.notify({
                icon: 'pe-7s-gift',
                message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."
                
            },{
                type: 'info',
                timer: 4000
            });
            
        });
    </script>-->
    <script type="text/javascript">
    $().ready(function(){
        $('[rel="tooltip"]').tooltip();
        
    });
    
    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46172202-4', 'auto');
  ga('send', 'pageview');

</script>
</html>