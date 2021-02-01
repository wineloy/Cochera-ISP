<?php

require_once __DIR__.'/include/conexion.php';
$conexion->Conectar();
session_start();

// Sino esta logeado lo regreso al index
if (!isset($_SESSION["email"])) {
	header("location: index.php");
} else
//Pintar datos de usuario

$email = $_SESSION["email"];
$cliente = $conexion->ConsultaSql("call DetalleOrdenDatosCliente('$email');");

$oferta = $_SESSION["OfertaUno"];
$paquete = $conexion->ConsultaSql("call detalleOrdenDatosPaquete($oferta);");

if(isset($_SESSION["OfertaDos"])){
	$ofertados = $_SESSION["OfertaDos"];
	$paquetedos = $conexion->ConsultaSql("call detalleOrdenDatosPaquete($ofertados);");
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Orden | Cochera Internet</title>
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
					<li><a class="active" href="index.php">Inicio</a></li>
					<li><a href="paquetes.php">Paquetes</a></li>
					<li class="dropdown1 active"><a href="ubicacion.html">Ubicación</a></li>
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
	<!-- page heading -->
	<div id="breadcrumb_wrapper">
		<div class="container">

			<h3>Detalle de la Orden</h3>
			<h6>Verifica tus datos</h6>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="clearfix"> </div>
<!-- Header Ends Here -->
<!--contact-->
<div class="contact">
	<div class="container">
		<div class="map">
			<h3>Ya casi es tuyo!!</h3><br>
			<h4>Verifica que todo sea correcto</h4>
		</div>
		<div class="address">
			<!-- eloy mijo en lugar de que diga los titulos que dice ahi vas a pintar los datos -->
			<div class="address-left">
				<h4>Datos del Cliente :</h4>
				<p><?php echo $cliente[0][0] . " " . $cliente[0][1] ?></p>
				<p><?php echo $cliente[0][2] ?></p>
				<p>Correo : <a><?php echo $email ?></a></p>
				<?php
				$contador = 1;
				for ($fila = 0; $fila < count($cliente); $fila++) {
				?>

					<h4>Dirección <?php echo $contador ?> </h4>
					<p><?php echo $cliente[$fila][3] ?> <?php echo $cliente[$fila][5] ?></p>
					<p><?php echo $cliente[$fila][6] ?></p>
					<p><?php echo $cliente[$fila][4] ?></p>

				<?php
					$contador = $contador + 1;
				}
				?>
			</div>
			<div class="clearfix"> </div>
		</div>

		<?php
		if (isset($_SESSION["OfertaDos"])) {
		?>

			<div class="support support2">
				<div class="row">

					<div class="col-lg-10">
						<h2>Información de la Compra</h2>
						<p>Nombre del Paquete: <strong><?php echo $paquete[0][0] ?></strong></p>
						<p>Megas: <strong><?php echo $paquete[0][1] ?> bajada y subida</strong> </p>
						<p>Precio: <strong>$ <?php echo $paquete[0][2] ?> </strong></p>
						<p>Instalación: <strong> $1000.00 </strong></p>
					</div>
					<div class="col-lg-2">
						<h2>Costo de paquete</h2>
						<h2><strong>$ <?php echo $paquete[0][2] + 1000 ?>.00 </strong></h2>
					</div>
				</div>
			</div>

			<div class="support support2">
				<div class="row">
					<div class="col-lg-10">
						<p>Nombre del Paquete: <strong><?php echo $paquetedos[0][0] ?></strong></p>
						<p>Megas: <strong><?php echo $paquetedos[0][1] ?> bajada y subida</strong> </p>
						<p>Precio: <strong>$ <?php echo $paquetedos[0][2] ?> </strong></p>
						<p>Instalación: <strong> $1000.00 </strong></p>
					</div>
					<div class="col-lg-2">
						<h2>Costo de paquete</h2>
						<h2><strong>$ <?php echo $paquetedos[0][2] + 1000 ?>.00 </strong></h2>

					</div>
				</div>
			</div>

			<div class="col-lg-9 contact-infom support">
				<h2>Gran Total </h2>
				<a  id="Exito" class="read-more text-center">Realizar Pago</a>
			</div>
			<div class="col-lg-3 contact-infom support">
				<h2 class="text-center">Total a pagar:<br> $ <?php echo ($paquete[0][2] + 1000) + ($paquetedos[0][2] + 1000) ?>.00</h2>
				<br>
			</div>

		<?php
			//Sumar Paquetes
		} else { ?>

			<div class="support support2">
				<div class="row">

					<div class="col-lg-10">
						<h2>Información de la Compra</h2>
						<p>Nombre del Paquete: <strong><?php echo $paquete[0][0] ?></strong></p>
						<p>Megas: <strong><?php echo $paquete[0][1] ?> bajada y subida</strong> </p>
						<p>Precio: <strong>$ <?php echo $paquete[0][2] ?> </strong></p>
						<p>Instalación: <strong> $1000.00 </strong></p>
					</div>
					<div class="col-lg-2">
						<h2>Costo de paquete</h2>
						<h2><strong>$ <?php echo $paquete[0][2] + 1000 ?>.00 </strong></h2>
					</div>
				</div>
			</div>

			<div class="col-lg-9 contact-infom support">
				<h2>Gran Total </h2>
				<a id="Exito" class="read-more text-center">Realizar Pago</a>
			</div>
			<div class="col-lg-3 contact-infom support">
				<h2 class="text-center">Total a pagar:<br> $ <?php echo ($paquete[0][2] + 1000) ?>.00</h2>
				<br>
			</div>
		<?php } ?>


		<div class="contact-infom">
			<h4>Pagos y contratación en ciber la Cochera.</h4>
			<p> "Tienes todo el mes para pagar tu mensualidad se da una prórroga de 10 dias del siguiente mes,
				si no as pagado el servicio se te bloquea. " <br>
				Paga a tiempo no te desconectes. </p>
		</div>
	</div>
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
<script src="js/detalleOrden.js"></script>
<!-- //here ends scrolling icon -->
</body>

</html>