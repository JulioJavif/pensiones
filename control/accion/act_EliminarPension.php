<?php
if (isset($_POST["eleccion"]) && $_POST["eleccion"]!="") {
    if (isset($_GET["ref"]) && $_GET["ref"]!="") {
        if ($_POST["eleccion"]==1) {
            
        }else if ($_POST["eleccion"]==2) {
            header("Location:/../pensiones/vista/usuario/Arrendador.php");
            exit();
        }
    }
}
?>