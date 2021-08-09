<?php
require_once (__DIR__."/../../modelo/dao/PensionDAO.php");
if (isset($_POST["buscarpension"]) && $_POST["buscarpension"]!="") {
    
    $resultado = PensionDAO::BuscarPension($_POST["buscarpension"]);

    if ($resultado == null) {
        header("Location:/../pensiones/vista/usuario/search.php?error=0");
        exit();
    }

    header("Location:/../pensiones/vista/usuario/search.php?q=".$_POST["buscarpension"]);
    exit();
}
?>