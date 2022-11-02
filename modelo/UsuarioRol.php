<?php
/* CREATE TABLE `usuariorol` (
  `idusuario` bigint(20) NOT NULL,
  `idrol` bigint(20) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 */
class UsuarioRol
{
	private $ojbUsuario;
	private $objRol;
	private $mensajeFuncion;

	/**************************************/
	/**************** SET *****************/
	/**************************************/

	/**
	 * Establece el valor de idUsuario
	 */ 
	public function setOjbUsuario($ojbUsuario){
		$this->ojbUsuario = $ojbUsuario;
	}

	/**
	 * Establece el valor de idRol
	 */ 
	public function setObjRol($objRol){
		$this->objRol = $objRol;
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
	public function getOjbUsuario(){
		return $this->ojbUsuario;
	}

	/**
	 * Obtiene el valor de idRol
	 */ 
	public function getObjRol(){
		return $this->objRol;
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
		$this->objRol = new Rol;
		$this->ojbUsuario = new Usuario;
	}

	public function cargar($idRol, $idUsuario)
	{
		$resp = false;
		if($this->objRol->Buscar($idRol) && $this->ojbUsuario->Buscar($idUsuario)){
			$resp = true;
		}
		return $resp;
	}

	public function insertar()
	{
		$base = new BaseDatos();
		$resp = false;
		$consulta = "INSERT INTO rol (idrol, idUsuario) VALUES (
        " . $this->getObjRol()->getRol(). ",
		'" . $this->getOjbUsuario()->getId(). "')";
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
			$consulta = "DELETE FROM usuariorol WHERE idusuario= '". $this->getObjRol()->getRol()."' AND idrol= '" . $this->getOjbUsuario()->getId()."'";
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
		return ("El id del usuario es: " .$this->getObjRol()->getRol().
			"\n El id del rol es: " . $this->getOjbUsuario()->getId() . "\n");
	}

}

?>