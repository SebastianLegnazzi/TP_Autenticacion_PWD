<?php
/* CREATE TABLE `usuariorol` (
  `idusuario` bigint(20) NOT NULL,
  `idrol` bigint(20) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 */
class UsuarioRol
{
	private $idUsuario;
	private $idRol;
	private $mensajeFuncion;

	/**************************************/
	/**************** SET *****************/
	/**************************************/

	/**
	 * Establece el valor de idUsuario
	 */ 
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	/**
	 * Establece el valor de idRol
	 */ 
	public function setIdRol($idRol){
		$this->idRol = $idRol;
	}

	public function setMensajeFuncion($mensajeFuncion)
	{
		$this->mensajeFuncion = $mensajeFuncion;
	}

	/**************************************/
	/**************** GET *****************/
	/**************************************/

	/**
	 * Obtiene el valor de idUsuario
	 */ 
	public function getIdUsuario(){
		return $this->idUsuario;
	}

	/**
	 * Obtiene el valor de idRol
	 */ 
	public function getIdRol(){
		return $this->idRol;
	}
	
	public function getMensajeFuncion()
	{
		return $this->mensajeFuncion;
	}

	/**************************************/
	/************** FUNCIONES *************/
	/**************************************/

	public function __construct()
	{
		$this->idRol = "";
		$this->idUsuario = "";
	}

	public function cargar($idRol, $idUsuario)
	{
		$this->idRol = $idRol;
		$this->idUsuario = $idUsuario;
	}

	public function insertar()
	{
		$base = new BaseDatos();
		$resp = false;
		$consulta = "INSERT INTO rol (idrol, idUsuario) VALUES (
        " . $this->getIdRol() . ",
		'" . $this->getIdUsuario() . "')";
		if ($base->Iniciar()) {
			if ($base->Ejecutar($consulta)) {
				$resp =  true;
			} else {
				$this->setMensajeFuncion($base->getError());
			}
		} else {
			$this->setMensajeFuncion($base->getError());
		}
		return $resp;
	}

	public function listar($condicion = "")
	{
		$arregloUsuarioRoles = null;
		$base = new BaseDatos();
		$consultaPersona = "SELECT * FROM usuariorol ";
		if ($condicion != "") {
			$consultaPersona = $consultaPersona . ' WHERE ' . $condicion;
		}
		$consultaPersona .= " ORDER BY idusuario ";
		if ($base->Iniciar()) {
			if ($base->Ejecutar($consultaPersona)) {
				$arregloUsuarioRoles = array();
				while ($usuarioRol = $base->Registro()) {
					$ObjUsuarioRol = new UsuarioRol();
					$ObjUsuarioRol->cargar($usuarioRol['idusuario'], $usuarioRol['idrol']);
					array_push($arregloUsuarioRoles, $ObjUsuarioRol);
				}
			} else {
				$this->setMensajeFuncion($base->getError());
			}
		} else {
			$this->setMensajeFuncion($base->getError());
		}
		return $arregloUsuarioRoles;
	}

	public function eliminar()
	{
		$base = new BaseDatos();
		$resp = false;
		if ($base->Iniciar()) {
			$consulta = "DELETE FROM usuariorol WHERE idusuario= '". $this->getIdRol()."' AND idrol= '" . $this->getIdUsuario()."'";
			if ($base->Ejecutar($consulta)) {
				$resp =  true;
			} else {
				$this->setMensajeFuncion($base->getError());
			}
		} else {
			$this->setMensajeFuncion($base->getError());
		}
		return $resp;
	}

	public function __toString()
	{
		return ("El id del usuario es: " . $this->getIdRol() .
			"\n El id del rol es: " . $this->getIdUsuario() . "\n");
	}

}

?>