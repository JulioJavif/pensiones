<?php

class Pension{
    protected $direccion;
    protected $barrio;
    protected $descripcion;
    protected $path;
    protected $userId;

    public function __construct($direccion, $barrio, $descripcion, $path, $userId)
    {
        $this->direccion = $direccion;
        $this->barrio = $barrio;
        $this->descripcion = $descripcion;
        $this->path = $path;
        $this->userId = $userId;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getBarrio(){
        return $this->barrio;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getPath(){
        return $this->path;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function setDireccion($direcccion){
        $this->direccion = $direcccion;
    }

    public function setBarrio($barrio){
        $this->barrio = $barrio;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setPath($path){
        $this->path = $path;
    }

    public function setUserId($UserId){
        $this->userid = $UserId;
    }

    public function toArray() {
        $vars = get_object_vars ( $this );
        $array = array ();
        foreach ( $vars as $key => $value ) {
            $array [ltrim ( $key, '_' )] = $value;
        }
        return $array;
    }
}

?>