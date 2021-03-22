<?php


require_once ("DataSource.php");
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
    
    public function autenticarUsuario($user, $pass){
        $data_source = new DataSource();
        //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE usuario = :user AND password = :pass", 
                                                    array(':user'=>$user,':pass'=>$pass));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                        $data_table[$indice]["idUsuario"],
                        $data_table[$indice]["cc"], 
                        $data_table[$indice]["nombre"], 
                        $data_table[$indice]["apellido"],
                        $data_table[$indice]["fecha_nacimiento"],
                        $data_table[$indice]["sexo"],
                        $data_table[$indice]["email"],
                        $data_table[$indice]["telefono"],
                        $data_table[$indice]["usuario"],
                        $data_table[$indice]["password"],
                        $data_table[$indice]["idTipoUsuario"]
                        );
                  
            }
           
        } 
        
        return $usuario;
    }
    
    public function buscarUsuarioPorId($id){
        $data_source = new DataSource();
        //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE idUsuario = :id", 
                                                    array(':id'=>$id));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                        $data_table[$indice]["idUsuario"],
                        $data_table[$indice]["cc"], 
                        $data_table[$indice]["nombre"], 
                        $data_table[$indice]["apellido"],
                        $data_table[$indice]["fecha_nacimiento"],
                        $data_table[$indice]["sexo"],
                        $data_table[$indice]["email"],
                        $data_table[$indice]["telefono"],
                        $data_table[$indice]["usuario"],
                        $data_table[$indice]["password"],
                        $data_table[$indice]["idTipoUsuario"]
                        );
            }
            return $usuario;
        }else{
            return null;
        }
    }    
    public function buscarUsuarioPorEmail($email){
        $data_source = new DataSource();
        //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE email = :email", 
                                                    array(':email'=>$email));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                        $data_table[$indice]["idUsuario"],
                        $data_table[$indice]["cc"], 
                        $data_table[$indice]["nombre"], 
                        $data_table[$indice]["apellido"],
                        $data_table[$indice]["fecha_nacimiento"],
                        $data_table[$indice]["sexo"],
                        $data_table[$indice]["email"],
                        $data_table[$indice]["telefono"],
                        $data_table[$indice]["usuario"],
                        $data_table[$indice]["password"],
                        $data_table[$indice]["idTipoUsuario"]
                        );
            }
            return $usuario;
        }else{
            return null;
        }
    }    

    
    
    public function leerUsuarios(){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM usuario");
        $usuario=null;
        $usuarios=array();
        foreach($data_table as $indice=>$valor){
                $usuario = new Usuario(
                       $data_table[$indice]["idUsuario"],
                        $data_table[$indice]["cc"], 
                        $data_table[$indice]["nombre"], 
                        $data_table[$indice]["apellido"],
                        $data_table[$indice]["fecha_nacimiento"],
                        $data_table[$indice]["sexo"],
                        $data_table[$indice]["email"],
                        $data_table[$indice]["telefono"],
                        $data_table[$indice]["usuario"],
                        $data_table[$indice]["password"],
                        $data_table[$indice]["idTipoUsuario"]
                        );
                array_push($usuarios,$usuario);
        }
        return $usuarios;   
    }
    
    public function insertarUsuario(Usuario $usuario){
        $data_source= new DataSource();
        $sql = "INSERT INTO usuario VALUES (:idUsuario, :cc, :nombre, :apellido, :fecha_nacimiento, :sexo,"
                                               . ":email, :telefono, :usuario, :password, :idTipoUsuario)";
        $resultado = $data_source->ejecutarActualizacion($sql, array(
            ':idUsuario'=>$usuario->getIdUsuario(),
            ':cc'=>$usuario->getCc(),
            ':nombre'=>$usuario->getNombre(),
            ':apellido'=>$usuario->getApellido(),
            ':fecha_nacimiento'=>$usuario->getFecha_Nacimiento(),
            ':sexo'=>$usuario->getSexo(),
            ':email'=>$usuario->getEmail(),
            ':telefono'=>$usuario->getTelefono(),
            ':usuario'=>$usuario->getUsuario(),
            ':password'=>$usuario->getPassword(),
            ':idTipoUsuario'=>$usuario->getIdTipoUsuario()
            )
        );
        
        return $resultado;
    }
    
    
    public function modificarUsuario(Usuario $usuario, $tipomod){
        $data_source= new DataSource();
        $sql = "UPDATE usuario SET cc= :cc, "
                . " nombre= :nombre, "
                . " apellido= :apellido, "
                . " fecha_nacimiento= :fecha_nacimiento, "
                . " sexo= :sexo, "
                . " email= :email, "
                . " telefono= :telefono, "
                . " usuario= :usuario, "
                . " password= :password, "
                . " idTipoUsuario= :idTipoUsuario "
                . " WHERE idUsuario= :idUsuario ";
        $resultado = $data_source->ejecutarActualizacion($sql, array(
               	':idUsuario'=>$usuario->getIdUsuario(),
            	':cc'=>$usuario->getCc(),
            	':nombre'=>$usuario->getNombre(),
            	':apellido'=>$usuario->getApellido(),
            	':fecha_nacimiento'=>$usuario->getFecha_Nacimiento(),
            	':sexo'=>$usuario->getSexo(),
            	':email'=>$usuario->getEmail(),
            	':telefono'=>$usuario->getTelefono(),
            	':usuario'=>$usuario->getUsuario(),
            	':password'=>$usuario->getPassword(),
            	':idTipoUsuario'=>$usuario->getIdTipoUsuario()
            )
        );
        
       
        return $resultado;
    }
    
    public function borrarUsuario($id){
        $data_source = new DataSource();
        $usuario=  buscarUsuarioPorId($id);
        $resultado= $data_source->ejecutarActualizacion("DELETE FROM usuario WHERE idUsuario = :id", array('id'=>$id));
   
        return $resultado;
    }
    
    
    
}
