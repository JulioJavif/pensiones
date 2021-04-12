<?php

/**
 * Usuario
 */
class Usuario
{
    protected $id;
    protected $idTipoUsuario;
    protected $dni;
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $telefono;
    protected $password;
    
    public function __construct($id, $dni, $nombre, $apellido, $email, $password, $telefono, $idTipoUsuario){
        
        $this->id = $id;
        $this->idTipoUsuario = $idTipoUsuario;
		$this->dni = $dni;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->email = $email;
		$this->telefono = $telefono;
		$this->password = $password;
    }
    
    
    public function getIdUsuario()
    {
        return $this->id;
    }
    
    public function setIdUsuario($idUsuario)
    {
        $this->id = $idUsuario;
        
        return $this;
    }
    
     public function getDni()
    {
        return $this->dni;
    }
    
    public function setDni($dni)
    {
        $this->dni = $dni;
        
        return $this;
    }

	public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        
        return $this;
    }
    
	 public function getApellido()
    {
        return $this->apellido;
    }

    
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

  	 public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

  	public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
    
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    
    public function getIdTipoUsuario()
    {
        return $this->idTipoUsuario;
    }

    public function setIdTipoUsuario($idTipoUsuario)
    {
        $this->idTipoUsuario = $idTipoUsuario;

        return $this;
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

