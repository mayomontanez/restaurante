<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Restaurante - Inicio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="css/main.css">

        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <?php
            include('getinfo.php');
        ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
            <div class="container">
                <nav id="mainmenu" class="mainmenu">
                    <ul>
                        <li class="logo-wrapper"><a href="index.php"><img src="img/mPurpose-logo.png" alt="Multipurpose Twitter Bootstrap Template"></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="mainmenu-wrapper">
	        <div class="container">
		        <nav id="mainmenu" class="mainmenu navbar navbar-default navbar-fixed-top">
					<ul>
						<!--<li class="logo-wrapper"><a href="index.php"><img src="img/mPurpose-logo.png" alt="Multipurpose Twitter Bootstrap Template"></a></li>-->
                        <?php
                            foreach ($mesas as $value) {
                        ?>
						<li>
                            <a href="productos/productos.php?idmesa=<?php echo $value["IDMESA"]; ?>"><?php echo $value["MESA"]; ?></a>
						</li>						
                        <?php
                            }
                        ?>
					</ul>
				</nav>
			</div>
		</div>

        <!-- Homepage Slider -->
	        <div class="homepage-slider">
	        	<div id="sequence">
					<ul class="sequence-canvas">
						<!-- Slide 1 -->
						<li class="bg4">
							<!-- Slide Title -->
							<h2 class="title">Promoción 1</h2>
							<!-- Slide Text -->
							<h3 class="subtitle">Descripción</h3>
							<!-- Slide Image -->
							<!--<img class="slide-img" src="img/homepage-slider/slide3.png" alt="Slide 3" />-->
						</li>
						<!-- End Slide 1 -->
						<!-- Slide 2 -->
						<li class="bg3">
							<!-- Slide Title -->
							<h2 class="title">Promoción 2</h2>
							<!-- Slide Text -->
							<h3 class="subtitle">Descripción</h3>
							<!-- Slide Image -->
							<!--<img class="slide-img" src="img/homepage-slider/slide3.png" alt="Slide 3" />-->
						</li>
						<!-- End Slide 2 -->
						<!-- Slide 3 -->
						<li class="bg1">
							<!-- Slide Title -->
							<h2 class="title">Promoción 3</h2>
							<!-- Slide Text -->
							<h3 class="subtitle">Descripción</h3>
							<!-- Slide Image -->
							<!--<img class="slide-img" src="img/homepage-slider/slide3.png" alt="Slide 3" />-->
						</li>
						<!-- End Slide 3 -->
					</ul>
					<div class="sequence-pagination-wrapper">
						<ul class="sequence-pagination">
							<li>1</li>
							<li>2</li>
							<li>3</li>
						</ul>
					</div>
				</div>
	        </div>
		<!--
        <div class="section">
	        <div class="container">
	        	<div class="row">
                    <div class="col-footer col-md-3 col-xs-6">
                        <div class="portfolio-item">
                            <div class="portfolio-image">
                                <a href="productos/productos.php?idcategoria=1"><img src="img/service-icon/entrada.png" alt="Project Name"></a>
                                <h4>Entradas</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-footer col-md-3 col-xs-6">
                        <div class="portfolio-item">
                            <div class="portfolio-image">
                                <a href="productos/productos.php?idcategoria=2"><img src="img/service-icon/platofuerte.png" alt="Project Name"></a>
                                <h4>Plato Fuerte</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-footer col-md-3 col-xs-6">
                        <div class="portfolio-item">
                            <div class="portfolio-image">
                                <a href="productos/productos.php?idcategoria=3"><img src="img/service-icon/bebida.png" alt="Project Name"></a>
                                <h4>Bebidas</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-footer col-md-3 col-xs-6">
                        <div class="portfolio-item">
                            <div class="portfolio-image">
                                <a href="productos/productos.php?idcategoria=4"><img src="img/service-icon/postre.png" alt="Project Name"></a>
                                <h4>Postres</h4>
                            </div>
                        </div>
                    </div>
	        	</div>
	        </div>
	    </div>-->
	    <!-- End Services -->

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="js/jquery.fitvids.js"></script>
        <script src="js/jquery.sequence-min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/main-menu.js"></script>
        <script src="js/template.js"></script>

    </body>
</html>