<?php
if (isset($_POST)) {
    if(isset($_POST["direccion"]) && !empty($_POST["direccion"]) 
    && isset($_POST["barrio"]) && !empty($_POST["barrio"]) 
    && isset($_POST["descripcion"]) && !empty($_POST["descripcion"])){

        if (isset($_POST["valorhabitacion"]) && !empty($_POST["valorhabitacion"])
        && isset($_POST["descripcion2"]) && !empty($_POST["descripcion2"])
        && isset($_POST["capacidadhabitacion"]) && !empty($_POST["capacidadhabitacion"])) {

            $direccion = $_POST["direccion"];
            $barrio = $_POST["barrio"];
            $descripcion = $_POST["descripcion"];
            $file1 = $_FILES["file1"];

            $valorhabitacion = $_POST["valorhabitacion"];
            $descripcion2 = $_POST["descripcion2"];
            $capacidadhabitacion = $_POST["capacidadhabitacion"];

            require_once (__DIR__."/../../modelo/dao/PensionDAO.php");
            session_start();

            $directorio = "../../images/fotos/";
            $aleatorio = mt_rand(100, 1000000);
            $path1 = "../../images/fotos/".$aleatorio.$file1['name'];

            $pension = new Pension($direccion, $barrio, $descripcion, $path1, $_SESSION['id']);
            $casaAgregada = PensionDAO::UpdateCasa($pension, $_SESSION["id"]);
            $habitacion = PensionDAO::UpdateHabitacion($_SESSION['id'], $direccion, $valorhabitacion, $descripcion2, $capacidadhabitacion);
            echo $casaAgregada." ".$habitacion;
            if (isset($file1) && $file1["name"]!="") { 
                $img = PensionDAO::UpdateImagen($path1, $file1['name'], $aleatorio.$file1['name'], $_SESSION['id'], $direccion);
                if($img){
                    if(!file_exists($directorio )){
                        mkdir($directorio, 0777, true);
                        if(file_exists($directorio )){
                     
                            if(move_uploaded_file($file1["tmp_name"], $path1)){
                                echo "1. Archivo guardado con exito";
                            }else{
                                echo "1. Archivo no se pudo guardar";
                            }
                        }
                    }else{
                        if(move_uploaded_file($file1["tmp_name"], $path1)){
                            echo "2. Archivo guardado con exito";
                        }else{
                            echo "2. Archivo no se pudo guardar";
                        }
                        echo "<br>";
                        var_dump($path1);
                    }
                }
            }else {
                echo "No cargan los archivos";
            }
            header("Location:/../pensiones/vista/usuario/EditarPension.php?success=1&ref=".PensionDAO::casaID($_SESSION["id"], $direccion));
            exit();
        }else {
            echo "Error habitación";
        }
    }else {
        echo "Error casa";
    }

    header("Location:/../pensiones/vista/usuario/Arrendador.php?error=-1");
    exit();
}else {
    echo "Error no hay POST";
}
?>