<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pensiones+ | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">PS+</h1>

            </div>
            <h3>Bienvenidos a Pensiones+</h3>
            <p>Aquí usted podrá obtener información de Pensiones Universitarias
         
            </p>
            <p>Iniciar sesión</p>
            <form class="m-t" role="form" action="../../control/accion/act_login.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Usuario" name="username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Contraseña" name="password" required="">
                </div>
                <button type="submit"  name='submit' value="Submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Olvidó su contraseña?</small></a>
             
            </form>
            <p class="m-t"> <small>ProgramacionWeb &copy; 2017</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
