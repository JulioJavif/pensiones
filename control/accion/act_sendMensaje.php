<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['asunto']) && $_POST['asunto']!=''
    && isset($_POST['message']) && $_POST['message']!=''
    && isset($_GET['ref']) && $_GET['ref']!='') {
    
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['message'];

        require_once (__DIR__."/../../modelo/dao/UsuarioDAO.php");
        $destinatario = UsuarioDAO::getUsuarioByIdPension($_GET['ref']);

        include '../../PHPMailer-6.5.0/src/PHPMailer.php';
        include '../../PHPMailer-6.5.0/src/SMTP.php';
        //include '../../PHPMailer-6.5.0/src/OAuth.php';
        include '../../PHPMailer-6.5.0/src/Exception.php';
        //include '../../PHPMailer-6.5.0/src/POP3.php';

        try {

            $emailTo = $destinatario['email'];
            $subject = "Pensiones: ".$destinatario['nombre']." quiere comunicarse contigo";
            $bodymail = "<p>".$mensaje."</p><br>"."<p>Para hablar con "
            .$destinatario['nombre']." puedes escribir a su correo: "
            .$destinatario['email']." o llamarlo a su número de telefono "
            .$destinatario['telefono'].".</p>";

            require_once (__DIR__."/../../conf/correo.php");
            $fromname = "Pensiones app";
            $host = "smtp.gmail.com";
            $port = "587";
            $SMTPAuth = 'login';
            $_SMTPSecure = 'tls';
            $correo = new Correo();
            
            $mail = new PHPMailer(true);//PHPMailer\PHPMailer\

            $mail->isSMTP();

            $mail->SMTPDebug = 1;
            $mail->Host = $host;
            $mail->Port = $port;
            $mail->SMTPAuth = $SMTPAuth;
            $mail->SMTPSecure = $_SMTPSecure;
            $mail->Username = $correo->getCorreo();
            $mail->Password = $correo->getContrasena();

            $mail->setFrom($correo->getCorreo(), $fromname);
            $mail->addAddress($emailTo);

            $mail->isHTML(true);
            $mail->Subject = $subject;

            $mail->Body = $bodymail;

            //var_dump("123456");

            if (!$mail->send()) {
                echo '\nNo se envió';
                header("Location:/../pensiones/vista/usuario/CitasArrendatario.php?error=0");
                exit();
            }else {
                header("Location:/../pensiones/vista/usuario/CitasArrendatario.php?success=1");
                exit();
            }
            //echo '\nPasa algo raro';
        } catch (Exception $e) {
            //throw $th;
        }
}
?>