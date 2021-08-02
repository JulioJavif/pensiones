<?php
session_start();
require_once (__DIR__."/../../modelo/dao/UsuarioDAO.php");
if(isset($_POST["email"]) && isset($_POST["password"])){
	//username and password sent from Form
	if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                $resultado = UsuarioDAO::autenticarUsuario($_POST["email"], $_POST["password"]);
                if ($resultado == -1) {
                        header("Location:/../pensiones/vista/usuario/login.php?error=1");
                        exit();
                }
                $id = $resultado;
                $resultado = UsuarioDAO::buscarUsuariobyId($resultado);
                if ($resultado != null) {
                        if ($resultado["user_type"]==1) {
                                $_SESSION['type'] = $resultado["user_type"];
                                $_SESSION['nombre'] = $resultado["nombre"];
                                $_SESSION['apellido'] = $resultado["apellido"];
                                $_SESSION['id'] = $id;
                                header("Location:/../pensiones/vista/usuario/Arrendador.php");
                                exit();
                        }else if ($resultado["user_type"]==2) {
                                $_SESSION['type'] = $resultado["user_type"];
                                $_SESSION['nombre'] = $resultado["nombre"];
                                $_SESSION['apellido'] = $resultado["apellido"];
                                $_SESSION['id'] = $id;
                                header("Location:/../pensiones/vista/usuario/Arrendatario.php");
                                exit();
                        }else {
                                header("Location:/../pensiones/vista/usuario/login.php?error=2");
                                exit();
                        }
                }
        }else {
                header("Location:/../pensiones/vista/usuario/login.php?error=3");
                exit();
        }
}
?>
