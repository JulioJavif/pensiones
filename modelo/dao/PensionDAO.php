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

    public static function obtenerID($userID, $direccion){
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

    public static function GuardarImagen($path, $idCasa, $nombre1, $nombre2, $userID, $direccion){
        
    }


}

?>