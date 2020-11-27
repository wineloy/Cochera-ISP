<?php
// function require one parament type String 
// Return query SQL 
include './include/conexion.php';
//Hay que tomar en cuenta que esto es una mala practica esta info se debe de almacenar en archivos .env
$conexion = new ConexionSql('localhost', 'root', '', 'WISPCH');
$conexion->Conectar();
//Query 
$query = $conexion->ConsultaSql("SELECT P.nombrepaquete, P.megas, P.descripcion, P.precio, C.Categoria, P.idPaquete
		from paquetes P inner join categorias C on P.idCategoria = C.idCategoria ;");

$oferta = $conexion->ConsultaSql("SELECT idPaquete from ofertas ;"); 

$conexion->CerrarSql();
#var_dump(count($query[0])); // 7 filas * 5 columnas   
?>

<!DOCTYPE HTML>
<html>

<head>
	<title> Planes | Cochera Internet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Hosting Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<!-- Custom Theme files -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<!-- webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
	<!-- webfonts -->
	<!-- dropdown -->
	<script src="js/jquery.easydropdown.js"></script>
	<link href="css/nav.css" rel="stylesheet" type="text/css" media="all" />
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- end-smoth-scrolling -->
	<link rel="shortcut icon" href="images/body.png" type="image/x-icon">
</head>
<!-- Header Starts Here -->
<div class="banner inner-banner">
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php">
					<h3><span>LCW</span></h3>
				</a>
			</div>
			<div class="search-bar">
				<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="" />
			</div>
			<span class="menu"> Menu</span>

			<div class="banner-top">
				<ul class="nav banner-nav">
					<ul class="nav banner-nav">
						<li><a href="index.php">Inicio</a></li>
						<li><a class="active" href="paquetes.php">Paquetes</a></li>
						<li class="dropdown1"><a href="ubicacion.html">Ubicación</a></li>
						<li class="dropdown1"><a href="about.html">Contacto</a></li>
						<li class="dropdown1"><a href="support.html">Soporte</a></li>
						<li class="dropdown1"><a href="login.html">Login</a></li>
					</ul>
				</ul>
				<script>
					$("span.menu").click(function() {
						$(" ul.nav").slideToggle("slow", function() {});
					});
				</script>
			</div>
			<div class="clearfix"> </div>

		</div>
	</div>
	<!-- page heading -->
	<div id="breadcrumb_wrapper">
		<div class="container">

			<h3>Paquetes</h3>
			<h6>Instalacion: $1,000.°° incluye un mes gratis</h6>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="clearfix"> </div>
<!-- Header Ends Here -->

<!--Secciones de paquete -->
<!-- process -->
<section class="experience py-5" id="experience">
	<div class="container py-3">
		<div class="middile-inner-con">
			<div class="tab-main mx-auto">
				<input id="tab1" type="radio" name="tabs" checked>
				<label for="tab1"> GAMER</label>

				<input id="tab2" type="radio" name="tabs">
				<label for="tab2"> BÁSICO</label>

				<input id="tab3" type="radio" name="tabs">
				<label for="tab3"> EMPRESAS </label>

				<input id="tab4" type="radio" name="tabs">
				<label for="tab4"> HOGAR</label>


				<section id="content1">
					<div class="menu-grids">
						<div class="t-in">
							<div class="text-info-sec">
								<div class="service-in text-left">
									<div class="card">
										<!--inicio-->
										<!-- pricing table -->
										<!--Pintado de productos aqui esta el PHP que usted no puede ver ;)-->
										<?php
										// deberian ser 6 (5 PHP) 
										for ($r = 0; $r < count($query); $r++) { //crea tarjetas
											if ($query[$r][4] == "GAMER") {

										?>
												<div class="col-md-4 one_third pricing one_third2 ">
													<div class="pricing_top">
														<h6><?= utf8_encode($query[$r][0]) ?></h6> <br>
														<!--Nombre Paquete ;)-->
														<p style="color: white !important;"><sup><?= utf8_encode($query[$r][4]) ?></sup></p> <br>
														<!--CATEGORIA ;)-->
														<p><sup>$ <?= utf8_encode($query[$r][3]) ?>.00</sup></p> <br>
														<!--PRECIO ;)-->
														<?php 
															if ($query[$r][5] == $oferta[0][0]) {
																echo '<p style="background-color: red; height:18px">Paquete con Descuento</p>';
															}
														?>
													</div>
													<div class="pricing_middle">
														<ul>
															<li><?= $query[$r][2] ?></li>
															<li>Iva Incluido</li>
															<li>Pagos Mensuales</li>
															<li>Hasta <?= utf8_encode($query[$r][1]) ?> ↓↑ Mbps</li>
															<!--Velocidad ;)-->
														</ul>
													</div>
													<div class="pricing_bottom">
														<a href="#">Contratar</a>
													</div>
												</div>
										<?php
											}
										}
										?>

										<!--FIN-->

									</div>
								</div>
							</div>
						</div>
				</section>

				<section id="content2">
					<div class="menu-grids">
						<div class="t-in">
							<div class="text-info-sec">
								<div class="service-in text-left">
									<div class="card">
										<!-- pricing table -->
										<!--Pintado de productos aqui esta el PHP que usted no puede ver ;)-->
										<?php
										// deberian ser 6 (5 PHP) 

										for ($r = 0; $r < count($query); $r++) { //crea tarjetas
											if ($query[$r][4] == "BASICO") {
										?>

												<div class="col-md-4 one_third pricing one_third2">
													<div class="pricing_top">
														<h6><?= utf8_encode($query[$r][0]) ?></h6> <br>
														<!--Nombre Paquete ;)-->
														<p><sup><?= utf8_encode($query[$r][4]) ?></sup></p> <br>
														<!--CATEGORIA ;)-->
														<p><sup>$ <?= utf8_encode($query[$r][3]) ?>.00</sup></p> <br>
														<!--PRECIO ;)-->
														<?php 
															if ($query[$r][5] == $oferta[1][0]) {
																echo '<p style="background-color: red; height:18px">Paquete con Descuento</p>';
															}
														?>

													</div>
													<div class="pricing_middle">
														<ul>
															<li><?= $query[$r][2] ?></li>
															<li>Iva Incluido</li>
															<li>Pagos Mensuales</li>
															<li>Hasta <?= utf8_encode($query[$r][1]) ?> ↓↑ Mbps</li>
															<!--Velocidad ;)-->
														</ul>
													</div>
													<div class="pricing_bottom">
														<a href="#">Contratar</a>
													</div>
												</div>
										<?php
											}
										}
										?>
									</div>
								</div>
							</div>
						</div>
				</section>

				<section id="content3">
					<div class="menu-grids">
						<div class="t-in">
							<div class="text-info-sec">
								<div class="service-in text-left">
									<div class="card">
										<?php
										// deberian ser 6 (5 PHP) 

										for ($r = 0; $r < count($query); $r++) { //crea tarjetas
											if ($query[$r][4] == "EMPRESAS") {
										?>

												<div class="col-md-4 one_third pricing one_third2">
													<div class="pricing_top">
														<h6><?= utf8_encode($query[$r][0]) ?></h6> <br>
														<!--Nombre Paquete ;)-->
														<p><sup><?= utf8_encode($query[$r][4]) ?></sup></p> <br>
														<!--CATEGORIA ;)-->
														<p><sup>$ <?= utf8_encode($query[$r][3]) ?>.00</sup></p>
														<!--PRECIO ;)-->
														<?php 
															if ($query[$r][5] == $oferta[0][0]) {
																echo '<p style="background-color: red; height:18px">Paquete con Descuento</p>';
															}
														?>

													</div>
													<div class="pricing_middle">
														<ul>
															<li><?= $query[$r][2] ?></li>
															<li>Iva Incluido</li>
															<li>Pagos Mensuales</li>
															<li>Hasta <?= utf8_encode($query[$r][1]) ?> ↓↑ Mbps</li>
															<!--Velocidad ;)-->
														</ul>
													</div>
													<div class="pricing_bottom">
														<a href="#">Contratar</a>
													</div>
												</div>
										<?php
											}
										}
										?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section id="content4">
					<div class="menu-grids">
						<div class="t-in">
							<div class="text-info-sec">
								<div class="service-in text-left">
									<div class="card">
										<?php
										// deberian ser 6 (5 PHP) 

										for ($r = 0; $r < count($query); $r++) { //crea tarjetas
											if ($query[$r][4] == "HOGAR") {
										?>
												<div class="col-md-4 one_third pricing one_third2">
													<div class="pricing_top">
														<h6><?= utf8_encode($query[$r][0]) ?></h6> <br>
														<!--Nombre Paquete ;)-->
														<p><sup><?= utf8_encode($query[$r][4]) ?></sup></p> <br>
														<!--CATEGORIA ;)-->
														<p><sup>$ <?= utf8_encode($query[$r][3]) ?>.00</sup></p>
														<!--PRECIO ;)-->
														<?php 
															if ($query[$r][5] == $oferta[0][0]) {
																echo '<p style="background-color: red; height:18px">Paquete con Descuento</p>';
															}
														?>
													</div>
													<div class="pricing_middle">
														<ul>
															<li><?= $query[$r][2] ?></li>
															<li>Iva Incluido</li>
															<li>Pagos Mensuales</li>
															<li>Hasta <?= utf8_encode($query[$r][1]) ?> ↓↑ Mbps</li>
															<!--Velocidad ;)-->
														</ul>
													</div>
													<div class="pricing_bottom">
														<a href="#">Contratar</a>
													</div>
												</div>
										<?php
											}
										}
										?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>



