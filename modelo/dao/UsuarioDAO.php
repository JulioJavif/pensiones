<?php

require_once (__DIR__."/../entidad/Usuario.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author Admin
 */
class UsuarioDAO {
    
    public static function insertarUsuario(Usuario $usuario){

        require_once (__DIR__."/conexion.php");

        $cnx = conectar::conectarDB();
        
        $id = $usuario->getIdUsuario();
        $tipo_usr = $usuario->getIdTipoUsuario();
        $email = $usuario->getEmail();
        $pass = $usuario->getPassword();
        $nombre = $usuario->getNombre();
        $apellido = $usuario->getApellido();
        $dni = $usuario->getDni();
        $tel = $usuario->getTelefono();

        $verificar = "SELECT * FROM user WHERE (email='$email' or dni=$dni)";
        $verificar = $cnx->prepare($verificar);
        $verificar->execute();
        if ($verificar->rowCount()>0){
            return false;
        }

        $consulta = "INSERT INTO user (id, user_type_id, email, password, nombre, apellido, dni, telefono)
        VALUES ('$id', '$tipo_usr', '$email', '$pass', '$nombre', '$apellido', '$dni', '$tel')";

        $resultado = $cnx->prepare($consulta);
        $resultado = $resultado->execute();
        return $resultado;
    }

    public static function autenticarUsuario($email, $password){

        require_once (__DIR__."/conexion.php");

        $sqllistar = "SELECT id, email ,password FROM user WHERE 1";
        $cnx = conectar::conectarDB();
        $resultado = $cnx->prepare($sqllistar);
        if ($resultado->execute()) {
            $rows = $resultado->fetchAll();
            foreach($rows as $row){
                if ($email==$row["email"]) {
                    if (password_verify($password, $row["password"])) {
                        $cnx == null;
                        return $row["id"];
                    }
                }
            }
            $cnx == null;
            return -1;
        }
    }

    public static function buscarUsuariobyId(int $id){
        require_once (__DIR__."/conexion.php");
        $sql = "SELECT user_type_id, nombre, apellido FROM user WHERE id=$id";
        $cnx = conectar::conectarDB();
        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            $row = $resultado->fetch();
            return array('user_type' => $row["user_type_id"],
                         'nombre' => $row["nombre"],
                         'apellido' => $row["apellido"]
                        );
        }
        return null;
    }

    public static function getUsuarioById($id){
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $sql = "SELECT email, nombre, apellido, dni, telefono FROM user WHERE user.id = $id";
        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            return $resultado->fetch();
        }
    }

    public static function UpdateUsuario($userId, $dni, $nombre, $apellido, $telefono){
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $sql = "UPDATE user SET nombre='$nombre', apellido='$apellido', dni='$dni', telefono='$telefono' WHERE user.id = $userId";
        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            return true;
        }
        return false;
    }

    public static function VerificarContrasena($userId, $key){
        $sql = "SELECT id, password FROM user WHERE id = $userId";
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();
        //echo password_hash($key, PASSWORD_BCRYPT).' ';
        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            $info = $resultado->fetch();
            if (password_verify($key, $info['password'])) {
                return true;
            }
            return false;
        }
        return null;
    }

    public static function UpdateContrasena($userId, $key){
        $key = password_hash($key, PASSWORD_BCRYPT);
        $sql = "UPDATE user 
        SET password='$key' 
        WHERE id = $userId";

        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $resultado = $cnx->prepare($sql);
        return $resultado->execute();
    }

    public static function VerificarCorreo($userId, $Correo){
        $sql = "SELECT id, email FROM user WHERE id = $userId";
        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();
        //echo password_hash($key, PASSWORD_BCRYPT).' ';
        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            $info = $resultado->fetch();
            if ($info['email']==$Correo) {
                return true;
            }
            return false;
        }
        return null;
    }

    public static function UpdateCorreo($userId, $Correo){
        $sql = "UPDATE user 
        SET email='$Correo' 
        WHERE id = $userId";

        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $resultado = $cnx->prepare($sql);
        return $resultado->execute();
    }

    public static function getUsuarioByIdPension($PensionId){
        $sql = "select email, nombre, apellido, telefono from user
                inner join house_for_rent
                on user.id = house_for_rent.owner_user_id
                where house_for_rent.id = $PensionId";

        require_once (__DIR__."/conexion.php");
        $cnx = conectar::conectarDB();

        $resultado = $cnx->prepare($sql);
        if ($resultado->execute()) {
            return $resultado->fetch();
        }
        return null;
    }
}
