<?php

class Usuario
{
	private $idusuario;
	private $nombres;
	private $apellidos;
	private $tipodoc;
	private $numdni;
	private $celular;
	private $departamento;
	private $provincia;
	private $distrito;
	private $direccion;
	private $email;
	private $password;
    private $estado;

    public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($idusuario){
		$this->idusuario = $idusuario;
	}

	public function getNombres(){
		return $this->nombres;
	}

	public function setNombres($nombres){
		$this->nombres = $nombres;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}

	public function getTipodoc(){
		return $this->tipodoc;
	}

	public function setTipodoc($tipodoc){
		$this->tipodoc = $tipodoc;
	}

	public function getNumdni(){
		return $this->numdni;
	}

	public function setNumdni($numdni){
		$this->numdni = $numdni;
	}

	public function getCelular(){
		return $this->celular;
	}

	public function setCelular($celular){
		$this->celular = $celular;
	}

	public function getDepartamento(){
		return $this->departamento;
	}

	public function setDepartamento($departamento){
		$this->departamento = $departamento;
	}

	public function getProvincia(){
		return $this->provincia;
	}

	public function setProvincia($provincia){
		$this->provincia = $provincia;
	}

	public function getDistrito(){
		return $this->distrito;
	}

	public function setDistrito($distrito){
		$this->distrito = $distrito;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

}

?>