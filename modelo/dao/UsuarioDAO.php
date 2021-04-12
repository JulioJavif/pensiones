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
}
