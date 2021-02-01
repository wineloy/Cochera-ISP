<?php
include __DIR__.'/include/conexion.php';
//Hay que tomar en cuenta que esto es una mala practica esta info se debe de almacenar en archivos .env
$conexion->Conectar();
//Query 
$paquetes = $conexion->ConsultaSql("call getPaquetes();");

$categorias = $conexion->ConsultaSql("select categoria from categorias");

$conexion->CerrarSql();

//var_dump(count($query[0])); // 7 filas * 5 columnas   
?>

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
	<title>Inicio | La Cochera Internet</title>
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
	<link rel="shortcut icon" href="images/logof.png" type="image/x-icon">

</head>
<!-- Header Starts Here -->
<div class="banner">
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
					<li><a class="active" href="index.php">Inicio</a></li>
					<li><a href="paquetes.php">Paquetes</a></li>
					<li class="dropdown1"><a href="ubicacion.html">Ubicación</a></li>
					<li class="dropdown1"><a href="about.html">Contacto</a></li>
					<li class="dropdown1"><a href="support.html">Soporte</a></li>
					<li class="dropdown1"><a href="login.php">Login</a></li>
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
	<div class="banner-info">
		<h1>La Cochera Internet</h1>
		<p>Es un servicio de Ciber la Cochera</p>
		<p>Servicio de internet conexión por microondas</p>
		<input type="button" class="btn btn-info" value="Conexión inalambrica">
	</div>
</div>
<div class="clearfix"> </div>
<!-- Header Ends Here -->
<div class="best">
	<div class="container">
		<article>
			<figure class="float-left"><img src="images/body.png" alt="Placeholder"></figure>
			<h2>Bienvenidos</h2>
			<p>Ve tus clases en linea, realiza tus tareas, chatea con tus amigos, ve tus videos favoritos sigue a tus youtubers, escucha la música de tu preferencia, estar conectado con tus seres queridos, y un sin fin de cosas...</p>
		</article>
	</div>
</div>

<div class="plans">
	<div class="container">
		<!-- pricing table -->
		<h2 class="heading">Estas son nuestras categorias</h2>
		<!--Pintado de productos aqui esta el PHP que usted no puede ver ;)-->
		<?php
		// deberian ser 6 (5 PHP) 
		for ($r = 0; $r < count($categorias); $r++) { //crea tarjetas
		?>
			<div class="col-md-4 one_third pricing">
				<div class="pricing_top">
					<h6> <a href="paquetes.php"><?= utf8_encode($categorias[$r][0]) ?></a></h6> <br>
					<!--CATEGORIAS ;)-->
				</div>
			</div>
		<?php
		}
		?>
	</div>

	<div class="plans">
		<div class="container">
			<h2 class="heading">Aprovecha: Ofertas Relampago </h2>
			<!-- pricing table -->
			<?php
			// deberian ser 6 (5 PHP) 
			for ($r = 0; $r < count($paquetes); $r++) { //crea tarjetas
				if($paquetes[$r][7]==1){

			?>
				<div class="col-md-4 one_third pricing one_third2">
					<div class="pricing_top">
						<h6><?= utf8_encode($paquetes[$r][1]) ?></h6> <br>
						<!--Nombre Paquete ;)-->
						<p style="color: white !important;"><sup><?= utf8_encode($paquetes[$r][4]) ?></sup></p>
						<!--CATEGORIA ;)-->
						 
						<!--PRECIO ;)-->
						<div style="background-color: red; height:65px">
						<p style="font-size: 17px !important;">Paquete con Descuento</p>
						<p style="margin-top: 10px;"><sup>$ <?= utf8_encode($paquetes[$r][6]) ?></sup> </p> 
						</div>
						
					</div>
					<div class="pricing_middle">
						<ul>
							<li>Ideal para el hogar</li>
							<li>Iva Incluido</li>
							<li>Pagos Mensuales</li>
							<li>Hasta <?= utf8_encode($paquetes[$r][2]) ?> ↓↑ Mbps</li>
						</ul>
					</div>
					<div class="pricing_bottom">
						<a href="/login.php">Contratar</a>
					</div>
				</div>
			<?php
				}
			}
			?>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="fullwidth-section semi-background">
		<div class="fullwidth-bg">
			<div class="overlay left-aligned">
				<div class="dt-sc-one-half column first">
					<div class="dt-support">
						<h2>Horario comercial</h2>
						<p>Lunes-Viernes ____________09:00 AM - 08:00 PM<br>
							Sábado-Domingo _______10:00 AM - 08:00pm PM </p>
						<span>(855) 503-0450</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="service-section" id="service">
		<div class="container">
			<div class="service-section-head text-center wow fadeInRight" data-wow-delay="0.4s">
				<h3>Más de Nosotros</h3>
			</div>
			<div class="service-section-grids">
				<div class="col-md-6 service-grid">
					<div class="service-section-grid wow bounceIn" data-wow-delay="0.4s">
						<div class="icon">
							<i class="s1"></i>
						</div>
						<div class="icon-text">
							<h4>Instalaciones</h4>
							<p>Todo tipo de instalaciones necesarias para el correcto funcionamiento de nuestro servicio</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="service-section-grid wow bounceIn" data-wow-delay="0.4s">
						<div class="icon">
						</div>
						<div class="icon-text">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="service-section-grid wow bounceIn" data-wow-delay="0.4s">
						<div class="icon">
							<i class="s3"></i>
						</div>
						<div class="icon-text">
							<h4>Soporte en Linea</h4>
							<p>Has tus pagos mensuales a travez de nuestra plataforma y con nuestros metodos de pago</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 service-grid">
					<div class="service-section-grid wow bounceIn" data-wow-delay="0.4s">
						<div class="icon">
							<i class="s3"></i>
						</div>
						<div class="icon-text">
							<h4>Métodos de Pago</h4>
							<p>Paga con targeta, Oxxo o PayPal</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="service-section-grid wow bounceIn" data-wow-delay="0.4s">
						<div class="icon">
							<i class="s5"></i>
						</div>
						<div class="icon-text">
							<h4>Reparaciones</h4>
							<p>Reparaciones a culaquier equipo o percance que se tenga con el servicio</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="service-section-grid wow bounceIn" data-wow-delay="0.4s">
						<div class="icon">
							<i class=""></i>
						</div>
						<div class="icon-text">
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--services-->
	<div class="services">
		<div class="container">
			<h3><span>¿Por qué elegirnos?</span></h3>
			<div class="col-md-6 services-grids">
				<ul class="srevicesgrid_info">
					<li class="tick">Los unicos en la Zona</li>
					<li class="tick">Servicio Profesional</li>
					<li class="tick">Soluciones Personalizadas</li>
				</ul>
			</div>
			<div class="col-md-6 services-grids">
				<ul class="srevicesgrid_info">
					<li class="tick">Atencion Personal </li>
					<li class="tick">Años de Experencia</li>
					<li class="tick">Equipo de trabajo Profesional</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="services-bottom">
		<p>Nuestra compañia tiene más de<span>200 clientes </span>en difernetes zonas </p>
	</div>
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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="js/alertIndex.js"></script>
	<!-- //here ends scrolling icon -->
	</body>

</html>