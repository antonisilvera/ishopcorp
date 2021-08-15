<?php
    //echo __DIR__;
    include '../helps/helps.php';

    header('Content-type: application/json');
    $resultado = array();

    if(isset($_POST)){
        //Datos del cliente
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];

        //Datos de la empresa
        $emailcorp = "ishopcorporacion@gmail.com";

        $header = "From: ". $email . "\r\n";
        $header .= "Reply-To: antoni.silvera@gmail.com \r\n";
        $header .= "X-Mailer: PHP/". phpversion();
        $msg = "Cliente: " . $apellidos . ", ". $nombres . "\r\n";
        $msg .= "Celular: " . $celular . "\r\n";
        $msg .= "Mensaje: " . $mensaje ." \r\n";


        $mail = @mail($emailcorp,$asunto,$msg,$header);

        if($mail){
            $resultado = array("estado"=>"true");
            return print(json_encode($resultado));         
        }else{
            $resultado = array("estado"=>"false");
            return print(json_encode($resultado));
        }
    }

    $resultado = array("estado"=>"false");
    return print(json_encode($resultado));

    

?>