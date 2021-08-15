<?php

include 'Conexion.php';
require_once __DIR__."/../entidades/Producto.php";

/**
 * 
 */
class ProductoDao extends Conectar
{
	protected static $conn;

	private static function getConexion(){
		self::$conn = Conectar::conexion();
	}

	private static function desconectar(){
		self::$conn = null;
	}

	//metodo getProducto obtiene todos los productos
	public static function getProducto($producto){
		$productos=array();
	
		$query = "SELECT * FROM productos";
		self::getConexion();

		$resultado = self::$conn->prepare($query);

		$resultado->execute();

		while ($filas = $resultado->fetch()) {
			$productos[]=$filas;
		}

		return $productos;
	}

	//metodo getOneProducto obtiene un solo producto
	public static function getOneProducto($producto){
		$productos=array();
	
		$query = "SELECT * FROM productos WHERE idprod = :idprod";
		self::getConexion();

		$resultado = self::$conn->prepare($query);
		$resultado->bindValue(":idprod", $producto->getIdprod());

		$resultado->execute();

		while ($filas = $resultado->fetch()) {
			$productos[]=$filas;
		}

		return $productos;
	}
	
	//metodo getBuscarProducto obtiene la busqueda de productos
	public static function getBuscarProducto($producto){
		$productos=array();
	
		$query = "SELECT * FROM productos WHERE MATCH(nomprod,detprod) AGAINST ('+".$producto->getNomprod()."' IN BOOLEAN MODE)";
		//$query = "SELECT * FROM productos WHERE nomprod LIKE '%".$producto->getNomprod()."%'";
		self::getConexion();

		$resultado = self::$conn->prepare($query);

		$resultado->execute();

		while ($filas = $resultado->fetch()) {
			$productos[]=$filas;
		}

		return $productos;
	}
}

?>