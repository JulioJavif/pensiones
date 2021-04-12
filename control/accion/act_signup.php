<?php
if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["dni"]) && isset($_POST["email"]) 
    && isset($_POST["cel"]) && isset($_POST["tipo_usr"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
    
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $email = $_POST["email"];
    $cel = $_POST["cel"];
    $tipo_usr = $_POST["tipo_usr"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if (!isset($_POST["acepto"])) {
        header("Location:/../pensiones/vista/usuario/SignUp.php?error=4");
        exit();
    }

    if ($password != $password2) {
        header("Location:/../pensiones/vista/usuario/SignUp.php?error=3");
        exit();
    }

    if (!empty($nombre) && !empty($apellido) && !empty($dni) && !empty($email) && !empty($cel) && !empty($tipo_usr)
    && !empty($password)) {
        
        require_once (__DIR__."/../../modelo/dao/UsuarioDAO.php");

        $passhash = password_hash($password, PASSWORD_BCRYPT);

        $usuario = new Usuario(null, $dni, $nombre, $apellido, $email, $passhash, $cel, $tipo_usr);
        $resultado = UsuarioDAO::insertarUsuario($usuario);
        if ($resultado) {
            header("Location:/../pensiones/vista/usuario/login.php");
            exit();
        }else{
            header("Location:/../pensiones/vista/usuario/SignUp.php?error=1");
            exit();
        }
    }else{
        header("Location:/../pensiones/vista/usuario/SignUp.php?error=2");
        exit();
    }
}
?>