<?php
require_once './include/conexion.php';
session_start();

if (!isset($_SESSION["email"])) {
	header("location: login.php");
} else {
	$email =  $_SESSION["email"];
	$conexion->Conectar();
	$query = $conexion->ConsultaSql("call datosFormularioCompra('$email')");
	if ($query[0][0] == -1) {
		$query[0][0] = "Error";
		$query[0][1] = "Error";
		$query[0][2] = "Error";
		header("location: login.php");
	}
	$conexion->CerrarSql();
}
//session_destroy();
?>


<!DOCTYPE HTML>
<html>

<head>
	<title>Carrito | Cochera Internet</title>
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
	<link rel="stylesheet" href="css/cart.css">

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
					<li class="dropdown1"><a href="ubicacion.html">Ubicación</a></li>
					<li class="dropdown1 active"><a href="about.html">Contacto</a></li>
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

			<h3>Contrata</h3>
			<h6>Finaliza tu compra aquí</h6>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="clearfix"> </div>

<!-- Header Ends Here -->
<div class="about_grid_top">
	<div style="border: 2px solid #3E518E;box-shadow: 10px 10px 5px 0px rgba(62,81,142,1);" class="container">
		<div class="our-head text-center">
			<h4 class="spacing">Verifique sus datos</h4>
		</div>
		<!--Formulario-->
		<form id="datosCarrito">

          <div class="form-row">
            <div class="form-group col-sm-12 col-md-6">
              <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?= $query[0][0]?>">
            </div>
            <div class="form-group col-sm-12 col-md-6">
              <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="<?= $query[0][1]?>">
            </div>
            <div class="form-group col-sm-12 col-md-6">
              <input type="tel" class="form-control" name="telefono" placeholder="Telefono"value="<?= $query[0][2]?>">
            </div>
            <div class="form-group col-sm-12 col-md-6">
              <input type="email" class="form-control" name="email" placeholder="Correo Electronico" value="<?= $query[0][3]?>">
            </div>
            <div class="col-12">
              <p class=" my-2 text-center spacing">Primera instalacion</p>
            </div>
            <div class="form-group col-sm-12 col-md-6">
              <select name="paquete" class="form-control" id="PaqueteSeleccionado1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="form-group col-sm-12 col-md-6">
              <input name="precio" type="text" class="form-control" disabled placeholder="Precio">
            </div>

            <!-- Se generaran con JS pd No estoy orgulloso de esto :'( -->
            <div id="titulo" class="spacing"></div>
            <div id="adicionalPaquete"></div>
            <div id="adicionalPrecio"></div>
			
            <div class="form-group col-sm-12 col-md-12">
              <div class=" flex ">
                <input id="btnAgregar" type="button" class="boton form-control btn btn-success" value="Agregar">
              </div>
            </div>
          
            <div class="form-group col-sm-12 col-md-12">
              <div class="flex">
                <input type="button" class="boton form-control btn btn-primary" value="Todo esta correcto!">
              </div>
            </div>
          </div>
        </form>
	</div>
</div>
<!--services-->
<div class="services">
	<div class="container">
		<h3>¿Por qué contratar nuestro servicio?<span></span></h3>
		<div class="col-md-6 services-grids">
			<ul class="srevicesgrid_info">
				<li class="tick">Alta velocidad de conexion</li>
				<li class="tick">Velocidad estable todo el tiempo</li>
				<li class="tick">Facilidad de instalación</li>
			</ul>
		</div>
		<div class="col-md-6 services-grids">
			<ul class="srevicesgrid_info">
				<li class="tick">Soporte técnico la mayor parte del dia</li>
				<li class="tick">Posibilidad de aumentar ancho de banda</li>
				<li class="tick">Rápida solucion a inconvenientes </li>

			</ul>
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
<!-- //here ends scrolling icon -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="./js/cart.js"></script>
</body>

</html>
<!-- Formulario de datos de envio
<section class="form-register">
            <h3>Si desea agragar paquetes adicionales</h3>
            <h3>Agalo aquí</h3>
            <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre">
            <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido">
			<input class="controls" type="email" name="correo" id="correo" placeholder="Correo Electronico">
			<input class="controls" type="tel" name="cantidad" id="cantidad" placeholder="Numero de telefono">
			<input class="controls" type="number" name="cantidad" id="cantidad" placeholder="Codigo Postal">
			<input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Colonia">
			<input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Estado">
			<input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Municipio">
			<input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido">
			<input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Calle">
			<input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Numero Exterior">
			<input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Numero Interior">
			<input class="controls" type="text" name="paquete" id="paquete" placeholder="Entre calles">
			<input class="controls" type="text" name="precio" id="correo" placeholder="Referencia">
			<input class="botons" type="submit" value="Confirmar">
</section> -->