<?php

/**
 * 
 */
class Producto
{
	private $idprod;
	private $idcategoria;
	private $idsubcateg;
	private $marcaprod;
	private $nomprod;
	private $detprod;
	private $precioprod;
	private $stockprod;
	private $fechaprod;
	private $fotoprod1;
	private $fotoprod2;
	private $fotoprod3;
	private $fotoprod4;
	private $fotoprod5;

	public function getIdprod(){
		return $this->idprod;
	}

	public function setIdprod($idprod){
		$this->idprod = $idprod;
	}

	public function getIdcategoria(){
		return $this->idcategoria;
	}

	public function setIdcategoria($idcategoria){
		$this->idcategoria = $idcategoria;
	}

	public function getIdsubcateg(){
		return $this->idsubcateg;
	}

	public function setIdsubcateg($idsubcateg){
		$this->idsubcateg = $idsubcateg;
	}

	public function getMarcaprod(){
		return $this->marcaprod;
	}

	public function setMarcaprod($marcaprod){
		$this->marcaprod = $marcaprod;
	}

	public function getNomprod(){
		return $this->nomprod;
	}

	public function setNomprod($nomprod){
		$this->nomprod = $nomprod;
	}

	public function getDetprod(){
		return $this->detprod;
	}

	public function setDetprod($detprod){
		$this->detprod = $detprod;
	}

	public function getPrecioprod(){
		return $this->precioprod;
	}

	public function setPrecioprod($precioprod){
		$this->precioprod = $precioprod;
	}

	public function getStockprod(){
		return $this->stockprod;
	}

	public function setStockprod($stockprod){
		$this->stockprod = $stockprod;
	}

	public function getFechaprod(){
		return $this->fechaprod;
	}

	public function setFechaprod($fechaprod){
		$this->fechaprod = $fechaprod;
	}

	public function getFotoprod1(){
		return $this->fotoprod1;
	}

	public function setFotoprod1($fotoprod1){
		$this->fotoprod1 = $fotoprod1;
	}

	public function getFotoprod2(){
		return $this->fotoprod2;
	}

	public function setFotoprod2($fotoprod2){
		$this->fotoprod2 = $fotoprod2;
	}

	public function getFotoprod3(){
		return $this->fotoprod3;
	}

	public function setFotoprod3($fotoprod3){
		$this->fotoprod3 = $fotoprod3;
	}

	public function getFotoprod4(){
		return $this->fotoprod4;
	}

	public function setFotoprod4($fotoprod4){
		$this->fotoprod4 = $fotoprod4;
	}

	public function getFotoprod5(){
		return $this->fotoprod5;
	}

	public function setFotoprod5($fotoprod5){
		$this->fotoprod5 = $fotoprod5;
	}

}

?>