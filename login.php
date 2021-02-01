<!DOCTYPE HTML>
<html>

<head>
	<title>Login | Cochera Internet</title>
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
					<li><a href="index.php">Inicio</a></li>
					<li><a href="paquetes.php">Paquetes</a></li>
					<li class="dropdown1"><a href="ubicacion.html">Ubicación</a></li>
					<li class="dropdown1"><a href="about.html">Contacto</a></li>
					<li class="dropdown1"><a href="support.html">Soporte</a></li>
					<li class="dropdown1 active"><a href="login.php">Login</a></li>
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

			<h3>Login</h3>
			<h6>Inicia sesión</h6>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="clearfix"> </div>
<!-- Header Ends Here -->
<div class="login-content">
	<div class="container">
		<div class="login-page">
			<div class="account_grid">
				<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
					<h3>Nuevos Clientes</h3>
					<p>Crea una nueva cuenta</p>
					
					<form action="login.php" method="Post" id="createUserForm">
					<div>
							<span>Nombre<label>*</label></span>
							<input type="text" name="nombre" required>
						</div>
						<div>
							<span>Apellidos<label>*</label></span>
							<input type="text" name="apellidos" required>
						</div>
						<div>
							<span>Numero de Telefono<label>*</label></span>
							<input id="telefono" type="text" name="telefono" required>
						</div>
						<div>
							<span>Email<label>*</label></span>
							<input type="text" name="email" required>
						</div>
						<div>
							<span>Contraseña<label>*</label></span>
							<input type="password" name="contraseña" required>
						</div>
						<input class="acount-btn" type="submit" value="Crear Cuenta">
					</form>
				</div>
				
				
				<div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
					<h3>Inicia Sesión</h3>
					<p>Si tienes una cuenta, por favor ingresa</p>

					<form action="login.php" method="Post" id="loginUserForm">
						<div>
							<span>Email o numero de teléfono<label>*</label></span>
							<input type="text" name="email" required>
						</div>
						<div>
							<span>Contraseña<label>*</label></span>
							<input type="password" name="contraseña" required>
						</div>
						<input type="submit" value="login">
						<p> <strong>OR</strong><a id="loginFacebook"><img src="images/facebook-icon.png"></a> <a id="loginGoogle" href="#"><img src="images/gmail-icon.png" alt=""></a></p>
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
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
<script src="js/user.js"></script>

  <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyB8gHIxH-FL9Ey1o3wE8z1zhNeQkz5h50c",
    authDomain: "wisp-8fbbb.firebaseapp.com",
    projectId: "wisp-8fbbb",
    storageBucket: "wisp-8fbbb.appspot.com",
    messagingSenderId: "813578148618",
    appId: "1:813578148618:web:dfc3ab727a83b9009b78f3"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
</script>
 <!-- Add Firebase products that you want to use -->
 <script src="https://www.gstatic.com/firebasejs/8.2.3/firebase-auth.js"></script>
 
  <script src="/js/fsLogin.js"></script>

</body>

</html>