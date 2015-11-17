<!doctype html>
<html lang="en">
<head>
  <?php 
    include('../productos/getinfo.php');
    $get_alertas_tiempo = $mode_top->reg_alertas_tiempo(20);
    $info_mesas = $mode_top->mesero_get_info_mesas();
    $notificaciones_notify = $mode_top->get_notificaciones();
    $notificaciones = $mode_top->get_notificaciones();
    $count_noti = $mode_top->get_notificaciones_count();
    $menu = 0;
    if(isset($_GET['menuAdmin']))
    {
      $menu = $_GET['menuAdmin'];
    }
    else
    {
      $menu = 1;
    }
   ?>
	<meta charset="utf-8" />
  <meta http-equiv="refresh" content="45">
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Administrador</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    
    
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body onload='myFunction()'>
<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">
    
    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
    <div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text">
                    Restaurante - Admin
                </a>
            </div>
                       
            <ul class="nav">
            <?php 
              if($menu == 1)
              {
            ?>
                <li class="active">
            <?php 
              } else {
            ?>
                <li>
            <?php
            }
            ?>
                    <a href="admin.php?menuAdmin=1">
                        <i class="pe-7s-print"></i> 
                        <p>Imprimir ticket</p>
                    </a>        
                </li>
            <?php 
              if($menu == 2)
              {
            ?>
                <li class="active">
            <?php 
              } else {
            ?>
                <li>
            <?php
            }
            ?>
                    <a href="admin.php?menuAdmin=2">
                        <i class="pe-7s-news-paper"></i> 
                        <p>Cerrar cuenta</p>
                    </a>        
                </li>
            <?php 
              if($menu == 3)
              {
            ?>
                <li class="active">
            <?php 
              } else {
            ?>
                <li>
            <?php
            }
            ?>
                    <a href="admin.php?menuAdmin=3">
                        <i class="pe-7s-close"></i> 
                        <p>Cancelar platillo</p>
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
                    <!--<a class="navbar-brand" href="#">Icons</a>-->
                </div>
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                            <b class="caret"></b>
                          <?php
                            foreach ($count_noti as $value) {
                              if((int)$value['TOTALNOTIFICACIONES'] > 0){
                          ?>
                            <span class="notification"><?php echo $value['TOTALNOTIFICACIONES'];?></span>
                          <?php
                            }
                          }
                          ?>
                      </a>
                      <ul class="dropdown-menu">
                        <?php
                        foreach ($notificaciones as $value) {
                        ?>
                          <li><a href="close_notification.php?idnotificacion=<?php echo $value['IDNOTIFICACION'];?>&menuAdmin=<?php echo $value['IDALERTA'];?>&idmesa=<?php echo $value['IDMESA'];?>">Mesa <?php echo $value['IDMESA'];?> - <?php echo $value['ALERTA'];?></a></li>
                        <?php
                        }
                        ?>
                      </ul>
                    </li>
                  </ul>
                </div>
            </div>
        </nav>
                     
                     
        <div class="content">
            <div class="container-fluid">
                <div class="row">                   
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Mesas</h4>
                            </div>
                            <div class="content all-icons">
                                <div class="row">

                                  <?php
                                    foreach ($info_mesas as $value) {
                                  ?>
                                    <div class="col-md-4">
                                      <div class="card card-user">
                                          <div class="image">
                                          </div>
                                          <div class="content">
                                              <div class="author">
                                                  <img class="avatar border-gray" src="assets/img/<?php echo $value['IDMESA'];?>.png" alt="..."/>
                                                  <?php 
                                                    if($value['DISPONIBLE']=='0')
                                                    {
                                                  ?>  
                                                    <h4 class="title">Mesa <?php echo $value['IDMESA'];?><br/>
                                                       <small>$<?php echo $value['TOTALMESA'];?></small>
                                                    </h4>
                                                    <?php 
                                                      if($menu==1)
                                                      {
                                                    ?>
                                                      <a href="detallecuenta.php?menuAdmin=<?php echo $menu;?>&idmesa=<?php echo $value['IDMESA'];?>" class="btn btn-simple"><i class="fa fa-print"></i> Imprimir ticket</a>
                                                    <?php
                                                      }
                                                    ?>
                                                    <?php 
                                                      if($menu==2)
                                                      {
                                                    ?>
                                                      <a href="detallecuenta.php?menuAdmin=<?php echo $menu;?>&idmesa=<?php echo $value['IDMESA'];?>" class="btn btn-simple"><i class="fa fa-money"></i> Cerrar cuenta</a>
                                                    <?php
                                                      }
                                                    ?>
                                                    <?php 
                                                      if($menu==3)
                                                      {
                                                    ?>
                                                      <a href="detallecuenta.php?menuAdmin=<?php echo $menu;?>&idmesa=<?php echo $value['IDMESA'];?>" class="btn btn-simple"><i class="fa fa-trash-o"></i> Cancelar platillo</a>
                                                    <?php
                                                      }
                                                    ?>
                                                  <?php
                                                    } else
                                                    {
                                                  ?>
                                                    <h4 class="title">Mesa <?php echo $value['IDMESA'];?><br/>
                                                       <small>Disponible</small>
                                                    </h4>
                                                  <?php
                                                    }
                                                  ?>
                                              </div>
                                          </div>
                                          
                                          <!--<div class="text-center">
                                              <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                              <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                              <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
                                          </div>-->
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
            </div>
        </div>
        
        <!--<footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2015 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>-->
        

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
    function enviaNotificacion(from, align, idalerta, alerta, idnotificacion, idmesa, mesa, idcuenta){
        color = Math.floor((Math.random() * 4) + 1);
        
        $.notify({
            icon: "pe-7s-pin",
            message: "Notificación: <b>"+alerta+"</b><br>"+
              "<b>Mesa "+idmesa+"</b><br>"+
              "<b>Cuenta "+idcuenta+"</b>"          
          },{
              type: type[color],
              timer: 4000,
              placement: {
                  from: from,
                  align: align
              }
          });
    }
    function myFunction() {
        <?php
          foreach ($notificaciones_notify as $value) {
        ?>
          enviaNotificacion("top", "right", 
            "<?php echo $value['IDALERTA'] ?>",
            "<?php echo $value['ALERTA'] ?>",
            "<?php echo $value['IDNOTIFICACION'] ?>",
            "<?php echo $value['IDMESA'] ?>",
            "<?php echo $value['MESA'] ?>",
            "<?php echo $value['IDCUENTA'] ?>");
        <?php
          }
        ?>
    }
  </script>
    
</html>