<?php
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pensiones</title>
  
  <!-- FAVICON -->
  <link href="img/favicon.png" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
  <link href="../../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="../../plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="../../plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="../../plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="../../plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="../../css/style.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">


<section class="bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="../usuario/login.php">
						<img src="../../images/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
							<a class="nav-link" href="arrendador.php">Inicio</a>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Menú<span><i class="fa fa-angle-down"></i></span>
								</a>

								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="AddPension.php">Agregar una casa nueva</a>
									<a class="dropdown-item" href="CitasArrendador">Contactar</a>
								</div>
							</li>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
                <form action='../../control/accion/act_logout.php'>
                <input type="submit" name="sesionDestroy" class="nav-link text-white btn-danger" value="Cerrar sesion"/>
                </form>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user-dashboard-profile">
					<!-- User Image -->
					<div class="profile-thumb">
					<img src="../../images/user/profile.png" alt="" class="rounded-circle">
					</div>
					<!-- User Name -->
					<?php
					echo "<h5 class='text-center'>".$_SESSION['nombre']." ".$_SESSION['apellido']."</h5>";
					echo "<p>Arrendador</p>";
					?>
					<a href="EliminarUsuario.php" class="btn btn-main-sm">Eliminar cuenta</a>
				</div>
					<!-- Dashboard Links -->
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<h2>Editar perfil</h2>
					<p>En este apartado podrá corregir o actualizar los siguientes datos registrados en su cuenta</p>
				</div>
				<!-- Edit Personal Info -->
				<?php
				require_once(__DIR__."/../../control/accion/act_loadUsuario.php");
				?>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">Editar informacion personal</h3>
							<form action="../../control/accion/act_UpdateInfPersonal.php" method="POST">
								<!-- Identification-->
								<div class="form-group">
									<label for="first-name">Cédula</label>
									<?php echo '<input type="number" name="dni" class="form-control" id="first-name" value="'.$usuario['dni'].'">';?>
								</div>
								<!-- First Name -->
								<div class="form-group">
									<label for="first-name">Nombres</label>
									<?php echo '<input name="nombre" type="text" class="form-control" id="first-name" value="'.$usuario['nombre'].'">';?>
								</div>
								<!-- Last Name -->
								<div class="form-group">
									<label for="last-name">Apellidos</label>
									<?php echo '<input name="apellido" type="text" class="form-control" id="last-name" value="'.$usuario['apellido'].'">';?>
								</div>
								<!-- File chooser -->
								<!--<label for="last-name">Foto de perfil</label>
								<div class="form-group choose-file d-inline-flex">
									<i class="fa fa-user text-center px-3"></i>
									<input type="file" class="form-control-file mt-2 pt-1" id="input-file">
								 </div>-->
								<!-- Comunity Name -->
								<!--<div class="form-group">
									<label for="comunity-name">Dirección y nombre del barrio</label>
									<input type="text" class="form-control" id="comunity-name">
								</div>-->
								<!-- Zip Code -->
								<!--<div class="form-group">
									<label for="zip-code">Codigo postal</label>
									<input type="text" class="form-control" id="zip-code">
								</div>-->
								<!-- phone -->
								<div class="form-group">
									<label for="first-name">Telefono</label>
									<?php echo'<input name="telefono" type="number" class="form-control" id="first-name" value="'.$usuario['telefono'].'">';?>
								</div>
								<!-- Submit button -->
								<button type="submit" class="btn btn-transparent">Guardar cambios</button>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<!-- Change Password -->
					<div class="widget change-password">
						<h3 class="widget-header user">Editar contraseña</h3>
						<form action="../../control/accion/act_updateContrasena.php" method="POST">
							<!-- Current Password -->
							<div class="form-group">
								<label for="current-password">Contraseña antigua</label>
								<input name="actual" type="password" class="form-control" id="current-password">
							</div>
							<!-- New Password -->
							<div class="form-group">
								<label for="new-password">Contraseña nueva</label>
								<input name="nueva1" type="password" class="form-control" id="new-password">
							</div>
							<!-- Confirm New Password -->
							<div class="form-group">
								<label for="confirm-password">Confirmar contraseña nueva</label>
								<input name="nueva2" type="password" class="form-control" id="confirm-password">
							</div>
							<!-- Submit Button -->
							<button type="submit" class="btn btn-transparent">Actualizar contraseña</button>
						</form>
					</div>

					<div class="widget change-email mb-0">
						<h3 class="widget-header user">Editar dirección de correo electronico</h3>
						<form action="../../control/accion/act_updateCorreo.php" method="POST">
							<!-- Current Password -->
							<div class="form-group">
								<label for="current-email">Dirección de correo anterior</label>
								<?php echo '<input name="correo" type="email" class="form-control" id="current-email" value="'.$usuario['email'].'">';?>
							</div>
							<!-- New email -->
							<div class="form-group">
								<label for="new-email">Nueva dirección de correo</label>
								<input name="newcorreo" type="email" class="form-control" id="new-email">
							</div>
							<!-- Submit Button -->
							<button type="submit" class="btn btn-transparent">Actualizar correo</button>
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--============================
=            Footer            =
=============================-->

<footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
        <!-- About -->
        <div class="block about">
          <!-- footer logo -->
          <img src="../../images/logo.png" alt="">
          <!-- description -->
          <p class="alt-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 offset-lg-1 col-md-3">
        <div class="block">
          <h4>Contactenos</h4>
          <ul>
            <li><a href="#">3004303030</a></li>
            <li><a href="#">pensiones@pensiones.co</a></li>
            <li><a href="#">Calle 12 # 15-20</a></li>
            <li><a href="terms-condition.html">Terminos & condiciones</a></li>
          </ul>
        </div>
      </div>
      <!--
      <!-- Link list -->
      <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
        <div class="block">
          <!--
            <h4>Admin Pages</h4>
            <ul>
            <li><a href="category.html">Category</a></li>
            <li><a href="single.html">Single Page</a></li>
            <li><a href="store.html">Store Single</a></li>
            <li><a href="single-blog.html">Single Post</a>
            </li>
            <li><a href="blog.html">Blog</a></li>

          </ul>
           -->
        </div>
      </div>
      <!--
      <!-- Promotion --
      <div class="col-lg-4 col-md-7">
        <!-- App promotion --
        <div class="block-2 app-promotion">
          <div class="mobile d-flex">
            <a href="">
              <!-- Icon -
              <img src="images/footer/phone-icon.png" alt="mobile-icon">
            </a>
            <p>Get the Dealsy Mobile App and Save more</p>
          </div>
          <div class="download-btn d-flex my-3">
            <a href="#"><img src="images/apps/google-play-store.png" class="img-fluid" alt=""></a>
            <a href="#" class=" ml-3"><img src="images/apps/apple-app-store.png" class="img-fluid" alt=""></a>
          </div>
        </div>
      </div>
    -->
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-12">
        <!-- Copyright -->
        <div class="copyright">
          <p>Copyright © <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
            </script>. Todos los derechos reservados.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="top-to">
    <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>

<!-- JAVASCRIPTS -->
<script src="../../plugins/jQuery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/popper.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="../../plugins/tether/js/tether.min.js"></script>
<script src="../../plugins/raty/jquery.raty-fa.js"></script>
<script src="../../plugins/slick-carousel/slick/slick.min.js"></script>
<script src="../../plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="../../plugins/smoothscroll/SmoothScroll.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="../../plugins/google-map/gmap.js"></script>
<script src="../../js/script.js"></script>

<?php
/*if (isset($_GET["error"])) {
  $error = $_GET["error"];
  if ($error == 1) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Error', 'Correo o contraseña invalidos');
      });
    </script>";
  }else if ($error == 2) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Error', 'Error interno');
      });
    </script>";
  }
  else if ($error == 3) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Error', 'Llene todos los campos');
      });
    </script>";
  }
}*/
if (isset($_GET["resultado"])) {
	$resultado = $_GET["resultado"];
	if ($resultado == 1) {
		echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Actualizado', 'Ha actualizado sus datos');
      });
    </script>";
	}else if ($resultado == 2){
		echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Error', 'No se pudo actualizar sus datos');
      });
    </script>";
	}else{
		echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Error', 'Debe llenar todos los campos');
      });
    </script>";
	}
}
?>

</body>

</html>