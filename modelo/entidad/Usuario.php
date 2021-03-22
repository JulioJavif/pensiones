<?php

/**
 * Usuario
 */
class Usuario
{
    protected $idUsuario;
    protected $cc;
    protected $nombre;
    protected $apellido;
    protected $fecha_nacimiento;
    protected $sexo;
    protected $email;
    protected $telefono;
    protected $usuario;
    protected $password;
    protected $idTipoUsuario;
    
    public function __construct($idUsuario, $cc, $nombre, $apellido, $fecha_nacimiento,$sexo,$email,$telefono,$usuario,$password, $idTipoUsuario){
        
        $this->idUsuario = $idUsuario;
		$this->cc = $cc;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->fecha_nacimiento = $fecha_nacimiento;
		$this->sexo = $sexo;
		$this->email = $email;
		$this->telefono = $telefono;
		$this->usuario= $usuario;
		$this->password = $password;
		$this->idTipoUsuario = $idTipoUsuario;
	
    }
    
    
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
        
        return $this;
    }
    
     public function getCc()
    {
        return $this->cc;
    }
    
    public function setCc($cc)
    {
        $this->cc = $cc;
        
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

     public function getFecha_Nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    
    public function setFecha_Nacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    } 

     public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

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
    
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

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

