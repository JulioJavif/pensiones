<?php
require_once __DIR__."/../entidad/Pension.php";

class PensionDAO{

    public static function InsertarCasa(Pension $pension){
        require_once (__DIR__."/conexion.php");

        $cnx = conectar::conectarDB();

        $direccion = $pension->getDireccion();
        $barrio = $pension->getBarrio();
        $descripcion = $pension->getDescripcion();
        $path = $pension->getPath();
        $userID = $pension->getUserId();

        $sql = "INSERT INTO house_for_rent ( id, description, owner_user_id, address, neighborhood)
         VALUES ( 'null', '$descripcion', '$userID', '$direccion', '$barrio')";

        $resultado = $cnx->prepare($sql);
        $resultado = $resultado->execute();
        return $resultado;
    }

    public static function casaID($userID, $direccion){
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $sql = "SELECT * FROM house_for_rent WHERE owner_user_id = $userID AND address = '$direccion'";

        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            $row = $resultado->fetch();
            return $row['id'];
        }
        return null;
    }

    public static function fileId($path){
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $sql = "SELECT * FROM file WHERE path = '$path'";

        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            $row = $resultado->fetch();
            return $row['id'];
        }
        return null;
    }

    public static function GuardarImagen($path, $nombre1, $nombre2, $userID, $direccion){
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $casaId = PensionDAO::casaID($userID, $direccion);
        $fecha = date('d-m-Y H:i:s');
        $sql = "INSERT INTO file (id, original_name, name, type, path, updated_at, created_at)
        VALUES ('null', '$nombre1', '$nombre2', 'jpg', '$path', '$fecha', '$fecha')";

        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            $fileId = PensionDAO::fileId($path);
            if ($casaId != null && $fileId != null) {
                $sql2 = "INSERT INTO house_file (id, file_id, house_for_rent_id) 
                VALUES ( 'null', '$fileId', '$casaId')";

                $resultado = $cnx->prepare($sql2);
                return $resultado->execute();
            }
        }
        return false;
    }


}

?>