<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

header('Content-type: application/json');
$resultado = array();

if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['email']) && isset($_POST['password'])){
		$txtEmail = validar_campo($_POST['email']);
		$txtPassword = validar_campo($_POST['password']);

		$resultado = array("estado"=>"true");

		if(UsuarioControlador::login($txtEmail, $txtPassword)){
			
			$usuario = UsuarioControlador::getUsuario($txtEmail, $txtPassword);
			$_SESSION['usuario'] = array(
				'idusuario' => $usuario->getIdusuario(),
				'nombres' => $usuario->getNombres(),
				'apellidos' => $usuario->getApellidos(),
				'tipodoc' => $usuario->getTipodoc(),
				'numdni' => $usuario->getNumdni(),
				'celular' => $usuario->getCelular(),
				'departamento' => $usuario->getDepartamento(),
				'provincia' => $usuario->getProvincia(),
				'distrito' => $usuario->getDistrito(),
				'direccion' => $usuario->getDireccion(),
				'email' => $usuario->getEmail(),
				'password' => $usuario->getPassword(),
				'estado' => $usuario->getEstado(),
			);
			return print(json_encode($resultado));
		}
	}
}

//header("location:login_view.php");

$resultado = array("estado"=>"false");
return print(json_encode($resultado));


?>