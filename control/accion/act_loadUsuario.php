<?php
require_once (__DIR__."/../../modelo/dao/UsuarioDAO.php");
$usuario = UsuarioDAO::getUsuarioById($_SESSION["id"]);
?>