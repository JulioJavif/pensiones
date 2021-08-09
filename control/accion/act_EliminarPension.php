<?php
if (isset($_POST["eleccion"]) && $_POST["eleccion"]!="") {
        if ($_POST["eleccion"]!=-1) {
            session_start();
            require_once (__DIR__."/../../modelo/dao/PensionDAO.php");
            $resultado = PensionDAO::EliminarPension($_SESSION["id"], $_POST["eleccion"]);
            if ($resultado) {
                header("Location:/../pensiones/vista/usuario/Arrendador.php?success=1");
                exit();
            }else {
                echo "error";
            }
        }else {
            header("Location:/../pensiones/vista/usuario/Arrendador.php");
            exit();
        }
}
?>