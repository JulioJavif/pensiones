<?php
session_start();
if (isset($_POST['correo']) && $_POST['newcorreo']
    && isset($_POST['newcorreo']) && $_POST['newcorreo']) {
    
        require_once (__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $correo = UsuarioDAO::VerificarCorreo($_SESSION['id'], $_POST['correo']);
        if ($correo!=null) {
            if ($correo) {
                $resultado = UsuarioDAO::UpdateCorreo($_SESSION['id'], $_POST['newcorreo']);
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
            }else {
                if ($_SESSION['type']==1) {
                    header("Location:/../pensiones/vista/usuario/EditArrendador.php?resultado=3");
                    exit();
                }else {
                    header("Location:/../pensiones/vista/usuario/EditArrendatario.php?resultado=3");
                    exit();
                }
            }
        }
}
?>