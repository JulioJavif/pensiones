<?php
if (isset($_POST)) {
    if(isset($_POST["direccion"]) && !empty($_POST["direccion"]) 
    && isset($_POST["barrio"]) && !empty($_POST["barrio"]) 
    && isset($_POST["descripcion"]) && !empty($_POST["descripcion"])
    /*&& isset($_FILES["file"])*/){

        if (isset($_POST["valorhabitacion"]) && !empty($_POST["valorhabitacion"])
        && isset($_POST["descripcion2"]) && !empty($_POST["descripcion2"])
        && isset($_POST["capacidadhabitacion"]) && !empty($_POST["capacidadhabitacion"])
        /*&& isset($_FILES["file2"])*/) {
            
            /*$servicios = array('aire'=>0, 'aseo'=>0, 'alimentacion'=>0, 'cocina'=>0, 'lavado'=>0);

            if (isset($_POST["aireacondicionado"])) {
                $servicios['aire'] = $_POST["aireacondicionado"];
            }
            if (isset($_POST["aseohabitacion"])) {
                $servicios['aseo'] = $_POST["aseohabitacion"];
            }
            if (isset($_POST["alimentacion"])) {
                $servicios['alimentacion'] = $_POST["alimentacion"];
            }
            if (isset($_POST["cocina"])) {
                $servicios['cocina'] = $_POST["cocina"];
            }
            if (isset($_POST["lavado"])) {
                $servicios['lavado'] = $_POST["lavado"];
            }*/

            $direccion = $_POST["direccion"];
            $barrio = $_POST["barrio"];
            $descripcion = $_POST["descripcion"];
            $file1 = $_FILES["file1"];

            $valorhabitacion = $_POST["valorhabitacion"];
            $descripcion2 = $_POST["descripcion2"];
            $capacidadhabitacion = $_POST["capacidadhabitacion"];
            //$file2 = $_FILES["file2"];

            if (isset($file1) && $file1!="") {
                
                require_once (__DIR__."/../../modelo/dao/PensionDAO.php");
                session_start();

                $directorio = "../../images/fotos/";
                $aleatorio = mt_rand(100, 1000000);
                $path1 = "../../images/fotos/".$aleatorio.$file1['name'];

                $pension = new Pension($direccion, $barrio, $descripcion, $path1, $_SESSION['id']);
                $casaAgregada = PensionDAO::InsertarCasa($pension);
                $habitacion = PensionDAO::GuardarHabitacion($_SESSION['id'], $direccion, $valorhabitacion, $descripcion2, $capacidadhabitacion);
                $img = PensionDAO::GuardarImagen($path1, $file1['name'], $aleatorio.$file1['name'], $_SESSION['id'], $direccion);
                /*$serv = array();
                foreach ($servicios as $key => $value) {
                    if ($value!=0) {
                        array_push($serv, $value);
                    }
                }
                $serv = PensionDAO::GuardarServicios($serv, $_SESSION['id'], $direccion);*/

                if($casaAgregada && $img){
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

                    if ($serv) {
                        echo "<br>Servicios guardados";
                    }

                    header("Location:/../pensiones/vista/usuario/AddPension.php?success=1");
                    exit();
                }else {
                    echo "No se Guard?? la casa";
                }

            }else {
                echo "No cargan los archivos";
            }
        }else {
            echo "Error habitaci??n";
        }
    }else {
        echo "Error casa";
    }
}else {
    echo "Error no hay POST";
}
header("Location:/../pensiones/vista/usuario/AddPension.php?success=2");
exit();
?>