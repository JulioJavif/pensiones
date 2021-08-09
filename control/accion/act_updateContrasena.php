<?php
session_start();
if (isset($_POST['actual']) && $_POST['actual']!=''
    && isset($_POST['nueva1']) && $_POST['nueva1']!=''
    && isset($_POST['nueva2']) && $_POST['nueva2']!='') {
    
        require_once (__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $verificar = UsuarioDAO::VerificarContrasena($_SESSION['id'], $_POST['actual']);
        if ($verificar!=null) {
            if ($verificar) {
                $nueva1 = $_POST['nueva1'];
                $nueva2 = $_POST['nueva2'];
                if ($nueva1 == $nueva2) {
                    $resultado = UsuarioDAO::UpdateContrasena($_SESSION['id'], $nueva1);
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
            }else {
                if ($_SESSION['type']==1) {
                    header("Location:/../pensiones/vista/usuario/EditArrendador.php?resultado=3");
                    exit();
                }else {
                    header("Location:/../pensiones/vista/usuario/EditArrendatario.php?resultado=3");
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
?>