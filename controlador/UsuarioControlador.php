<?php

	require_once __DIR__."/../modelo/UsuarioDao.php";
	
	class UsuarioControlador{

		public function login($email,$password){ 
            $obj_usuario = new Usuario();
            $obj_usuario->setEmail($email);
            $obj_usuario->setPassword($password);
            
			return UsuarioDao::login($obj_usuario);
		}

		public function getUsuario($email,$password){ 
            $obj_usuario = new Usuario();
            $obj_usuario->setEmail($email);
            $obj_usuario->setPassword($password);
            
			return UsuarioDao::getUsuario($obj_usuario);
		}

		public function forgetPass($email){
			$obj_usuario = new Usuario();
			$obj_usuario->setEmail($email);
			
			return UsuarioDao::forgetPass($obj_usuario);
		}

		public function addUsuario($nombres, $apellidos, $tipodoc, $numdni, $celular, $departamento, $provincia, $distrito, $direccion, $email, $password){
			$obj_usuario = new Usuario();
			$obj_usuario->setNombres($nombres);
			$obj_usuario->setApellidos($apellidos);
			$obj_usuario->setTipodoc($tipodoc);
			$obj_usuario->setNumdni($numdni);
			$obj_usuario->setCelular($celular);
			$obj_usuario->setDepartamento($departamento);
			$obj_usuario->setProvincia($provincia);
			$obj_usuario->setDistrito($distrito);
			$obj_usuario->setDireccion($direccion);
            $obj_usuario->setEmail($email);
            $obj_usuario->setPassword($password);

			return UsuarioDao::addUsuario($obj_usuario);
		}

	}

	

?>