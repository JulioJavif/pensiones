<?php
if (isset($_POST)) {
    if(isset($_POST["direccion"]) 
    && isset($_POST["barrio"]) 
    && isset($_POST["descripcion"]) 
    /*&& isset($_FILES["file"])*/){

        if (isset($_POST["valorhabitacion"])
        && isset($_POST["descripcion2"])
        && isset($_POST["capacidadhabitacion"])
        /*&& isset($_FILES["file2"])*/) {
            
            $aire = 0;
            $aseo = 0;
            $alimentacion = 0;
            $cocina = 0;
            $lavado = 0;

            if (isset($_POST["aireacondicionado"])) {
                $aire = $_POST["aireacondicionado"];
            }
            if (isset($_POST["aseohabitacion"])) {
                $aseo = $_POST["aseohabitacion"];
            }
            if (isset($_POST["alimentacion"])) {
                $alimentacion = $_POST["alimentacion"];
            }
            if (isset($_POST["cocina"])) {
                $cocina = $_POST["cocina"];
            }
            if (isset($_POST["lavado"])) {
                $lavado = $_POST["lavado"];
            }

            $direccion = $_POST["direccion"];
            $barrio = $_POST["barrio"];
            $descripcion = $_POST["descripcion"];
            $file1 = $_FILES["file1"];

            $valorhabitacion = $_POST["valorhabitacion"];
            $descripcion2 = $_POST["descripcion2"];
            $capacidadhabitacion = $_POST["capacidadhabitacion"];
            $file2 = $_FILES["file2"];

            if (isset($file1) && $file1!="" && isset($file2) && $file2!="") {
                echo $direccion . "<br>" . $barrio . "<br>" . $descripcion . "<br>" . $file1["type"] . "<br>" . $file1["tmp_name"] . "<br><br>";
                echo $valorhabitacion . "<br>" . $descripcion2 . "<br>" . $capacidadhabitacion . "<br>" . $file2["type"] . "<br>" . $file2["tmp_name"]  . "<br><br>";
                echo $aire . "<br>" . $aseo . "<br>" . $alimentacion . "<br>" . $cocina . "<br>" . $lavado . "<br><br>";
                
                require_once (__DIR__."/../../modelo/dao/PensionDAO.php");
                session_start();

                $directorio = "../../images/fotos/";
                $aleatorio = mt_rand(100, 1000000);
                $path1 = "../../images/fotos/".$aleatorio.$file1['name'];

                $pension = new Pension($direccion, $barrio, $descripcion, $path1, $_SESSION['id']);
                $casaAgregada = PensionDAO::InsertarCasa($pension);
                $img = PensionDAO::GuardarImagen($path1, $file1['name'], $aleatorio.$file1['name'], $_SESSION['id'], $direccion);

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
                        if(move_uploaded_file($file1["tmp_name"], $directorio.$aleatorio.".png")){
                            echo "2. Archivo guardado con exito";
                        }else{
                            echo "2. Archivo no se pudo guardar";
                        }
                        echo "<br>";
                        var_dump($path1);
                    }
                }else {
                    echo "No se Guardó la casa";
                }

            }else {
                echo "No cargan los archivos";
            }
        }else {
            echo "Error habitación";
        }
    }else {
        echo "Error casa";
    }
}else {
    echo "Error no hay POST";
}

?>