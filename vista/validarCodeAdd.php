<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

header('Content-type: application/json');
$resultado = array();

if(isset($_POST)){
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $tipodoc = $_POST['tipodoc'];
    $dni = $_POST['dni'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $pass = $_POST['renewpassword'];
    //$departamento = $_POST['departamento'];
    $provincia = $_POST['provincia'];
    $distrito = $_POST['distrito'];
    $direccion = $_POST['direccion'];

    $departamentos = ['-','AMAZONAS', 'ANCASH', 'APURIMAC', 'AREQUIPA', 'AYACUCHO', 
                    'CAJAMARCA', 'CUSCO', 'HUANCAVELICA', 'HUANUCO', 'ICA', 'JUNIN', 
                    'LA LIBERTAD', 'LAMBAYEQUE', 'LIMA', 'LORETO', 'MADRE DE DIOS', 
                    'MOQUEGUA', 'PASCO', 'PIURA', 'PUNO', 'SAN MARTIN', 'TACNA', 'TUMBES', 'UCAYALI'];

    for($i=0; $i<26; $i++){
        if($i==$_POST['departamento']){
            $depa = $departamentos[$i];
        }
    }
    
    //Llamar a la funcion para agregar al usuario
    $respuesta = UsuarioControlador::addUsuario($nombres, $apellidos, $tipodoc, $dni, $celular, $depa, $provincia, $distrito, $direccion, $email, $pass);
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