<?php

	require_once __DIR__."/../modelo/ProductoDao.php";
	
	class ProductoControlador{

		public function getProducto(){
			$obj_producto = new Producto();

			return ProductoDao::getProducto($obj_producto);
		}

		public function getOneProducto($idproducto){
			$obj_producto = new Producto();
			$obj_producto->setIdprod($idproducto);

			return ProductoDao::getOneProducto($obj_producto);
		}

		public function getBuscarProducto($busqueda){
			$obj_producto = new Producto();
			$obj_producto->setNomprod($busqueda);

			return ProductoDao::getBuscarProducto($obj_producto);
		}

		

	}

?>