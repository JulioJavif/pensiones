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
  <title>Inicio | Arrendador</title>
  
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

<section class="bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="arrendador.php">
						<img src="../../images/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link bg-gray" href="arrendador.php">Inicio</a>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle bg-gray" data-toggle="dropdown" href="">Men??<span><i class="fa fa-angle-down"></i></span>
								</a>

								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="AddPension.php">Agregar una casa nueva</a>
									<!--<a class="dropdown-item" href="CitasArrendador">Contactar</a>
									<!--<a class="dropdown-item" href="#">Ver citas</a>-->
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
<section class="dashboard section">
  <!-- Container Start -->
  <div class="container">
    <!-- Row Start -->
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
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
            <a href="EditArrendador.php" class="btn btn-main-sm">Editar perfil</a>
          </div>
          <!-- Dashboard Links --
          <div class="widget user-dashboard-menu">
            <ul>
              <li class="active"><a href="#"><i class="fa fa-home"></i> Mis casas</a></li>
              <li><a href="#"><i class="fa fa-search-plus"></i> Casas m??s buscadas <span>5</span></a></li>
              <li><a href="#"><i class="fa fa-building"></i>Casas llenas <span>12</span></a></li>
              <li><a href="#"><i class="fa fa-check"></i> Casas disponibles<span>23</span></a></li>
          </div>-->

          <!-- delete-account modal -->
          						  <!-- delete account popup modal start-->
                <!-- Modal 
                <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
                        <img src="images/account/Account1.png" class="img-fluid mb-2" alt="">
                        <h6 class="py-2">Are you sure you want to delete your account?</h6>
                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                        <textarea name="message" id="" cols="40" rows="4" class="w-100 rounded"></textarea>
                      </div>
                      <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!- delete account popup modal end-->
          <!-- delete-account modal -->
          
        </div>
      </div>
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
        <!-- Recently Favorited -->
        <div class="widget dashboard-container my-adslist">
          <h3 class="widget-header">Mis casas</h3>
          <table class="table table-responsive product-dashboard-table">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Descripci??n</th>
                <th class="text-center"></th>
                <th class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              require_once (__DIR__."/../../control/accion/act_loadpension.php");
              $lista = PensionDAO::GetPensionesAdmin();
              if ($lista != null) {
                foreach ($lista as $pension){
                  echo '<tr>
                  <td class="product-thumb">
                    <img width="80px" height="auto" src="../../images/products/icono.png" alt="image description">
                  </td>
                  <td class="product-details">';
                  echo '<span class="add-id"><strong>Direcci??n:</strong>'.$pension["address"].'</span>';
                  echo '<span class="location"><strong>Barrio</strong>'.$pension["neighborhood"].'</span>';
                  echo '</td>
                  <td class="product-category"><span class="categories status active"></span>
                  </td>
                  <td class="action" data-title="Action">
                    <div class="">
                      <ul class="list-inline justify-content-center">
                        <li class="list-inline-item">';
                        echo '<a data-toggle="tooltip" data-placement="top" title="Ver casa" class="view" href="verPension.php?ref='.$pension["id"].'">
                        <i class="fa fa-eye"></i>
                      </a>';
                        echo '</li>
                        <li class="list-inline-item">
                          <a class="edit" data-toggle="tooltip" data-placement="top" title="Editar casa" href="EditarPension.php?ref='.$pension["id"].'">
                            <i class="fa fa-pencil"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>';
                }
              }
              ?>
            </tbody>
          </table>

        </div>

      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
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
if (isset($_GET["error"])) {
  $error = $_GET["error"];
  if ($error == 1) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Error', 'Correo o contrase??a invalidos');
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
  else if ($error == -1) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Error', 'No se pudo completar la operaci??n');
      });
    </script>";
  }
}
if (isset($_GET["success"])) {
  $success = $_GET["success"];
  if ($success == 1) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Success', 'Casa eliminada');
      });
    </script>";
  }
}
?>

</body>

</html>