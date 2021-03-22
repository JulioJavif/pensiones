<?php

    function buscarUsuarioPorId($id){
        require_once(__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $dao=new UsuarioDAO();
        $usuario = $dao->buscarUsuarioPorId( $id);
        return $usuario;
    }
    
    function buscarUsuarioPorEmail($email){
        require_once(__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $dao=new UsuarioDAO();
        $usuario = $dao->buscarUsuarioPorEmail($email);
        return $usuario;
    }
    
    function autenticarUsuario($username, $password){
        require_once(__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $dao=new UsuarioDAO();
        $usuario = $dao->autenticarUsuario($username, $password);
        return $usuario;
    }
  
    function insertarUsuario($usuario){
        require_once(__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $dao=new UsuarioDAO();
        $resultado=$dao->insertarUsuario($usuario);
        return $resultado;
    }

    function modificarUsuario($usuario, $tipomod){
        require_once(__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $dao=new UsuarioDAO();
        $resultado=$dao->modificarUsuario($usuario, $tipomod);
        return $resultado;
    }

    
    function borrarUsuario($id){
        require_once(__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $dao = new UsuarioDAO();
        $resultado=$dao->borrarUsuario($id);
        return $resultado;
    }     
    
    function leerUsuarios(){
        require_once(__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $dao = new UsuarioDAO();
        $usuarios=$dao->leerUsuarios();
        return $usuarios;
    }     
    
    