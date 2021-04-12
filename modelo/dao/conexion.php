<?php
class conectar{
    public static function conectarDB(){
        try{
            $conexion = new PDO("mysql:host=localhost; dbname=db_pensiones","root","");
            return $conexion;
        }catch(PDOException $e){
               
            die("no se pudo conectar a la BDD");
        }
    }
}
?>