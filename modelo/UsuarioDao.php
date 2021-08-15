<?php

include 'Conexion.php';
require_once __DIR__."/../entidades/Usuario.php";

/**
 * 
 */
class UsuarioDao extends Conectar
{
	protected static $conn;

	private static function getConexion(){
		self::$conn = Conectar::conexion();
	}

	private static function desconectar(){
		self::$conn = null;
	}

	//metodo login obtiene la sesion del usuario
	public static function login($usuario){
		$query = "SELECT * FROM usuarios WHERE email= :email AND password= :password";
		self::getConexion();

		$resultado = self::$conn->prepare($query);
		$resultado->bindValue(":email", $usuario->getEmail());
		$resultado->bindValue(":password", $usuario->getPassword());

		$resultado->execute();

		if($resultado->rowCount()>0){
			$filas = $resultado->fetch();
			if ($filas['email']== $usuario->getEmail()
				&& $filas['password']== $usuario->getPassword()) {
				return true;
			}
		}

		return false;
	}

	//metodo getUsuario pasandole el objeto $usuario para la sesion
	public static function getUsuario($usuario){
		$query = "SELECT idusuario, nombres, apellidos, tipodoc, numdni, celular, departamento, provincia, distrito, direccion, email, password, estado FROM usuarios WHERE email= :email AND password= :password";
		self::getConexion();

		$resultado = self::$conn->prepare($query);
		$resultado->bindValue(":email", $usuario->getEmail());
		$resultado->bindValue(":password", $usuario->getPassword());

		$resultado->execute();

		$filas = $resultado->fetch();
		
		$usuario = new Usuario();
		$usuario->setIdusuario($filas['idusuario']);
		$usuario->setNombres($filas['nombres']);
		$usuario->setApellidos($filas['apellidos']);
		$usuario->setTipodoc($filas['tipodoc']);
		$usuario->setNumdni($filas['numdni']);
		$usuario->setCelular($filas['celular']);
		$usuario->setDepartamento($filas['departamento']);
		$usuario->setProvincia($filas['provincia']);
		$usuario->setDistrito($filas['distrito']);
		$usuario->setDireccion($filas['direccion']);
		$usuario->setEmail($filas['email']);
		$usuario->setPassword($filas['password']);
		$usuario->setEstado($filas['estado']);

		return $usuario;
	}

	public static function forgetPass($usuario){
		$query = "SELECT * FROM usuarios WHERE email= :email";
		self::getConexion();

		$resultado = self::$conn->prepare($query);
		$resultado->bindValue(":email", $usuario->getEmail());

		$resultado->execute();

		if($resultado->rowCount()>0){
			$filas = $resultado->fetch();
			$name = $filas['nombres'];
			$apell = $filas['apellidos'];
			$email = $filas['email'];
			$pass = $filas['password'];
			
			$header = "From: noreply@exmaple.com" . "\r\n";
			$header .= "Reply-To: antoni.silvera@gmail.com" . "\r\n";
			$header .= "X-Mailer: PHP/". phpversion();
			$asunto = "Recuperación de Contraseña ISHOPCORP";
			$msg = "Estimado ".$apell. ", ". $name . "\r\n";
			$msg .= "De acuerdo, al proceso de recuperacion de contraseña, se ha procesido a enviar mediante este correo la clave de acceso a su cuenta, por favor no comparta esta información." ."\r\n";
			$msg .= "Contraseña: ". $pass. "\r\n";

			$mail = @mail($email,$asunto,$msg,$header);
			if($mail){
				$respuesta = true;
			}else{
				$respuesta = false;
			}
			return $respuesta;
		}
		$respuesta = false;
		return $respuesta;
	}

	public static function addUsuario($usuario){
		$query = "INSERT INTO usuarios(idusuario, nombres, apellidos, tipodoc, numdni, celular, departamento, provincia, distrito, direccion, email, password, fecha, estado) 
		VALUES (NULL, :nombres, :apellidos, :tipodoc, :numdni, :celular, :departamento, :provincia, :distrito, :direccion, :email, :pass, :fecha, 'CLIENTE')";
		self::getConexion();

		$resultado = self::$conn->prepare($query);
		$resultado->bindValue(":nombres", $usuario->getNombres());
		$resultado->bindValue(":apellidos", $usuario->getApellidos());
		$resultado->bindValue(":tipodoc", $usuario->getTipodoc());
		$resultado->bindValue(":numdni", $usuario->getNumdni());
		$resultado->bindValue(":celular", $usuario->getCelular());
		$resultado->bindValue(":departamento", $usuario->getDepartamento());
		$resultado->bindValue(":provincia", $usuario->getProvincia());
		$resultado->bindValue(":distrito", $usuario->getDistrito());
		$resultado->bindValue(":direccion", $usuario->getDireccion());
		$resultado->bindValue(":email", $usuario->getEmail());
		$resultado->bindValue(":pass", $usuario->getPassword());
		$resultado->bindValue(":fecha", date("d/m/Y H:i"));

		if($resultado->execute()){
			return true;
		}else{
			return false;
		}	
	}	

}

?>