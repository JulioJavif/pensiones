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

    public static function GuardarServicios($servicios, $userID, $direccion){
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $casaId = PensionDAO::casaID($userID, $direccion);
        foreach ($servicios as $value) {
            $sql = "SELECT id FROM services WHERE services.key = $value";
            $resultado = $cnx->prepare($sql);
            if ($resultado->execute()) {
                $row = $resultado->fetch();
                $row = $row['id'];
                $none = "none";

                $sql = "INSERT INTO house_services (id, services_id, house_for_rent_id, custom_value)
                VALUES ('null', '$row', '$casaId', '$none')";
                $resultado = $cnx->prepare($sql);
                $resultado->execute();
            }
        }
    }


    //Gets
    public static function GuardarHabitacion($id, $direccion, $valor, $descripcion, $capacidad){
        $casaId = PensionDAO::casaID($id, $direccion);
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        if ($casaId != null) {
            $sql = "INSERT INTO house_room
            (id, house_for_rent_id, description, capacity, rental_price)
            VALUES ( 'null', '$casaId', '$descripcion', '$capacidad', '$valor')";
            $resultado = $cnx->prepare($sql);
            if ($resultado->execute()) {
                return true;
            }
        }
        return false;
    }

    public static function GetPensiones(){
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        require_once (__DIR__."/../entidad/Pension.php");
        $sql = "SELECT * FROM house_for_rent WHERE 1";
        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }

    public static function GetPensionesAdmin(){
        $id = $_SESSION['id'];

        require_once (__DIR__."/../entidad/Pension.php");
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $sql = "SELECT * FROM house_for_rent WHERE $id = owner_user_id";
        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            $lista = $resultado->fetchAll();
            return $lista;
        }
        return null;
    }

    public static function GetPensionesAdminByID($id){
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();
        
        $sql = "SELECT * FROM house_for_rent WHERE house_for_rent.owner_user_id = ".$_SESSION['id']." and house_for_rent.id = $id";
        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            $info = $resultado->fetch();
            return $info;
        }
        return null;
    }

    public static function GetImagesPensionByID($id){
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $sql = "SELECT file.path, file.name FROM file
                inner join house_file
                on house_file.house_for_rent_id = $id and file.id = house_file.file_id
                order by file.id asc";
        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            $path = $resultado->fetchAll();
            return $path;
        }
        return null;
    }

    public static function GetHabitacionById($id){
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $sql = "SELECT description, capacity, rental_price FROM house_room 
        WHERE house_room.house_for_rent_id = $id";
        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            $habitacion = $resultado->fetch();
            return $habitacion;
        }
        return null;
    }


    //Updates
    public static function UpdateCasa(Pension $pension, $userID){
        $casaId = PensionDAO::casaID($userID, $pension->getDireccion());
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();
        $descripcion = $pension->getDescripcion();
        $direccion = $pension->getDireccion();
        $barrio = $pension->getBarrio();

        $sql = "UPDATE house_for_rent SET 
                description = '$descripcion', 
                address = '$direccion', 
                neighborhood = '$barrio'
                WHERE house_for_rent.id = $casaId";
        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            return true;
        }
        return false;
    }

    public static function UpdateHabitacion($userID, $direccion, $valor, $descripcion, $capacidad){
        $casaId = PensionDAO::casaID($userID, $direccion);
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $sql = "UPDATE house_room SET 
                description= '$descripcion', 
                capacity= '$capacidad', 
                rental_price= '$valor' 
                WHERE house_room.house_for_rent_id=$casaId";
        $resultado = $cnx->prepare($sql);
        return $resultado->execute();
    }

    public static function UpdateImagen($path, $originalnombre, $nombre, $userID, $direccion){
        $casaId = PensionDAO::casaID($userID, $direccion);
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $sql = "SELECT * FROM house_file WHERE house_file.house_for_rent_id=$casaId";
        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            $info = $resultado->fetch();
            $id = $info["file_id"];
            $sql = "UPDATE file SET 
                    original_name= '$originalnombre', 
                    name= '$nombre', 
                    type= 'jpg', 
                    path= '$path' 
                    WHERE file.id=$id";
            $resultado = $cnx->prepare($sql);
            return $resultado->execute();
        }
        return false;
    }
}

?>