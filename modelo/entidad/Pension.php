<?php

class Pension{
    protected $titulo;
    protected $direccion;
    protected $texto;
    protected $estado;
    protected $userid;

    public function __construct($titulo, $direccion, $texto, $estado, $userid)
    {
        $this->titulo= $titulo;
        $this->direccion= $direccion;
        $this->texto= $texto;
        $this->estado= $estado;
        $this->userid= $userid;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getDireccion(){
        return $this->dirección;
    }

    public function getTexto(){
        return $this->texto;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function getUserId(){
        return $this->userid;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setDireccion($direcccion){
        $this->direccion = $direcccion
    }

    public function setTexto($texto){
        $this->texto = $texto;
    }

    public function setEstado($estado){
        $this->estado = $estado;
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