<?php
    include '../controlador/UsuarioControlador.php';

    header('Content-type: application/json');
    $resultado = array();

    if(isset($_POST)){
        $email=$_POST["email"];

        //enviar correo clave
        $respuesta = UsuarioControlador::forgetPass($email);
        if($respuesta){
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