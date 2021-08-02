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
  <title>Citas - Arrendatario</title>

  <!-- FAVICON -->
  <link href="../../img/favicon.png" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap-slider.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
            <a class="navbar-brand" href="arrendatario.php">
              <img src="../../images/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto main-nav ">
                <li class="nav-item active">
                  <a class="nav-link" href="arrendatario.php">Inicio</a>
                </li>
                <li class="nav-item dropdown dropdown-slide">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Mis casas<span><i
                        class="fa fa-angle-down"></i></span>
                  </a>
                  <!-- Dropdown list -->
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Historial de casas</a>
                    <a class="dropdown-item" href="search.php">Buscar casa</a>
                    <a class="dropdown-item" href="CitasArrendatario.php">Citas</a>
                  </div>
                </li>
              </ul>
              <ul class="navbar-nav ml-auto mt-10">
                <li class="nav-item">
                  <form action='../../control/accion/act_logout.php'>
                    <input type="submit" name="sesionDestroy" class="nav-link text-white btn-danger"
                      value="Cerrar sesion" />
                  </form>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <!-- page title -->
  <!--================================
=            Page Title            =
=================================-->
  <section class="page-title">
    <!-- Container Start -->
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
          <!-- Title text -->
          <h3>Citas</h3>
        </div>
      </div>
    </div>
    <!-- Container End -->
  </section>
  <!-- page title -->

  <!-- contact us start-->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="contact-us-content p-4">
            <h5>Buzón</h5>
            <div class="list-group scroll overflow-auto">
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1 ">Julio Fuentes</h5>
                  <small class="text-muted">2 days ago</small>
                </div>
                <p class="mb-1">Cambio de fecha</p>
                <small class="text-muted">juliojavif@gmail.com</small>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Julio Fuentes</h5>
                  <small class="text-muted">3 days ago</small>
                </div>
                <p class="mb-1">Visita</p>
                <small class="text-muted">juliojavif@gmail.com</small>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Luis Puello</h5>
                  <small class="text-muted">4 days ago</small>
                </div>
                <p class="mb-1">Reserva de pensión</p>
                <small class="text-muted">luispuello@gmail.com</small>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Luis Puello</h5>
                  <small class="text-muted">4 days ago</small>
                </div>
                <p class="mb-1">Reserva de pensión</p>
                <small class="text-muted">luispuello@gmail.com</small>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Luis Puello</h5>
                  <small class="text-muted">4 days ago</small>
                </div>
                <p class="mb-1">Reserva de pensión</p>
                <small class="text-muted">luispuello@gmail.com</small>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Luis Puello</h5>
                  <small class="text-muted">4 days ago</small>
                </div>
                <p class="mb-1">Reserva de pensión</p>
                <small class="text-muted">luispuello@gmail.com</small>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Luis Puello</h5>
                  <small class="text-muted">4 days ago</small>
                </div>
                <p class="mb-1">Reserva de pensión</p>
                <small class="text-muted">luispuello@gmail.com</small>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Luis Puello</h5>
                  <small class="text-muted">4 days ago</small>
                </div>
                <p class="mb-1">Reserva de pensión</p>
                <small class="text-muted">luispuello@gmail.com</small>
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Luis Puello</h5>
                  <small class="text-muted">4 days ago</small>
                </div>
                <p class="mb-1">Reserva de pensión</p>
                <small class="text-muted">luispuello@gmail.com</small>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <form action="#">
            <fieldset class="p-4">
              <div class="form-group">
                <div class="row">
                  <div class="col-lg-6 py-2">
                    <input type="email" placeholder="Correo" class="form-control" required>
                  </div>
                  <div class="col-lg-6 pt-2">
                    <input type="text" placeholder="Fecha y hora de la cita *" class="form-control" required>
                  </div>
                </div>
              </div>
              <select name="" id="" class="form-control w-100">
                <option value="1">Asunto de la cita</option>
                <option value="1">Visita</option>
                <option value="1">Reserva de pensión</option>
                <option value="1">Consulta</option>
                <option value="1">Cambio de fecha</option>
              </select>
              <textarea name="message" id="" placeholder="Contenido *" class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
              <div class="btn-grounp">
                <button type="submit" class="btn btn-primary mt-2 float-right">ENVIAR</button>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- contact us end -->

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
        <!--Link list -->
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
      <! Promotion --
      <div class="col-lg-4 col-md-7">
        <!-App promotion --
        <div class="block-2 app-promotion">
          <div class="mobile d-flex">
            <a href="">
              <!-Icon -
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
            <p>Copyright ©
              <script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
              </script>. Todos los derechos reservados.
            </p>
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
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
  <script src="../../plugins/google-map/gmap.js"></script>
  <script src="../../js/script.js"></script>

  <?php
if (isset($_GET["error"])) {
  $error = $_GET["error"];
  if ($error == 1) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) {
        swal('Error', 'Correo o contraseña invalidos');
      });
    </script>";
  }else if ($error == 2) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function (event) {
        swal('Error', 'Error interno');
      });
    </script>";
  }
  else if ($error == 3) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function (event) {
        swal('Error', 'Llene todos los campos');
      });
    </script>";
  }
}
?>

</body>

</html>