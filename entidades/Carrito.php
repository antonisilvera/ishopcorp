<?php

class Carrito
{
	private $idcarrito;
	private $idusuario;
	private $idproducto;
	private $cantidad;
	private $fecha;
	private $estado;
    
    public function getIdcarrito(){
		return $this->idcarrito;
	}

	public function setIdcarrito($idcarrito){
		$this->idcarrito = $idcarrito;
	}

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($idusuario){
		$this->idusuario = $idusuario;
	}

	public function getIdproducto(){
		return $this->idproducto;
	}

	public function setIdproducto($idproducto){
		$this->idproducto = $idproducto;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}
}

?>