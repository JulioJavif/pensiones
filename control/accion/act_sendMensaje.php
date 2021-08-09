<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['asunto']) && $_POST['asunto']!=''
    && isset($_POST['message']) && $_POST['message']!=''
    && isset($_GET['ref']) && $_GET['ref']!='') {
    
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['message'];

        require_once (__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $destinatario = UsuarioDAO::getUsuarioByIdPension($_GET['ref']);

        
        //use PHPMailer\PHPMailer\PHPMailer;
        //use PHPMailer\PHPMailer\Exception;



        $mail = new PHPMailer(true);

        try {
            
        } catch (Exception $e) {
            //throw $th;
        }
}
?>