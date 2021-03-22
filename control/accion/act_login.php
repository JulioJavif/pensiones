<?php
        session_start();
        require_once (__DIR__."/../mdb/mdbUsuario.php");
        $home = "..";
        
        echo "<P>HOLA</P>";
	if(isset($_POST['submit'])){
		$errMsg = '';
		//username and password sent from Form
		$username = $_POST['username'];
		$password = $_POST['password'];
        $user = autenticarUsuario($username, $password);
        
     
		if($user != null){
                    $_SESSION['ID_USUARIO'] = $user->getIdUsuario();
                    $_SESSION['NOMBRE_USUARIO'] = $user->getNombre();
                    $_SESSION['APELLIDO_USUARIO'] = $user->getApellido();
                    $_SESSION['TIPO_USUARIO'] = $user->getTipoUsuario_IdTipoUsuario();
                    $_SESSION['USERNAME']= $user->getUsuario();

                    header("Location: ../../vista/usuario/index.php");
		}else{
                    $errMsg .= 'Username and Password are not found';
                    echo $errMsg;
           
		}
	}
        
        
        
        //header("Location: ../../vista/usuario/login.php");
        
?>
