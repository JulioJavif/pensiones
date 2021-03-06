
<?php
  session_start();
  if (isset($_SESSION['nombre'])) {
    if ($_SESSION['type'] == 1) {
      header("Location: Arrendador.php");
      exit();
    }
    if ($_SESSION['type'] == 2) {
      header("Location: Arrendatario.php");
      exit();
    }
    
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pensiones | Registrar</title>
  
  <!-- FAVICON -->
  <link href="../../img/favicon.png" rel="shortcut icon">
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


<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="../../index.html">
						<img src="../../images/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="../../index.php">Inicio</a>
							</li>
              <!--
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Dashboard<span><i class="fa fa-angle-down"></i></span>
								</a>

								<!-- Dropdown list 
								<div class="dropdown-menu">
									<a class="dropdown-item" href="dashboard.html">Dashboard</a>
									<a class="dropdown-item" href="dashboard-my-ads.html">Dashboard My Ads</a>
									<a class="dropdown-item" href="dashboard-favourite-ads.html">Dashboard Favourite Ads</a>
									<a class="dropdown-item" href="dashboard-archived-ads.html">Dashboard Archived Ads</a>
									<a class="dropdown-item" href="dashboard-pending-ads.html">Dashboard Pending Ads</a>
								</div>
							</li>
            -->
            <!--
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pages <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -
								<div class="dropdown-menu">
									<a class="dropdown-item" href="about-us.html">About Us</a>
									<a class="dropdown-item" href="contact-us.html">Contact Us</a>
									<a class="dropdown-item" href="user-profile.html">User Profile</a>
									<a class="dropdown-item" href="404.html">404 Page</a>
									<a class="dropdown-item" href="package.html">Package</a>
									<a class="dropdown-item" href="single.html">Single Page</a>
									<a class="dropdown-item" href="store.html">Store Single</a>
									<a class="dropdown-item" href="single-blog.html">Single Post</a>
									<a class="dropdown-item" href="blog.html">Blog</a>

								</div>
							</li>
            -->
            <!--
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Listing <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -
								<div class="dropdown-menu">
									<a class="dropdown-item" href="category.html">Ad-Gird View</a>
									<a class="dropdown-item" href="ad-listing-list.html">Ad-List View</a>
								</div>
							</li>
            -->
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
								<a class="nav-link text-white add-button" href="login.php">Iniciar sesi??n</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>

<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">Registrarse</h3>
                        <form name="formulario" action="../../control/accion/act_signup.php" method="POST">
                            <fieldset class="p-4">
                                <input id="dni" name="dni" type="number" placeholder="DNI*" class="border p-3 w-100 my-2">
                                <input id="nombre" name="nombre" type="name" placeholder="Nombre*" class="border p-3 w-100 my-2">
                                <input id="apellido" name="apellido" type="name" placeholder="Apellido*" class="border p-3 w-100 my-2">
                                <input id="email" name="email" type="email" placeholder="Correo*" class="border p-3 w-100 my-2">
                                <input id="cel" name="cel" type="number" placeholder="Celular*" class="border p-3 w-100 my-2">
                                <select id="tipo_usr" name="tipo_usr" class="w-100">
                                  <option value="1">Arrendador</option>
                                  <option value="2">Estudiante</option>
                                </select>
                                <input id="password" name="password" type="password" placeholder="Contrase??a*" class="border p-3 w-100 my-2">
                                <input id="password2" name="password2" type="password" placeholder="Confirmar contrase??a*" class="border p-3 w-100 my-2">
                                <div class="loggedin-forgot d-inline-flex my-3">
                                        <input name="acepto" type="checkbox" id="registering" class="mt-1" value="1">
                                        <label for="registering" class="px-2">Al registrarse, tu aceptas nuestros <a class="text-primary font-weight-bold" href="terms-condition.html">Terminos & Condiciones</a></label>
                                </div>
                                <button id="submit" type="submit" name="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Registrarse</button>
                            </fieldset>
                        </form>
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
          <p>Copyright ?? <script>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- tether js -->
<script src="../../plugins/tether/js/tether.min.js"></script>
<script src="../../plugins/raty/jquery.raty-fa.js"></script>
<script src="../../plugins/slick-carousel/slick/slick.min.js"></script>
<script src="../../plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="../../plugins/smoothscroll/SmoothScroll.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="../../plugins/google-map/gmap.js"></script>
<script src="../../js/script.js"></script>

<?php
if (isset($_GET["error"])) {
  $error = $_GET["error"];
  if ($error==1) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Error', 'Este usuario ya existe');
      });
    </script>";
  }else if ($error==2) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Error', 'Debe llenar todos los campos');
      });
    </script>";
  }else if($error==3){
    echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Error', 'Sus contrase??as no coinciden');
      });
    </script>";
  }else if($error==4){
    echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Error', 'Debe aceptar los terminos');
      });
    </script>";
  }
}
?>

</body>

</html>
