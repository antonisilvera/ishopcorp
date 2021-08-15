<?php

	require_once __DIR__."/../modelo/VentaDao.php";
	
	class VentaControlador{

		public function addVenta($iduser, $total, $envio, $direccion){
			$obj_venta = new Venta();
            $obj_venta->setIduser($iduser);
            $obj_venta->setTotal($total);
            $obj_venta->setCostoenvio($envio);

			return VentaDao::addVenta($obj_venta, $direccion);

		}
    }

?>