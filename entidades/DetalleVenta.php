<?php

class DetalleVenta{

    private $iddetalle;
    private $idventa;
    private $idproducto;
    private $precunit;
    private $cantidad;
    private $direccionentrega;

    public function getIddetalle(){
		return $this->iddetalle;
	}

	public function setIddetalle($iddetalle){
		$this->iddetalle = $iddetalle;
	}

	public function getIdventa(){
		return $this->idventa;
	}

	public function setIdventa($idventa){
		$this->idventa = $idventa;
	}

	public function getIdproducto(){
		return $this->idproducto;
	}

	public function setIdproducto($idproducto){
		$this->idproducto = $idproducto;
	}

	public function getPrecunit(){
		return $this->precunit;
	}

	public function setPrecunit($precunit){
		$this->precunit = $precunit;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

	public function getDireccionentrega(){
		return $this->direccionentrega;
	}

	public function setDireccionentrega($direccionentrega){
		$this->direccionentrega = $direccionentrega;
	}
}

?>