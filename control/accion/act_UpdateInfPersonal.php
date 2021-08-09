<?php
session_start();
//echo $_POST['nombre'].' ';
//echo $_POST['apellido'].' ';
//echo $_POST['telefono'].' ';
//echo $_POST['dni'].' ';
if (isset($_POST['nombre']) && $_POST['nombre']!=''
    && isset($_POST['apellido']) && $_POST['apellido']!=''
    && isset($_POST['telefono']) && $_POST['telefono']!=''
    && isset($_POST['dni']) && $_POST['dni']!='') {
        require_once (__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $resultado = UsuarioDAO::UpdateUsuario($_SESSION['id'],
                                                $_POST['dni'], 
                                                $_POST['nombre'], 
                                                $_POST['apellido'], 
                                                $_POST['telefono']);
        if ($_SESSION['type']==1) {
            if ($resultado) {
                header("Location:/../pensiones/vista/usuario/EditArrendador.php?resultado=1");
                exit();
            }else{
                header("Location:/../pensiones/vista/usuario/EditArrendador.php?resultado=2");
                exit();
            }
        }else {
            if ($resultado) {
                header("Location:/../pensiones/vista/usuario/EditArrendatario.php?resultado=1");
                exit();
            }else{
                header("Location:/../pensiones/vista/usuario/EditArrendatario.php?resultado=2");
                exit();
            }
        }
}
if ($_SESSION['type']==1) {
    header("Location:/../pensiones/vista/usuario/EditArrendador.php?resultado=3");
    exit();
}else {
    header("Location:/../pensiones/vista/usuario/EditArrendatario.php?resultado=3");
    exit();
}
?>