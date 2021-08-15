<?php

	require_once __DIR__."/../modelo/CarritoDao.php";
	
	class CarritoControlador{

		public function getCarrito($iduser){
            $obj_carrito = new Carrito();
            $obj_carrito->setIdusuario($iduser);

			return CarritoDao::getCarrito($obj_carrito);
		}

		public function getAddCarrito($iduser, $idprodu, $cant){
			$obj_carrito = new Carrito();
            $obj_carrito->setIdusuario($iduser);
            $obj_carrito->setIdproducto($idprodu);
            $obj_carrito->setCantidad($cant);

			return CarritoDao::getAddCarrito($obj_carrito);
		}

		public function updateCarrito($iduser, $idprodu, $cant){
			$obj_carrito = new Carrito();
            $obj_carrito->setIdusuario($iduser);
            $obj_carrito->setIdproducto($idprodu);
            $obj_carrito->setCantidad($cant);

			return CarritoDao::updateCarrito($obj_carrito);
		}

		public function deleteCarrito($idcarrito, $iduser){
			$obj_carrito = new Carrito();
			$obj_carrito->setIdcarrito($idcarrito);
            $obj_carrito->setIdusuario($iduser);

			return CarritoDao::deleteCarrito($obj_carrito);
		}

	}

?>