<?php

include 'Conexion.php';
require_once __DIR__."/../entidades/Carrito.php";

class CarritoDao extends Conectar
{
	protected static $conn;

	private static function getConexion(){
		self::$conn = Conectar::conexion();
	}

	private static function desconectar(){
		self::$conn = null;
	}

	//metodo getCarrito obtiene todos los productos
	public static function getCarrito($carrito){
		$carritos=array();
	
		$query = "SELECT c.idcarrito, c.idusuario, c.idproducto, p.fotoprod1, p.nomprod, p.precioprod,c.cantidad 
        FROM carrito c INNER JOIN productos p 
        ON c.idproducto = p.idprod WHERE c.idusuario = :iduser AND c.estado = 'PENDIENTE'";
		self::getConexion();

        $resultado = self::$conn->prepare($query);
        $resultado->bindValue(":iduser", $carrito->getIdusuario());

		$resultado->execute();

		while ($filas = $resultado->fetch()) {
			$carritos[]=$filas;
		}

		return $carritos;
	}

	//metodo para agregar un item al carrito
	public static function getAddCarrito($carrito){
		
		$sql="SELECT cantidad FROM carrito WHERE idproducto = :idprod AND idusuario = :iduser AND estado = 'PENDIENTE' ";
		self::getConexion();
		$result = self::$conn->prepare($sql);
		$result->bindValue(":idprod", $carrito->getIdproducto());
		$result->bindValue(":iduser", $carrito->getIdusuario());
		$result->execute();
		
		if($result->rowCount()>0){
			$antcant = $result->fetch();
			$query = "UPDATE carrito SET cantidad=:cant WHERE idproducto = :idprod AND idusuario = :iduser";
			self::getConexion();
			$resultado = self::$conn->prepare($query);
			$resultado->bindValue(":cant", ($carrito->getCantidad() + $antcant['cantidad']));
			$resultado->bindValue(":idprod", $carrito->getIdproducto());
			$resultado->bindValue(":iduser", $carrito->getIdusuario());

			if($resultado->execute()){
				return true;
			}else{
				return false;
			}	

		}else{
			$query = "INSERT INTO carrito (idcarrito, idusuario, idproducto, cantidad, fecha, estado) 
                                VALUE (NULL, :idusuario, :idproducto, :cantidad, :fecha, 'PENDIENTE')";
			self::getConexion();

			$resultado = self::$conn->prepare($query);
			$resultado->bindValue(":idusuario", $carrito->getIdusuario());
			$resultado->bindValue(":idproducto", $carrito->getIdproducto());
			$resultado->bindValue(":cantidad", $carrito->getCantidad());
			$resultado->bindValue(":fecha", date("d/m/Y H:i"));

			if($resultado->execute()){
				return true;
			}else{
				return false;
			}	
		}	
	}

	//metodo updateCarrito obtiene todos los productos
	public static function updateCarrito($carrito){
	
		$query = "UPDATE carrito SET cantidad=:cant WHERE idproducto = :idprod AND idusuario = :iduser";
		self::getConexion();
		$resultado = self::$conn->prepare($query);
		$resultado->bindValue(":cant", ($carrito->getCantidad()));
		$resultado->bindValue(":idprod", $carrito->getIdproducto());
		$resultado->bindValue(":iduser", $carrito->getIdusuario());

		if($resultado->execute()){
			return true;
		}else{
			return false;
		}	
	}

	public static function deleteCarrito($carrito){
		$query = "DELETE FROM carrito WHERE idcarrito = :idcarr AND idusuario = :iduser";
		self::getConexion();
		$resultado = self::$conn->prepare($query);
		$resultado->bindValue(":idcarr", $carrito->getIdcarrito());
		$resultado->bindValue(":iduser", $carrito->getIdusuario());

		if($resultado->execute()){
			return true;
		}else{
			return false;
		}	
	}

}

?>