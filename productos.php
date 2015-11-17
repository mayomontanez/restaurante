<!DOCTYPE html>
<html class="no-js">
    <head>
        <?php
			include('getinfo.php');
			echo "algo";
		?>
    </head>
    <body>
    	<div class="coming-soon-content">
			<h3>
			<b><?php echo($tituloMenu);?></b>
			</h3>
		</div>        
        <div class="eshop-section section">
	    	<div class="container">
				<div class="row">
					<?php
						foreach ($productos as $value) {
					?>
							<div class="col-md-3 col-sm-6">
								<!-- Product -->
								<div class="shop-item">
									<!-- Product Image -->
									<div class="shop-item-image">
										<a href="detalles.php?idproducto=<?php echo $value['IDPLATILLO']?>"><img src="<?php echo $value['IMG1']?>" alt="Item Name"></a>
									</div>
									<!-- Product Title -->
									<div class="title">
										<h3><a href="detalles.php?idproducto=<?php echo $value['IDPLATILLO']?>"><?php echo $value['PLATILLO']?></a></h3>
									</div>
									<!-- Product Available Colors-->
									<!-- Product Price-->
									<div class="price">
										$<?php echo $value['PRECIO']?>
									</div>
									<!-- Add to Cart Button -->
									<div class="actions">
										<a href="#" class="btn btn-grey"><i class="glyphicon glyphicon-expand"></i> Ver mas</a>
										<a href="#" class="btn"><i class="glyphicon glyphicon-plus icon-white"></i> Añadir</a>
									</div>
								</div>
								<!-- End Product -->
							</div>
					<?php
						}
					?>
				</div>
			</div>
	    </div>

        <!--
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="js/jquery.fitvids.js"></script>
        <script src="js/jquery.sequence-min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/main-menu.js"></script>
        <script src="js/template.js"></script>
		-->
    </body>
</html>