<!-- //process -->



<!--Se compara los paquetes -->
<!--<div class="container">

	<div class="row PageHead">
		<div class="col-md-12">
			<h1>Compara nuestros paquetes</h1>
			<h3></h3>
		</div>
	</div>
	<div class="row ComparePlans">
		<div class="col-md-3 CompareList hidden-sm hidden-xs">
			<div class="planHead1"></div>
			<div class="planFeatures">
				<ul>
					<li>Setup Fee</li>
					<li> Multi Domain </li>
					<li> Storage Space</li>
					<li>Monthly Bandwidth</li>
					<li> MySQL Databases</li>
					<li>Sub-domains</li>
					<li>Email Accounts</li>
					<li> Shared 128bit SSL</li>
					<li>Control panel</li>
					<li>24/7 Support</li>
				</ul>
			</div>
		</div>
		<div class="col-sm-6 col-md-3 pricing1">
			<div class="planHead2">
				<h3>GAMER</h3>
			</div>
			<div class="planFeatures">
				<ul class="visible-sm visible-xs">
					<li>Setup Fee : NA</li>
					<li> Multi Domain : Up to 2 </li>
					<li> Storage Space 1 GB</li>
					<li>Monthly Bandwidth 10 GB</li>
					<li> MySQL Databases : 5</li>
					<li>Sub-domains : 2</li>
					<li>Email Accounts : 25</li>
					<li> Shared 128bit SSL : No</li>
					<li>Control panel : Yes</li>
					<li>24/7 Support : No</li>
				</ul>
				<ul class="hidden-sm hidden-xs">
					<li>NA</li>
					<li> Up to 2 </li>
					<li> 1 GB</li>
					<li>10 GB</li>
					<li> 5</li>
					<li>2</li>
					<li>25</li>
					<li><img src="images/cross.png" alt="cross"> </li>
					<li> <img src="images/tick.png" alt="tick"></li>
					<li><img src="images/cross.png" alt="cross"> </li>
				</ul>
			</div>
			<p> <a href="#" role="button" class="btn btn-success btn-lg">Sign Up </a> </p>
		</div>
		<div class="col-sm-6 col-md-3 pricing2">
			<div class="planHead3">
				<h3>EMPRESAS</h3>
			</div>
			<div class="planFeatures">
				<ul class="visible-sm visible-xs">
					<li>Velocidad</li>
					<li>Capacidad de usuarios</li>
					<li>Megas estables</li>
					<li>Soporte técnico </li>
					<li>Soporte a la medida</li>
					<li>Ping</li>
				</ul>
				<ul class="hidden-sm hidden-xs">
					<li>js</li>
					<li> Up to 2 </li>
					<li> 1 GB</li>
					<li>10 GB</li>
					<li> 5</li>
					<li>2</li>
					<li>25</li>
					<li><img src="images/cross.png" alt="cross"> </li>
					<li> <img src="images/tick.png" alt="tick"></li>
					<li><img src="images/tick.png" alt="tick"> </li>
				</ul>
			</div>
			<p> <a href="#" role="button" class="btn btn-danger btn-lg">Sign Up </a> </p>
		</div>
		<div class="col-sm-6 col-md-3 col-sm-offset-3 col-md-offset-0 pricing1">
			<div class="planHead2">
				<h3>BÁSICO</h3>
			</div>
			<div class="planFeatures">
				<ul class="visible-sm visible-xs">
					<li>Setup Fee : NAfgdf</li>
					<li> Multi Domain : Up to 2 </li>
					<li> Storage Space 1 GB</li>
					<li>Monthly Bandwidth 10 GB</li>
					<li> MySQL Databases : 5</li>
					<li>Sub-domains : 2</li>
					<li>Email Accounts : 25</li>
					<li> Shared 128bit SSL : Yes</li>
					<li>Control panel : Yes</li>
					<li>24/7 Support : Yes</li>
				</ul>
				<ul class="hidden-sm hidden-xs">
					<li>NA</li>
					<li> Up to 2 </li>
					<li> 1 GB</li>
					<li>10 GB</li>
					<li> 5</li>
					<li>2</li>
					<li>25</li>
					<li><img src="images/tick.png" alt="tick"> </li>
					<li> <img src="images/tick.png" alt="tick"></li>
					<li><img src="images/tick.png" alt="tick"> </li>
				</ul>
			</div>
			<p> <a href="#" role="button" class="btn btn-success btn-lg">Sign Up </a> </p>
		</div>
	</div>
</div>
-->


<!-- #Footer -->
<footer>
	<div class="copyrights">
		<div class="container">
			<p>Copyrights &copy; 2020 La Cochera Wisp | Equipo Info</p>
		</div>
	</div>
</footer>
<!-- /#Footer -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
	$(document).ready(function() {
		/*
		var defaults = {
				containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/

		$().UItoTop({
			easingType: 'easeOutQuart'
		});

	});
</script>
<!-- //here ends scrolling icon -->
</body>

</html>