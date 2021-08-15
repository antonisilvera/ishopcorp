<?php

class Venta{
    private $idventa;
	private $iduser;
	private $costoenvio;
	private $total;
	private $fecventa;
	private $estado;

    public function getIdventa(){
		return $this->idventa;
	}

	public function setIdventa($idventa){
		$this->idventa = $idventa;
	}

	public function getIduser(){
		return $this->iduser;
	}

	public function setIduser($iduser){
		$this->iduser = $iduser;
	}

	public function getCostoenvio(){
		return $this->costoenvio;
	}

	public function setCostoenvio($costoenvio){
		$this->costoenvio = $costoenvio;
	}

	public function getTotal(){
		return $this->total;
	}

	public function setTotal($total){
		$this->total = $total;
	}

	public function getFecventa(){
		return $this->fecventa;
	}

	public function setFecventa($fecventa){
		$this->fecventa = $fecventa;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}


}



?>